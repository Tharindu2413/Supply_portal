<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers = Supplier::paginate(10);
        return view('suppliers.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('suppliers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:suppliers',
            'contact_no' => 'required|digits:10',
            'website_url' => 'nullable|url',
        ]);

        Supplier::create($request->all());

        return redirect()->route('suppliers.index')
            ->with('success', 'Supplier created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier)
    {
        return view('suppliers.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supplier $supplier)
    {
    $originalData = $supplier->toArray();

    $request->validate([
        'name' => 'required|min:3',
        'email' => 'required|email|unique:suppliers,email,' . $supplier->id,
        'contact_no' => 'required|digits:10',
        'website_url' => 'nullable|url',
        'status' => 'boolean',
    ]);

    $supplier->update([
        'name' => $request->name,
        'email' => $request->email,
        'contact_no' => $request->contact_no,
        'website_url' => $request->website_url,
        'status' => $request->has('status'),
    ]);

    if ($originalData !== $supplier->toArray()) {
        return redirect()->route('suppliers.index')
            ->with('success', 'Supplier updated successfully.');
    }

    return redirect()->route('suppliers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();

        return redirect()->route('suppliers.index')
            ->with('success', 'Supplier deleted successfully.');
    }
    public function getActiveSuppliers()
{
    $activeSuppliers = Supplier::where('status', true)->get();

    return response()->json($activeSuppliers, 200);
}
public function getSupplierProducts(Supplier $supplier)
{
    $suppliersWithProducts = Supplier::with('products')->get();

    $responseData = [];

    foreach ($suppliersWithProducts as $supplier) {
        $supplierData = [
            'supplier_name' => $supplier->name,
            'products' => $supplier->products,
        ];

        $responseData[] = $supplierData;
    }

    return response()->json(['data' => $responseData], 200);
}
}
