<?php

namespace App\Http\Controllers\Useradmin;

use Validator;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Group;
use App\User;
use Input;



class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['groups']= Group::all();
        return view('useradmin/group')->with($data);
    }

    public function ajax()
    {
        //
        $data['groups']= Group::all();
        $data['groups']->load('manager');
        return ($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['msg']="test";
        return view('useradmin/groupedit')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function axsave(Request $request)
    {
        //


        $response = array(
            'status' => 'success',
            'msg' => 'OK!',
        );
        

        $rules = array(
            'fname'       => 'required',
            'fremark'     => 'required',
            'femail'      => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
        	$response['status']="warning";
        	$response['msg']=$validator->messages()->toJson();
            return response()->json($response);
        } else {

        try {
            $gid = Input::get('fid');
            if ( $gid  != 'Neu') {
                $group= Group::find($gid);
            } else {
                $group = new Group;
            };
            $group->name       = Input::get('fname');
            $group->remark     = Input::get('fremark');
            $group->email      = Input::get('femail');
            //$user = \App\User::find(1) ;
            $group->manager()->associate(Input::get('fmanager')  );
            $group->save();
        } catch ( \Illuminate\Database\QueryException $e) {
            $response['status']="danger";
            $response['msg']="Database error: " . $e->getMessage();
            return response()->json($response);
        }
            //return Response::json( $response );

            return response()->json($response);
      } //validatorf

    }

 /**
     * Ajax return Manager User Ids
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
    public function axmanager()
    {
        //
        
        $users= User::all();
        foreach ($users as $user) {
			$datar[] = array('id' => $user->id, 'text' => $user->name);	
		}
        
        
         
        return (json_encode($datar));
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
        //
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
