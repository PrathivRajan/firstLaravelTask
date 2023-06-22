@extends('layouts.app')

@section('content')


@include('product_modal')

<div class="container col-md-6" >
<br>

    <div class="row">
        <form class="row" method="GET">
            {{-- @csrf --}}
            <div class="col-sm-3">
                <input class="form-control border-end-0 border rounded-pill" type="search" name="search" value="" placeholder="search" id="example-search-input">
                @if($errors->has('search'))
                                    <div class="error text-danger">{{ $errors->first('search') }}</div>
                                @endif
            </div>
            <div class="col-sm-3">
                <button class="btn btn-secondary border-bottom-0 border rounded-pill">Search</button>
            </div>
        </form>
        <br><br>
        <div class="">
          @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
          @endif

            <div class="card">
                <div class="card-header">
                    <h4>Product Details</h4>

                </div>
                <div class="card-body">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Slno</th>
                          <th>Product Code</th>
                          <th>Product Name</th>
                          <th>Product Description</th>
                          <th>Product Price</th>
                          <th>Product Image</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                           @foreach ($productDetails as $key => $product)
                          <td>{{ $key + 1 }}.</td>
                          <td>{{ $product['productCode']  }}</td>
                          <td>{{ $product['productName'] }}</td>
                          <td>{{ $product['productDescription'] }}</td>
                          <td>{{ $product['productPrice'] }}</td>
                          <? $imageName = $product['productImage']; ?>
                          <td> <img width='70px' src ="{{url('/uploads/'."$imageName")}}"></td>
                        </tr>
                          @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>





@endsection




