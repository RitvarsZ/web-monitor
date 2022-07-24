<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'error',
    ];
    
    public function website()
    {
        return $this->belongsTo(Website::class);
    }
}
