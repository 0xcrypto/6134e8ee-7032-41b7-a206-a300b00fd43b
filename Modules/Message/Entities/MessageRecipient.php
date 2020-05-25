<?php

namespace Modules\Message\Entities;

use Modules\Support\Eloquent\Model;
use Modules\Support\Eloquent\Translatable;
use Modules\Message\Entities\Message;
use Modules\User\Entities\User;

class MessageRecipient extends Model
{
    use Translatable;

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = ['translations'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'message_id', 'is_read'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];

    /**
     * The attributes that are translatable.
     *
     * @var array
     */
    public $translatedAttributes = [];

    public function message()
    {
        return $this->belongsTo(Message::class);
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
