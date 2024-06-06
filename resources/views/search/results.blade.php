@extends('layouts.app')
@section('search')<h2>Search Results</h2> @endsection
@section('body')
        @if($products->isEmpty())
        <div class="d-grid gap-2 col-4 mx-auto mt-5">
            <h5>No products found matching your search criteria.</h5>
        @else
        <div class="row">
            @foreach ($products as $product )
            
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
        @endif
    
@endsection
