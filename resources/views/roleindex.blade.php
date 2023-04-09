@extends('template')
@section('students')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left" style="padding-left: 20px;">
                <h1>Roles</h1>
            </div>
        </div>

    </div>
    <div class="table">
        <table class="table table-hover table-bordered">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Delete</th>

            </tr>
            @foreach($roles as $role)
                <tr>
                    <td>{{++$i}}</td>
                    <td>{{$role->name}}</td>

                    <td><form action="{{route('role.destroy',$role->id)}}"method="POST">
                            <a href="{{route('role.edit',$role->id)}}" class="btn btn-success">Edit</a>
                            @csrf
                            @method('delete')
                            <input type="submit" class="btn btn-danger" value="Delete">
                        </form>
                </tr>

            @endforeach
        </table></div>
    @if(!count($roles))
        <div class="alert alert-danger">
            <p><i class="fa fa-times" aria-hidden="true"></i>&nbsp;Records Not found  </p>
        </div>
    @endif



@endsection




