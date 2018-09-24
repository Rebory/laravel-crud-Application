@extends('products.layout')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" class="form-control" value=" {{ $product->name }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Details:</strong>
               <textarea class="summernote form-control">{{ $product->detail }}</textarea>
            </div>
        </div>


          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Photo :</strong> <br>
                <img src="../{{ $product->photo }}" style="width: 280px;">
            </div>
        </div>

    </div>
@endsection