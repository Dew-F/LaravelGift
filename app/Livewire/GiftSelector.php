<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\Cache;
use Livewire\Attributes\Computed;

class GiftSelector extends Component
{
    public $showModal = false;
    public $categories = [];
    public $products = [];
    public $selectedCategory = null;
    public $selectedGift = null;
    public $selectedProduct = null;

    public function mount()
    {
        $this->categories = Cache::remember('categories', 60*60*24, function () {
            return Category::select('id', 'name', 'description')->get();
        });
        
        $this->selectedProduct = session('selected_product');
        if ($this->selectedProduct) {
            $this->selectedGift = Product::find($this->selectedProduct);
        }
    }

    public function showGiftModal()
    {
        $this->showModal = true;
    }

    public function selectCategory($categoryId)
    {
        $cacheKey = "products_category_$categoryId";
        $this->selectedCategory = Category::find($categoryId);
        $this->products = Cache::remember($cacheKey, 60*60*24, function () use ($categoryId) {
            return Product::select('id', 'name', 'price', 'image')
                ->where('category_id', $categoryId)
                ->where('active', true)
                ->get();
        });
    }

    #[Computed]
    public function getProducts()
    {
        return $this->products;
    }

    public function selectProduct($productId)
    {
        $this->selectedProduct = $productId;
        session(['selected_product' => $productId]);
        $this->selectedGift = Product::find($productId);
        $this->showModal = false;
    }

    public function backToCategories()
    {
        $this->selectedCategory = null;
        $this->products = [];
    }

    public function render()
    {
        return view('livewire.gift-selector');
    }
} 