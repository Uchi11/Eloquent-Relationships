<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Atribut yang dapat di-*mass assignable*.
     * 
     * Atribut ini dapat diisi secara massal, misalnya saat menggunakan metode `create()` atau `update()`.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * Atribut yang harus disembunyikan saat model diserialisasi.
     * 
     * Biasanya digunakan untuk menyembunyikan informasi sensitif seperti password.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Atribut yang akan di-*cast* ke tipe data tertentu.
     * 
     * Misalnya, `email_verified_at` akan otomatis dikonversi ke tipe `datetime`.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    /**
     * Relasi satu-ke-satu antara User dan Phone.
     * 
     * Setiap user memiliki satu phone.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function phone()
    {
    	return $this->hasOne(Phone::class);
    }
    
    /**
     * Relasi many-to-many antara User dan Role.
     * 
     * Satu user bisa memiliki banyak role, dan satu role bisa dimiliki banyak user.
     * Relasi ini menggunakan tabel pivot 'user_role' dengan 'user_id' dan 'role_id'.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_role');
    }
}