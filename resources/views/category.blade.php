@extends('layout')

@section('title', 'Home')

@section('content')
    <div class="container mt-4">
        <div class="row">
            
            <div class="col-lg-4 mt-3">
                <div class="card">
                    <div class="card-header">{{ $category->name }}</div>
                    <div class="card-body">
                        @if( count( $category->products ) > 0)
                        <ul>
                            @foreach ($category->products as $item)
                                <li>{{ $item->name }}</li>
                            @endforeach
                        </ul>
                        @else
                            <h5>No Product</h5>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection