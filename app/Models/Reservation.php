<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;



class Reservation extends Model
{
    use HasFactory;
    protected $fillable =[
        'reference',
        'date_refence',
        'est_accepte_ou_pas',
        'evenement_id',
        'client_id',
        'date_reservation',
       
        ];


        //relations 

   
}
