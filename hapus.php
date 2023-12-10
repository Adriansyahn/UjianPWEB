<?php
include "db_conn.php";
$no = $_GET["no"];
$sql = "DELETE FROM `crud` WHERE no = $no";
$result = mysqli_query($conn, $sql);

if ($result) {
  header("Location: index.php?msg=Data Berhasil Didelete");
} else {
  echo "Failed: " . mysqli_error($conn);
}
