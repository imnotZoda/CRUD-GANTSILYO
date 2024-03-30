<?php

// app/Models/Product.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = ['prod_name', 'prod_desc', 'type', 'price', 'img'];

    /**
     * Get the images for the product.
     */
    public function images()
    {
        return explode(',', $this->img);
    }
}
