<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use App\Module;
use App\Module_portfolio;
use Illuminate\Http\Request;
use Session;
use Auth;

class ModulesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $modules = Module::paginate(25);

        return view('modules.index', compact('modules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $data = [
            'module_types' => module_types()
        ];
        
        return view('modules.create',$data);
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
        $requestData['portfolio_id'] = User::find(Auth::user()->id)->portfolio->id;

        $file = request->('')

        $module = Module::create($requestData);

        Session::flash('flash_message', 'Module added!');

        return redirect('portfolios/' . User::find(Auth::user()->id)->portfolio->id);
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
        $module = Module::findOrFail($id);

        return view('modules.show', compact('module'));
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
        $data = [
            'module_types' => module_types(),
            'module' => Module::findOrFail($id)
        ];
        
        return view('modules.edit', $data);
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
        $requestData['portfolio_id'] = User::find(Auth::user()->id)->portfolio->id;
        $module = Module::findOrFail($id);
        $module->update($requestData);

        Session::flash('flash_message', 'Module updated!');

        return redirect('portfolios/' . User::find(Auth::user()->id)->portfolio->id);
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
        Module::destroy($id);

        Session::flash('flash_message', 'Module deleted!');

        return redirect('portfolios/' . User::find(Auth::user()->id)->portfolio->id);
    }

    public function approve($id){
        $module = Module::findOrFail($id);
        $module->approved = !$module->approved;
        $module->save();
        echo $module->approved ? 1 : 0;
    }

    public function grade($id, Request $request){
        $module = Module::findOrFail($id);
        $grade = $request->all()['grade'] == 'null' ? null : $request->all()['grade'];
        $module->grade = $grade;
        $module->save();
        echo $module->grade;
    }
}
