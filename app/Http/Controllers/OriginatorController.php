<?php

namespace App\Http\Controllers;

use App\Http\Requests\OriginatorRequest;
use App\Models\Originator;
use App\Services\Other\DB\DataBase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class OriginatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $originators = Auth::user()->originators();
        return view('cabinet.originator', [
            'originators' => $originators->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OriginatorRequest $request)
    {
        $originator = Originator::create([
            'originator' => $request->originator,
            'status' => 0,
        ]);
        $user_id = Auth::id();
        try {
            $sql = "INSERT INTO originator_user (user_id, originator_id, created_at) VALUES ($user_id, $originator->id, NOW())";
            DataBase::save($sql);
        } catch (\Exception $exception){
            Log::info($exception->getMessage());
            return redirect()->back()->with('sql_error', $exception->getMessage());
        }
        return redirect()->back()->with('success', "Вы создали АИ");
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
}
