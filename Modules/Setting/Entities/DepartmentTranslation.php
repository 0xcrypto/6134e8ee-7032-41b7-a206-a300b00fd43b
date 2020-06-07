<?php

namespace Modules\Setting\Entities;

use Modules\Support\Eloquent\TranslationModel;

class DepartmentTranslation extends TranslationModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];
}
