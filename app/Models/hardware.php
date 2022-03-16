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
    protected $table = 'hardwares';

    public function cat()
    {
      return $this->hasMany(hwcategory::class);
    }

    public function man()
    {
      return $this->hasMany(manufacturer::class);
    }

}
