<?php

namespace App\Http\Controllers\Admin;

use App\Events\Message as EventMessage;
use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\message;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ChatController extends Controller
{
    public function index() :View
    {
        $chats = Chat::where('admin_id', auth()->user()->id)->orWhere('admin_id', null)->get();
        return view('admin.chat.index',compact('chats'));
    }

    public function show(Request $request){
        $messages = message::query()->where('chat_id', $request->id)->select('message','sender_type')->get();
        return response()->json($messages);
    }

    public function addMessage(Request $request){
        $request->validate([
            'message' => 'required',
            'chat_id' => 'required|exists:chats,id',
            'admin_id' => 'required|exists:users,id',
            'cookie' => 'required|size:10'
        ]);

        //seen
        message::query()->where(['chat_id'=>$request->chat_id , 'sender_type' => 'user' , 'seen' => 0])->update(['seen'=>1]);

        message::query()->create([
            'chat_id' => $request->chat_id,
            'message' => $request->message,
            'sender_type' => 'admin',
        ]);

        $chat = Chat::query()->where('id',$request->chat_id)->where('admin_id',NULL)->update(['admin_id' => $request->admin_id]);
//        $cookie = Chat::query()->where('id' , $request->chat_id)->select('cookie')->first();

        broadcast(new EventMessage($request->message , $request->cookie));

        if ($chat){
            return response()->json(['message' => 'Message sent successfully']);
        }else{
            return $chat;
        }
    }
}
