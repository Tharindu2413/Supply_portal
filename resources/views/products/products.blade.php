@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Active Products</h1>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Code</th>
                <th>Description</th>
                <th>Unit Price</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            @foreach($activeProducts as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->product_name }}</td>
                <td>{{ $product->product_code }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->unit_price }}</td>
                <td>
                    @if($product->logo_image)
                        <img src="{{ asset('storage/' . $product->logo_image) }}" alt="Product Image" width="100">
                    @else
                        No Image
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
