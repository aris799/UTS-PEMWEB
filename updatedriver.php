<?php
    include ('conn.php');
    include ('style.php');

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if (isset($_GET['id'])) {
            $id_driver = $_GET['id'];
            $query = "SELECT * FROM driver WHERE id_driver = $id_driver";
            $result = mysqli_query(connection(),$query);
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id_driver = $_POST['id_driver'];
        $nama = $_POST['nama'];
        $no_sim = $_POST['no_sim'];
        $alamat = $_POST['alamat'];
        $sql = "UPDATE driver SET id_driver='$id_driver', nama='$nama', no_sim='$no_sim', alamat='$alamat' WHERE id_driver=$id_driver";
        $result = mysqli_query(connection(),$sql);
        if ($result) {
            $status="success";
        } else {
            $status="error";
        }
        header('Location: driver.php?status='.$result);
      
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update Data Driver</title>
    </head>
    <body>   
    <ul>
            <li><a href="index.php">Database Trans UPN</a></li>
            <li><a href="bus.php">Data Bus</a></li>
            <li><a href="driver.php">Data Driver</a></li>
            <li><a href="kondektur.php">Data Kondektur</a></li>
            <li><a href="addtransupn.php"> Add Data Trans UPN</a></li>
            <li><a href="addbus.php">Add Data Bus</a></li>
            <li><a href="adddriver.php">Add Data Driver</a></li>
            <li><a href="addkondektur.php">Add Data Kondektur</a></li>
            <li><a href="gajidriver.php">Gaji Driver</a></li>
            <<li><a href="gajiKondektur.php">Gaji Kondektur</a></li>
        </ul>
        <h2>Ubah Data Driver</h2>
        <form action="updatedriver.php" method="POST">
            <?php while($data = mysqli_fetch_array($result)): ?>
                <table>
                    <tr>
                        <td><label for="id_driver" > ID Driver:</label></td>
                        <td><input type="text" name="id_driver" id="id_driver" placeholder="<?php echo $data['id_driver'];?>"></td>
                    </tr>
                    <tr>
                        <td><label for="nama" > Nama:</label></td>
                        <td><input type="text" name="nama" id="nama" placeholder="<?php echo $data['nama'];?>"></td>
                    </tr>
                    <tr>
                        <td><label for="no_sim" > No SIM:</label></td>
                        <td><input type="text" name="no_sim" id="no_sim" placeholder="<?php echo $data['no_sim'];?>"></td>
                    </tr>
                    <tr>
                        <td><label for="alamat" > Alamat:</label></td>
                        <td><input type="text" name="alamat" id="alamat" placeholder="<?php echo $data['alamat'];?>"></td>
                    </tr>
                </table>
            <?php endwhile ?>
            <button type="submit">Ubah</button>
        </form>
    </body>
</html>
