<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Eloquent Relationships : Relasi One to One & Many To Many</title>
    
    <!-- Menggunakan Bootstrap untuk styling tampilan -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>       

<body>
    <!-- Penjelasan tentang relasi database -->
    <!-- 
        Relasi One-to-One:
        Hubungan di mana satu baris dalam tabel A hanya dapat terhubung dengan satu baris di tabel B, dan sebaliknya.
        
        Relasi One-to-Many:
        Hubungan di mana satu baris dalam tabel A dapat terhubung dengan banyak baris di tabel B, 
        tetapi setiap baris di tabel B hanya terhubung dengan satu baris di tabel A.
        
        Relasi Many-to-Many:
        Hubungan di mana banyak baris di tabel A dapat terhubung dengan banyak baris di tabel B melalui tabel pivot.
    -->

    <div class="container">
        <!-- Kartu utama untuk menampilkan data -->
        <div class="card mt-5">
            <div class="card-body">
                <!-- Judul utama dan sumber referensi -->
                <h3 class="text-center"><a href="https://santrikoding.com">www.santrikoding.com</a></h3>
                <h5 class="text-center my-4">Laravel Eloquent Relationship : One To One & Many To Many</h5>
                
                <!-- Tabel untuk menampilkan daftar user beserta nomor telepon dan peran -->
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nama User</th>      <!-- Kolom untuk nama user -->
                            <th>Nomor Telepon</th>  <!-- Kolom untuk nomor telepon user -->
                            <th>Roles</th>          <!-- Kolom untuk daftar peran user -->
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Looping untuk menampilkan data setiap user -->
                        @foreach($users as $user)
                        <tr>
                            <!-- Menampilkan nama user -->
                            <td>{{ $user->name }}</td>
                            
                            <!-- 
                                Relasi One-to-One: 
                                Mengakses nomor telepon melalui relasi one-to-one antara model User dan Phone.
                                Pastikan di model User ada method phone() yang mengembalikan relasi one-to-one.
                                Contoh di model User:
                                public function phone() {
                                    return $this->hasOne(Phone::class);
                                }
                            -->
                            <td>{{ $user->phone->phone }}</td>

                            <!-- 
                                Relasi Many-to-Many:
                                Menampilkan semua peran (roles) yang dimiliki oleh user.
                                Pastikan di model User ada method roles() yang mengembalikan relasi many-to-many.
                                Contoh di model User:
                                public function roles() {
                                    return $this->belongsToMany(Role::class);
                                }
                            -->
                            <td>
                                @foreach ($user->roles()->get() as $role)
                                <!-- Menampilkan setiap peran dalam bentuk tombol -->
                                <button class="btn btn-sm btn-primary me-2">{{ $role->name }}</button>
                                @endforeach
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</body>

</html>
