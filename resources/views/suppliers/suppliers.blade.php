@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Active Suppliers</h1>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Contact No</th>
            </tr>
        </thead>
        <tbody>
            @foreach($activeSuppliers as $supplier)
            <tr>
                <td>{{ $supplier->id }}</td>
                <td>{{ $supplier->name }}</td>
                <td>{{ $supplier->email }}</td>
                <td>{{ $supplier->contact_no }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
