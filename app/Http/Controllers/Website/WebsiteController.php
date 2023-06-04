<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Amenity;
use App\Models\Room;
use Validator;
use Response;
use Session;
use Auth;
use DB;

class WebsiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('website.rooms.index');
    }

    public function roomDetail($id)
    {
        $data['single_data']=Room::where('slug', $id)->first();
        $data['other_rooms']=Room::where('slug', '!=', $id)->take(3)->get();
        return view('website.rooms.room-detail',$data);
    }

    public function showGallery()
    {
        return view('website.gallery.index');
    }

    public function showContact()
    {
        return view('website.contact.index');
    }

    public function packageList()
    {
        return view('website.package.index');
    }

    public function packageDetail($id)
    {
        return view('website.package.package-detail');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        ]);
        if ($validator->fails()) {
            Session::flash('flash_message', $validator->errors());
            return redirect()->back()->with('status_color','warning');
        }

        $input = $request->all();
        $input['branch_id'] = session('branch_id');
        $input['status'] = 1;

        DB::beginTransaction();
        try{
            $bug=0;
            $insert= Amenity::create($input);
            DB::commit();
        }catch(\Exception $e){
            $bug=$e->errorInfo[1];
            DB::rollback();
        }

        if($bug==0){
            Session::flash('flash_message','Amenity Successfully Created !');
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
        $data=Amenity::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            Session::flash('flash_message', $validator->errors());
            return redirect()->back()->with('status_color','warning');
        }
              
        $input = $request->all();
        try{
            $bug=0;
            $data->update($input);
        }catch(\Exception $e){
            $bug=$e->errorInfo[1];
        }

        if($bug==0){
            Session::flash('flash_message','Amenity Successfully Updated !');
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
        $data = Amenity::findOrFail($id);
        $action = $data->delete();

        if($action){
            Session::flash('flash_message','Amenity Successfully Deleted !');
            return redirect()->back()->with('status_color','danger');
        }else{
            Session::flash('flash_message','Something Error Found !');
            return redirect()->back()->with('status_color','danger');
        }
    }
}
