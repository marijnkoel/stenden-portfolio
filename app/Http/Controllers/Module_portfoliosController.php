<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Module_portfolio;
use Illuminate\Http\Request;
use Session;

class Module_portfoliosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $module_portfolios = Module_portfolio::paginate(25);

        return view('module_portfolios.index', compact('module_portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('module_portfolios.create');
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
        
        Module_portfolio::create($requestData);

        Session::flash('flash_message', 'Module_portfolio added!');

        return redirect('module_portfolios');
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
        $module_portfolio = Module_portfolio::findOrFail($id);

        return view('module_portfolios.show', compact('module_portfolio'));
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
        $module_portfolio = Module_portfolio::findOrFail($id);

        return view('module_portfolios.edit', compact('module_portfolio'));
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
        
        $module_portfolio = Module_portfolio::findOrFail($id);
        $module_portfolio->update($requestData);

        Session::flash('flash_message', 'Module_portfolio updated!');

        return redirect('module_portfolios');
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
        Module_portfolio::destroy($id);

        Session::flash('flash_message', 'Module_portfolio deleted!');

        return redirect('module_portfolios');
    }
}
