@extends('layout.master')

@section('content')

<div class="container mt-2">
 
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Product List</h2>
            </div>
            <!-- <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('products.create') }}"> Create Products</a>
            </div> -->
        </div>
    </div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif


    <div class="row" style="margin-bottom: 5rem;">
        @foreach ($products as $product)
        <div class="col-3" style="padding-bottom: 15px;">
            <div style="text-align:center;border: 1px solid black;padding: 10px;">
                <p>{{ $product->name }}</p>
                <p>$ {{ $product->price }}</p>

                <form action="{{ route('products.destroy', $product->id) }}" method="Post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-primary">Add to cart</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>



    {!! $products->links('pagination::bootstrap-4') !!}

    @endsection