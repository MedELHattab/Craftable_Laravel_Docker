<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sex extends Model
{
    protected $fillable = [
        'name',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/sexes/'.$this->getKey());
    }
}
