<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Http\Requests\GroupRequest;
use App\Models\Group;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Services\GroupParser;


class GroupController extends Controller
{
    public function index()
    {
        $groups = Group::all();
        $groups = $groups->where('user_id', Auth::id());;
        return view('cabinet.groups.index', [
            'groups' => $groups
        ]);
    }

    public function create()
    {
        return view('cabinet.groups.create');
    }

    public function store(GroupRequest $request)
    {
        $path = $request->file('csv')->store('files', 'local');
        $test = new GroupParser('app/' . $path);
        $numbers = $test->parse();
        if (empty($numbers)){
            return redirect()->back()->with('error', "Некорректная база");
        }

        $group = Group::create([
            'name' => $request->group_name,
            'user_id' => Auth::id(),
        ]);
        $test->setGroupId($group->id);
        $test->save($numbers);
        Storage::delete($path);
        $info = $test->getInfo();

        return redirect()->back()->with('success', "База в очереди на загрузку, всего номеров {$info['all']} , удалено дублей: {$info['double']}");
    }

    public function view($id)
    {
        $group = Group::find($id);
        $numbers = $group->numbers();
        return view('cabinet.groups.view', [
            'group' => $group,
            'numbers' => $numbers->get()
        ]);
    }
}
