<?php

namespace App\Models;

use App\Models\Rating;
use App\Models\Console;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Videogame extends Model
{
    use HasFactory;

    use SoftDeletes; //deleted_at

    public $timestamps = true;

    protected $guarded = [];
    
    public function getRouteKeyName()
    {
        return 'url';
    }

    //Type $var = null
    public function rating() //Indica la relacion
    {
        return $this->belongsTo(Rating::class);
    }

    public function console() //Indica la relacion
    {
        return $this->belongsTo(Console::class);
    }
}
