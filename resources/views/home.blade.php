@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <a href="{{ route('suppliers.index') }}" class="btn btn-primary">Suppliers</a>
                    <a href="{{ route('products.index') }}" class="btn btn-primary">Products</a>
                    <a href="{{ route('activesuppliers') }}" class="btn btn-primary">Active Suppliers API</a>
                    <a href="{{ route('supplierproducts') }}" class="btn btn-primary">Supplier's Products API</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
