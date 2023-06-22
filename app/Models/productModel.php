<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productModel extends Model
{
    use HasFactory;
    protected $table = 'product_models';
    protected $fillable = ['productCode', 'productName', 'productDescription', 'productPrice', 'productImage'];

    public function category()
    {
        return $this->belongsTo(categoryModel::class, 'category_id', 'id');
    }
}

