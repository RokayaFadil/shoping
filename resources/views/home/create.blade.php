@extends('layouts.app')

@section('title') Create @endsection
@section('dropdown')
<li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
      Product
  </a>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="{{route('shop.createcategorie')}}">Categorie</a></li>
    
  </ul>
</li>
@endsection

@section('auth')

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest

                       
                    </ul>
                    @endsection

@section('body')


<form class="d-grid gap-2 col-8 mx-auto mt-5", method="POST", action="{{route('shop.store')}}", enctype="multipart/form-data">
    @csrf
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
      <div class="mb-3">
        <label for="disabledTextInput" class="form-label">Name the product</label>
        <input name="name_the_product" type="text" id="disabledTextInput" class="form-control" value="">
      </div>
      <div class="mb-3">
        <label for="disabledTextInput" class="form-label">Price</label>
        <input name="price" type="text" id="disabledTextInput" class="form-control" value="">
      </div>
      <div class="mb-3">
        <label  for="exampleFormControlTextarea1" class="form-label">Description</label>
        <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
      </div>
      <div class="mb-3">
        <label for="formFile" class="form-label">Image</label>
        <input name="image_the_product" class="form-control" type="file" id="formFile">
      </div>

      <div class="mb-3">
        <label  class="form-label">Categories</label>
        <select name="categories" class="form-control">
          @foreach ($categories as $categorie)
          <option value="{{$categorie->id}}">{{$categorie->namecategorie}}</option>
          @endforeach
         
        </select>
      </div>
      
      <div >
        <button type="submit" class="btn btn-success">Save</button>
      </div>
     
  </form>
   
@endsection

