<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;

class Site extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function localite()
    {
        return $this->belongsTo(Localite::class);
    }
    public function imageUrl()
    {
        return Storage::url($this->image);
    }
}
