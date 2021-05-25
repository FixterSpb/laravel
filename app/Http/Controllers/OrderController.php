<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderStoreRequest;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{

    public function store(OrderStoreRequest $request): \Illuminate\Http\RedirectResponse
    {
        $newOrder = [
            'name' => $request->get('name'),
            'phone' => $request->get('phone'),
            'email' => $request->get('email'),
            'description' => $request->get('description'),
        ];

        (new Order($newOrder))->save();

        return redirect()->route('dashboard')->with('success', 'Заказ успешно добавлен!');
    }
}
