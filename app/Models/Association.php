<?php

namespace App\Models;


use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\Association as Authenticatable;

class Association extends Authenticatable
{
      use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'slogan',
        'nom',
        'email',
        'phone',
        'logo',
        'mot_de_passe',
        'date_de_creation',
        'telephone',
    ];
    public function evenements(): HasMany
    {
        return $this->hasMany(Evenements::class);
    }

    public function getAuthPassword(){
        return $this->mot_de_passe;
    }


}
