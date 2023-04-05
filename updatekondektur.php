<?php
    include ('conn.php');
    include ('style.php');

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if (isset($_GET['id'])) {
            $id_kondektur = $_GET['id'];
            $query = "SELECT * FROM kondektur WHERE id_kondektur = $id_kondektur";
            $result = mysqli_query(connection(),$query);
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id_kondektur = $_POST['id_kondektur'];
        $nama = $_POST['nama'];
        $sql = "UPDATE trans_upn SET id_kondektur='$id_kondektur', nama='$nama' WHERE id_kondektur=$id_kondektur";
        $result = mysqli_query(connection(),$sql);
        if ($result) {
            $status="success";
        } else {
            $status="error";
        }
       
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update Data Kondektur</title>
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
        <h2>Ubah Data Kondektur</h2>
        <form action="ubahTrans.php" method="POST">
            <?php while($data = mysqli_fetch_array($result)): ?>
                <table>
                    <tr>
                        <td><label for="id_kondektur" > ID Driver:</label></td>
                        <td><input type="text" name="id_kondektur" id="id_kondektur" placeholder="<?php echo $data['id_kondektur'];?>"></td>
                    </tr>
                    <tr>
                        <td><label for="nama" > Nama:</label></td>
                        <td><input type="text" name="nama" id="nama" placeholder="<?php echo $data['nama'];?>"></td>
                    </tr>
                </table>
            <?php endwhile ?>
            <button type="submit">Ubah</button>
        </form>
    </body>
</html>