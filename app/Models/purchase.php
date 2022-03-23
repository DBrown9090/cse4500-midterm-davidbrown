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
      return $value/100;
    }
    public function getFormattedPriceAttribute($value)
    {
          return "$".number_format($value, 2);
    }

    public function setPriceAttribute($value) {
        $this->attributes['Price'] = preg_replace("/[^0-9]/","",(int)($value*100));
    }

    public function PriceUpdate($value) {
        return preg_replace("/[^0-9]/","",$value*100);
    }

    public function unit()
    {
      return $this->hasMany(unit::class);
    }
}
