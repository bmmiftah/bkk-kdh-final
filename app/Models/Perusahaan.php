<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Perusahaan extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    protected $guarded = ['id'];

    public function lowongan()
    {
        return $this->hasMany(Lowongan::class);
    }

    public function Pendaftarans()
    {
        return $this->hasMany(Pendaftaran::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama_perusahaan'
            ]
        ];
    }

    public function getRouteKeyName()
    {
    return 'slug';
    }
}

