@extends('template')
@section('students')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left" style="padding-left: 20px;">
                <h1>Students</h1>
            </div>
        </div>

    </div>
    <div class="table">
        <table class="table table-hover table-bordered">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Role</th>
                <th>Delete</th>

            </tr>
            @foreach($students as $student)
                <tr>
                    <td>{{++$i}}</td>
                    <td>{{$student->name}}</td>
                    <td>{{$student->name}}</td>

                    <td><form action="{{route('student.destroy',$student->id)}}"method="POST">
                            @csrf
                            @method('delete')
                            <input type="submit" class="btn btn-danger" value="Delete">
                        </form>
                </tr>

            @endforeach
        </table></div>
    {{--@if(!count($students))--}}
        {{--<div class="alert alert-danger">--}}
            {{--<p><i class="fa fa-times" aria-hidden="true"></i>&nbsp;Records Not found  </p>--}}
        {{--</div>--}}
    {{--@endif--}}



@endsection




