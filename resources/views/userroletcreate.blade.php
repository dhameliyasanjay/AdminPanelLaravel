@extends('template')
@section('userRole')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1>Add User Role</h1>
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
    <form action="{{route('userRole.store')}}" method="POST" enctype="multipart/form-data" style="width: 400px">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>User Name:</strong>
                    <select name="student">
                        <option value="">--Please Select User--</option>
                        @foreach($students as $student)
                            <option value="{{$student->id}}">{{$student->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Role Name:</strong>
                    <select name="role">
                        <option value="">--Please Select Role--</option>
                        @foreach($roles as $role)
                            <option value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <input type="submit" name="save" class="btn btn-primary" value="Add User Role">
                </div>
            </div>
        </div>
    </form>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p><i class="fa fa-check" aria-hidden="true"></i>&nbsp;{{$message}}</p>
        </div>
    @endif
@endsection