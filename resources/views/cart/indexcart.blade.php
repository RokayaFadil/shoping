@extends('layouts.app')

@section('title') Cart @endsection
@section('body')

      @if($cartItems->isEmpty())
      <div class="d-grid gap-2 col-2 mx-auto mt-5">
        <h3>Your cart is empty.</h3>
      </div>
           @else
           <div class="d-grid gap-2 col-10 mx-auto">
           <table class="table mt-4", >
            <thead>
             
              <tr>
                <th scope="col">Product</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
              
              @foreach($cartItems as $item)
                <tr>
                    <th >{{ $item->product? $item->product->nameproduct : 'Not found'}}</th>
                    <td>{{ $item->product? $item->product->price : 'Not found'}}$</td>
                    <td>{{ $item->quantity}}</td>
                    <td>{{$item->product? $item->quantity * $item->product->price : 'Not found'}}$</td>
                    <td>
                        
                        <form style="display: inline", method="POST", action="{{route('cart.destroy', $item->id)}}">
                          @csrf
                          @method('DELETE')
                          <button  type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        
                    </td>
                  </tr>
                
              
                  @endforeach
            </tbody>
           </table>
           </div>

          @endif
    @endsection