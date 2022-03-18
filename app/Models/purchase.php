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
        $temp = $value / 100;
        return $temp;
          //return "$".number_format($value/10000, 2);
    }

    public function setPriceAttribute($value) {
        $temp = $value * 100;
        $this->attributes['Price'] = $temp;
        //$this->attributes['Price'] = preg_replace("/[^0-9]/","",$value)*100;
    }
}
