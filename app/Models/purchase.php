<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class purchase extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['Invoice', 'Price', 'PurchaseDate'];
    public function getPriceAttribute($value)
    {
          return "$".number_format($value/100, 2);
    }

    public function setPriceAttribute($value) {
        $this->attributes['Price'] = preg_replace("/[^0-9]/","",(int)$value*100);
    }
    
}
