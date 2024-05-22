<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<title>
    mediaku</title>
<body>
<link rel="stylesheet" href="layout.css" />

<nav
class="navbar navbar-expand-lg navbar-dark bg-dark shadow-lg fixed-top"
>
<div class="container">
  <a class="navbar-brand" href="utama.php">MEDIA BELAJARKU </a>
  <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgU3aqKQBOdsOVZhPqzzchk7yVWtd9_YiUjKg94Iv_6Uwau0U-TG0YF3oO2IkN3dQnpFUHfWkX98jpEvw75oDkKahsKxic9Rz9FGmIra1hu_4IMl5AlArwVKCoIAls8euPFECGoxz3KwuT6MN_Ppez9D9dHHWL2vCaAY1IX9GAXrD3sqEt0jNm2zara/s16000-rw/logo%20BACKGROUND%20HITAM%20Merdeka%20belajar%20merdeka%20mengajar%20format%20cdr%20jpg%20png%20ai%20pdf.png" alt="Logo" width="50" height="45" class="d-inline-block align-text-top">
  <button
    class="navbar-toggler"
    type="button"
    data-bs-toggle="collapse"
    data-bs-target="#navbarText"
    aria-controls="navbarText"
    aria-expanded="false"
    aria-label="Toggle navigation"
  >
      
    </a>
  </div>
</nav>
<div class="container">
<?php

    include "koneksi.php";

    //Cek apakah ada kiriman form dari method post
    if (isset($_GET['id_peserta'])) {
        $id_peserta=htmlspecialchars($_GET["id_peserta"]);

        $sql="delete from peserta where id_peserta='$id_peserta' ";
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak
            if ($hasil) {
                header("Location:index.php");

            }
            else {
                echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";

            }
        }
?>


     <tr class="table-danger">
            <br>
        <thead>
        <tr>
       <table class="my-3 table table-bordered">
            <tr class="table-primary">           
            <th>No</th>
            <th>Nama</th>
            <th>Sekolah</th>
            <th>Jurusan</th>
            <th>No Hp</th>
            <th>Alamat</th>
            <th colspan='2'>Aksi</th>

        </tr>
        </thead>

        <?php
        include "koneksi.php";
        $sql="select * from peserta order by id_peserta desc";

        $hasil=mysqli_query($kon,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;

            ?>
            <tbody>
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $data["nama"]; ?></td>
                <td><?php echo $data["sekolah"];   ?></td>
                <td><?php echo $data["jurusan"];   ?></td>
                <td><?php echo $data["no_hp"];   ?></td>
                <td><?php echo $data["alamat"];   ?></td>
                <td>
                    <a href="update.php?id_peserta=<?php echo htmlspecialchars($data['id_peserta']); ?>" class="btn btn-warning" role="button">Update</a>
                    <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id_peserta=<?php echo $data['id_peserta']; ?>" class="btn btn-danger" role="button">Delete</a>
                </td>
            </tr>
           
            </tbody>
            <?php
        }
        ?>
    </table>
    <a href="utama.php" type="submit" name="submit" class="btn btn-primary">Submit</button>
</html>
