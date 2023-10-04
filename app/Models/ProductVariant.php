<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'variant',
        'color',
        'size',
        'quantity',
        'price',
        'discount',
        'selling_price',
    ];

    public static function addVariant($data, $productId)
    {
        $variant = $data['variant'];
        foreach ($variant as $key => $value) {
            ProductVariant::create([
                "product_id" => $productId,
                "variant" => $value,
                "color" => $data["color"][$key],
                "size" => $data["size"][$key],
                "quantity" => $data["quantity"][$key],
                "price" => $data["price"][$key],
                "discount" => $data["discount"][$key],
                "selling_price" => $data["selling_price"][$key],
            ]);
        }
    }
}
