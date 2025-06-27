<?php session_start(); ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Layanan - GardaBook</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f0f4f8, #e2e8f0);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
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

        .coming-soon-container {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 50px 20px;
        }

        .coming-soon {
            text-align: center;
            background: white;
            border-radius: 1rem;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.05);
            padding: 60px 40px;
            max-width: 600px;
        }

        .coming-soon h1 {
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 1rem;
            color: #1e293b;
        }

        .coming-soon p {
            color: #475569;
            font-size: 1.1rem;
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
    </style>
</head>
<body>
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-custom mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="home.php"><i class="bi bi-book-half"></i> GardaBook</a>
            <div class="collapse navbar-collapse justify-content-center">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="home.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="perpustakaan.php">Perpustakaan</a></li>
                    <li class="nav-item"><a class="nav-link active" href="layanan.php">Layanan</a></li>
                    <li class="nav-item"><a class="nav-link" href="kontak.php">Kontak</a></li>
                </ul>
            </div>
            <div class="d-flex align-items-center gap-2">
                <?php if (isset($_SESSION['admin'])): ?>
                   <a href="logout.php" class="btn btn-sm btn-modern btn-danger-modern"><i class="bi bi-box-arrow-right"></i> Logout</a>
                <?php else: ?>
                    <a href="login.php" class="btn btn-primary btn-sm"><i class="bi bi-box-arrow-in-right"></i> Login</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <div class="coming-soon-container">
        <div class="coming-soon">
            <h1><i class="bi bi-gear"></i> Coming Soon!!</h1>
            <p>Sedang dalam pengembangan. Nantikan fitur-fitur keren dari GardaBook! 🚀</p>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

