<?php 
  include ('conn.php'); 
  include ('style.php'); 
?>
<!DOCTYPE html>
<html>
  <head>
    <title>KONDEKTUR TRANS UPN</title>
    <link href="" rel="stylesheet">
    <link href="" rel="stylesheet">
  </head>

  <body>
  <ul>
            <li><a href="index.php">Database Trans UPN</a></li>
            <li><a href="bus.php">Data Bus</a></li>
            <li><a href="driver.php">Data Driver</a></li>
            <li class="current"><a href="kondektur.php">Data Kondektur</a></li>
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
                echo '<br><br><div>]ID Kondektur berhasil di-update</div>';
              }
              else if ($status=='error'){
                echo '<br><br><div role="alert">ID Kondektur gagal di-update</div>';
              }

            }
           ?>
           <center>
          <h2>TABEL KONDEKTUR TRANS UPN</h2>
          <div>
            <table border="1">
              <thead>
                <tr>
                  <th>ID KONDEKTUR</th>
                  <th>NAMA</th>
                  <th>EDIT DATA</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  //proses menampilkan data dari database:
                  //siapkan query SQL
                  $query = "SELECT * FROM kondektur";
                  $result = mysqli_query(connection(),$query);
                 ?>

                 <?php while($data = mysqli_fetch_array($result)): ?>
                  <tr align="center">
                    <td><?php echo $data['id_kondektur'];  ?></td>
                    <td><?php echo $data['nama'];  ?></td>
                    <td>
                      <a href="<?php echo "updateKondektur.php?id=".$data['id_kondektur']; ?>"> Update</a>
                      &nbsp;&nbsp;
                      <a href="<?php echo "deleteKondektur.php?id=".$data['id_kondektur']; ?>"> Delete</a>
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