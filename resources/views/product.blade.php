@extends('layout')

@section('title', 'Product Details')

@section('content')
    <div class="container mt-4">
        <div class="row">
            
            <div class="col-lg-6 mt-3">
                <div class="card">
                    <div class="card-header">{{ $product->category->name }}</div>
                    <div class="card-body">
                       <h5>Product Name: {{ $product->name }}</h5>
                       <p>Product Price: {{ $product->price }} tk</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection