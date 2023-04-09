@extends('template')
@section('category')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1>Edit Category</h1>
            </div>
            <div class="pull-center">
                <a class="btn btn-primary" href="{{route('category.index')}}" title="Back"><i class="fa fa-chevron-left"></i></a>
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
    <form action="{{route('category.update',$category->id)}}" method="POST" enctype="multipart/form-data" style="width: 400px">
        @csrf
        @method('put')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Category Name:</strong>
                    <input type="text" name="category_name" class="form-control" value="{{$category->name}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <input type="submit" name="save" class="btn btn-primary" value="Edit Category">
                </div>
            </div>
        </div>
    </form>

@endsection