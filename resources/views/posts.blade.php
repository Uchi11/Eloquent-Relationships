<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Eloquent Relationships : Relasi One to Many</title>
    
    <!-- Link ke CSS Bootstrap untuk styling bawaan -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    
    <!-- Link ke Font Awesome untuk ikon komentar -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.2/css/all.min.css" referrerpolicy="no-referrer" />
</head>
<body>
    <!-- Penjelasan singkat tentang relasi One-to-Many dalam basis data -->
    <!-- 
        Relasi One-to-Many (Satu ke Banyak) adalah jenis hubungan dalam basis data di mana 
        satu entitas (baris) di tabel pertama dapat berhubungan dengan banyak entitas (baris) di tabel kedua,
        tetapi setiap entitas di tabel kedua hanya terkait dengan satu entitas di tabel pertama.
    -->

    <div class="container">
        <!-- Card utama untuk membungkus konten -->
        <div class="card mt-5">
            <div class="card-body">
                <!-- Judul dan link ke sumber referensi -->
                <h3 class="text-center">
                    <a href="https://santrikoding.com">www.santrikoding.com</a>
                </h3>
                
                <!-- Subjudul deskriptif -->
                <h5 class="text-center my-4">Laravel Eloquent Relationship : One To Many</h5>

                <!-- Tabel untuk menampilkan daftar post beserta komentar terkait -->
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Judul Post</th> <!-- Kolom untuk judul post -->
                            <th>Komentar</th>  <!-- Kolom untuk daftar komentar -->
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Looping untuk menampilkan setiap post -->
                        @foreach($posts as $post)
                            <tr>
                                <!-- Menampilkan judul post -->
                                <td>{{ $post->title }}</td>

                                <!-- Menampilkan daftar komentar untuk post tersebut -->
                                <td>
                                    @foreach($post->comments()->get() as $comment)
                                        <!-- Setiap komentar ditampilkan dalam card kecil -->
                                        <div class="card shadow-sm mb-2">
                                            <div class="card-body">
                                                <!-- Ikon komentar diikuti dengan isi komentar -->
                                                <i class="fa fa-comments"></i> {{ $comment->comment }}
                                            </div>
                                        </div>
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
