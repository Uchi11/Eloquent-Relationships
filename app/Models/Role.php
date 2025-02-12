<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    /**
     * Mendefinisikan relasi antara Role dan User.
     * 
     * Jika setiap role bisa dimiliki oleh banyak user, maka gunakan relasi many-to-many.
     * Biasanya, relasi ini memanfaatkan tabel pivot 'role_user' dengan 'role_id' dan 'user_id'.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        // Relasi many-to-many: satu role bisa dimiliki banyak user
        return $this->belongsToMany(User::class);
    }
}