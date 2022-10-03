<?php
require "lingkaran.php";
require "segitiga.php";
require "persegi.php";

$b1 = new Lingkaran (28);
$b2 = new Segitiga (4, 7);
$b3 = new Persegi (8, 19);

$header = ['No', 'Nama Bidang', 'Keterangan', 'Luas Bidang', 'Keliling Bidang'];
$isi = [$b1, $b2, $b3];

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
    <table class="table table-bordered">
        <thead>
            <tr>
                <?php foreach ($header as $head) : ?>
                <th><?= $head; ?></th>
                <?php endforeach ?>
            </tr>
        </thead>
        <tbody>
        <?php 
        $no = 1;
        foreach ($isi as $s) : ?>
            <tr>
                <th><?= $no ?></th>
                <td><?= $s->namaBidang()?></td>
                <td><?= $s->atribut()?></td>
                <td><?= $s->luasBidang()?></td>
                <td><?= $s->kelilingBidang()?></td>
            </tr>
            <?php $no++; endforeach ?>
        </tbody>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>