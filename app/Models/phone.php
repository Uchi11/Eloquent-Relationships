<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;
    
    /**
     * Mendefinisikan relasi antara Phone dan User.
     * 
     * Setiap entri di tabel 'phones' *berelasi* dengan satu user.
     * Biasanya, tabel 'phones' memiliki foreign key 'user_id' 
     * yang merujuk ke tabel 'users'.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        // Relasi many-to-one: Setiap phone dimiliki oleh satu user
        return $this->belongsTo(User::class);
    }
}