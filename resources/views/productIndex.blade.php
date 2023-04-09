@extends('template')
@section('product')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left" style="padding-left: 20px;">
                <h1>Products</h1>
            </div>
        </div>

    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p><i class="fa fa-check" aria-hidden="true"></i>&nbsp;{{$message}}</p>
        </div>
    @endif
    <div class="table">
        <table class="table table-hover table-bordered" style="width: 900px;">
            <tr>
                <th>No</th>
                <th>Category</th>
                <th>Sub Category</th>
                <th>Product</th>
                <th>Company</th>
                <th>Detail</th>
                <th>Photo</th>
                <th width="250">Action</th>
            </tr>
            @foreach($products as $product)
                <tr>
                    <td>{{++$i}}</td>
                    <td>{{$product->Category->name}}</td>
                    <td>{{$product->Subcategory->name}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->company}}</td>
                    <td>{{$product->detail}}</td>
                    <td><img src="{{asset('storage/images/'.$product->photo)}}" width="100" height="100"></td>
                    <td><form action="{{route('product.destroy',$product->id)}}"method="POST">
                            {{--<a href="{{route('product.show',$product->id)}}" class="btn btn-info" title="Show More Details..">Show</a>--}}


                            <a href="{{route('product.edit',$product->id)}}" class="btn btn-success" title="Edit Details..">Edit</a>
                            @csrf
                            @method('delete')
                            <input type="submit" class="btn btn-danger" value="Delete">
                        </form>
                </tr>

            @endforeach
        </table>
        @if(!count($products))
            <div class="alert alert-danger" style="width: 900px;">
                <p><i class="fa fa-times" aria-hidden="true"></i>&nbsp;Records Not found  </p>
            </div>
        @endif
    </div>




@endsection




