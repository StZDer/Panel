<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lab extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'desc', 'svg'];
    public function images()
    {
        return $this->hasMany(LabImg::class);
    }
}
