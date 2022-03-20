<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class note extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['unit_id', 'Service', 'Software', 'Notes'];

    public function unit()
    {
      return $this->belongsTo(unit::class);
    }
}
