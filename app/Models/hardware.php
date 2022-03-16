<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class hardware extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['Name','ManufacturerID','CategoryID','CPU','RAM','Storage'];

    public function cat()
    {
      return $this->belongsTo(hwcategory::class);
    }

    public function man()
    {
      return $this->belongsTo(manufacturer::class);
    }

}
