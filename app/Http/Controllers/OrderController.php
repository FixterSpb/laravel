<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderPutRequest;
use App\Http\Requests\OrderStoreRequest;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{

    public function index(Request $request)
    {
        $user = $request->user();
        $orders = Order::where('user_id', $user->id)->get();
        return view('orders', compact('orders', 'user'));
    }

    public function create(Request $request)
    {
        $user = $request->user();
        return view('orders.create', compact('user'));
    }

    public function store(OrderStoreRequest $request): RedirectResponse
    {
        $newOrder = [
            'user_id' => $request->user()->id,
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'description' => $request->description,
        ];

        (new Order($newOrder))->save();
        return redirect()->route('orders.index')->with('success', 'Заказ успешно добавлен!');
    }

    public function edit(Order $order, Request $request)
    {
        $user = $request->user();
        return view('orders.create', compact('user', 'order'));
    }

    public function put(Order $order, OrderPutRequest $request)
    {
        $order->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'description' => $request->description,
        ]);
        return redirect()->route('orders.index')->with('success', 'Заказ успешно изменен');
    }

    public function destroy(Order $order): RedirectResponse
    {
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Заказ успешно удален');
    }
}
