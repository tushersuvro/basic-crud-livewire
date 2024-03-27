<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'client_id'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    
}
