<?php

function mainDashboard(): string
{
    $url_dashboard = session('role') == 'admin' ? "/dashboard" : "/penyewa/dashboard";
    return $url_dashboard;
}

function DistanceDays($total_days, $from_date)
{

    if ($total_days == 0) {
        return false;
    }
    $dateNow = new DateTime();

    // Tanggal mulai yang diberikan
    $dateStart = date_create($from_date);
    if (!$dateStart) {
        // Jika format tanggal tidak valid
        return false;
    }

    // Hitung perbedaan antara kedua tanggal
    $interval = $dateNow->diff($dateStart);

    // Ambil jumlah hari dari selisih
    $days = $interval->days;

    // Bandingkan jumlah hari dengan total_days
    return $days < $total_days;
}


function MoneyFormatID($money): string
{
    return "Rp " . number_format($money, 0, ',', '.');
}

function PayBadge($status)
{
    if ($status == 'Pending') {
        return 'warning';
    } elseif ($status == 'Success') {
        return 'success';
    } elseif ($status == 'Cancel') {
        return 'danger';
    }
}
