@extends('template')
@section('product')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1>Edit Product</h1>
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
    <form action="{{route('product.update',$product->id)}}" method="POST" enctype="multipart/form-data" style="width: 400px">
        @csrf
        @method('put')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Select category:</strong>
                    <select class="category" name="category">
                        <option>--Select Category--</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}" {{($product->category_id==$category->id)?'selected':''}}>{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Select Subcategory:</strong>
                    <select id="subcategory" name="subcategory">
                        <option' value="">--Please Select Subcategory--</option>
                        @foreach($subcategories as $subcategory)
                        <option value="{{$subcategory->id}}" {{($product->subcategory_id == $subcategory->id)?'selected':''}}>{{$subcategory->name}}</option>
                            @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Product:</strong>
                    <input type="text" value="{{$product->name}}" name="product" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Company:</strong>
                    <input type="text" name="company" value="{{$product->company}}" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Detail:</strong>
                    <textarea name="detail" class="form-control">{{$product->detail}}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Photo:</strong>
                    <img src="{{asset('storage/images/'.$product->photo)}}" width="50" height="50">
                    <input type="file" name="photo">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <input type="submit" name="save" value="Edit Product" class="btn btn-primary">
                </div>
            </div>
        </div>
    </form>
    <script type="text/javascript">
        {{--$(document).ready(function() {--}}
            {{--var selectedCategory = $('select.category').children("option:selected").val();--}}
                {{--// console.log(selectedCategory);--}}
            {{--var _token = $("input[name='_token']").val();--}}
            {{--$.ajax({--}}
                {{--url: "{{route('ajax.selected.value')}}",--}}
                {{--type: "POST",--}}
                {{--data: {_token:_token,selectcategory:selectedCategory},--}}
                {{--success:function(data) {--}}
                    {{--var options = $("#subcategory");--}}
                    {{--$.each(data, function () {--}}
                        {{--var selectedid = $('#selectedid').val();--}}
                        {{--// console.log(selectedid);--}}
                        {{--options.append($("<option />").val(this.id).text(this.name));--}}

                    {{--});--}}
                {{--}--}}
            {{--});--}}

            $("select.category").change(function(){
                $('#subcategory').val('');
                var selectedCategory = $('select.category').children("option:selected").val();
            // console.log(selectedCategory);
                var _token = $("input[name='_token']").val();
                $.ajax({
                    url: "{{route('ajax.selected.value')}}",
                    type: "POST",
                    data: {_token:_token,selectcategory:selectedCategory},
                    success:function(data){
                        var options = $("#subcategory");
                        $.each(data, function () {
                            console.log(data);
                            options.append($("<option />").val(this.id).text(this.name));
                        });
                    }
                });
            });
        });
    </script>
@endsection