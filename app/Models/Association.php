<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Association extends Model
{
    use HasFactory;
    protected $fillable = [
        'slogan',
        'nom',
        'email',
        'phone',
        'logo',
        'mot_de_passe',
        'date_de_creation',
    ];
    public function evenements(): HasMany
    {
        return $this->hasMany(Evenements::class);
    }
}
