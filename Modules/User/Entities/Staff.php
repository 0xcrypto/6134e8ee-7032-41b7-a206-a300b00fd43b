<?php

namespace Modules\User\Entities;

use Modules\Support\Eloquent\Model;

class Staff extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'employee_id', 'department_id', 'job_type', 'joining_date', 'senior_id', 'device_id', 'address'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'job_type' => 'boolean'
    ];

}
