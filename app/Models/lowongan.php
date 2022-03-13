<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;


class Lowongan extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    protected $guarded = ['id'];
    protected $with=['perusahaan'];

    public function scopeFilter($query, array $filters)
    {
        
        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where('title_lowongan', 'like', '%' . $search . '%');
        });
    }

    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class);
    }

    public function informasis()
    {
        return $this->hasMany(Informasi::class);
    }

    public function pendaftaran()
    {
        return $this->hasMany(pendaftaran::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title_lowongan'
            ]
        ];
    }

    public function getRouteKeyName()
    {
    return 'slug';
    }
}
