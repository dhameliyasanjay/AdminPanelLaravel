@extends('template')
@section('product')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <a class="btn btn-primary" title="Back" href="{{route('product.index')}}"><i class="fa fa-chevron-left"></i></a>
            </div>
            <div class="pull-left">
                <h1>Product Detail</h1>
            </div>
        </div>
    </div>
    <div class="row" style="width:400px;">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="category">Product:</label>
                {{$product->product}}
            </div>
        </div>
    </div>
    <div class="row" style="width:400px;">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="category">Company:</label>
                {{$product->company}}
            </div>
        </div>
    </div>
    <div class="row" style="width:400px;">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="category">Detail:</label>
                {{$product->detail}}
            </div>
        </div>
    </div>
    <div class="row" style="width:400px;">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="category">Photo:</label>
                <img src="{{asset('storage/images/'.$product->photo)}}" width="50" height="50">
            </div>
        </div>
    </div>

@endsection
