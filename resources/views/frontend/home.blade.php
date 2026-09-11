@extends('layouts.app')
@section('content')
	<x-card-slider :categories="$categories" />
    <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5">

    @foreach($products as $product)
        <x-product-card :product="$product" />
    @endforeach

    </div>
@endsection
