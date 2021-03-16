<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $guarded = [];
        
    use HasFactory;

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
}
