<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\School_group;
use App\User;
use Illuminate\Http\Request;
use Session;

class School_groupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $school_groups = School_group::paginate(25);

        return view('school_groups.index', compact('school_groups'));
    }

    public function users($id){
        $data = [
            'school_group' => School_group::findOrFail($id),
            'users' => User::whereHas('school_group')->where('id', '=', 1)->get(),
        ];       

        return view('school_groups.users', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('school_groups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        School_group::create($requestData);

        Session::flash('flash_message', 'School_group added!');

        return redirect('school_groups');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $school_group = School_group::findOrFail($id);

        return view('school_groups.show', compact('school_group'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $school_group = School_group::findOrFail($id);

        return view('school_groups.edit', compact('school_group'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        
        $requestData = $request->all();
        
        $school_group = School_group::findOrFail($id);
        $school_group->update($requestData);

        Session::flash('flash_message', 'School_group updated!');

        return redirect('school_groups');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        School_group::destroy($id);

        Session::flash('flash_message', 'School_group deleted!');

        return redirect('school_groups');
    }
}
