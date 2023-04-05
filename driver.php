<?php 
  include ('conn.php'); 
  include ('style.php'); 
?>
<!DOCTYPE html>
<html>
  <head>
    <title>DRIVER TRANS UPN</title>
  </head>

  <body>
  <ul>
            <li><a href="index.php">Database Trans UPN</a></li>
            <li><a href="bus.php">Data Bus</a></li>
            <li class="current"><a href="driver.php">Data Driver</a></li>
            <li><a href="kondektur.php">Data Kondektur</a></li>
            <li><a href="addtransupn.php"> Add Data Trans UPN</a></li>
            <li><a href="addbus.php">Add Data Bus</a></li>
            <li><a href="adddriver.php">Add Data Driver</a></li>
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
                echo '<br><br><div>ID Driver berhasil di-update</div>';
              }
              else if ($status=='error'){
                echo '<br><br><div role="alert">ID Driver gagal di-update</div>';
              }

            }
           ?>
           <center>
          <h2>TABEL DRIVER TRANS UPN</h2>
          <div>
            <table border="1">
              <thead>
                <tr>
                  <th>ID DRIVER</th>
                  <th>NAMA</th>
                  <th>NO SIM</th>
                  <th>ALAMAT</th>
                  <th>EDIT DATA</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  //proses menampilkan data dari database:
                  //siapkan query SQL
                  $query = "SELECT * FROM driver";
                  $result = mysqli_query(connection(),$query);
                 ?>

                 <?php while($data = mysqli_fetch_array($result)): ?>
                  <tr align="center">
                    <td><?php echo $data['id_driver'];  ?></td>
                    <td><?php echo $data['nama'];  ?></td>
                    <td><?php echo $data['no_sim'];  ?></td>
                    <td><?php echo $data['alamat'];  ?></td>
                    <td>
                      <a href="<?php echo "updatedriver.php?id=".$data['id_driver']; ?>"> Update</a>
                      &nbsp;&nbsp;
                      <a href="<?php echo "deletedriver.php?id=".$data['id_driver']; ?>"> Delete</a>
                    </td>
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