<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Orgnaizition;

class OrgnaizitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('orgnaizition.index')->with('orgnaizitions',Orgnaizition::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('orgnaizition.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation
        $data = $request->validate([
            'name' => 'required|string|min:3'
        ]);

        //create
        Orgnaizition::create($data);

        return redirect("orgnaizition")->with('success',trans('trans.added_successfully'));
        
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
         return view('orgnaizition.edit')->with('orgnaizition',Orgnaizition::where('id',$id)->first());

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
        //validation
        $data = $request->validate([
            'name' => 'required|string|min:3'
        ]);

        //create
        Orgnaizition::where('id',$id)->first()->update($data);

        return redirect("orgnaizition")->with('success',trans('trans.updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Orgnaizition::find($id)->delete();
        return back()->with('success',trans('trans.deleted_successfully'));
    }
}
