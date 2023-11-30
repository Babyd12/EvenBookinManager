<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\Client as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
//use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
   // protected $password = 'mot_de_passe';
    protected $fillable = [
        'nom', 'prenom', 'email', 'mot_de_passe', 'telephone', 'role',
    ];
    public function evenements(): HasMany
    {
        return $this->hasMany(Evenements::class);
    }
    
    public function getAuthPassword(){
        return $this->mot_de_passe;
    }
}
