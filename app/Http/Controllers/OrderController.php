<?php

namespace App\Http\Controllers;
use App\Order;
use App\Product;
use App\Services\OrderService;
use App\Http\Requests\OrderRequest;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function detail($id)
    {
        $product = Product::findOrFail($id);
        return view('order', compact('product'));
    }

    public function create(OrderRequest $request, OrderService $service, $id)
    {
        $product = Product::findOrFail($id);
        $order = $service->create($request->all(),$product);
        return redirect()->route('_order.success',$order->id);
    }

    public function success($id)
    {
        $order = Order::with('product')->findOrFail($id);
        return view('orderEnd', compact('order'));
    }
}