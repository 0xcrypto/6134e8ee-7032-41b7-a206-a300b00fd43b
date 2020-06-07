<?php

namespace Modules\Setting\Entities;

use Modules\Support\Eloquent\TranslationModel;

class TicketPriorityTranslation extends TranslationModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];
}
