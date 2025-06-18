<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <center> 
    <form method="post">
    <h1>FORM SEDERHANA DAN HIT COUNTER</h1>
        Nama : <input type="text" name="nama" required><br><br>
        Nim  : <input type="number" name="nim" required><br><br> 
        prodi: <input type="text" name="prodi" required><br><br>


        Jenis Kelamin :
        <input type="radio" name="kelamin" value="Laki-Laki" id="jenis" required>
        <label for="kelamin">laki-laki</label>

        <input type="radio" name="kelamin" value="perempuan" id="jenis" required>
        <label for="kelamin">Perempuan</label><br><br>
        Alamat : <textarea name="alamat" rows="4" cols="40"></textarea>
   <br>
        <input type="submit" value="Kirim">
    </form>
    </center>

    <?php
  
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
        $nama = $_POST["nama"];
        $nim = $_POST["nim"];
        $prodi = $_POST["prodi"];
        $jenis = $_POST["kelamin"];
        $Alamat = $_POST["alamat"];

        echo "<center>";
        echo "<hr>Data yang Anda Masukkan :</h3><br>";
        echo "Nama : ".$nama."<br>";
        echo "Nim :".$nim."<br>";
        echo "Prodi :".$prodi."<br>";
        echo "Jenis Kelamin: ".$jenis."<br>";
        echo "Alamat :".$Alamat."<br>";
        echo "</center>";
    }
    $filecounter = "counter.txt";
    $fl=fopen($filecounter, "r+");

    $hit=fread($fl,filesize($filecounter));

    echo("<table width=250 align=center border=1 cellspacing=0 cellpadding=0 bordercolor=#0000FF><tr>");
    echo("<td width=250 valign=middle align=center>");
    echo("<font face=verdana size=2 color=#FF0000><b>");
    echo("Anda pengunjung yang ke:");
    echo($hit);
    echo("</b></font>");
    echo("</td>");
    echo("</tr></table>");

    fclose($fl);

    $fl = fopen($filecounter, "w+");

    $hit = $hit + 1;

 
    fwrite($fl, $hit, strlen($hit));

  
    fclose($fl);
      

    ?>
</body>
</html>