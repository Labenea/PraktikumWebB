<?php
if (isset($_POST["submit"])) {
    $nilai_a = ($_POST['nilaiT'] + $_POST["nilaiU"] + $_POST['nilaiS']) / 3;
    if ($nilai_a >= 80) {
        $l = true;
        $ket = "Anda Dinyatakan Lulus Dengan Predikat A";
    } elseif ($nilai_a >= 70) {
        $l = true;
        $ket = "Anda Dinyatakan Lulus Dengan Predikat B";
    } elseif ($nilai_a >= 60) {
        $l = true;
        $ket = "Anda Dinyatakan Lulus Dengan Predikat C";
    } else {
        $l = false;
        $ket = "Anda Dinyatakan Tidak Lulus Dengan Predikat D";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praktikum 7</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>

<body>
    <header>
        <nav>
            <div class="nav-wrapper">
                <div class="container">
                    <a href="#" class="brand-logo">Praktikum 7</a>
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                        <li><a href="">Home</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="container">
        <br>
        <br>
        <div class="card">
            <form action="index.php" method="post">
                <div class="row">
                    <div class="col s10 offset-s1">
                        <div class="section">
                            <div class="input-field col s12">
                                <input placeholder="Nama" id="nama" type="text" name="nama" class="validate">
                                <label for="nama">Nama</label>
                            </div>
                        </div>
                        <div class="section">
                            <div class="input-field col s12">
                                <input type="text" name="nim" id="nim" class="validate" placeholder="Nim">
                                <label for="nim">Nim</label>
                            </div>
                        </div>
                        <div class="section">
                            <div class="input-field col s12">
                                <input type="text" name="nilaiT" id="nilaiT" class="validate" placeholder="Nilai Tugas">
                                <label for="nilaiT">Nilai Tugas</label>
                            </div>
                        </div>
                        <div class="section">
                            <div class="input-field col s6">
                                <input type="text" name="nilaiU" id="nilaiU" class="validate" placeholder="Nilai UTS">
                                <label for="nilaiU">Nilai UTS</label>
                            </div>
                            <div class="input-field col s6">
                                <input type="text" name="nilaiS" id="nilaiS" class="validate" placeholder="Nilai UAS">
                                <label for="nilaiS">Nilai UAS</label>
                            </div>
                        </div>
                        <div class="section">
                            <div class="row">
                                <div class="col s12 offset-s5">
                                    <button class="btn waves-effect waves-light" type="submit" name="submit">Submit
                                        <i class="material-icons right">send</i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <br>
        <br>
        <?php if (isset($ket)) : ?>
            <div class="devider">
                <div class="card-panel <?php if($l){ echo " light-green"; } else{ echo "deep-orange"; }?>">
                    <span class="white-text"><?php echo $ket ?>
                    </span>
                </div>
                <ul class="collection with-header">
                    <li class="collection-header light-green darken-1">
                        <h6>Nama</h6>
                    </li>
                    <li class="collection-item"><?php echo $_POST['nama'] ?></li>
                    <li class="collection-header light-green darken-1">
                        <h6>NIM</h6>
                    </li>
                    <li class="collection-item "><?php echo $_POST['nim'] ?></li>
                    <li class="collection-header light-green darken-1">
                        <h6>Nilai Tugas</h6>
                    </li>
                    <li class="collection-item "><?php echo $_POST['nilaiT'] ?></li>
                    <li class="collection-header light-green darken-1">
                        <h6>Nilai UTS</h6>
                    </li>
                    <li class="collection-item "><?php echo $_POST['nilaiS'] ?></li>
                    <li class="collection-header light-green darken-1">
                        <h6>Nilai UTS</h6>
                    </li>
                    <li class="collection-item "><?php echo $_POST['nilaiS'] ?></li>
                    <li class="collection-header light-green darken-1">
                        <h6>Nilai Akhir</h6>
                    </li>
                    <li class="collection-item "><?php echo $nilai_a ?></li>
                </ul>
            </div>
        <?php endif ?>
    </div>
</body>

</html>