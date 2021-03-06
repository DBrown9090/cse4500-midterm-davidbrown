<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class hwcategory extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['Name'];

    public function hardware()
    {
      return $this->hasMany(hardware::class);
    }
}
