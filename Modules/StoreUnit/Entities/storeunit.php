<?php

namespace Modules\StoreUnit\Entities;

use Modules\Admin\Ui\AdminTable;
use Modules\Support\Eloquent\Model;
use Modules\Support\Eloquent\Translatable;
use Modules\Product\Entities\Product;


class storeunit extends Model
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
    protected $fillable = ['name','store','availability'];

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
     * The StoreUnit that belong to the Product.
     */

    
    public function Products()
    {
        return $this->belongsToMany(Product::class, 'unit_product');
    }
    

    public function table()
    {
        return new AdminTable($this->newQuery());
    }
}
