<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function Index() {
        $messages = Message::latest()->get();
        return view('admin.feedback',compact('messages'));
    }
    public function GetFeedback($id) {
        $message_info = message::where('id',$id)->first();
        return view('admin.getfeedback',compact('message_info'));
    }
    public function StoreFeedback(Request $request) {
        feedback::insert([
            'feedback_id' => $request->feedback_id,
            'user_id' => $request->user_id,
            'message' => $request->message
        ]);
        return redirect()->route('feedback')->with('message','Sent Successfully!');
    }
    public function EditFeedback($id) {
        $message_info = message::where('id',$id)->first();
        $feedback_info = feedback::where('feedback_id',$id)->first();
        return view('admin.editfeedback',compact('message_info','feedback_info'));
    }
    public function UpdateFeedback(Request $request) {
        $id = $request->feedback_id;
        feedback::where('feedback_id',$id)->update([
            'message' => $request->message
        ]);
        return redirect()->route('feedback')->with('message','Feedback Updated Successfully!');
    }
}
