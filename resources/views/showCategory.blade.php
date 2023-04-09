@extends('template')
@section('category')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <a class="btn btn-primary" title="Back" href="{{route('category.index')}}"><i class="fa fa-chevron-left"></i></a>
            </div>
            <div class="pull-left">
                <h1>Category Detail</h1>
            </div>
        </div>
    </div>
    <div class="row" style="width:400px;">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="category">Category:</label>
                {{$category->category_name}}
            </div>
        </div>
    </div>
    <div class="row" style="width:400px;">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="category">Slug:</label>
                {{$category->slug}}
            </div>
        </div>
    </div>

    @endsection