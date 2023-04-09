@extends('template')
@section('subcategory')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1>Edit Sub Category</h1>
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
    <form action="{{route('subcategory.update',$subcategory->id)}}" method="POST" enctype="multipart/form-data" style="width: 400px">
        @csrf
        @method('put')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Select Category:</strong>
                    <select id="category" name="category">
                        <option>--Select Category--</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}" {{($subcategory->category_id==$category->id)?'selected':''}}>{{$category->name}}</option>
                            @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Sub Category Name:</strong>
                    <input type="text" name="name" value="{{$subcategory->name}}" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <input type="submit" name="save" class="btn btn-primary" value="Edit Subcategory">
                </div>
            </div>
        </div>
    </form>
@endsection