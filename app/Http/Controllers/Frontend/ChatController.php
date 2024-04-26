<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ChatController extends Controller
{
    public function index()
    {
        return view('frontend.dashboard.message.index');
    }

    public function create(Request $request){
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'message' => 'required',
            'user_id' => 'nullable|exists:users,id'
        ]);
        $cookie = \Str::random(10);
        // ذخیره‌ی اطلاعات در دیتابیس
        $chat = Chat::query()->create([
            'name' => $request->name,
            'mobile' => $request->phone,
            'user_id' => $request->user_id ?? NULL,
            'cookie' => $cookie,
        ]);

        Message::query()->create([
            'chat_id' => $chat->id,
            'message' => $request->message
        ]);
        $response = new Response('chat created');
        $response->withCookie(cookie('ishtap_user_phone', $cookie , 60));
        // ایجاد کوکی با نام "ishtap_user_phone" و ذخیره‌ی شماره تلفن در آن
        return $response;
    }

    public function findMessage(Request $request) {
        $chat = Chat::query()->with('messages')->where('cookie', $request->cookie)->first();
        $messages = $chat->messages;
        return response()->json([
            'success' => true,
            'messages' => $messages,
        ]);
    }
}
