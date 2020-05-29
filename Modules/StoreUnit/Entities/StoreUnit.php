<?php

namespace Modules\StoreUnit\Entities;

use Modules\Admin\Ui\AdminTable;
use Modules\Support\Eloquent\Model;
use Modules\Support\Eloquent\Translatable;
use Modules\Product\Entities\Product;
use Modules\Store\Entities\Store;
use Modules\StoreUnit\Admin\StoreUnitTable;

class StoreUnit extends Model
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
    
    protected $fillable = ['name', 'store_id', 'availability'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'availability' => 'boolean',
    ];

    /**
     * The attributes that are translatable.
     *
     * @var array
     */
    public $translatedAttributes = [];


    /**
     * The StoreUnit that belong to the Product.
     */

    
    public function products()
    {
        return $this->belongsToMany(Product::class, 'unit_products');
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function table()
    {
        return new StoreUnitTable($this->with('store'));
    }

}