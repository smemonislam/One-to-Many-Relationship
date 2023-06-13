@extends('layout')

@section('title', 'Home')

@section('content')
    <div class="container mt-4">
        <div class="row">
            @forelse ($categories as $item)
                <div class="col-lg-4 mt-3">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('fontend.categories', $item->slug) }}">{{ $item->name }}</a>
                        </div>
                        <div class="card-body">
                            @if( count( $item->products ) > 0)
                            <ul>
                                @foreach ($item->products as $item)
                                    <li><a href="{{ route('fontend.products', $item->slug) }}">{{ $item->name }} - {{ $item->price }} tk</a></li>
                                @endforeach
                            </ul>
                            @else
                                <h5>No Product</h5>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center w-100">Not Found!</p>
            @endforelse
        </div>
    </div>
@endsection