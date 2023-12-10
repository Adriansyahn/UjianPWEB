<?php
include "db_conn.php";
$no = $_GET["no"];

if (isset($_POST["submit"])) {
  $nama_depan = $_POST['nama_depan'];
  $nama_belakang = $_POST['nama_belakang'];
  $email = $_POST['email'];
  $jenis_kelamin = $_POST['jenis_kelamin'];

  $sql = "UPDATE `crud` SET `nama_depan`='$nama_depan',`nama_belakang`='$nama_belakang',`email`='$email',`jenis_kelamin`='$jenis_kelamin' WHERE no = $no";

  $result = mysqli_query($conn, $sql);

  if ($result) {
    header("Location: index.php?msg=Data Berhasil Diupdate");
  } else {
    echo "Failed: " . mysqli_error($conn);
  }
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>Adriansyah_Nurrahman_50421057</title>
</head>


<body>

  <div class="container">
    <div class="text-center mb-4">
      <h1 style="color:blue;">Program CRUD Sederhana</h1>
      <h3>Tambahkan Anggota Baru</h3>
      <p class="text-muted">Selesaikan format dibawah untuk menambahkan anggota baru</p>
    </div>

    <?php
    $sql = "SELECT * FROM `crud` WHERE no = $no LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>

    <div class="container d-flex justify-content-center">
      <form action="" method="post" style="width:50vw; min-width:300px;">
        <div class="row mb-3">
          <div class="col">
            <label class="form-label">Nama Depan:</label>
            <input type="text" class="form-control" name="nama_depan" value="<?php echo $row['nama_depan'] ?>">
          </div>

          <div class="col">
            <label class="form-label">Nama Belakang:</label>
            <input type="text" class="form-control" name="nama_belakang" value="<?php echo $row['nama_belakang'] ?>">
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label">Email:</label>
          <input type="email" class="form-control" name="email" value="<?php echo $row['email'] ?>">
        </div>

        <div class="form-group mb-3">
          <label>Jenis Kelamin:</label>
          &nbsp;
          <input type="radio" class="form-check-input" name="jenis_kelamin" id="male" value="male" <?php echo ($row["jenis_kelamin"] == 'male') ? "checked" : ""; ?>>
          <label for="male" class="form-input-label">Laki-laki</label>
          &nbsp;
          <input type="radio" class="form-check-input" name="jenis_kelamin" id="female" value="female" <?php echo ($row["jenis_kelamin"] == 'female') ? "checked" : ""; ?>>
          <label for="female" class="form-input-label">Perempuan</label>
        </div>

        <div>
          <button type="submit" class="btn btn-success" name="submit">Ubah</button>
          <a href="index.php" class="btn btn-danger">Cancel</a>
        </div>
      </form>
    </div>
  </div>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>