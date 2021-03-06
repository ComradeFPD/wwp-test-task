<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Cart extends Model
{
    use HasFactory;

    /**
     * User relationship
     *
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Cart items relationship
     *
     * @return BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'cart_products', 'cart_id',
            'product_id', 'id');
    }
}
