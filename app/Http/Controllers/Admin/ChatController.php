<?php

namespace App\Http\Controllers\Admin;

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
}
