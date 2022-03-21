<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class employee extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['Name', 'Email', 'Phone'];
    public function getPhoneAttribute($value)
    {
          $cleaned = preg_replace('/[^[:digit:]]/', '', $value);
          preg_match('/(\d{3})(\d{3})(\d{4})/', $cleaned, $matches);
          return "({$matches[1]}) {$matches[2]}-{$matches[3]}";
    }

    public function setPhoneAttribute($value)
    {
        $this->attributes['Phone'] = preg_replace("/[^0-9]/","",$value);
    }

    public function phoneUpdate($value)
    {
        return preg_replace("/[^0-9]/","",$value);
    }

    public function unit()
    {
      return $this->hasMany(unit::class);
    }
}
