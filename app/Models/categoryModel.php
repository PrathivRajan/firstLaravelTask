<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categoryModel extends Model
{
    use HasFactory;
    protected $table = 'category_lists';
    // protected $fillable = ['categoryName'];
    protected $guarded = ['_token'];

    /**
     * Get all of the products for the categoryModel
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function products()
    {
        return $this->hasMany(productModel::class, 'category_id', 'id');
    }
}
