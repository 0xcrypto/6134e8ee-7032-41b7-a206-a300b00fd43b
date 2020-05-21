<?php

namespace Modules\Message\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use Modules\Admin\Traits\HasCrudActions;
use Modules\Message\Entities\Message;
use Modules\Message\Http\Requests\SaveMessageRequest;

class MessageController extends Controller
{
    use HasCrudActions;

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
