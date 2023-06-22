@extends('layouts.app')
@section('content')
<br>

        <div class="container">
          <div class="row">
              @include('category_modal')
              @include('product_modal')
          </div>
        </div>
<br>
    <div class="container text-center">
        <div class="row">
          <div class="col-sm-6">
            <div class="card">
              <div class="card-body">
                <h1><u>Category Count</u></h1>
                <h2><a href="{{ url('Category') }}">{{ $categoryCount }}</a></h2>
              </div>
            </div>
          </div>

          <div class="col-sm-6">
            <div class="card">
              <div class="card-body">
                <h1><u>Product Count</u></h1>
                <h2><a href="{{ url('Product') }}">{{ $productCount }}</a></h2>
            </div>
            </div>
          </div>
        </div><br>

        <div class="col-sm-12">
          <div class="card">
            <div class="card-body" align="center">
              <h5> Welcome, {{ Auth::user()->name }}</h5>
              <p>{{ Auth::user()->email }}</p>
            </div>
          </div>
        </div>
        <br>
    <div>

@endsection




