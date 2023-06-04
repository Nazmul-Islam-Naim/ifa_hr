<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserType;
use Validator;
use Response;
use Session;
use Auth;
use Hash;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['alldata']= User::where([['user_type', '!=', '1'],['user_type', '!=', '5']])->get();
        $data['alltype']= UserType::where([['id', '!=', '1'],['id', '!=', '5']])->get();
        return view('user.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['alltype']= UserType::where([['id', '!=', '1'],['id', '!=', '5']])->get();
        return view('user.add-user', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users|max:191',
            'password' => 'required|confirmed|min:6',
        ]);
        if ($validator->fails()) {
            Session::flash('flash_message', $validator->errors());
            return redirect()->back()->with('status_color','warning');
        }
        $input = $request->all();
        $input['password'] = Hash::make($request->password);
        $input['password_hint'] = $request->password;
        DB::beginTransaction();
        try{
            $bug=0;
            $insert = User::create($input);
            DB::commit();
        }catch(\Exception $e){
            $bug=$e->errorInfo[1];
            DB::rollback();
        }

        if($bug==0){
            Session::flash('flash_message','Data Successfully Added !');
            return redirect()->back()->with('status_color','success');
        }else{
            Session::flash('flash_message','Something Error Found !');
            return redirect()->back()->with('status_color','danger');
        }
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
        $data['alltype']= UserType::where([['id', '!=', '1'],['id', '!=', '5']])->get();
        $data['single_data']=User::findOrFail($id);
        return view('user.add-user', $data);
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
        $data=User::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$data->id
        ]);
        if ($validator->fails()) {
            Session::flash('flash_message', $validator->errors());
            return redirect()->back()->with('status_color','warning');
        }
        
        $input = $request->all();

        if ($request->password !="") {
            $input['password'] = Hash::make($request->password);
            $input['password_hint'] = $request->password;
        }else{
            $input['password'] = $data->password;
        }

        try{
            $bug=0;
            $data->update($input);
        }catch(\Exception $e){
            $bug=$e->errorInfo[1];
        }

        if($bug==0){
            Session::flash('flash_message','Data Successfully Updated !');
            return redirect()->back()->with('status_color','warning');
        }else{
            Session::flash('flash_message','Something Error Found !');
            return redirect()->back()->with('status_color','danger');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
