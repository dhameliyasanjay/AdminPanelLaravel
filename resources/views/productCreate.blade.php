@extends('template')
@section('product')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <a class="btn btn-primary" href="{{route('product.index')}}" title="Back"><i class="fa fa-chevron-left"></i></a>
            </div>
            <div class="pull-left">
                <h1>Products</h1>
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
    <form action="{{route('product.store')}}" method="POST" id="form" enctype="multipart/form-data" style="width: 400px">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Select category:</strong>
                    <select class="category" name="category">
                        <option>--Select Category--</option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Select category:</strong>
                    <select id="subcategory" name="subcategory">
                        <option value="">--Select Category--</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Product:</strong>
                    <input type="text" name="product" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Company:</strong>
                    <input type="text" name="company" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Detail:</strong>
                    <textarea name="detail" class="form-control"></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Photo:</strong>
                    <input type="file" name="photo">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <input type="submit" name="save" value="Add Product" class="btn btn-primary">
                </div>
            </div>
        </div>
    </form>
    <script type="text/javascript">
        $(document).ready(function() {
            $("select.category").change(function(){
                // $('#subcategory').val('');
                var selectedCategory = $(this).children("option:selected").val();
                var _token = $("input[name='_token']").val();
                    $.ajax({
                        url: "{{route('ajax.selected.value')}}",
                        type: "POST",
                        data: {_token:_token,selectcategory:selectedCategory},
                        success:function(data){

                            var options = $("#subcategory");
                            $.each(data, function () {
                                options.append($("<option />").val(this.id).text(this.name));
                            });                      }
                    });
            });
        });
    </script>
@endsection