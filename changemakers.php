<?php
  include "header.php";
    $offset = 0;
    if(isset($_GET['page'])){
      $offset = $_GET['page'];
    }
    echo $sql = "SELECT * FROM change_makers limit ".$offset.", 10";

    $result = $conn->query($sql);
    echo $result->num_rows;
    if ($result->num_rows == 0) {
      //header("Location:step1.php");
    }else{

      ?>
<div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Volunteers / Change Makers</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        Name
                      </th>
                      <th>
                        Email
                      </th>
                      <th>
                        Mobile
                      </th>
                      <th>
                        Address
                      </th>
                      <th class="text-right">
                        Note
                      </th>
                    </thead>
                    <tbody>
      <?php
      while($row = $result->fetch_assoc()) {
          
      ?>
          
      
                      <tr>
                        <td>
                          <?php echo $row['name'];?>
                          <?php
                            $vendor_id = $row['id'];
          $sql1 = "SELECT p.title,u.name FROM posts as p INNER JOIN users as u ON p.uid = u.id AND p.vendor_id = ".$vendor_id;
          $result1 = $conn->query($sql1);
          while($row1 = $result1->fetch_assoc()) {
            echo $row1['p.title'];
            echo $row1['name'];
          }
                          ?>
                        </td>
                        <td>
                          <?php echo $row['email'];?>
                        </td>
                        <td>
                          <?php echo $row['mobile_cc'].$row['mobile'];?>
                        </td>
                        <td>
                          <?php echo $row['address'];?>
                        </td>
                        <td class="text-right">
                          <?php echo $row['note'];?>
                        </td>
                      </tr>
      <?php
        }
      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
<?php
    }
  include "footer.php";
?>