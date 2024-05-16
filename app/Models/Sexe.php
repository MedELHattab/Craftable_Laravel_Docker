<?php

namespace App\Models;
use Brackets\AdminAuth\Models\AdminUser;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sexe extends Model
{
    protected $fillable = ['name'];

    public function adminUsers(): HasMany
    {
        return $this->hasMany(AdminUser::class);
    }
}