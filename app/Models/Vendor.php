<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    /**
     * The products that belong to this vendor
     */
    public function products()
    {
        return $this->belongsToMany(Product::class)->withTimestamps();
    }
}
