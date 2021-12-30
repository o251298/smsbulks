<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Services\APISingle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class GroupController extends Controller
{
    public function index()
    {
        dd('index');
    }

    public function create()
    {
        return view('cabinet.groups.create');
    }

    public function store()
    {
        return view('cabinet.groups.create');
    }
}
