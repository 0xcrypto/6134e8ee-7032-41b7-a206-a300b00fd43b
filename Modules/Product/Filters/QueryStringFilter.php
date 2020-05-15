<?php

namespace Modules\Product\Filters;

use Modules\Attribute\Entities\Attribute;
use Modules\Attribute\Entities\AttributeValue;

class QueryStringFilter
{
    private $sorts = [
        'relevance',
        'alphabetic',
        'toprated',
        'latest',
        'pricelowtohigh',
        'pricehightolow',
    ];

    public function sort($query, $sortType)
    {
        if ($this->sortTypeExists($sortType)) {
            return $this->{$sortType}($query);
        }
    }

    private function sortTypeExists($sortType)
    {
        return in_array(strtolower($sortType), $this->sorts);
    }

    public function relevance()
    {
        // Products are searched by relevant order by default.
    }

    public function alphabetic($query)
    {
        $query->join('product_translations', 'products.id', '=', 'product_translations.product_id')
            ->orderBy('product_translations.name');
    }

    public function topRated($query)
    {
        $query->leftJoin('reviews', 'products.id', '=', 'reviews.product_id')
            ->selectRaw('AVG(reviews.rating) as avg_rating')
            ->groupBy([
                'products.id',
                'slug',
                'price',
                'special_price',
                'selling_price',
                'special_price_start',
                'special_price_end',
                'in_stock',
                'new_from',
                'new_to',
            ])
            ->orderByDesc('avg_rating');
    }

    public function latest($query)
    {
        $query->latest();
    }

    public function priceLowToHigh($query)
    {
        $query->orderBy('selling_price');
    }

    public function priceHighToLow($query)
    {
        $query->orderByDesc('selling_price');
    }

    public function fromPrice($query, $price)
    {
        $query->where('selling_price', '>=', $price);
    }

    public function toPrice($query, $price)
    {
        $query->where('selling_price', '<=', $price);
    }

    public function category($query, $slug)
    {
        $query->whereHas('categories', function ($categoryQuery) use ($slug) {
            $categoryQuery->where('slug', $slug);
        });
    }

    public function attribute($query, $attributeFilters)
    {
        foreach ($this->getAttributeIds($attributeFilters) as $index => $attributeId) {
            $query->join("product_attributes as pa_{$index}", 'products.id', '=', "pa_{$index}.product_id")
                ->whereRaw("pa_{$index}.attribute_id = {$attributeId} AND EXISTS (
                    SELECT * FROM `product_attribute_values`
                        WHERE `pa_{$index}`.`id` = `product_attribute_values`.`product_attribute_id`
                        AND `attribute_value_id` in ({$this->getAttributeValueIds($attributeFilters)})
                )");
        }
    }

    private function getAttributeIds($attributeFilters)
    {
        return Attribute::whereTranslationIn('name', array_keys($attributeFilters))->pluck('id');
    }

    private function getAttributeValueIds($attributeFilters)
    {
        return once(function () use ($attributeFilters) {
            return AttributeValue::whereTranslationIn('value', array_flatten($attributeFilters))
                ->pluck('id')
                ->implode(',');
        });
    }
}
