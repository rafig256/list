<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ChatController extends Controller
{
    public function index() :View
    {
        $chats = Chat::where('admin_id', auth()->user()->id)->orWhere('admin_id', null)->get();
        return view('admin.chat.index',compact('chats'));
    }
}
