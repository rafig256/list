<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\Message;
use Carbon\Carbon;
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

        return $response->header('OriginalCookie',$cookie);
    }


    public function findMessage(Request $request) {
        $chat = Chat::query()->with('messages')->where('cookie', $request->cookie)->first();
        $messages = $chat->messages->take(6);
        // تبدیل تاریخ به مدت زمان گذشته
        foreach ($messages as $message) {
            $message->time = Carbon::parse($message->created_at)->diffForHumans();
        }

        return response()->json([
            'success' => true,
            'messages' => $messages,
        ]);
    }

    public function addMessage(Request $request)
    {
        $request->validate([
            'cookie' => 'required',
            'message' => 'required'
        ]);
        $chat_id = Chat::query()->where(['cookie'=> $request->cookie , 'status' => 1])->latest('id')->value('id');
        $message = Message::query()->create([
            'chat_id' => $chat_id,
            'message' => $request->message,
        ]);
        return response()->json([
            'success' => true,
            'messages' => 'message sent',
        ]);

    }
}

