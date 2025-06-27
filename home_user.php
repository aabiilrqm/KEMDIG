<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>GardaBook - Home</title>
    <link rel="icon" type="image/png" href="logo-buku.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="logo-buku.png">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(to right, #f8fafc, #e2e8f0);
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }

        /* Animasi buku-buku beterbangan */
        .floating-books {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 1;
        }

        .book {
            position: absolute;
            font-size: 20px;
            color: rgba(59, 130, 246, 0.3);
            animation: floatBooks 15s linear infinite;
        }

        .book:nth-child(1) { left: 10%; animation-delay: 0s; font-size: 18px; }
        .book:nth-child(2) { left: 20%; animation-delay: 2s; font-size: 22px; }
        .book:nth-child(3) { left: 30%; animation-delay: 4s; font-size: 16px; }
        .book:nth-child(4) { left: 40%; animation-delay: 6s; font-size: 24px; }
        .book:nth-child(5) { left: 50%; animation-delay: 8s; font-size: 20px; }
        .book:nth-child(6) { left: 60%; animation-delay: 10s; font-size: 18px; }
        .book:nth-child(7) { left: 70%; animation-delay: 12s; font-size: 26px; }
        .book:nth-child(8) { left: 80%; animation-delay: 14s; font-size: 16px; }
        .book:nth-child(9) { left: 90%; animation-delay: 1s; font-size: 22px; }
        .book:nth-child(10) { left: 15%; animation-delay: 3s; font-size: 20px; }

        @keyframes floatBooks {
            0% {
                transform: translateY(100vh) rotate(0deg);
                opacity: 0;
            }
            10% {
                opacity: 1;
            }
            90% {
                opacity: 1;
            }
            100% {
                transform: translateY(-100px) rotate(360deg);
                opacity: 0;
            }
        }

        /* Animasi rak buku di background */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                linear-gradient(90deg, rgba(156, 163, 175, 0.1) 1px, transparent 1px),
                linear-gradient(rgba(156, 163, 175, 0.1) 1px, transparent 1px);
            background-size: 100px 100px;
            animation: bookshelf 20s linear infinite;
            pointer-events: none;
            z-index: 0;
        }

        @keyframes bookshelf {
            0% {
                background-position: 0px 0px, 0px 0px;
            }
            100% {
                background-position: 100px 100px, 100px 100px;
            }
        }

        @keyframes sparkle {
            0% {
                opacity: 0.3;
                transform: scale(1);
            }
            50% {
                opacity: 0.8;
                transform: scale(1.1);
            }
            100% {
                opacity: 0.3;
                transform: scale(1);
            }
        }

        .container {
            position: relative;
            z-index: 10;
        }

        .navbar-custom {
            border-radius: 16px;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            background-color: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            padding: 15px 30px;
            margin-top: 20px;
        }

        .navbar-brand {
            font-weight: 600;
            color: #1e293b !important;
            font-size: 1.25rem;
        }

        .nav-link {
            font-weight: 500;
            color: #64748b !important;
            transition: color 0.2s ease;
            border-radius: 8px;
            padding: 8px 16px !important;
            text-decoration: none !important;
        }

        .nav-link:hover {
            color: #1e293b !important;
            background-color: rgba(30, 41, 59, 0.05);
        }

        .nav-link.active {
            color: #1e293b !important;
            font-weight: 600;
            background-color: rgba(30, 41, 59, 0.05);
        }

        .btn-modern {
            font-weight: 500;
            font-size: 0.875rem;
            padding: 8px 16px;
            border-radius: 12px;
            border: none;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            color: white;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);
            transition: 0.2s ease;
        }

        .btn-modern:hover {
            background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 8px 12px rgba(0,0,0,0.1);
        }

        .btn-sm {
            font-size: 0.8rem;
            padding: 6px 12px;
            border-radius: 10px;
        }

        .hero-section {
            padding: 100px 20px;
            text-align: center;
        }

        .hero-title {
            font-size: 2.8rem;
            font-weight: 600;
            color: #1e293b;
        }

        .hero-subtitle {
            font-size: 1.2rem;
            color: #475569;
            margin-top: 10px;
            margin-bottom: 30px;
        }

        .btn-primary-modern {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            color: white;
            padding: 12px 24px;
            font-size: 1rem;
            border: none;
            border-radius: 12px;
            transition: all 0.3s ease;
            text-decoration: none !important;
            display: inline-block;
        }

        .btn-primary-modern:hover {
            background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(0,0,0,0.1);
        }

        .features {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
            margin-top: 50px;
        }

        .feature-card {
    background: #ffffff;
    border-radius: 16px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    padding: 30px;
    width: 300px;
    text-align: center;
    transition: all 0.3s ease-in-out;
    transform: translateY(0);
    }

    .feature-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 24px rgba(0, 0, 0, 0.08);
    }   


        .feature-icon {
            font-size: 2rem;
            color: #3b82f6;
            margin-bottom: 10px;
        }

        .feature-title {
            font-weight: 600;
            font-size: 1.2rem;
            margin-bottom: 8px;
        }

        .feature-desc {
            font-size: 0.9rem;
            color: #64748b;
        }
    </style>
</head>
<body>
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-custom mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="home.php"><i class="bi bi-book-half"></i> GardaBook</a>
            <div class="collapse navbar-collapse justify-content-center">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" href="home_user.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="perpustakaan_user.php">Perpustakaan</a></li>
                    <li class="nav-item"><a class="nav-link" href="layanan_user.php">Layanan</a></li>
                    <li class="nav-item"><a class="nav-link" href="kontak_user.php">Kontak</a></li>
                </ul>
            </div>
            <div class="d-flex align-items-center gap-2">
                <?php if (isset($_SESSION['admin'])): ?>
                    <a href="logout.php" class="btn-modern btn-sm"><i class="bi bi-box-arrow-right"></i> Logout</a>
                <?php else: ?>
                    <a href="login.php" class="btn btn-primary btn-sm"><i class="bi bi-box-arrow-in-right"></i> Login</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <div class="hero-section">
        <h1 class="hero-title">Selamat Datang di GardaBook</h1>
        <p class="hero-subtitle">Kelola koleksi buku digital Anda dengan mudah dan aman</p>
        <a href="perpustakaan_user.php" class="btn-primary-modern">Buka Perpustakaan</a>

        <div class="features mt-5">
            <div class="feature-card">
                <div class="feature-icon"><i class="bi bi-book"></i></div>
                <div class="feature-title">Manajemen Buku</div>
                <div class="feature-desc">Tambah, edit, dan hapus buku dengan mudah melalui panel admin.</div>
            </div>
            <div class="feature-card">
                <div class="feature-icon"><i class="bi bi-shield-lock"></i></div>
                <div class="feature-title">Keamanan Data</div>
                <div class="feature-desc">Dilengkapi autentikasi & enkripsi untuk keamanan informasi.</div>
            </div>
            <div class="feature-card">
                <div class="feature-icon"><i class="bi bi-cloud-arrow-up"></i></div>
                <div class="feature-title">Akses Mudah</div>
                <div class="feature-desc">Dapat diakses kapan saja dari perangkat apapun dengan internet.</div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>