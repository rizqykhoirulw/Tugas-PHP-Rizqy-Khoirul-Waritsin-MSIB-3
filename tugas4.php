<?php 
    class Pegawai{
        public $nip, $nama, $jabatan, $agama, $status;
        protected $gapok, $tunjab, $tunkel, $zakat, $gator, $gaber;
        static $jmlh_pegawai = 0;
        const PEGAWAI = "Data Pegawai Perusahaan X";

        public function __construct($nip, $nama, $jabatan, $agama, $status)
        {
            $this->nip = $nip;
            $this->nama = $nama;
            $this->jabatan = $jabatan;
            $this->agama = $agama;
            $this->status = $status;
            self ::$jmlh_pegawai ++;
        }

        public function setGajiPokok(){
            switch($this->jabatan){
                case 'Manajer':
                    $gapok = 15000000;
                    break;
                case 'Asisten':
                     $gapok = 10000000;
                    break;
                case 'Kabag':
                     $gapok = 7000000;
                    break;
                case 'Staff':
                     $gapok = 4000000;
                    break;
                default:
                    $gapok = "Tidak ada data";
                    break;
                }
                return $gapok;
        }

        public function setTunjab (){
            $tunjab = 20/100 * $this->setGajiPokok();
            return $tunjab;
        }

        public function setTunkel(){
            $tunkel = ( $this->status == "Menikah") ? 10/100 * $this->setGajiPokok() : 0;
            return $tunkel;
        }

        public function setGator(){
            $gator =   $this->setGajiPokok() +   $this->setTunjab() +  $this->setTunkel();
            return $gator;
        }

        public function setZakatProfesi(){
            $zakat = ( $this->agama == "Islam" &&  $this->setGator() >= 6000000) ? 2.5/100 * $this->setGajiPokok() : 0;
            return $zakat;
        }

        public function setGaber(){
            $gaber =  $this->setGator() - $this->setZakatProfesi();
            return $gaber;
        }

        public function cetak(){
            echo '<b><u>'.self::PEGAWAI.'</u></b>'; 
            echo '<br/>Nama: '.$this->nama;
            echo '<br/>NIP: '.$this->nip;
            echo '<br/>Jabatan: '.$this->jabatan;
            echo '<br/>Agama: '.$this->agama;
            echo '<br/>Status: '.$this->status;
            echo '<br/>Gaji Pokok: Rp. '.number_format($this->setGajiPokok(), 0, ',', '.');
            echo '<br/>Tunjangan Jabatan: Rp. '.number_format($this->setTunjab (), 0, ',', '.');
            echo '<br/>Tunjangan Keluarga: Rp. '.number_format($this->setTunkel(), 0, ',', '.'); 
            echo '<br/>Zakat: Rp. '.number_format($this->setZakatProfesi(), 0, ',', '.');
            echo '<br/>Gaji Bersih: Rp.'.number_format($this->setGaber(), 0, ',', '.');
            echo '<hr/>';
            // echo '<br/>Saldo: Rp. '.number_format($this->saldo, 0, ',', '.');
        }
    }

    $p1 = new Pegawai(11111, 'Rizqy', 'Manajer', 'Islam', 'Belum Menikah');
    $p2 = new Pegawai(22222, 'Rehan', 'Asisten', 'Hindu', 'Menikah');
    $p3 = new Pegawai(33333, 'Rizal', 'Kabag', 'Kristen', 'Belum Menikah');
    $p4 = new Pegawai(44444, 'Andy', 'Asisten', 'Islam', 'Menikah');
    $p5 = new Pegawai(55555, 'Dany', 'Staff', 'Islam', 'Belum Menikah');

    echo '<h3 align="center">'.Pegawai::PEGAWAI.'</h3>';
    $p1->cetak();
    $p2->cetak();
    $p3->cetak();
    $p4->cetak();
    $p5->cetak();
    echo 'Jumlah Data : '.Pegawai::$jmlh_pegawai.' data';

?>