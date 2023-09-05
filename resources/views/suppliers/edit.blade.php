@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Supplier</h1>
    <form action="{{ route('suppliers.update', $supplier->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $supplier->name }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $supplier->email }}" required>
        </div>
        <div class="form-group">
            <label for="contact_no">Contact No</label>
            <input type="text" class="form-control" id="contact_no" name="contact_no" value="{{ $supplier->contact_no }}" required>
        </div>
        <div class="form-group">
            <label for="website_url">Website URL</label>
            <input type="text" class="form-control" id="website_url" name="website_url" value="{{ $supplier->website_url }}">
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="status" name="status" value="1" {{ $supplier->status ? 'checked' : '' }}>
            <label class="form-check-label" for="status">Status (Enable)</label>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
