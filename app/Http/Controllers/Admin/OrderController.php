<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use DataTables;
use App\Services\OrderService;
use App\Http\Requests\OrderRequest;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index()
    {
        return view('admin.order.index', compact('orders'));
    }

    public function datatable(OrderService $service)
    {
        $orders = $service->index();

        return Datatables::of($orders)
            ->addColumn("action", function($orders) {
                return '<a href="'.route('order.edit',$orders->id) .'" class="btn btn-sm btn-warning">Edit</a> <form action="'. route('order.destroy',$orders->id) .'" method="post" class="d-inline"> <input type="hidden" name="_method" value="delete"> <input type="hidden" name="_token" value="'.csrf_token().'">  <button class="btn btn-sm btn-danger">Hapus</button></form>';
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $order = Order::with('product')->findOrFail($id);

        return view('admin.order.edit', compact('order'));
    }

    public function update(OrderRequest $request, OrderService $service, $id)
    {
        $order = Order::findOrFail($id);

        $service->update($request->all(), $order);
        
        return redirect()->route('order.index');
    }

    public function destroy(OrderService $service, $id)
    {
        $order = Order::findOrFail($id);

        $service->destroy($order);
        
        return redirect()->route('order.index');
    }
}
