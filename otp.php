<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input_otp = $_POST['otp'];

    if ($input_otp == $_SESSION['otp']) {
        $_SESSION['login'] = true;
        header("Location: home.php");
        exit;
    } else {
        $error = "Kode OTP salah!";
    }
}
?>

<form method="POST">
    <p>Kode OTP telah dikirim ke email: <strong><?= $_SESSION['email'] ?></strong></p>
    <input type="text" name="otp" placeholder="Masukkan Kode OTP" required>
    <button type="submit">Verifikasi OTP</button>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
</form>
