<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enroll;

use Validator;

class EnrollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enroll = Enroll::all();
        return view('enroll/index', compact('enroll'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('enroll\create');
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
            'email' => 'required|email|unique:enroll',
            'mobile' => 'required|numeric',
            'basic' => 'required|numeric',
            'hra' => 'required|numeric',
            'special_allowance' => 'required|numeric',
            'pf_deuction' => 'required|numeric',
            'total_earnings' => 'required|numeric'
        ]);

        if ($validator->passes()) {
            Enroll::create($request->all());

            return response()->json(['success'=>'User enrolled successfully!']);
        }

        return response()->json(['error'=>$validator->errors()->all()]);
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
    public function edit(Enroll $enroll)
    {
        return view('enroll/edit', compact('enroll'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Enroll $enroll)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|numeric',
            'basic' => 'required|numeric',
            'hra' => 'required|numeric',
            'special_allowance' => 'required|numeric',
            'pf_deuction' => 'required|numeric',
            'total_earnings' => 'required|numeric'
        ]);

        if($validator->passes()) {
            $enroll->update($request->all());
    
            return response()->json(['success' => 'Product updated successfully']);
        }

        return response()->json(['error'=>$validator->errors()->all()]);        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Enroll::where('id', $id)->delete();

          return redirect()->route('enroll.index');
    }
}
