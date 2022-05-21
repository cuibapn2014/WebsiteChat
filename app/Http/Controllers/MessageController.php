<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getMessByConvId($id)
    {
        return Message::where('conversation_id', $id)->orderBy('created_at','asc')->with(['user'])->get();
    }

    public function sendMessage(Request $request, $idConversation)
    {
        $user = Auth::user();
        $conv =  Conversation::findOrFail($idConversation);
        $message = new Message();
        $message->message =  $request->input('message');
        $message->conversation_id = $conv->id;
        $message->user_id = $user->id;
        $message->save();

        broadcast(new MessageSent($user, $message))->toOthers();

        return response()->json(['status' => 'Message Sent!', 'data' => $message]);
    }
}
