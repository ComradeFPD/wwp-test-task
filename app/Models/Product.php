<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Product
 * @package App\Models
 *
 * @property int $id
 * @property string $title
 * @property int $price
 * @property string|null $image_url
 * @property-read Category[]|null $categories
 */
class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'price',
        'image_url',
    ];

    protected $appends = [
        'discount_price'
    ];

    /**
     * Categories relationship
     *
     * @return BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'products_categories_pivot', 'product_id',
        'category_id', 'id');
    }
}
