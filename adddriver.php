<?php
    include('conn.php');
    include('style.php');

    $status = '';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $idDriver = $_POST['id_driver'];
        $nama = $_POST['nama'];
        $noSIM = $_POST['no_sim'];
        $alamat = $_POST['alamat'];

        $query = "INSERT INTO driver VALUES ('$idDriver','$nama','$noSIM','$alamat')";
        echo $query;
        $result = mysqli_query(connection(),$query);
        if ($result) {
            $status = 'okay';
        } else {
            $status = 'error';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Driver Trans UPN</title>
</head>
<body>
<ul>
            <li ><a href="index.php">Database Trans UPN</a></li>
            <li><a href="bus.php">Data Bus</a></li>
            <li><a href="driver.php">Data Driver</a></li>
            <li><a href="kondektur.php">Data Kondektur</a></li>
            <li><a href="addtransupn.php">Add Data Trans UPN</a></li>
            <li><a href="addbus.php">Add Data Bus</a></li>
            <li class="current"><a href="adddriver.php">Add Data Driver</a></li>
            <li><a href="addkondektur.php">Add Data Kondektur</a></li>
            <li><a href="gajidriver.php">Gaji Driver</a></li>
            <li><a href="gajiKondektur.php">Hitung Gaji Kondektur</a></li>
        </ul>
    <div>
      <div>
        
        <main role="main">
          <?php 
            if (@$_GET['status']!==NULL) {
              $status = $_GET['status'];
              if ($status=='okay') {
                echo '<br><br><div>]ID Driver Trans UPN berhasil di-update</div>';
              }
              else if ($status=='error'){
                echo '<br><br><div role="alert">ID Driver Trans UPN gagal di-update</div>';
              }

            }
           ?>
                <h2>Form Add Driver Trans UPN</h2>
                <form action="adddriver.php" method="POST">
                    <table>
                        <tr>
                            <td><label for="id_driver" > ID Driver :</label></td>
                            <td><input type="text" name="id_driver" , id="id_driver"></td>
                        </tr>

                        <tr>
                            <td><label for="nama"> Nama :</label></td>
                            <td><input type="text" name="nama" , id="nama"></td>
                        </tr>

                        <tr>
                            <td><label for="no_sim" > No SIM :</label></td>
                            <td><input type="text" name="no_sim", id="no_sim"></td>
                        </tr>

                        <tr>
                            <td><label for="alamat" > Alamat :</label></td>
                            <td><input type="text" name="alamat", id="alamat"></td>
                        </tr>
                    </table>
                    <button style="margin-top:30px;" type="submit">Send</button>
                    </form>
            </main>
        </div>
    </div>

</body>
</html>