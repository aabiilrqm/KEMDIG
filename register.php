<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO user (nama, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nama, $email, $password);

    if ($stmt->execute()) {
        header("Location: login.php");
        exit;
    } else {
        $error = "Gagal mendaftar. Mungkin email sudah terdaftar.";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register - GardaBook</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #1e293b;
            --primary-light: #334155;
            --accent-blue: #3b82f6;
            --accent-green: #10b981;
            --accent-red: #ef4444;
            --accent-yellow: #f59e0b;
            --bg-light: #f8fafc;
            --text-muted: #64748b;
            --border-radius: 16px;
            --shadow-soft: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-medium: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --shadow-large: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
        }

        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="books" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse"><rect width="3" height="15" x="2" y="2" fill="rgba(59,130,246,0.1)" rx="0.5"/><rect width="3" height="15" x="6" y="2" fill="rgba(16,185,129,0.1)" rx="0.5"/><rect width="3" height="15" x="10" y="2" fill="rgba(245,158,11,0.1)" rx="0.5"/><rect width="3" height="15" x="14" y="2" fill="rgba(239,68,68,0.1)" rx="0.5"/></pattern></defs><rect width="100" height="100" fill="url(%23books)"/></svg>');
            opacity: 0.3;
            z-index: -2;
        }

        .register-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-large);
            border: 1px solid rgba(255, 255, 255, 0.2);
            padding: 40px;
            width: 100%;
            max-width: 450px;
            position: relative;
            overflow: hidden;
        }

        .register-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--accent-blue), var(--accent-green), var(--accent-yellow), var(--accent-red));
            border-radius: var(--border-radius) var(--border-radius) 0 0;
        }

        .register-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .register-logo {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            margin: 0 auto 20px;
            padding: 16px 24px;
            background: rgba(30, 41, 59, 0.05);
            border-radius: 12px;
            border: 1px solid rgba(30, 41, 59, 0.1);
        }

        .register-logo-icon {
            width: 32px;
            height: 32px;
            background: var(--primary-color);
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .register-logo-icon::before {
            content: '';
            position: absolute;
            width: 18px;
            height: 22px;
            background: white;
            border-radius: 2px;
            border-left: 2px solid var(--primary-color);
        }

        .register-logo-icon::after {
            content: '';
            position: absolute;
            width: 14px;
            height: 18px;
            background: var(--primary-color);
            border-radius: 1px;
            z-index: 1;
        }

        .register-logo-text {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--primary-color);
        }

        .register-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 8px;
        }

        .register-subtitle {
            color: var(--text-muted);
            font-size: 0.875rem;
        }

        .form-group {
            margin-bottom: 20px;
            position: relative;
        }

        .password-group {
            position: relative;
        }

        .password-toggle {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: var(--text-muted);
            cursor: pointer;
            font-size: 1.1rem;
            z-index: 3;
            padding: 4px;
            border-radius: 4px;
            transition: all 0.2s ease;
        }

        .password-toggle:hover {
            color: var(--primary-color);
            background: rgba(30, 41, 59, 0.05);
        }

        .form-control-modern {
            width: 100%;
            padding: 14px 16px 14px 48px;
            border: 2px solid rgba(30, 41, 59, 0.1);
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            font-size: 0.875rem;
            transition: all 0.3s ease;
            font-family: 'Inter', sans-serif;
        }

        .form-control-modern.has-toggle {
            padding-right: 48px;
        }

        .form-control-modern:focus {
            outline: none;
            border-color: var(--accent-blue);
            background: rgba(255, 255, 255, 0.95);
            transform: translateY(-2px);
            box-shadow: var(--shadow-medium);
        }

        .input-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted);
            font-size: 1.1rem;
            z-index: 2;
        }

        .btn-register {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, var(--accent-green) 0%, #059669 100%);
            border: none;
            border-radius: 12px;
            color: white;
            font-weight: 600;
            font-size: 0.875rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            cursor: pointer;
            box-shadow: var(--shadow-soft);
            margin-bottom: 20px;
        }

        .btn-register::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .btn-register:hover {
            background: linear-gradient(135deg, #059669 0%, #047857 100%);
            transform: translateY(-2px);
            box-shadow: var(--shadow-medium);
        }

        .btn-register:hover::before {
            left: 100%;
        }

        .btn-register:active {
            transform: translateY(0);
        }

        .alert-modern {
            background: linear-gradient(135deg, var(--accent-red) 0%, #dc2626 100%);
            color: white;
            border: none;
            border-radius: 12px;
            padding: 12px 16px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.875rem;
            box-shadow: var(--shadow-soft);
        }

        .login-link {
            text-align: center;
            padding: 16px;
            background: rgba(59, 130, 246, 0.05);
            border-radius: 12px;
            border: 1px solid rgba(59, 130, 246, 0.1);
        }

        .login-link-text {
            color: var(--text-muted);
            font-size: 0.875rem;
            margin: 0;
        }

        .login-link a {
            color: var(--accent-blue);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .login-link a:hover {
            color: #2563eb;
            text-decoration: underline;
        }

        .floating-shapes {
            position: fixed;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -1;
        }

        .shape {
            position: absolute;
            opacity: 0.1;
            animation: float 20s infinite linear;
        }

        .shape:nth-child(1) {
            top: 15%;
            left: 8%;
            width: 60px;
            height: 80px;
            background: linear-gradient(45deg, var(--accent-blue), #2563eb);
            border-radius: 4px;
            position: relative;
            animation-delay: 0s;
        }

        .shape:nth-child(1)::before {
            content: '';
            position: absolute;
            top: 8px;
            left: 8px;
            right: 8px;
            height: 2px;
            background: rgba(255,255,255,0.3);
            border-radius: 1px;
        }

        .shape:nth-child(2) {
            top: 60%;
            right: 12%;
            width: 50px;
            height: 70px;
            background: linear-gradient(45deg, var(--accent-green), #059669);
            border-radius: 4px;
            position: relative;
            animation-delay: 5s;
        }

        .shape:nth-child(2)::before {
            content: '';
            position: absolute;
            top: 6px;
            left: 6px;
            right: 6px;
            height: 2px;
            background: rgba(255,255,255,0.3);
            border-radius: 1px;
        }

        .shape:nth-child(3) {
            bottom: 25%;
            left: 15%;
            width: 55px;
            height: 75px;
            background: linear-gradient(45deg, var(--accent-yellow), #d97706);
            border-radius: 4px;
            position: relative;
            animation-delay: 10s;
        }

        .shape:nth-child(3)::before {
            content: '';
            position: absolute;
            top: 7px;
            left: 7px;
            right: 7px;
            height: 2px;
            background: rgba(255,255,255,0.3);
            border-radius: 1px;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0px) rotate(0deg);
            }
            50% {
                transform: translateY(-20px) rotate(180deg);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .register-container {
            animation: fadeInUp 0.6s ease forwards;
        }

        /* Responsive */
        @media (max-width: 480px) {
            .register-container {
                padding: 30px 20px;
                margin: 0 10px;
            }
            
            .register-title {
                font-size: 1.25rem;
            }
        }
    </style>
</head>
<body>
    <div class="floating-shapes">
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <div class="register-container">
        <div class="register-header">
            <div class="register-logo">
                <div class="register-logo-icon"></div>
                <div class="register-logo-text">GardaBook</div>
            </div>
            <h2 class="register-title">Buat Akun Baru</h2>
            <p class="register-subtitle">Daftar untuk mengakses semua fitur</p>
        </div>

        <?php if (isset($error)): ?>
            <div class="alert-modern">
                <i class="bi bi-exclamation-triangle"></i>
                <?= $error ?>
            </div>
        <?php endif; ?>

        <form action="register.php" method="POST">
            <div class="form-group">
                <i class="bi bi-person input-icon"></i>
                <input type="text" name="nama" class="form-control-modern" placeholder="Nama Lengkap" required>
            </div>

            <div class="form-group">
                <i class="bi bi-envelope input-icon"></i>
                <input type="email" name="email" class="form-control-modern" placeholder="Email" required>
            </div>

            <div class="form-group password-group">
                <i class="bi bi-lock input-icon"></i>
                <input type="password" name="password" id="password" class="form-control-modern has-toggle" placeholder="Password" required>
                <button type="button" class="password-toggle" onclick="togglePassword()">
                    <i class="bi bi-eye" id="toggleIcon"></i>
                </button>
            </div>

            <button type="submit" class="btn-register">
                <i class="bi bi-person-plus"></i>
                Daftar Sekarang
            </button>
        </form>

        <div class="login-link">
            <p class="login-link-text">
                Sudah punya akun? <a href="login.php">Masuk di sini</a>
            </p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.className = 'bi bi-eye-slash';
            } else {
                passwordInput.type = 'password'; 
                toggleIcon.className = 'bi bi-eye';
            }
        }
    </script>
</body>
</html>