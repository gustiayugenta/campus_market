<!DOCTYPE html>
<html>
<head>
    <title>Terima Kasih atas Ulasan Anda</title>
    <style>
        body { font-family: Arial, sans-serif; color: #333; line-height: 1.6; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #eee; border-radius: 10px; }
        .header { background-color: #FF7A7A; color: white; padding: 15px; text-align: center; border-radius: 10px 10px 0 0; }
        .content { padding: 20px; }
        .footer { text-align: center; font-size: 12px; color: #999; margin-top: 20px; }
        .button { display: inline-block; padding: 10px 20px; background-color: #FF7A7A; color: white; text-decoration: none; border-radius: 5px; margin-top: 10px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Terima Kasih!</h1>
        </div>
        <div class="content">
            <p>Halo <strong>{{ $rating->name }}</strong>,</p>
            <p>Terima kasih telah meluangkan waktu untuk memberikan ulasan pada produk kami.</p>
            
            <div style="background: #f9f9f9; padding: 15px; border-radius: 5px; margin: 15px 0;">
                <p><strong>Rating:</strong> {{ $rating->rating }} Bintang</p>
                <p><strong>Ulasan:</strong> "{{ $rating->review }}"</p>
            </div>

            <p>Masukan Anda sangat berharga bagi kami dan membantu pembeli lain dalam mengambil keputusan.</p>
            
            <p>Terus belanja di Sitoko!</p>
            
            <center>
                <a href="{{ url('/') }}" class="button">Belanja Lagi</a>
            </center>
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} Sitoko. All rights reserved.
        </div>
    </div>
</body>
</html>