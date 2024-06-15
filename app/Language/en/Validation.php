<?php
// Pesan Kesalahan dalam Bahasa Indonesia
return [
    // Pesan Inti
    'noRuleSets'      => 'Tidak ada set aturan yang ditentukan dalam konfigurasi Validasi.',
    'ruleNotFound'    => '"{0}" bukan aturan yang valid.',
    'groupNotFound'   => '"{0}" bukan kelompok aturan validasi.',
    'groupNotArray'   => 'Kelompok aturan "{0}" harus berupa array.',
    'invalidTemplate' => '"{0}" bukan template Validasi yang valid.',

    // Pesan Aturan
    'alpha'                 => 'Kolom {field} hanya boleh mengandung karakter alfabet.',
    'alpha_dash'            => 'Kolom {field} hanya boleh mengandung karakter alfanumerik, garis bawah, dan tanda hubung.',
    'alpha_numeric'         => 'Kolom {field} hanya boleh mengandung karakter alfanumerik.',
    'alpha_numeric_punct'   => 'Kolom {field} hanya boleh mengandung karakter alfanumerik, spasi, dan karakter ~ ! # $ % & * - _ + = | : .',
    'alpha_numeric_space'   => 'Kolom {field} hanya boleh mengandung karakter alfanumerik dan spasi.',
    'alpha_space'           => 'Kolom {field} hanya boleh mengandung karakter alfabet dan spasi.',
    'decimal'               => 'Kolom {field} harus mengandung angka desimal.',
    'differs'               => 'Kolom {field} harus berbeda dari kolom {param}.',
    'equals'                => 'Kolom {field} harus sama dengan: {param}.',
    'exact_length'          => 'Kolom {field} harus tepat {param} karakter panjangnya.',
    'greater_than'          => 'Kolom {field} harus mengandung angka yang lebih besar dari {param}.',
    'greater_than_equal_to' => 'Kolom {field} harus mengandung angka yang lebih besar dari atau sama dengan {param}.',
    'hex'                   => 'Kolom {field} hanya boleh mengandung karakter heksadesimal.',
    'in_list'               => 'Kolom {field} harus salah satu dari: {param}.',
    'integer'               => 'Kolom {field} harus mengandung bilangan bulat.',
    'is_natural'            => 'Kolom {field} hanya boleh mengandung digit.',
    'is_natural_no_zero'    => 'Kolom {field} hanya boleh mengandung digit dan harus lebih besar dari nol.',
    'is_not_unique'         => 'Kolom {field} harus mengandung nilai yang sudah ada sebelumnya dalam database.',
    'is_unique'             => 'Kolom {field} harus mengandung data yang belum terdaftar.',
    'less_than'             => 'Kolom {field} harus mengandung angka yang lebih kecil dari {param}.',
    'less_than_equal_to'    => 'Kolom {field} harus mengandung angka yang lebih kecil dari atau sama dengan {param}.',
    'matches'               => 'Kolom {field} tidak cocok dengan kolom {param}.',
    'max_length'            => 'Kolom {field} tidak boleh melebihi {param} karakter panjangnya.',
    'min_length'            => 'Kolom {field} harus setidaknya {param} karakter panjangnya.',
    'not_equals'            => 'Kolom {field} tidak boleh: {param}.',
    'not_in_list'           => 'Kolom {field} tidak boleh salah satu dari: {param}.',
    'numeric'               => 'Kolom {field} hanya boleh mengandung angka.',
    'regex_match'           => 'Kolom {field} tidak dalam format yang benar.',
    'required'              => 'Kolom {field} harus diisi!',
    'required_with'         => 'Kolom {field} diperlukan ketika {param} ada.',
    'required_without'      => 'Kolom {field} diperlukan ketika {param} tidak ada.',
    'string'                => 'Kolom {field} harus menjadi string yang valid.',
    'timezone'              => 'Kolom {field} harus menjadi zona waktu yang valid.',
    'valid_base64'          => 'Kolom {field} harus menjadi string base64 yang valid.',
    'valid_email'           => 'Kolom {field} harus mengandung alamat email yang valid.',
    'valid_emails'          => 'Kolom {field} harus mengandung semua alamat email yang valid.',
    'valid_ip'              => 'Kolom {field} harus mengandung alamat IP yang valid.',
    'valid_url'             => 'Kolom {field} harus mengandung URL yang valid.',
    'valid_url_strict'      => 'Kolom {field} harus mengandung URL yang valid.',
    'valid_date'            => 'Kolom {field} harus mengandung tanggal yang valid.',
    'valid_json'            => 'Kolom {field} harus mengandung JSON yang valid.',

    // Kartu Kredit
    'valid_cc_num' => '{field} tidak terlihat sebagai nomor kartu kredit yang valid.',

    // Berkas
    'uploaded' => '{field} file yang diunggah harus valid.',
    'max_size' => '{field} terlalu besar untuk sebuah file.',
    'is_image' => '{field} bukan file gambar yang diunggah yang valid.',
    'mime_in'  => '{field} tidak memiliki tipe mime yang valid.',
    'ext_in'   => '{field} tidak memiliki ekstensi file yang valid.',
    'max_dims' => '{field} bukan gambar, atau terlalu lebar atau tinggi.',

    // Custome Validasi
    'indo_phone' => 'Masukkan Nomor Telephone dengan Benar 08 atau 062'
];
