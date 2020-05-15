<?php

namespace Modules\Option\Entities;

use Modules\Support\Money;
use Modules\Support\Eloquent\Model;
use Modules\Product\Entities\Product;
use Modules\Support\Eloquent\Translatable;

class OptionValue extends Model
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
    protected $fillable = ['price', 'price_type', 'position'];

    /**
     * The attributes that are translatable.
     *
     * @var array
     */
    protected $translatedAttributes = ['label'];

    public function getPriceAttribute($price)
    {
        if ($this->priceIsPercent()) {
            return $price;
        }

        return Money::inDefaultCurrency($price);
    }

    public function priceIsPercent()
    {
        return $this->price_type === 'percent';
    }

    public function priceIsFixed()
    {
        return $this->price_type === 'fixed';
    }

    public function priceForProduct(Product $product)
    {
        if ($this->priceIsFixed()) {
            return $this->price;
        }

        return $this->getPercentageOf($product->selling_price->amount());
    }

    private function getPercentageOf($productPrice)
    {
        return Money::inDefaultCurrency(($this->price / 100) * $productPrice);
    }
}
