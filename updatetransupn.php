<?php
    include ('conn.php');
    include ('style.php');

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if (isset($_GET['id'])) {
            $id_trans_upn = $_GET['id'];
            $query = "SELECT * FROM trans_upn WHERE id_trans_upn = $id_trans_upn";
            $result = mysqli_query(connection(),$query);
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id_trans_upn = $_POST['id_trans_upn'];
        $id_kondektur = $_POST['id_kondektur'];
        $id_bus = $_POST['id_bus'];
        $id_driver = $_POST['id_driver'];
        $jumlah_km = $_POST['jumlah_km'];
        $tanggal = $_POST['tanggal'];
        $sql = "UPDATE trans_upn SET id_trans_upn='$id_trans_upn', id_kondektur='$id_kondektur', id_bus='$id_bus', id_driver='$id_driver', jumlah_km='$jumlah_km', tanggal='$tanggal' WHERE id_trans_upn=$id_trans_upn";
        $result = mysqli_query(connection(),$sql);
        if ($result) {
            $status="success";
        } else {
            $status="error";
        }
         header('Location: trans.php?status='.$result);
   
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update Data TRANS UPN</title>
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
        <h2>Ubah Data TRANS UPN</h2>
        <form action="ubahTrans.php" method="POST">
            <?php while($data = mysqli_fetch_array($result)): ?>
                <table>
                    <tr>
                        <td><label for="id_trans_upn" > ID Trans UPN:</label></td>
                        <td><input type="text" name="id_trans_upn" id="id_trans_upn" placeholder="<?php echo $data['id_trans_upn'];?>"></td>
                    </tr>
                    <tr>
                        <td><label for="id_kondektur" > ID Kondektur:</label></td>
                        <td><input type="text" name="id_kondektur" id="id_kondektur" placeholder="<?php echo $data['id_kondektur'];?>"></td>
                    </tr>
                    <tr>
                        <td><label for="id_bus" > ID Bus:</label></td>
                        <td><input type="text" name="id_bus" id="id_bus" placeholder="<?php echo $data['id_bus'];?>"></td>
                    </tr>
                    <tr>
                        <td><label for="id_driver" > ID Driver:</label></td>
                        <td><input type="text" name="id_driver" id="id_driver" placeholder="<?php echo $data['id_driver'];?>"></td>
                    </tr>
                    <tr>
                        <td><label for="jumlah_km" > Jumlah KM:</label></td>
                        <td><input type="text" name="jumlah_km" id="jumlah_km" placeholder="<?php echo $data['jumlah_km'];?>"></td>
                    </tr>
                    <tr>
                        <td><label for="tanggal" > Tanggal:</label></td>
                        <td><input type="text" name="tanggal" id="tanggal" placeholder="<?php echo $data['tanggal'];?>"></td>
                    </tr>
                </table>
            <?php endwhile ?>
            <button type="submit">Ubah</button>
        </form>
    </body>
</html>
