<?php
  include "header.php";
    $sql = "SELECT * FROM posts";
    $result = $conn->query($sql);
    if ($result->num_rows == 0) {
      //header("Location:step1.php");
    }else{
      echo '<div class="col-md-8">';
      while($row = $result->fetch_assoc()) {
          if($row['change_maker'] == 1){
            $context = "I am the change!";
          }
          else {
            $context = "I saw the change!";
          }
          $title = $row['title'];
          $description = $row['description'];
      ?>
          
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title"><?php echo $title;?></h5>
              </div>
              <div class="card-body">
                <?php echo $description;?>
                
            </div>
          
        
<?php
      }
      echo '</div>';
    }
  include "footer.php";
?>