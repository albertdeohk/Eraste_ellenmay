<?php 

namespace App\Services;

use App\Order;

use Illuminate\Support\Facades\DB;

class OrderService
{
    public function index()
    {
        $orders = Order::all();

        return $orders;
    }

    public function create($data, $product)
    {
        $order = null;
        DB::transaction(function () use($data,$product,&$order) {
            $order = Order::create([
                'product_code' => $product->id,
                'quantity' => $data['quantity'],
                'amount' => $data['amount'],
                'name' => $data['name'],
                'hp' => $data['hp'],
                'address' => $data['address'],
            ]);
        });
        
        return $order;
    }
    
    public function update($data, $data_)
    {
        $order = $data_->update($data);

        return $order;
    }
    
    public function destroy($data_)
    {
        $order = $data_->delete();

        return $order;
    }
}