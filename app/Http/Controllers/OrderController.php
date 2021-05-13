<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderStoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{

    public function store(OrderStoreRequest $request): \Illuminate\Http\RedirectResponse
    {
        $newOrder = [
            'name' => $request->request->get('name'),
            'phone' => $request->request->get('phone'),
            'email' => $request->request->get('email'),
            'description' => $request->request->get('description'),
            'created_at' => now()
        ];

        if (Storage::exists(FILE_ORDERS_NAME)){
            $orders = json_decode(Storage::disk('local')->get(FILE_ORDERS_NAME));
        }

        $orders[] = $newOrder;

        Storage::put(FILE_ORDERS_NAME, json_encode($orders));
        return redirect()->route('dashboard')->with('success', 'Заказ успешно добавлен!');
    }
}
