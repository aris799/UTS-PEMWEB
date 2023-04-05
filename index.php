<?php 
  include ('conn.php'); 
  include ('style.php'); 
?>
<!DOCTYPE html>
<html>
  <head>
    <title>BUS TRANS UPN</title>
    <link href="" rel="stylesheet">
    <link href="" rel="stylesheet">
  </head>

  <body>

  <ul>
            <li class="current"><a href="index.php">Database Trans UPN</a></li>
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
<center>
  <h2>DATABASE SYSTEM TRANS UPN</h2>
          <div>
            <table border="1">
              <thead align="center">
                <tr>
                  <th>ID TRANS UPN</th>
                  <th>ID KONDEKTUR</th>
                  <th>ID BUS</th>
                  <th>ID DRIVER</th>
                  <th>JUMLAH KM</th>
                  <th>TANGGAL</th>
                  <th>EDIT DATA</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  $query = "SELECT * FROM trans_upn";
                  $result = mysqli_query(connection(),$query);
                 ?>
                 <?php while($data = mysqli_fetch_array($result)): ?>
                  <tr align="center">
                    <td><?php echo $data['id_trans_upn'];  ?></td>
                    <td><?php echo $data['id_kondektur'];  ?></td>
                    <td><?php echo $data['id_bus'];  ?></td>
                    <td><?php echo $data['id_driver'];  ?></td>
                    <td><?php echo $data['jumlah_km'];  ?></td>
                    <td><?php echo $data['tanggal'];  ?></td>
                    <td>
                      <a href="<?php echo "updateTransupn.php?id=".$data['id_trans_upn']; ?>"> Update</a>
                      &nbsp;&nbsp;
                      <a href="<?php echo "deletetransupn.php?id=".$data['id_trans_upn']; ?>"> Delete</a>
                    </td>
                  </tr>
                 <?php endwhile ?>
              </tbody>
            </table>
          </div>
    <div>
      <div>
        </center>

        <main role="main">
          <?php 
            if (@$_GET['status']!==NULL) {
              $status = $_GET['status'];
              if ($status=='okay') {
                echo '<br><br><div>ID Trans BUS berhasil di-update</div>';
              }
              else if ($status=='error'){
                echo '<br><br><div role="alert">ID Trans BUS gagal di-update</div>';
              }

            }
           ?>
          
        </main>
      </div>
    </div>

  </body>
</html>