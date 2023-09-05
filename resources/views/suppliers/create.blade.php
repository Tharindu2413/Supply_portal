@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Supplier</h1>
    <form action="{{ route('suppliers.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="contact_no">Contact No</label>
            <input type="text" class="form-control" id="contact_no" name="contact_no" required>
        </div>
        <div class="form-group">
            <label for="website_url">Website URL</label>
            <input type="text" class="form-control" id="website_url" name="website_url">
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="status" name="status" value="1" checked>
            <label class="form-check-label" for="status">Status (Enable)</label>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
