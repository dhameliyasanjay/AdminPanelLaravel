@extends('template')
@section('category')
    {{--<div class="" style="width: 400px;height:400px;border:2px solid red;"></div>--}}
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <a class="btn btn-primary" href="{{route('category.index')}}" title="Back"><i class="fa fa-chevron-left"></i></a>
            </div>
            <div class="pull-left">
                <h1>Category</h1>
            </div>
        </div>

    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data" style="width: 400px">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Category Name:</strong>
                    <input type="text" name="name" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <input type="submit" name="save" class="btn btn-primary" value="Add Category">
                </div>
            </div>
        </div>
    </form>
@endsection