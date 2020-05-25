<?php

namespace Modules\Message\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use Modules\Admin\Traits\HasCrudActions;
use Modules\Message\Entities\MessageRecipient;
use Modules\Message\Http\Requests\SaveMessageRecipientRequest;

class MessageRecipientController extends Controller
{
    use HasCrudActions;

    /**
     * Model for the resource.
     *
     * @var string
     */
    protected $model = MessageRecipient::class;

    /**
     * Label of the resource.
     *
     * @var string
     */
    protected $label = 'message::message_recipients.message_recipient';

    /**
     * View path of the resource.
     *
     * @var string
     */
    protected $viewPath = 'message::admin.message_recipients';

    /**
     * Form requests for the resource.
     *
     * @var array
     */
    protected $validation = SaveMessageRecipientRequest::class;
}
