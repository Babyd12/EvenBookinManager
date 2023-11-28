<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Evenement extends Model
{
    use HasFactory;
    
    public function assocation(): BelongsTo
    {
        return $this -> BelongsTo(Assocation::class);
    }

    public function clients() : HasMany
    {
        return $this -> hasMany(Clients::class);
    }
}
