<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutImg extends Model
{
    use HasFactory;

    public function about()
    {
        return $this->belongsTo(About::class);
    }
}
