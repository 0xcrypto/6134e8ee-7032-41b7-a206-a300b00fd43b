<?php

namespace Modules\Setting\Entities;

use Modules\Support\Eloquent\TranslationModel;

class TaskStatusTranslation extends TranslationModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];
}
