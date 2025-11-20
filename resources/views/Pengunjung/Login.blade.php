<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CampusMarket Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        primary: { 500: '#FF9894', 600: '#FF9894' }
                    }
                }
            }
        }
    </script>
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            height: 100vh;
            width: 100%;
            /* Gradient background sesuai gambar */
            background: linear-gradient(180deg, #FF9494 0%, #FFD1D1 60%, #FFEBEB 100%);
            display: flex;
            flex-direction: column;
        }

        /* --- Navbar Section --- */
        nav {
            background-color: white;
            padding: 15px 50px;
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .nav-logo {
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 600;
            font-size: 18px;
            color: #000;
        }

        .nav-logo i {
            color: #FF8585; /* Warna ikon keranjang kecil */
            font-size: 24px;
        }

        .nav-login-text {
            color: #FF8585;
            font-weight: 400;
            font-size: 16px;
        }

        /* --- Main Content Section --- */
        .container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 0 80px; /* lebih lebar */
            gap: 120px; /* Jarak antara logo besar dan form login */
            max-width: 1400px; /* batasi agar tidak terlalu melebar di layar sangat besar */
            margin-left: auto;
            margin-right: auto;
        }

        /* Bagian Kiri: Logo Besar & Judul */
        .left-branding {
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .big-icon {
            font-size: 120px;
            color: white; /* Ikon keranjang besar berwarna putih */
            margin-bottom: 10px;
            /* Efek garis-garis ikon keranjang (simulasi sederhana) */
            text-shadow: 0px 4px 10px rgba(0,0,0,0.1); 
        }

        .brand-title {
            font-size: 36px;
            font-weight: 500;
            color: #000;
            letter-spacing: 1px;
        }

        /* Bagian Kanan: Kartu Login */
        .login-card {
            background-color: white;
            padding: 40px;
            border-radius: 20px;
            width: 560px; /* diperlebar */
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            margin-top: 40px; /* turun sedikit */
        }

        .login-header {
            font-size: 24px;
            font-weight: 500;
            margin-bottom: 30px;
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-input {
            width: 100%;
            padding: 15px;
            background-color: #DCDCDC; /* Warna abu-abu input */
            border: none;
            border-radius: 8px;
            font-size: 14px;
            color: #333;
            outline: none;
        }

        .form-input::placeholder {
            color: #555;
            font-weight: 500;
        }

        .btn-login {
            width: 100%;
            padding: 15px;
            background-color: #FF7A7A; /* Tombol Pink/Salmon */
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            text-transform: uppercase;
            box-shadow: 0 4px 10px rgba(255, 122, 122, 0.4);
            transition: background 0.3s;
            margin-top: 10px;
        }

        .btn-login:hover {
            background-color: #ff6363;
        }

        .card-footer {
            margin-top: 30px;
            text-align: center;
            font-size: 13px;
            color: #333;
        }

        .card-footer a {
            color: #FF7A7A;
            text-decoration: none;
            font-weight: 500;
        }

        .card-footer a:hover {
            text-decoration: underline;
        }

        /* Responsif untuk Layar Kecil (HP) */
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                gap: 40px;
                padding: 20px;
                max-width: 100%;
            }
            .login-card { margin-top: 20px; }
            
            .left-branding {
                margin-top: 20px;
            }
            
            .big-icon {
                font-size: 80px;
            }
            
            .brand-title {
                font-size: 28px;
            }

            .login-card {
                width: 100%;
            }
            
            nav {
                padding: 15px 20px;
            }
        }
    </style>
</head>
<body>

    <nav>
        <div class="nav-logo">
            <i class="fas fa-shopping-cart"></i>
            <span>CampusMarket</span>
        </div>
        <div class="nav-login-text">Masuk</div>
    </nav>

    <div class="container">
        
        <div class="left-branding">
            <i class="fas fa-shopping-cart big-icon"></i>
            <h1 class="brand-title">CampusMarket</h1>
        </div>

        <div class="login-card">
            <h2 class="login-header">Log in</h2>
            
            <form id="loginForm">
                <div class="form-group">
                    <input type="email" class="form-input" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-input" placeholder="Password" required>
                </div>
                
                <button type="submit" class="btn-login">LOG IN</button>
            </form>

            <div class="card-footer">
                No account yet? <a href="#">Register now</a>
            </div>
        </div>

    </div>

    <script>
        // Javascript Sederhana untuk menangani submit form
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault(); // Mencegah halaman reload
            
            // Ambil nilai input (hanya contoh)
            const email = document.querySelector('input[type="email"]').value;
            const password = document.querySelector('input[type="password"]').value;

            if(email && password) {
                alert(`Login Berhasil!\nEmail: ${email}`);
                // Di sini kamu bisa menambahkan logika fetch API ke backend
            } else {
                alert('Mohon isi semua kolom!');
            }
        });
    </script>

    {{-- Scroll to Top Button --}}
    {{-- Extend pink area above footer --}}
    <div class="w-full bg-gradient-to-b from-[#FF9494] via-[#FFD1D1] to-[#FFEBEB] h-64 md:h-96 lg:h-[560px]"></div>

    {{-- FOOTER: same as Home --}}
    <x-footer />

    <button id="scrollToTop" class="fixed bottom-6 right-6 bg-pink-500 text-white w-10 h-10 rounded-full shadow-lg flex items-center justify-center translate-y-20 opacity-0 transition-all duration-300 hover:bg-pink-600 hover:-translate-y-1 z-40">
        <i class="fa-solid fa-arrow-up"></i>
    </button>

    {{-- JAVASCRIPT LOGIC --}}
    <script>
        // 1. Animation on Scroll
        const observerOptions = {
            root: null,
            rootMargin: '0px',
            threshold: 0.1
        };

        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target); 
                }
            });
        }, observerOptions);

        document.querySelectorAll('.animate-on-scroll').forEach(el => {
            observer.observe(el);
        });

        // 2. Scroll to Top
        const scrollBtn = document.getElementById('scrollToTop');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 300) {
                scrollBtn.classList.remove('translate-y-20', 'opacity-0');
            } else {
                scrollBtn.classList.add('translate-y-20', 'opacity-0');
            }
        });

        scrollBtn.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });

        // 3. Navbar Shadow
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 10) {
                navbar.classList.add('shadow-md');
            } else {
                navbar.classList.remove('shadow-md');
            }
        });
    </script>
</body>
</html>