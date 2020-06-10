<?php

namespace Modules\Ticket\Entities;

use Modules\Support\Eloquent\Model;
use Modules\Setting\Entities\Department;
use Modules\Setting\Entities\TicketPriority;
use Modules\Setting\Entities\TicketService;
use Modules\Setting\Entities\TicketStatus;
use Modules\Store\Entities\Store;
use Modules\User\Entities\User;
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
    'service_id', 'priority_id', 'status_id', 'store_id', 'assigned_to', 'created_by', 'source'];

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

    /**
     * Get the department .
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function department()
    {
        return $this->hasOne(Department::class, 'id', 'department_id');
    }

    /**
     * Get the ticket service.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function ticketService()
    {
        return $this->hasOne(TicketService::class, 'id', 'service_id');
    }

    /**
     * Get the ticket status.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function ticketStatus()
    {
        return $this->hasOne(TicketStatus::class, 'id', 'status_id');
    }

    /**
     * Get the ticket priority.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function ticketPriority()
    {
        return $this->hasOne(TicketPriority::class, 'id', 'priority_id');
    }

    /**
     * Get the assignee.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function assignee()
    {
        return $this->hasOne(User::class, 'id', 'assigned_to');
    }

    /**
     * Get the assignee.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function creator()
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }

    /**
     * Get the department .
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function store()
    {
        return $this->hasOne(Store::class, 'id', 'store_id');
    }
}
