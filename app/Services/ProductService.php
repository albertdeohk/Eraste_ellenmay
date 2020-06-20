<?php 

namespace App\Services;

use App\Product;

class ProductService
{
    public function index()
    {
        $products = Product::all();

        return $products;
    }

    public function create($data)
    {
        $product = Product::create($data);

        return $product;
    }

    public function update($data, $data_)
    {
        $product = $data_->update($data);

        return $product;
    }

    public function destroy($data_)
    {
        $product = $data_->delete();

        return $product;
    }
}
