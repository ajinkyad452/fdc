<?php
  include "header.php";
    $sql = "SELECT * FROM vendors";
    $result = $conn->query($sql);
    if ($result->num_rows == 0) {
      header("Location:step1.php");
    }else{
      ?>
<div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Eco-friendly product sellers</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        Name
                      </th>
                      <th>
                        Product
                      </th>
                      <th>
                        Address
                      </th>
                      <th class="text-right">
                        Contact
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
                          <?php echo $row['product'];?>
                        </td>
                        <td>
                          <?php echo $row['address'];?>
                        </td>
                        <td class="text-right">
                          <button class="btn btn-primary" onclick="senddetails(<?php echo $row['id'];?>)">Send me details</button>
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
<script type="text/javascript">
function senddetails(id){
  $.post("ajax_senddetails.php",
    {id: id},
    function(data, status){
      if(data == 'success'){
        alert("Details emailed");
      } else {
        alert("Sorry email not found");
      }
  });
}
</script>
<?php
    }
  include "footer.php";
?>