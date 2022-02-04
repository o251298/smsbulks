<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BadWord;
use Illuminate\Http\Request;

class BadWordController extends Controller
{
    public function index()
    {
        $badWords = BadWord::paginate(20);
        return view('admin.badWords.index', [
            "badwords" => $badWords
        ]);
    }
    public function create()
    {
        return view('admin.badWords.create');
    }
    public function store(Request $request)
    {
        $badWord = BadWord::create([
            'word' => $request->badword
        ]);
        return redirect()->back();
    }
    public function destroy(BadWord $badWord)
    {
        $badWord->delete();
        return redirect()->back();
    }
}
