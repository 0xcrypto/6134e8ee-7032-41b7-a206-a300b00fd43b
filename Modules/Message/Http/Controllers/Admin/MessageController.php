<?php

namespace Modules\Message\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use Modules\Admin\Traits\HasCrudActions;
use Modules\Message\Entities\Message;
use Modules\Message\Http\Requests\SaveMessageRequest;
use Modules\User\Entities\User;

class MessageController extends Controller
{
    
    //use HasCrudActions;

    public function index()
    {
        $message = new Message;
        $users = User::get()->pluck('full_name', 'id');
        $buttonOffset = trans('message::messages.send');
        
        return view("{$this->viewPath}.index", compact('message', 'users', 'buttonOffset'));
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
