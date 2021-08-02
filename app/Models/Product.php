<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The vendors that belong to this product
     */
    public function vendors()
    {
        return $this->belongsToMany(Vendor::class)->withPivot('id')->withTimestamps()->using(ProductVendor::class);
    }

    public function vendorsWithProducts() {
        return $this->vendors()->wherePivot('id', '>', 0);
    }
}
