@extends('template')
@section('userRole')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left" style="padding-left: 20px;">
                <h1>User Roles</h1>
            </div>
        </div>

    </div>
    <div class="table">
        <table class="table table-hover table-bordered">
            <tr>
                <th>No</th>
                <th>User Name</th>
                <th>Role Name</th>
                <th>Delete</th>

            </tr>
            @foreach($userroles as $role)
                <tr>
                    <td>{{++$i}}</td>
                    <td>{{$role->student_id}}</td>
                    <td>{{$role->role_id}}</td>

                    <td><form action="{{route('userRole.destroy',$role->id)}}"method="POST">
                            @csrf
                            @method('delete')
                            <input type="submit" class="btn btn-danger" value="Delete">
                        </form>
                </tr>

            @endforeach
        </table></div>
    @if(!count($userroles))
        <div class="alert alert-danger">
            <p><i class="fa fa-times" aria-hidden="true"></i>&nbsp;Records Not found  </p>
        </div>
    @endif



@endsection




