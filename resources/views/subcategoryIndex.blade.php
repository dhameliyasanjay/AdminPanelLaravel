@extends('template')
@section('subcategory')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left" style="padding-left: 20px;">
                <h1>Sub Categories</h1>
            </div>
        </div>

    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p><i class="fa fa-check" aria-hidden="true"></i>&nbsp;{{$message}}</p>
        </div>
        @endif
    <div class="table">
        <table class="table table-hover table-bordered">
            <tr>
                <th>No</th>
                <th>Category</th>
                <th>Sub category</th>
                <th>Action</th>
            </tr>
            @foreach($subcategories as $subcategory)
                <tr>
                    <td>{{++$i}}</td>
                    <td>{{$subcategory->Category->name}}</td>
                    <td>{{$subcategory->name}}</td>
                    <td><form action="{{route('subcategory.destroy',$subcategory->id)}}"method="POST">
                            {{--<a href="{{route('category.show',$subcategory->id)}}" class="btn btn-info" title="Show More Details..">Show</a>--}}
                            <a href="{{route('subcategory.edit',$subcategory->id)}}" class="btn btn-success" title="Edit Details..">Edit</a>
                            @csrf
                            @method('delete')
                            <input type="submit" class="btn btn-danger" value="Delete">
                        </form>
                </tr>

            @endforeach
        </table></div>
    @if(!count($subcategories))
        <div class="alert alert-danger">
            <p><i class="fa fa-times" aria-hidden="true"></i>&nbsp;Records Not found </p>
        </div>
    @endif



@endsection




