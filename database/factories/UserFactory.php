<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * Factory untuk model User.
 *
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Mendefinisikan default data untuk model User.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(), // Membuat nama acak
            'email' => fake()->safeEmail(), // Membuat email acak yang aman (tidak akan digunakan di dunia nyata)
            'email_verified_at' => now(), // Menandakan email telah diverifikasi dengan timestamp saat ini
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // Password default (hash dari 'password')
            'remember_token' => Str::random(10), // Token acak untuk fitur "remember me"
        ];
    }

    /**
     * Mengatur state user agar email belum diverifikasi.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null, // Mengatur agar email tidak terverifikasi
        ]);
    }
}