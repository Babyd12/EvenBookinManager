<?php

namespace App\Models;

use App\Models\Association;
use App\Models\Client;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;





class Evenement extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_mise_en_avant',
        'libelle',
        'date_evenement',
        'date_limite_inscription',
        'est_cloturer_ou_pas',
        'association_id',
        'reference',
    
    ];

    public function association(): BelongsTo
    {
        return $this->BelongsTo(Association::class);
    }

    public function clients(): BelongsToMany
    {
        return $this->belongsToMany(Client::class);
    }

    public function evenements()
    {
        return $this->hasMany(Reservation::class);
    }
    

    // Simple function 

    public function getSlug(): string
    {
        return str::slug($this->title);
    }

    public function imageUrl(): string
    {
        return Storage::disk('public')->url($this->image);
    }
}
