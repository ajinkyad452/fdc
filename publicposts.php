<?php
  include "header.php";
    $sql = "SELECT * FROM posts as p INNER JOIN users as u ON p.uid = u.id";
    $result = $conn->query($sql);
    if ($result->num_rows == 0) {
      //header("Location:step1.php");
    }else{
      while($row = $result->fetch_assoc()) {
          if($row['p.change_maker'] == 1){
            $context = "I am the change!";
          }
          else {
            $context = "I saw the change!";
          }
          $title = $row['p.title'];
          $description = $row['p.description'];
      ?>
          <div class="col-md-8">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title"><?php echo $title;?></h5>
              </div>
              <div class="card-body">
                <?php echo $description;?>
                
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title"><?php echo $context;?></h5>
              </div>
              <div class="card-body">
                <?php echo $description;?>
                
              </div>
            </div>
          </div>
        
<?php
      }
    }
  include "footer.php";
?>