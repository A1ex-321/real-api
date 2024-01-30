<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    public function admin_list(){
        $data['getRecord'] = User::getAdmin();
        $data['header_title'] ="Admin List";

        return view('admin.admin.list', $data);

    }
    public function admin_add(){
        $data['header_title'] ="Add Admin ";

        return view('admin.admin.add_admin', $data);

    }
    public function add_admin_edit($id){
        $data['getRecord'] = User::getSingle($id);

        $data['header_title'] ="Edit Admin ";

        return view('admin.admin.add_admin_edit', $data);

    }
    public function admin_add_update($id, Request $request){

        request()->validate(['email'=>'required|email|unique:users,email,'.$id]);
        // dd($request->all() );

        $user = User::getSingle($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->status=$request->status;
        $user->is_admin=1;
        $user->role=$request->role;
        $user->save();

        return redirect('admin/admin/list')->with('success','Admin Successfully Updated');
    }
    public function admin_add_delete($id){


       $user = User::getSingle($id);

       $user->is_delete=1;
       $user->save();
       return redirect()->back()->with('success','Admin Successfully Deleted');


    }
    public function add_admin_insert(Request $request){

        request()->validate(['email'=>'required|email|unique:users']);

        // dd($request->all() );
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        if(!empty($request->password)){
            $user->password=Hash::make($request->password);
        }
       
        $user->status=$request->status;
        $user->is_admin=1;
        $user->role=$request->role;
        $user->save();

        return redirect('admin/admin/list')->with('success','Admin Successfully Created');

    }
}
