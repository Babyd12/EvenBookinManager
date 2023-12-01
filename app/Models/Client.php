<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\Client as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Evenement;
//use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
   // protected $password = 'mot_de_passe';
    protected $fillable = [
        'nom', 'prenom', 'email', 'mot_de_passe', 'telephone', 'role',  'reference', 
    ];
    public function evenements(): BelongsToMany
    {
        return $this->belongsToMany(Evenement::class);
    }

    public function clients()
{
    return $this->hasMany(Reservation::class);
}

  
    public function getAuthPassword(){
        return $this->mot_de_passe;
    }
}
