<?php
$m1 = ['NIM'=> 20081010082, 'Nama'=> 'Rizqy', 'Nilai'=>90];
$m2 = ['NIM'=> 20081010083, 'Nama'=> 'Rehan', 'Nilai'=>85];
$m3 = ['NIM'=> 20081010084, 'Nama'=> 'Rizal', 'Nilai'=>78];
$m4 = ['NIM'=> 20081010085, 'Nama'=> 'Arip', 'Nilai'=>57];
$m5 = ['NIM'=> 20081010086, 'Nama'=> 'Doni', 'Nilai'=>63];
$m6 = ['NIM'=> 20081010087, 'Nama'=> 'Eka', 'Nilai'=>47];
$m7 = ['NIM'=> 20081010088, 'Nama'=> 'Faris', 'Nilai'=>80];
$m8 = ['NIM'=> 20081010089, 'Nama'=> 'Galih', 'Nilai'=>67];
$m9 = ['NIM'=> 20081010090, 'Nama'=> 'Halim', 'Nilai'=>70];
$m10 = ['NIM'=> 20081010091, 'Nama'=> 'Lena', 'Nilai'=>95];


$murid=[$m1, $m2, $m3, $m4, $m5, $m6, $m7, $m8, $m9, $m10];

$header = ['No', 'NIM', 'Nama', 'Nilai', 'Keterangan', 'Grade', 'Predikat'];
$no = 1;

$jmlh_murid = count($murid);
$kolom_nilai = array_column($murid, 'Nilai');
$nilai_tinggi = max($kolom_nilai);
$nilai_rendah = min($kolom_nilai);
$jmlh_nilai = array_sum($kolom_nilai);
$nilai_rata =  $jmlh_nilai/$jmlh_murid;
$hasil = [  
            'Jumlah Murid' => $jmlh_murid, 
            'Nilai Tertinggi' => $nilai_tinggi, 
            'Nilai Terendah' => $nilai_rendah, 
            'Nilai Rata-Rata' => $nilai_rata
        ]
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body>

    <div class="container-lg">
        <h1 class="text-center my-3">Tabel Data Siswa</h1>
        <table class="table table-striped text-center my-3">
            <thead>
                <tr>
                    <?php foreach ($header as $judul) : ?>
                        <th> <?= $judul ?> </th>
                    <?php endforeach ?>
                </tr>
            </thead>
            <tbody class="table-group-divider">
            <?php foreach ($murid as $data){?>
                    <tr>
                        <th> <?= $no; ?> </th>
                        <td> <?= $data['NIM']; ?> </td>
                        <td> <?= $data['Nama']; ?> </td>
                        <td> <?= $data['Nilai']; ?> </td>
                        <?php $keterangan = ($data['Nilai'] >= 60)? "Lulus" : "Tidak Lulus"?>
                        <td> <?= $keterangan; ?> </td>

                        <?php 
                            
                            if ($data['Nilai']>=92 && $data['Nilai']<=100) {
                                $grade = "A";
                            } elseif ($data['Nilai']>=78 && $data['Nilai']<92) {
                                $grade = "B";
                            } elseif ($data['Nilai']>=65 && $data['Nilai']<78) {
                                $grade = "C";
                            } elseif ($data['Nilai']>=50 && $data['Nilai']<65) {
                                $grade = "D";
                            } elseif ($data['Nilai']>=0 && $data['Nilai']<50) {
                                $grade = "E";
                            } else {
                                $grade = "Tidak Ada";
                            }
                        ?>

                        <td> <?= $grade; ?> </td>

                        <?php 
                            switch ($grade) {
                                case 'A':
                                    $predikat = "Sangat Memuaskan";
                                    break;
                                case 'B':
                                    $predikat = "Memuaskan";
                                    break;
                                case 'C':
                                    $predikat = "Cukup";
                                    break;
                                case 'D':
                                    $predikat = "Kurang";
                                    break;
                                case 'E':
                                    $predikat = "Buruk";
                                    break;
                                default:
                                    $predikat = "Tidak Ada";
                                    break;
                            }
                        ?>

                        <td> <?= $predikat; ?> </td>
                    </tr>
                    <?php $no++; } ?>
            </tbody>
            <tfoot class="text-center">
                <?php foreach ($hasil as $index => $isi): ?>
                    <tr> 
                        <th colspan=5> <?= $index?></th>
                        <th colspan=2> <?= $isi?></th>
                    </tr>
                <?php endforeach ?>
            </tfoot>

        </table>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>
