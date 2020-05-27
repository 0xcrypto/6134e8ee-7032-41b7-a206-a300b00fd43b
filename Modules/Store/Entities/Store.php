<?php

namespace Modules\Store\Entities;

use Modules\Admin\Ui\AdminTable;
use Modules\Support\Eloquent\Model;
use Modules\Support\Eloquent\Translatable;
use Modules\StoreUnit\Entities\storeunit;

class Store extends Model
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

    protected $fillable = ['name','latitude_longitude','address'];

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


    public function table()
    {
        return new AdminTable($this->newQuery());
    }


    public function storeUnit()
    {
        return $this->hasMany(storeunit::class, 'store');
    }
}
