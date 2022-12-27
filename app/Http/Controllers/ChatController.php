<?php

namespace App\Http\Controllers;
use OpenAI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
    public function index(){
        $chatbot = DB::collection('chatbot')->get();
        $chat = DB::collection('chat')->get();
        $data = [
            'chatbot' => $chatbot,
            'chat' => $chat,
        ];
        return view('chat.chat',$data);
    }

    public function sendchat(Request $request){
        $client = OpenAI::client('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');
        $users = Auth::user();
        $message_content = $request->chat;

        $message = [
            'id_user' => $users->id,
            'id_chatbot' => '63ab0bbba939ee82d68c8fcd',
            'name_user' => $users->name,
            'message' => $message_content,
            'created_at'=> date('Y-m-d H:i:s') ,
            'status' => 'message',
        ];

        

        $result = $client->completions()->create([
            'model' => 'text-davinci-003',
            'prompt' => $message_content,
            'max_tokens' => 1600,
        ]);

        $reply = [
            'id_user' => $users->id,
            'id_chatbot' => '63ab0bbba939ee82d68c8fcd',
            'name_user' => $users->name,
            'message' => $result['choices'][0]['text'],
            'created_at'=> date('Y-m-d H:i:s') ,
            'status' => 'reply',
        ];

        DB::collection('chat')->insert($reply);
        DB::collection('chat')->insert($message);

        return response()->json([
            'success' => true,
            'result' => $result['choices'][0]['text'],  
        ]);

        
    }
}
