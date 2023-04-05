<?php 
  include ('conn.php'); 
  include ('style.php'); 
?>
<!DOCTYPE html>
<html>
  <head>
    <title>BUS TRANS UPN</title>
    <style>
        .status_aktif {
            background-color: #29ab87;
            color: white;
        }
        .status_cadangan {
            background-color: #Ffff00;
        }
        .status_rusak {
            background-color: #Db1514;
        }
    </style>
  </head>

  <body>
  <ul>
            <li><a href="index.php">Database Trans UPN</a></li>
            <li class="current"><a href="bus.php">Data Bus</a></li>
            <li><a href="driver.php">Data Driver</a></li>
            <li><a href="kondektur.php">Data Kondektur</a></li>
            <li><a href="addtransupn.php"> Add Data Trans UPN</a></li>
            <li><a href="addbus.php">Add Data Bus</a></li>
            <li><a href="adddriver.php">Add Data Driver</a></li>
            <li><a href="addkondektur.php">Add Data Kondektur</a></li>
            <li><a href="gajidriver.php">Gaji Driver</a></li>
            <li><a href="gajiKondektur.php">Hitung Gaji Kondektur</a></li>
        </ul>

    <center><h2>DATA BUS TRANS UPN</h2>
    

    <div>
      <div>
        <main role="main">
          <?php 
            if (@$_GET['status']!==NULL) {
              $status = $_GET['status'];
              if ($status=='okay') {
                echo '<br><div> ID BUS berhasil di update</div>';
              }
              else if ($status=='error'){
                echo '<br><div role="alert"> ID BUS gagal di update</div>';
              }

            }
            
           ?>
            <?php  
           if (isset($_GET["status"])) {
                    $status = $_GET["status"];
                    if($status == "all") {
                        $query = "SELECT * FROM bus";
                    } else {
                        $query = "SELECT * FROM bus WHERE status = $status";
                    }
                } else {
                    $query = "SELECT * FROM bus";
                }
                $result = mysqli_query(connection(),$query);
            ?>
          
            <form action="" method="get">
                <select name="status" id="status" required>
                    <option value="">PILIH</option>
                    <option value="all">semua</option>
                    <option value="1">Beroperasi</option>
                    <option value="2">Cadangan</option>
                    <option value="0">Rusak</option>
                </select>
                <button type="submit">Pilih</button>
            </form>
            <br><br>
          <div>
            <table align="center" border="1">
              <thead >
                <tr>
                  <th>ID BUS</th>
                  <th>PLAT</th>
                  <th>STATUS</th>
                  <th>EDIT DATA</th>
                </tr>
              </thead>
              <tbody align="center">
              <?php 
                    //menampilkan database
                    if (isset($_GET["status"])) {
                        $status = $_GET["status"];
                        if($status == "all") {
                            $query = "SELECT * FROM bus";
                        } else {
                            $query = "SELECT * FROM bus WHERE status = $status";
                        }
                    } else {
                        $query = "SELECT * FROM bus";
                    }
                    $result = mysqli_query(connection(),$query);
                ?>

                 <?php while($data = mysqli_fetch_array($result)): ?>
                  <tr>
                    <td><?php echo $data['id_bus'];  ?></td>
                    <td><?php echo $data['plat'];  ?></td>
                    <td class="status_<?php if ($data['status'] == 1){ echo 'aktif';} elseif ($data['status'] == 2) { echo 'cadangan';} elseif ($data['status'] == 0){ echo 'rusak';} ?>">
                    <?php echo $data['status'];  ?></td>
                    <td>
                      <a href="<?php echo "updatebus.php?id=".$data['id_bus']; ?>"> Update</a>
                      &nbsp;&nbsp;
                      <a href="<?php echo "deletebus.php?id=".$data['id_bus']; ?>"> Delete</a>
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