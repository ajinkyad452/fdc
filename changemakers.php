<?php
  include "header.php";
    $sql = "SELECT * FROM change_makers";
    $result = $conn->query($sql);
    if ($result->num_rows == 0) {
      header("Location:step1.php");
    }else{
      ?>
<div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Change Makers</h4>
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