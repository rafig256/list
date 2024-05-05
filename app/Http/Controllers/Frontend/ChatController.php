<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\Message;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Events\Message as EventMessage;

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

        //connect to chanel
        broadcast(new EventMessage($request->message , $cookie));

        $response = new Response('chat created');
        $response->withCookie(cookie('ishtap_user_phone', $cookie , 60*24*30*6));

        return $response->header('OriginalCookie',$cookie);
    }


    public function findMessage(Request $request) {
        $chatId = Chat::query()
            ->where('cookie', $request->cookie)
            ->pluck('id')
            ->first();

        $messages = message::query()->where('chat_id' , $chatId)->orderBy('id','desc')->take(6)->get();

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
            'sender_type' => 'user',
        ]);

        broadcast(new EventMessage($request->message , $request->cookie , 'user'));

        return response()->json([
            'success' => true,
            'messages' => 'message sent',
        ]);

    }
}

