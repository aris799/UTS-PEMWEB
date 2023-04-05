<?php
    include('conn.php');
    include('style.php');
    $query = "SELECT * FROM driver";
    $result = mysqli_query(connection(),$query);
        if ($result) {
            $status = 'okay';
        } else {
            $status = 'error';
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GAJI TRANS UPN</title>
</head>
<body>
<ul>
            <li><a href="index.php">Database Trans UPN</a></li>
            <li><a href="bus.php">Data Bus</a></li>
            <li><a href="driver.php">Data Driver</a></li>
            <li><a href="kondektur.php">Data Kondektur</a></li>
            <li><a href="addtransupn.php">Add Data Trans UPN</a></li>
            <li><a href="addbus.php">Add Data Bus</a></li>
            <li><a href="adddriver.php">Add Data Driver</a></li>
            <li><a href="addkondektur.php">Add Data Kondektur</a></li>
            <li class="current"><a href="gajidriver.php">Gaji Driver</a></li>
            <li><a href="gajiKondektur.php">Gaji Kondektur</a></li>
        </ul>
        <center>
        <main role="main" class="">
          <?php 
            if (@$_GET['status']!==NULL) {
              $status = $_GET['status'];
              if ($status=='ok') {
                echo '<br><br><div class="alert alert-success" role="alert">Data Mahasiswa berhasil di-update</div>';
              }
              elseif($status=='err'){
                echo '<br><br><div class="alert alert-danger" role="alert">Data Mahasiswa gagal di-update</div>';
              }

            }
           ?>
          <h2>Pendapatan Driver</h2>
          <form action=<?php echo "gajidriver.php"?> method="get">
              <label for="bulan">Filter berdasarkan bulan:</label>
              <select class="custom-select" name="bulan" required="required">
                <option value="">Pilih Salah Satu</option>
                <?php 
                 $getDriver = "select driver.id_driver,sum(jumlah_km) as jumlah_km,tanggal,nama,no_sim,alamat,month(tanggal) as bulan from trans_upn join driver on trans_upn.id_driver = driver.id_driver group by  month(tanggal) order by month(tanggal)"; 
                 $driverList = mysqli_query(connection(),$getDriver);
              
                while($getDriver = mysqli_fetch_array($driverList)): ?>
               <option value="<?php echo $getDriver["bulan"]?>"><?php echo $getDriver["bulan"]?></option>
                 <?php endwhile ?>
              </select>
            <button type="submit">filter</button>
            </form>
                    <form action="gajidriver.php" method="get">
                        <button type="submit">reset</button>
                    </form>
          <div>
            <table align="center" border='1'>
              <thead>
                <tr>
                  <th>id_driver</th>
                  <th>nama</th>
                  <th>no_sim</th>
                  <th>alamat</th>
                  <th>bulann ke</th>
                  <th>tanggal</th>
                  <th>jumlah_km</th>
                  <th>gaji (Rp.)</th>
                
              </thead>
              <tbody align="center">
                <?php 
                    $query="";
                  if (isset($_GET['bulan'])) {
                    $query = "select driver.id_driver,sum(jumlah_km) as jumlah_km,tanggal,nama,no_sim,alamat,month(tanggal) as bulan from trans_upn join driver on trans_upn.id_driver = driver.id_driver where month(tanggal) = ".$_GET['bulan'] ." group by trans_upn.id_driver, month(tanggal) ;" ;               
                  } else {
                    $query = "select driver.id_driver,sum(jumlah_km) as jumlah_km,tanggal,nama,no_sim,alamat,month(tanggal) as bulan from trans_upn join driver on trans_upn.id_driver = driver.id_driver group by trans_upn.id_driver, month(tanggal)";             
                }

                 
                  $result = mysqli_query(connection(),$query);
                 ?>

                 <?php while($data = mysqli_fetch_array($result)): ?>
                  <tr>
                    <td><?php echo $data['id_driver'];  ?></td>
                    <td><?php echo $data['nama'];  ?></td>
                    <td><?php echo $data['no_sim'];  ?></td>
                    <td><?php echo $data['alamat'];  ?></td>
                    <td><?php echo $data['bulan'];  ?></td>
                    <td><?php echo $data['tanggal'];  ?></td>
                    <td><?php echo $data['jumlah_km'];  ?></td>
                    <td><?php echo $data['jumlah_km'] * 3000;  ?></td>                  
                  </tr>
                 <?php endwhile ?>
              </tbody>
            </table>
          </div>
        </main>
      </div>
    </div>
    </center>
</body>
</html>
