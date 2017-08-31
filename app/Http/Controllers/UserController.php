<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserEditRequest;
use App\User;
use Hash;
use Validator;

class UserController extends Controller
{
	public function getList (){
		$ListUser = User::all();
		return view('admin.user.list',compact('ListUser'));
	}
	public function getInsert (){
		return view('admin.user.add');
	}
	public function postInsert (UserRequest $request){
		$user = new User;
		$user->name = $request->txtUser;
		$user->password = Hash::make($request->txtPass);
		$user->email = $request->txtEmail;
		$user->remember_token = $request->_token;
		$user->save();
		return redirect()->route('admin.user.getList')->with('message','Insert successful');
	}
	public function getDelete ($id){
		$user_current_login = Auth::user()->id;
		$user = User::find($id);
		if ($id == $user_current_login) {
			return redirect()->route('admin.user.getList')->with('message','no permissions');
		}else{
			$user->delete();
			return redirect()->route('admin.user.getList')->with('message','Delete successful');
		}
	}
	public function getEdit ($id){
		$user = User::find($id);
		return view('admin.user.edit',compact('user'));
	}
	public function postEdit ($id, UserEditRequest $request){
		$user = User::find($id);
		$user->name = $request->txtUser;
		$user->email = $request->txtEmail;
		$pass = $request->txtPass;
		$user->password = Hash::make($pass);
		$user->remember_token = $request->input('_token');
		$user->save();
		return redirect()->route('admin.user.getList')->with(['message'=>'edit successful']);
	}
}
