<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\User;
use App\Services\Other\Message\Filter;
use App\Services\SingleMessage\SendSingle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $count = 20;
        $message = Message::query();
        try {
            if (!empty($request->all())){
                $message = new Filter($request, $message);
                $message = $message->filter();
            }
        } catch (\Exception $exception){
            return redirect()->back()->with('error', $exception->getMessage());
        }
        if (!empty($request->count)){
            $count = $request->count;
        }
        return view('admin.messages.index' , [
            'messages' => $message->paginate($count)->withQueryString()
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
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }

    public function moderation()
    {
        $message = Message::where('provider_id', 'moderation');
        return view('admin.messages.moderation' , [
            'messages' => $message->get()
        ]);
    }

    public function pass(Request $request)
    {
        if ($request->pass){
            $req = array(
                'text' => $request->text,
                'originator' => $request->originator,
                'number' => $request->phone
            );
            // отправка смс
            $ids = $request->message_id;
            foreach ($ids as $item){
                $message = Message::find($item);
                $msg = new SendSingle($req, null, $message, Auth::id());
                $msg->moderationSend();
            }
        } elseif($request->block) {
            $ids = $request->message_id;
            foreach ($ids as $item){
                $message = Message::find($item);
                $message->provider_id = 0;
                $message->save();
            }
        }
        return redirect()->back();
    }
}
