<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Orgnaizition;
use App\Models\Branch;
use Hash;
class UserController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.index')->with('users',User::get());
    }

   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $orgnaizitions = Orgnaizition::get();
        $branches = Branch::get();
        return view('users.create',compact('orgnaizitions','branches'));

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
            'name' => 'required|string|min:3',
            'phone' => 'required|numeric|unique:users',
            'orgnaizition' => 'required|string',
            'branch' => 'required|string',
            'status' => 'required|in:active,not-active',
            'password' => 'required|string|min:8|confirmed',
        ]);

        //create
        $data['password'] = Hash::make($data['password']);
        User::create($data);

        return redirect("users")->with('success',trans('trans.added_successfully'));
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($status)
    {
        switch ($status) {
            case 'active':
                return view('users.active_users')->with('users',User::where('status','active')->get());
                break;
            case 'not_active':
                return view('users.not_active')->with('users',User::where('status','not-active')->get());
                break;

            default:
                # code...
                break;
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
        $orgnaizitions = Orgnaizition::get();
        $branches = Branch::get();
        $user = User::where('id',$id)->first();
         return view('users.edit',compact('orgnaizitions','branches','user'));
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
            'name' => 'required|string|min:3',
            'phone' => 'required|numeric|unique:users,phone,'.$id,
            'orgnaizition' => 'required|string',
            'branch' => 'required|string',
            'status' => 'required',
            'password' => 'required|string|min:8',
        ]);

        //create
        User::where('id',$id)->first()->update($data);

        return redirect("users")->with('success',trans('trans.updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return back()->with('success',trans('trans.deleted_successfully'));
    }
}
