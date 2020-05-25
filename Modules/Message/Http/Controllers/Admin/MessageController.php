<?php

namespace Modules\Message\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Traits\HasCrudActions;
use Modules\Message\Entities\Message;
use Modules\User\Entities\User;
use Modules\Message\Entities\MessageRecipient;
use Modules\Message\Http\Requests\SaveMessageRequest;

class MessageController extends Controller
{
    
    //use HasCrudActions;

    /**
     * Display inbox/outbox/compose_mail
     *
     */

    public function index($currentTab, $searchString = null)
    {
        $currentUser = auth()->user();
        $message = new Message;
        $users = User::get()->pluck('full_name', 'id');
        $buttonOffset = trans('message::messages.send');
        $searchString = urldecode($searchString);

        $outbox_mails = Message::when(($searchString && $currentTab == 'outbox'),
                                        function($query) use($searchString){
                                            return $query->where('subject', 'LIKE', "%{$searchString}%")
                                                    ->orWhere('body', 'LIKE', "%{$searchString}%");
                                        }
                                    )
                                    ->where('sender_id', '=', $currentUser->id)
                                    ->where('is_deleted', '=', 0)
                                    ->orderBy('created_at', 'DESC')
                                    ->paginate(10);

        $inbox_mails = Message::when(($searchString && $currentTab == 'inbox'),
                                        function($query) use($searchString){
                                            return $query->where('subject', 'LIKE', "%{$searchString}%")
                                                ->orWhere('body', 'LIKE', "%{$searchString}%");
                                    }
                                )
                                ->with('recipients')
                                ->whereHas('recipients', function ($query) use ($currentUser) {
                                        $query->where('user_id', '=', $currentUser->id)
                                        ->where('is_deleted', '=', 0); 
                                })
                                ->orderBy('created_at', 'DESC')
                                ->paginate(10);

        $total_inbox = Message::with('recipients')
                                ->whereHas('recipients', function ($query) use ($currentUser) {
                                        $query->where('user_id', '=', $currentUser->id)
                                        ->where('is_deleted', '=', 0); 
                                })
                                ->count();

        return view("{$this->viewPath}.index", compact(['message', 'users', 'buttonOffset', 
        'outbox_mails', 'inbox_mails', 'currentTab', 'total_inbox', 'searchString', 'currentUser']));
    }

    /**
     * show message details
     *
     */

    public function show($currentTab, $id, $total_inbox)
    {
        $mail = Message::findOrFail($id);
        if($mail){
            return view("{$this->viewPath}.show", compact(['currentTab', 'mail', 'total_inbox']));
        }
    }

    public function inboxDelete(Request $request)
    {
        $ids = explode(",", $request->input('mail_ids'));
        $user_id = $request->input('user_id');
        foreach($ids as $id){
            $message_recipient = MessageRecipient::where('message_id', '=', $id)
                                                ->where('user_id', '=', $user_id)->first();
            $message_recipient->is_deleted = 1;
            $message_recipient->save();
        }

        return redirect()->route("admin.messages.index", array('currentTab'=> 'outbox'))
            ->withSuccess(trans('message::messages.mail_deleted'));
    }

    public function outboxDelete(Request $request)
    {
        $ids = explode(",", $request->input('mail_ids'));
        foreach($ids as $id){ 
            $message = Message::find($id);
            $message->is_deleted = 1;
            $message->save();
        }

        return redirect()->route("admin.messages.index", array('currentTab'=> 'outbox'))
            ->withSuccess(trans('message::messages.mail_deleted'));
    }

    /**
     * Send a new message.
     *
     * @return \Illuminate\Http\Response
     */

    public function send(SaveMessageRequest $request)
    {
        $validated_params = $request->validated();

        $message = Message::create([
            "sender_id" => auth()->user()->id,
            "subject" => $validated_params['subject'],
            "body"=> $validated_params['message']                 
        ]);
        
        foreach($validated_params['recipients'] as $recipient){
            $message_recipient = MessageRecipient::create([
                "user_id"=> $recipient,
                "message_id" => $message->id,
                "is_read"=>0
            ]);
        }
        
        return redirect()->route("admin.messages.index", array('currentTab'=> 'outbox'))
            ->withSuccess(trans('message::messages.mail_sent'));
    }

    /**
     * Model for the resource.
     *
     * @var string
     */
    protected $model = Message::class;

    /**
     * Label of the resource.
     *
     * @var string
     */
    protected $label = 'message::messages.message';

    /**
     * View path of the resource.
     *
     * @var string
     */
    protected $viewPath = 'message::admin.messages';

    /**
     * Form requests for the resource.
     *
     * @var array
     */
    protected $validation = SaveMessageRequest::class;
}
