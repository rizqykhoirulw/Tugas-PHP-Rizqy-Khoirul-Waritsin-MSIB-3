<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body>
  <div class="container-md p-3 mt-3 border border-dark rounded-2">
    <h1 class="text-center">Formulir Data Pegawai</h1>
    <form action="tugas2_php.php" method="post">
        <div class="row mb-3">
            <label for="inputNama3" class="col-sm-2 col-form-label">Nama Pegawai</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputNama3" name="nama">
            </div>
        </div>
        <fieldset class="row mb-3">
            <legend class="col-form-label col-sm-2 pt-0">Jabatan</legend>
            <div class="col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jabatan" id="gridRadios1" value="Manajer">
                    <label class="form-check-label" for="gridRadios1">
                    Manajer
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jabatan" id="gridRadios2" value="Asisten">
                    <label class="form-check-label" for="gridRadios2">
                    Asisten
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jabatan" id="gridRadios3" value="Kabag">
                    <label class="form-check-label" for="gridRadios3">
                    Kabag
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jabatan" id="gridRadios4" value="Staff">
                    <label class="form-check-label" for="gridRadios4">
                    Staff
                    </label>
                </div>
            </div>
        </fieldset>
        <fieldset class="row mb-3">
            <legend class="col-form-label col-sm-2 pt-0">Status</legend>
            <div class="col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="gridRadio1" value="Menikah">
                    <label class="form-check-label" for="gridRadio1">
                    Menikah
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="gridRadio2" value="Belum Menikah">
                    <label class="form-check-label" for="gridRadio2">
                    Belum Menikah
                    </label>
                </div>
            </div>
        </fieldset>

        <div class="row mb-3">
            <label for="inputAnak3" class="col-sm-2 col-form-label">Jumlah Anak</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputAnak3" name="anak">
            </div>
        </div>
        <select class="form-select form-select-sm mb-5 ml-5 w-25" aria-label=".form-select-lg example" name="agama">
            <option selected disabled>Agama</option>
            <option value="Islam">Islam</option>
            <option value="Kristen">Kristen</option>
            <option value="Katolik">Katolik</option>
            <option value="Hindu">Hindu</option>
            <option value="Budha">Budha</option>
            <option value="Konghucu">Konghucu</option>
        </select>
        <button type="submit" name="simpan" class="mx-auto btn btn-primary">Simpan</button>
    </form>
  </div>

  <?php 

    if (isset($_POST['nama']) || isset($_POST['jabatan']) || isset($_POST['status']) || isset($_POST['anak'])|| isset($_POST['simpan']) || isset($_POST["agama"])) {
        $nama = $_POST["nama"];
        $jabatan = $_POST["jabatan"];
        $status = $_POST["status"];
        $anak = $_POST["anak"];
        $simpan = $_POST["simpan"];
        $agama = $_POST["agama"];
    };
        $gapok; $tunjab; $tunjangkel; $gator; $zakat; $takeHome;

    switch($jabatan){
        case 'Manajer':
            $gapok = 20000000;
            break;
        case 'Asisten':
            $gapok = 15000000;
            break;
        case 'Kabag':
            $gapok = 10000000;
            break;
        case 'Staff':
            $gapok = 4000000;
            break;
    }

    $anak_int = (int)$anak;

    if ($anak_int>=0 && $anak_int<=2) {
        $tunjangkel = 5/100 * $gapok;
    } elseif ($anak_int>2 && $anak_int<=5) {
        $tunjangkel = 10/100 * $gapok;
    } elseif ($anak_int>5) {
        $tunjangkel = 15/100 * $gapok;
    } else {
        $tunjangkel="";
    }

    $tunjab = 20/100 * $gapok;

    $gator = $gapok + $tunjangkel + $tunjab;


    $zakat = ($agama == "Islam" && $gator>=6000000)? 2.5/100 * $gapok : 0;

    $takeHome = $gator - $zakat;
    
    if (isset($simpan)) : ?>
        <div class="container-md my-5" style="width: 90%">
        <table class="table text-center">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Pegawai</th>
                    <th scope="col">Jabatan</th>
                    <th scope="col">Status</th>
                    <th scope="col">Agama</th>
                    <th scope="col">Gaji Pokok</th>
                    <th scope="col">Tunjangan Jabatan</th>
                    <th scope="col">Tunjangan Keluarga</th>
                    <th scope="col">Gaji Kotor</th>
                    <th scope="col">Zakat</th>
                    <th scope="col">Take Home</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <tr>
                    <th scope="row">1</th>
                    <td> <?= $nama; ?> </td>
                    <td> <?= $jabatan; ?> </td>
                    <td> <?= $status; ?> </td>
                    <td> <?= $agama; ?> </td>
                    <td> <?= $gapok; ?> </td>
                    <td> <?= $tunjab; ?> </td>
                    <td> <?= $tunjangkel; ?> </td>
                    <td> <?= $gator; ?> </td>
                    <td> <?= $zakat; ?> </td>
                    <td> <?= $takeHome; ?> </td>
                </tr>
            </tbody>
        </table>
        </div>

        
    <?php endif ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>