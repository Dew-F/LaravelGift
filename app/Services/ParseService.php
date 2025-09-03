<?php

namespace App\Services;

use App\Models\Product;
use DOMDocument;
use DOMXPath;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class ParseService
{
    private function getHtml($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $html = curl_exec($ch);
        curl_close($ch);

        libxml_use_internal_errors(true);

        $dom = new DOMDocument();
        $dom->loadHTML($html);
        $xpath = new DOMXPath($dom);

        return $xpath;
    }

    private function getProducts($xpath, int $categoryId)
    {
        $products = $xpath->query('//div[@class="catalog-section__item"]');

        foreach ($products as $product) {
            $title = $xpath->query('.//div[@class="catalog-rounded-item__name"]', $product);
            $price = $xpath->query('.//span[@class="catalog-rounded-item__price"]', $product);
            $picture = $xpath->query('.//img', $product);
            $inStock = $xpath->query('.//div[contains(@class, "catalog-rounded-item__quantity-text")]', $product);
            
            if ($title->length === 0 || $price->length === 0 || $picture->length === 0 || $inStock->length === 0) {
                continue;
            }
            
            $name = trim($title->item(0)->nodeValue);
            $price = (int) preg_replace('/[^0-9]/', '', $price->item(0)->nodeValue) * 1.6;
            $slug = \Str::slug($name);
            
            $existingProduct = Product::where('slug', $slug)->first();
            
            if (trim($inStock->item(0)->nodeValue) !== 'В наличии') {
                if ($existingProduct) {
                    $existingProduct->update(['active' => false]);
                }
                return false;
            }
            
            if ($existingProduct) {
                Log::info("Товар: $name - $slug - $price - $categoryId");
                Log::info("Совпал со старым товаром: $existingProduct->name - $existingProduct->slug - $existingProduct->price - $existingProduct->categoryId");

                $existingProduct->update([
                    'price' => $price,
                    'active' => true,
                ]);
            } else {
                if ($picture->length > 0) {
                    $imageUrl = config('services.parsing.url') . $picture->item(0)->getAttribute('src');
                    $imagePath = "storage/product/{$slug}.webp";
                    
                    try{
                        $imageContent = file_get_contents($imageUrl);
                        Storage::disk('public')->put("/product/{$slug}.webp", $imageContent);
                    } catch (\Exception $e) {
                        $imagePath = null;
                    }
                } else {
                    $imagePath = null;
                }
                Log::info("Новый товар: $name - $slug - $price - $imagePath - $categoryId");

                Product::create([
                    'name' => $name,
                    'slug' => $slug,
                    'price' => $price,
                    'image' => $imagePath,
                    'category_id' => $categoryId,
                    'active' => true
                ]);
            }
        }

        return true;
    }

    public function execute(string $url, int $categoryId)
    {
        $xpath = $this->getHtml($url);

        $pages = $xpath->query('//div[@class="catalog-pagination__nums"]/a');

        $pages->length > 0 ? ($lastPage = $pages->item($pages->length - 1)->nodeValue) : ($lastPage = 1);

        $this->getProducts($xpath, $categoryId);

        Log::info("Страница $url проанализирована");

        if ($lastPage > 1) {
            for ($i = 2; $i <= $lastPage; $i++) {

                sleep(2);

                $xpath = $this->getHtml("$url?PAGEN_2=$i");

                $availability = $this->getProducts($xpath, $categoryId);

                Log::info("Страница $url?PAGEN_2=$i проанализирована");

                if (!$availability) {
                    return 'Команда выполнена успешно!';
                }
            }
        }

        return 'Команда выполнена успешно!';
    }
}
