<?php

namespace App\Http\Controllers;
use App\Chat;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Events\ChatEvent;
class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(Chat $chat)
     {
       // dd($chat);
       return response()->json(Chat::all());
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

       $comment = new Chat();
         $comment->message = $request->msg;
         $comment->to_user_id = $request->to_user_id;
         $comment->user_id = $request->user_id;
         $comment->save();

       $chat = Chat::where('id', $comment->id)->with('user')->first();
       broadcast(new ChatEvent($chat))->toOthers();
       return $chat->toJson();
     }

    /**
     * Display the specified resource.
     *
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      // dd($id);
        return view('chat.show',['id'=>$id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function edit(Chat $chat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chat $chat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chat $chat)
    {
        //
    }
}
