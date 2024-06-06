@extends('layouts.app')
@section('title') Show @endsection

@section('dropdown') 
<li class="nav-item">
  <a class="nav-link active" aria-current="page" href="{{route('cart.index')}}">Cart</a>
</li>
@endsection
{{-- @section('search')
<form class="d-flex" role="search" action="{{ route('search.perform') }}" method="POST">
  <input class="form-control me-1" type="search" placeholder="Search" aria-label="Search">
  <button class="btn btn-outline-success" type="submit">Search</button>
</form>
@endsection --}}

@section('body')
<div class="row">
@foreach ($categorie->products as $product )

  <div class="col-sm-3 d-grid  mx-auto mt-5">
<div class="card" style="width: 18rem;">  
    <img src="{{$product->imageproduct}}" class="card-img-top" alt="dd">
    <div class="card-body">
      <h5 class="card-title">{{$product->nameproduct}}</h5>
      <p class="card-text">{{$product->price}}$</p>
      <p class="card-text">{{$product->description}}</p>
      <form action="{{ route('cart.add', $product->id) }}" method="POST">
        @csrf
        <input type="number" name="quantity" value="1" min="1">
      <p></p>
        <button class="btn btn-primary" type="submit">Add to Cart</button>
    </form>
    </div>
  </div>
  </div>
   
  @endforeach
</div>
  @endsection