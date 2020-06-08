<?php

namespace Modules\Lead\Entities;

use Modules\Support\Eloquent\Model;
use Modules\Support\Eloquent\Translatable;
use Modules\Setting\Entities\Setting;
use Modules\User\Entities\User;
use Modules\Store\Entities\Store;

class Lead extends Model
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
    protected $fillable = [];

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
}
