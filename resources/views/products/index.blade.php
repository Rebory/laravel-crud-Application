@extends('products.layout')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 5.6 CRUD Example from scratch</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered table-hover">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Details</th>
            <th>photo</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $product->name }}</td>
            <td>hidden</td>
            <!-- <td>{{ $product->detail }}</td> -->
            <td> <img src="{{ $product->photo }}" style="width:40px;" ></td>
            <td>
                <form action="{{ route('products.destroy',$product->id) }}" method="POST">


                    <a class="btn btn-info btn-sm" href="{{ route('products.show',$product->id) }}">Show</a>

 
                    <a class="btn btn-primary btn-sm" href="{{ route('products.edit',$product->id) }}">Edit</a>


                    @csrf
                    @method('DELETE')

   
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>


    {!! $products->links() !!}


@endsection