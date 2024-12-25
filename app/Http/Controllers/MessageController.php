<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\SubDepartment;
use App\Models\Designation;
use App\Models\Post;
use App\Models\User;
use App\Models\Allocation;
use App\Models\Message;
use App\Models\Group;
use App\Models\MessengerGroup;
use Validator;
use App\Events\SendMessage;


use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

class MessageController extends Controller
{
    //

    public function index($id)
    {
        $userId = Auth::id(); // Get the authenticated user's ID
        /* $users = ::where('dept_id',$id)->get(); */
        $userIds = MessengerGroup::where('group_id',$id)->pluck('user_id');//
        $users = User::whereIn('id', $userIds)->get();

        // Fetch user details from the users table
        /* $users = User::whereIn('id', $userIds)->get(); */
        $chats = Group::find($id);
        /* $chats = DB::table('groups')
            ->join('messenger_groups', 'groups.id', '=', 'messenger_groups.group_id')
            ->where('messenger_groups.user_id', $userId)
            ->select('groups.*') // Select all fields from the `groups` table
            ->get(); */
            // Get only the group names

        
        /* $chats = Group::all(); */
        $LoggedAdminInfo = auth()->user();
        $loggedInUserId = auth()->id();
        return view('Messenger.message',['LoggedAdminInfo'=>$LoggedAdminInfo,'chats'=>$chats,'users'=>$users,'loggedInUserId'=>$loggedInUserId]);
        
    }
   /*  public function chats()
    {
        $LoggedAdminInfo = auth()->user();
        if (!$LoggedAdminInfo) {
            return redirect()->route('Messenger.message');
        }
    } */
    public function sendMessage(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
            //'receiver_id' => 'required|integer|exists:users,id', // Ensure the receiver_id is a valid user id
        ]);

        $LoggedInfo =  auth()->user()->id;
        $LoggedAdminInfo = auth()->user();
        if (!$LoggedAdminInfo) {
            return response()->json([
                'success' => false,
                'message' => 'You must be logged in to send a message',
            ]);
        }
        $dataTime = Carbon::now()->format('Y-m-d H:m:s');
        $message = new Message();
        $message->user_id = $LoggedInfo;
        $message->receiver_id = $request->receiver_id;
        $message->content = $request->message;
        $message->created_at = $dataTime;
        $message->save();
        // Broadcast the message using the SendUserMessage event
       // event(new SendMessage($message));
        broadcast(new SendMessage($message))->toOthers();

        return response()->json([
            'success' => true,
            'message' => 'Message sent successfully',
        ]);
    }
    public function fetchMessages(Request $request)
    {
        $receiverId = $request->input('receiver_id');//
        
        // Fetch the logged-in admin using the session
        $adminId = auth()->user()->id;;
        $LoggedAdminInfo = auth()->user();
        $is_active = 0 ; 
        $users = User::where('is_active',$is_active && 'is_posted',$is_active)->get();

        if (!$LoggedAdminInfo) {
            return response()->json([
                'error' => 'Admin not found. You must be logged in to access messages.'
            ], 404);
        }

        // Fetch messages between the admin and the specified seller
        //$messages = Message::where('receiver_id',1)->orderBy('created_at', 'asc')->get();
        $messages = Message::where(function($query) use ($receiverId) {
            $query->where('receiver_id', $receiverId);
           
        })->orderBy('updated_at', 'asc')
        ->with('users')
        ->get();

        return response()->json([
            'messages' => $messages
        ]); 




        
    }
   


    
}
