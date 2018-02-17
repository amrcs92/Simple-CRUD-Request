<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Request as URequest;
use App\RequestType;
use App\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->role->name == 'Admin'){
            $requests = URequest::orderBy('id','desc')->get();
            return view('user.admin.index', compact('requests'));
        } elseif(auth()->user()->role->name == 'Employee'){
            $requests = auth()->user()->requests()->orderBy('id', 'desc')->get();
            return view('user.index', compact('requests'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->role->name == 'Admin'){
            $error = '<h1>Page not found 404</h1>';
            return $error;
        } elseif(auth()->user()->role->name == 'Employee'){
            $types = RequestType::all();
            return view('user.create', compact('types'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        URequest::create([
            'user_id' => auth()->user()->id,
            'status' => 'pending',
            'request_type_id' => $request->input('request_type')
        ]);
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(auth()->user()->role->name == 'Admin'){
            $request = URequest::findOrFail($id);
            return view('user.show', compact('request'));
        } elseif(auth()->user()->role->name == 'Employee'){
            $request = auth()->user()->requests()->findOrFail($id);
            return view('user.show', compact('request'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $request = URequest::findOrFail($id);
        $types = RequestType::all();
        return view('user.edit', compact('request','types','selected_type'));
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
        if(auth()->user()->role->name == 'Admin'){
            if($request->get('request_type')){
                URequest::findOrFail($id)->update(['request_type_id'=>$request->input('request_type')]);
            }
            if($request->get('status')){
                URequest::findOrFail($id)->update(['status'=>$request->input('status')]);
            }
            return redirect()->route('user.index');

        } elseif(auth()->user()->role->name == 'Employee'){
            URequest::findOrFail($id)->update(['request_type_id'=>$request->input('request_type')]);
            return redirect()->route('user.index');
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
        URequest::findOrFail($id)->delete();
        return redirect()->route('user.index');
    }
}
