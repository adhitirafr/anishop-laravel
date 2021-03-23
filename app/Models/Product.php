<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categories()
    {
        //-- product_categories = pivot table, tabel pernghubung
        return $this->belongsToMany(Category::class, 'product_categories');
    }

    public static function statuses()
    {
        return [
            0 => 'draft',
            1 => 'active',
            2 => 'inactive'
        ];
    }

    public function product_attribute()
    {
        return $this->hasOne(ProductAttribute::class);
    }
}
