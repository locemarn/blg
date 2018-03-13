<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\admin\admin;
use App\Model\admin\role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = admin::all();

        return view('admin.user.show', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = role::all();

        return view('admin.user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required|string|max:255',
            'email'=>'required|string|email|max:255|unique:users',
            'phone'=>'required|numeric',
            'password'=>'required|string|min:6|confirmed',
        ]);

        $request['password'] = bcrypt($request->password);

        $user = admin::create($request->all());
        $user->role()->sync($request->role);

        return redirect(route('user.index'))->with('message', 'User Saved Successfully');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = admin::find($id);
        $roles = role::all();
        return view('admin.user.edit', compact('user', 'roles'));
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
        $this->validate($request, [
            'name'=>'required|string|max:255',
            'email'=>'required|string|email|max:255|unique:users',
            'phone'=>'required|numeric',
        ]);

        $user = admin::where('id', $id)->update($request->except('_token', '_method'));
        return redirect(route('user.index'))->with('message', 'User Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        admin::where('id', $id)->delete();

        return redirect()->back()->with('message', 'User Deleted Successfully');
    }
}
