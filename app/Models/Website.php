<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'url',
    ];

    public function latestStatus()
    {
        return $this->hasOne(WebsiteStatus::class)->latest();
    }

    public function statuses()
    {
        return $this->hasMany(WebsiteStatus::class)->orderBy('created_at', 'desc');
    }
}
