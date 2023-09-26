<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Site extends Model
{
    use HasFactory;


    public function localite()
    {
        return $this->belongsTo(Localite::class);
    }
    public function imageUrl()
    {
        return Storage::url($this->image);
    }
}
