<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class manufacturer extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['Name','SalesInfo','SupportInfo'];

    public function hardware()
    {
      return $this->hasMany(hardware::class);
    }
}
