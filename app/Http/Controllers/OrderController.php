<?php

namespace App\Http\Controllers;

use App\Mail\OrderCreated;
use Illuminate\Http\Request;
use App\Models\Questionnaire;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function createOrder()
    {
        $questionnaireData = session('questionnaire_data');
        $productId = session('selected_product');
        // Сохранение анкеты
        $questionnaire = Questionnaire::create([...$questionnaireData]);

        // Создание заказа
        $order = Order::create([
            'questionnaire_id' => $questionnaire->id,
            'product_id' => $productId,
        ]);


        // Отправка email
        // Mail::to('recipient@example.com')->send(new OrderCreated($order));
        return response()->json(['success' => true]);
    }
}