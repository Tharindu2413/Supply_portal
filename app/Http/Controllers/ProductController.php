<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Models\Supplier;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $products = Sub::paginate(10);
        $products = DB::table('suppliers')
        ->join('products', 'suppliers.id', '=', 'products.supplier_id') // Corrected column name in the join condition
        ->select('suppliers.name', 'products.id', 'products.product_code', 'products.product_name', 'products.logo_image', 'products.description', 'products.unit_price', 'products.quantity', 'products.status')
        ->get();
    

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
            $suppliers = Supplier::orderBy('id', 'asc')->get();
      
        return view('products.create',compact('suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest  $request)
    {
        $data = $request->validated();

        // Handle image upload if a file is provided
        if ($request->hasFile('logo_image')) {
            $path = $request->file('logo_image')->store('public/products');
            $data['logo_image'] = str_replace('public/', '', $path);
        }

        Product::create($data);

        return redirect()->route('products.index')
            ->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $id = $product->supplier_id;
        $suppliers = Supplier::orderBy('id', 'asc')->get();
        $productsWithSuppliers = Supplier::where('id', '=', $id)->first();
        return view('products.edit', compact('product','suppliers','productsWithSuppliers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest  $request, Product $product)
    {
        $data = $request->all();

        if ($request->hasFile('logo_image')) {
            $path = $request->file('logo_image')->store('public/product_images');
            $data['logo_image'] = str_replace('public/', '', $path);
        }

        $data['status'] = $request->has('status');

        $product->update($data);



        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully.');
    }
 
}
