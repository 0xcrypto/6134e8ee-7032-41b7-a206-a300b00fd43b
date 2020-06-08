<?php

namespace Modules\Ticket\Entities;

use Modules\Support\Eloquent\Model;
use Modules\Support\Eloquent\Translatable;

class Ticket extends Model
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
    protected $fillable = [ 'customer_id', 'customer_name', 'customer_email', 'subject', 'description', 'department_id', 
    'service_id', 'priority_id', 'status_id', 'store_id', 'assigned_to', 'created_by'];

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
