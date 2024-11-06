<?php

    $to = "rahmaderasugiarto@gmail.com";
    $from = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $name = htmlspecialchars($_POST['name']);
    $subject = htmlspecialchars($_POST['subject']);
    $cmessage = htmlspecialchars($_POST['message']);

    // Pastikan semua variabel yang diperlukan telah diisi
    if (!$from || empty($name) || empty($subject) || empty($cmessage)) {
        echo "Mohon lengkapi semua field yang dibutuhkan.";
        exit;
    }

    // Pengaturan headers email
    $headers = "From: " . $from . "\r\n";
    $headers .= "Reply-To: " . $from . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    $subject_email = "You have a message from your Bitmap Photography.";

    // Struktur pesan email
    $body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>Express Mail</title></head><body>";
    $body .= "<table style='width: 100%;'>";
    $body .= "<tr><td><strong>Name:</strong> {$name}</td></tr>";
    $body .= "<tr><td><strong>Email:</strong> {$from}</td></tr>";
    $body .= "<tr><td><strong>Subject:</strong> {$subject}</td></tr>";
    $body .= "<tr><td><strong>Message:</strong><br>{$cmessage}</td></tr>";
    $body .= "</table>";
    $body .= "</body></html>";

    // Mengirim email
    $send = mail($to, $subject_email, $body, $headers);

    if ($send) {
        echo "Pesan berhasil dikirim!";
    } else {
        echo "Pesan gagal dikirim. Coba lagi nanti.";
    }
?>
