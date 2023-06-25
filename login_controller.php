<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class login_controller extends Controller
{
    function view_login_page()
    {
        return view('login');
    }

    function login(Request $request)
    {
        $user=$request->enter_id;
        $pass=$request->enter_pass;
        
        try{
            $login=DB::select("CALL login_query(?,?)",[$user,$pass]);
            if($login){
                $request->session()->put('session_key',$login);
                return redirect('/dashboard');
            }
            else{
                return redirect('/home');
            }
        }catch(Exception $e){
            return $e->getMessage();
        }
    }

    function view_dashboard(Request $request)
    {
        if($request->session()->has('session_key'))
        {
            try{
                $select=DB::select("CALL fetch_data");
                return view('dashboard',['data'=>$select]);
            }catch(Exception $e){
                return $e->getMessage();
            }
        }else{
            return redirect('/home');
        }
    }

    function view_form(Request $request)
    {
        if($request->session()->has('session_key'))
        {
            return view('form');
        }else{
            return redirect('/home');
        }
    }

    function form_data(Request $request)
    {
        try{
            $name=$request->enter_name;
            $gen=$request->enter_gender;
            $edu=implode(",",$request->enter_edu);
            $state=$request->enter_state;
            $file=$request->file('upload-photo')->getClientOriginalName();

            $insert=DB::insert("CALL insert_form(?,?,?,?,?)",[$name,$gen,$edu,$state,$file]);
            if($insert)
            {
                $request->file('upload-photo')->move(public_path('/image_file'),$file);
                return redirect("/form");
            }
        }catch(Exception $e){
            return $e->getMessage();
        }

    }

    function delete_func($id)
    {
        try{
            $delete=DB::delete("CALL form_delete(?)",[$id]);
            if($delete)
            {
                return redirect('/dashboard');
            }
        }catch(Exception $e){
            return $e->getMessage();
        }
    }

    function fetch_edit(Request $request,$id)
    {
        if($request->session()->has('session_key'))
        {
            try{
                $edit=DB::select("CALL fetch_edit(?)",[$id]);
                return view("edit",["edit"=>$edit]);
            }catch(Exception $e){
                return $e->getMessage();
            }
        }else{
            return redirect('/home');
        }

    }

    function save_edit(Request $request)
    {
        try{
            $id=$request->data_id;
            $name=$request->enter_name;
            $gen=$request->enter_gender;
            $edu=implode(",",$request->enter_edu);
            $state=$request->enter_state;
            $file=$request->file('upload-photo');
            $file_default_name=$request->default_photo;
            
            if(empty($file))
            {
                $insert=DB::insert("CALL save_edit(?,?,?,?,?,?)",[$id,$name,$gen,$edu,$state,$file_default_name]);
                return redirect("/dashboard");
            }
            else{
                $file_name=$request->file('upload-photo')->getClientOriginalName();
                $insert=DB::insert("CALL save_edit(?,?,?,?,?,?)",[$id,$name,$gen,$edu,$state,$file_name]);
                $request->file('upload-photo')->move(public_path('/image_file'),$file_name);
                return redirect("/dashboard");
            }
        }catch(Exception $e){
            return $e->getMessage();
        }
    }

    function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/home');
    }
}
