<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

/**
 * Class Category
 * @package App\Models
 *
 * @property int $id
 * @property string $title
 * @property int|null $discount
 * @property-read Product[] $products
 */
class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'discount'
    ];

    /**
     * Products relationship
     *
     * @return HasManyThrough
     */
    public function products()
    {
        return $this->hasManyThrough(Product::class, 'products_categories_pivot', 'category_id',
         'product_id', 'id');
    }
}
