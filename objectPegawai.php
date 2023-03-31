<?php
    require 'Pegawai.php';

    $pegawai1 = new pegawai('01101', 'Andi', 'Manager', 'Islam', 'Menikah');
    $pegawai2 = new pegawai('01102', 'Budi', 'Asisten Manager', 'Islam', 'Belum Menikah');
    $pegawai3 = new pegawai('01103', 'Jamal', 'Kepala Bagian', 'Non Muslim', 'Belum Menikah');
    $pegawai4 = new pegawai('01104', 'Lukman', 'Staff', 'Islam', 'Belum Menikah');
    $pegawai5 = new pegawai('01105', 'Rini', 'Staff', 'Non Muslim', 'Menikah');

    $ar_pegawai = [$pegawai1, $pegawai2, $pegawai3, $pegawai4, $pegawai5];

    foreach($ar_pegawai as $pegawai){
        $pegawai -> cetak();
    }
?>