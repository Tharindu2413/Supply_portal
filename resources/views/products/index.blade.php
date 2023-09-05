@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Products</h1>
        <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Create Product</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <td>Supplier</td>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Logo</th>
                    <th>Descritption</th>
                    <th>Unit Price</th>
                    <th>Quantity</th>
                    <th>status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->product_name }}</td>
                        <td>{{ $product->product_code }}</td>
                        <td>
                            @if ($product->logo_image)
                                <img src="{{ asset('storage/' . $product->logo_image) }}" alt="{{ $product->product_name }}" width="100">
                            @else
                                No Image
                            @endif
                        </td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->unit_price }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->status ? 'Enabled' : 'Disabled' }}</td>
                        <td>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
