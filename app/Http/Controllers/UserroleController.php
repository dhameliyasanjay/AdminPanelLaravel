<?php

namespace App\Http\Controllers;

use App\Models\Role;

use App\Models\Role_studen;
use App\Models\Role_student;
use App\Models\RoleStudent;
use App\Models\Student;
use App\Models\User;
use App\Models\User_role;
use App\Models\Userrole;
use Illuminate\Http\Request;

class UserroleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userroles = RoleStudent::get();
        return view ('userroleindex',compact('userroles'))
            ->with('i',(request()->input('pages','1')-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Student::get();
        $roles = Role::get();
        return view('userroletcreate',compact('students'),compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        RoleStudent::create([
           'student_id' => $request->student,
           'role_id' => $request->role,
        ]);
        return redirect(route('userRole.index'))
            ->with('success','Role Given Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return void
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User_role $userrole
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(RoleStudent $userrole)
    {
        $userrole->delete();
        return redirect(route('userRole.index'))
            ->with('success','Role Deleted Successfully');
    }
}
