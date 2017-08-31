<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\InsertRequest;
use App\News;

class AdminController extends Controller
{
    public function getLoginAdmin(){
        if(isset(Auth::user()->name)){
            return redirect('admin/news/list');
        }else{
    	   return view('admin.login');
        }
    }
    public function postLoginAdmin(LoginRequest $request){
		if(Auth::attempt(['name'=>$request->txtUsername,'password'=>$request->txtPassword])){
			return redirect('admin/news/list')->with('message','Wellcom '.$request->txtUsername);
		}
		else
		{
			return redirect('login')->with('message','Login unsuccessful');
		}
    }
    public function getList(){
        $ListNews = News::all();
    	return view('admin.news.list',compact('ListNews'));
    }   
    public function getLogout(){
    	Auth::logout();
    	return redirect('login');
    }
    public function getInsert(){
        return view('admin.news.add');
    }
    public function postInsert(InsertRequest $request){
        $news = new News;
        $news->title = $request->formGroupExampleInput;
        $news->text = $request->comment;
        $news->save();
        return redirect('admin/news/list')->with('message','Insert successful');
    }
    public function getEdit($id){
        $NewsEdit = News::find($id);
        return view('admin.news.edit',compact('NewsEdit'));
    }
    public function postEdit(InsertRequest $request, $id){
        $NewsEdit = News::find($id);
        $NewsEdit->title = $request->formGroupExampleInput;
        $NewsEdit->text = $request->comment;
        $NewsEdit->save();
        return redirect('admin/news/list')->with('message','Edit successful');
    }
    public function getDelete($id){
        $News = News::find($id);
        $News->delete();
        return redirect('admin/news/list')->with('message','Delete successful');
    }
    public function getIndex(){
        $ListNews = News::all();
        return view('welcome',compact('ListNews'));
    }
}
