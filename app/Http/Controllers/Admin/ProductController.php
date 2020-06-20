<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product;
use DataTables;
use App\Services\ProductService;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        return view('admin.product.index');
    }

    public function datatable(ProductService $service)
    {
        $products = $service->index();

        return Datatables::of($products)
            ->addColumn("action", function($products) {
                return '<a href="'.route('product.edit',$products->id) .'" class="btn btn-sm btn-warning">Edit</a> <form action="'. route('product.destroy',$products->id) .'" method="post" class="d-inline"> <input type="hidden" name="_method" value="delete"> <input type="hidden" name="_token" value="'.csrf_token().'">  <button class="btn btn-sm btn-danger">Hapus</button></form>';
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }

    public function create()
    {
        return view('admin.product.create');
    }

    public function store(ProductRequest $request,ProductService $service)
    {
        $service->create($request->all());

        return redirect()->route('product.index');
    }

    public function show(Product $product)
    {
        //
    }

    public function edit(Product $product)
    {
        return view('admin.product.edit', compact('product'));
    }

    public function update(ProductRequest $request, ProductService $service, Product $product)
    {
        $data_ = Product::findOrFail($product->id);

        $service->update($request->all(), $data_);

        return redirect()->route('product.index');
    }

    public function destroy(Product $product, ProductService $service)
    {
        $data_ = Product::findOrFail($product->id);

        $service->destroy($data_);

        return redirect()->route('product.index');
    }
}
