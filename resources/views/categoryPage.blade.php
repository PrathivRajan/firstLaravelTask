@extends('layouts.app')

@section('content')



@include('category_modal')

  <div class="container col-md-4">
    <div class="row">
        <div class="">
          @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
          @endif
            <div class="card">
                <div class="card-header">
                    <h4>
                        Category Details
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Slno</th>
                          <th>Category Name</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($categoryDetails as $category)
                        <tr>

                          <td>{{ $loop->iteration }}.</td>
                          <td><a href="{{ url('Product', ['category' => $category ])}}">{{ $category->categoryName }}</a></td>
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
