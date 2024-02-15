<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    public function fotos()
    {
        return $this->hasMany(Foto::class, 'album_id', 'id');
    }

    protected $fillable = [
        'name',
        'description',
        'user_id'
    ];
}
