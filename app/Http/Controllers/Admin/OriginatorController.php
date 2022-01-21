<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Originator;
use Illuminate\Http\Request;

class OriginatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $originators = Originator::all();
        return view('admin.originators.index', [
            'originators' => $originators
        ]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Originator  $originator
     * @return \Illuminate\Http\Response
     */
    public function show(Originator $originator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Originator  $originator
     * @return \Illuminate\Http\Response
     */
    public function edit(Originator $originator)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Originator  $originator
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Originator $originator)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Originator  $originator
     * @return \Illuminate\Http\Response
     */
    public function destroy(Originator $originator)
    {
        //
    }

    public function activate(Originator $originator)
    {
        $originator->status = 1;
        $originator->save();
        return redirect()->back()->with("success", "$originator->name было активировано");
    }
    public function deactivate(Originator $originator)
    {
        $originator->status = 2;
        $originator->save();
        return redirect()->back()->with("success", "$originator->name отклонено");
    }
}
