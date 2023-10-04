<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'brand',
        'category',
        'sub_category',
    ];

    public function variants()
    {
        return $this->hasMany('App\Models\ProductVariant');
    }

    public static function updateProduct($input,$id)
    {
        $product = Product::find($id);
        $product->variants()->delete();
        $product->product_name = $input['product_name'];
        $product->brand = $input['brand'];
        $product->category = $input['category'];
        $product->sub_category = $input['sub_category'];
        $product->save();
        ProductVariant::addVariant($input,$product->id);
    }
}
