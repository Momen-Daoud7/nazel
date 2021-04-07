<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Branch;

class BranchController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('branches.index')->with('branches',Branch::get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('branches.create');
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
        Branch::create($data);

        return redirect("branches")->with('success',trans('trans.added_successfully'));
        
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
         return view('branches.edit')->with('branch',Branch::where('id',$id)->first());

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
        Branch::where('id',$id)->first()->update($data);

        return redirect("branches")->with('success',trans('trans.updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Branch::find($id)->delete();
        return back()->with('success',trans('trans.deleted_successfully'));
    }
}
