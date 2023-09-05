@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Product</h1>
      
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="mb-3">
                <div class="form-group">
                    <strong>Supplier</strong>
                    <select type="text" name="supplier_id" class="form-control">
                        <option value="{{ $productsWithSuppliers->id }}" selected>{{ $productsWithSuppliers->name }}</option>
                      
                            @foreach ($suppliers as $supplier)
                            {{-- @if ($productsWithSuppliers->name != $supplier->name ) --}}
                            <option value="{{ $supplier->id}}">{{ $supplier->name}}</option>
                            {{-- @endif --}}
                            @endforeach
                    </select>
                </div>
            </div>
            <div class="mb-3">
                <label for="product_name" class="form-label">Product Name</label>
                <input type="text" name="product_name" id="product_name" class="form-control" value="{{ $product->product_name }}" required>
            </div>

            <div class="mb-3">
                <label for="product_code" class="form-label">Product Code</label>
                <input type="text" name="product_code" id="product_code" class="form-control" value="{{ $product->product_code }}" required>
            </div>

            <div class="mb-3">
                <label for="logo_image" class="form-label">Logo Image (Minimum 100x100 pixels)</label>
                <input type="file" name="logo_image" id="logo_image" class="form-control-file">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control" rows="3">{{ $product->description }}</textarea>
            </div>

            <div class="mb-3">
                <label for="unit_price" class="form-label">Unit Price (Up to 2 decimal places)</label>
                <input type="number" step="0.01" name="unit_price" id="unit_price" class="form-control" value="{{ $product->unit_price }}" required>
            </div>

            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="number" name="quantity" id="quantity" class="form-control" value="{{ $product->quantity }}" required>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="status" name="status" value="1" {{ $product->status ? 'checked' : '' }}>
                <label class="form-check-label" for="status">Status (Enable)</label>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to List</a>
    </div>
@endsection
