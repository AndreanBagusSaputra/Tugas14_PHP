<?php
    class pegawai{
    protected $nip;
    public $nama;
    private $jabatan;
    private $agama;
    private $status;
    static $jml = 0;
    const PT = 'PT. HTP Indonesia';

    public function __construct($nip, $nama, $jabatan, $agama, $status){
        $this -> nip = $nip;
        $this -> nama = $nama;
        $this -> jabatan = $jabatan;
        $this -> agama = $agama;
        $this -> status = $status;
        self :: $jml++;
    }

    public function setGajiPokok (){
        switch($this->jabatan){
            case 'Manager' : $gapok = 15000000; break;
            case 'Asisten Manager' : $gapok = 10000000; break;
            case 'Kepala Bagian' : $gapok = 7000000; break;
            case 'Staff' : $gapok = 5000000; break;
            default : $gapok = 0;
        }
        return $gapok;
    }

    public function SetTunjab(){
        $gajiPokok = $this->setGajiPokok();
        $tunjanganJabatan = 0.2 * $gajiPokok;
        return $tunjanganJabatan;
    }

    public function SetTunkel(){
        $gajiPokok = $this->setGajiPokok();
        $tunjanganKeluarga = ($this->status == 'Menikah') ? 0.1 * $gajiPokok : 0;
        return $tunjanganKeluarga;
    }

    public function SetZakatProfesi(){
        $gajiKotor = $this->setGajiKotor();
        if($this->agama == 'Islam' && $gajiKotor >= 6000000){
            $zakat = 0.025 * $this->setGajiPokok();
        }
        return $zakat;
    }

    public function setGajiKotor(){
        $gajiPokok = $this->setGajiPokok();
        $tunjanganJabatan = $this->SetTunjab();
        $tunjanganKeluarga = $this->SetTunkel();
        $gajiKotor = $gajiPokok + $tunjanganJabatan + $tunjanganKeluarga;
        return $gajiKotor;
    }

    public function cetak(){
        $gajiPokok = $this->setGajiPokok();
        $tunjanganJabatan = $this->SetTunjab();
        $tunjanganKeluarga = $this->SetTunkel();
        $gajiKotor = $this->setGajiKotor();
        $zakat = $this->SetZakatProfesi();
        $gajiBersih = $gajiKotor - $zakat;

        echo 'NIP Pegawai: '. $this -> nip;
        echo '<br> Nama Pegawai: '. $this -> nama;
        echo '<br> Jabatan: '. $this -> jabatan;
        echo '<br> Agama: '. $this -> agama;
        echo '<br> Status: '. $this -> status;
        echo '<br> Gaji Pokok: Rp. '. number_format($gajiPokok,0,',','.');
        echo '<br> Tunjangan Jabatan: Rp. '. number_format($tunjanganJabatan,0,',','.');
        echo '<br> Tunjangan Kekuarga: Rp. '. number_format($tunjanganKeluarga,0,',','.');
        echo '<br> Zakat: Rp. '. number_format($zakat,0,',','.');
        echo '<br> Gaji Bersih: Rp. '. number_format($gajiBersih,0,',','.');
        echo '<hr>';
    }
}

?>