<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class unit extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['Name', 'hardware_id', 'employee_id', 'purchase_id'];

    public function notes()
    {
      return $this->hasMany(note::class);
    }

    public function hardware()
    {
      return $this->belongsTo(hardware::class);
    }

    public function employee()
    {
      return $this->belongsTo(employee::class);
    }

    public function purchase()
    {
      return $this->belongsTo(purchase::class);
    }

}
