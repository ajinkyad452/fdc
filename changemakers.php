<?php
  include "header.php";
    $offset = 0;
    if(isset($_GET['page'])){
      $offset = $_GET['page'];
    }
    $nextpage = $offset + 10;
    $sql = "SELECT * FROM change_makers limit ".$offset.", 10";

    $result = $conn->query($sql);
    if ($result->num_rows == 0) {
      //header("Location:step1.php");
    }else{

      ?>
<div class="col-md-6">
  <?php
      while($row = $result->fetch_assoc()) {
          $vendor_id = $row['id'];
          $sql1 = "SELECT p.title,p.change_maker,u.name FROM posts as p INNER JOIN users as u ON p.uid = u.id AND p.vendor_id = ".$vendor_id;
          $result1 = $conn->query($sql1);
          while($row1 = $result1->fetch_assoc()) {
            if($row['change_maker']%2 == 1){
              $css = 'gradiamchange';
            }
            else {
              $css = 'gradisawchange';
            }
          
      ?>
        <div class="card <?php echo $css;?>">
              <div class="card-header">
                <h4 class="card-title"> <?php echo $row['name'];?></h4>
              </div>
              <div class="card-body">
                <?php echo $row1['title'];?>
              </div>
              <div class="card-footer">
                Posted By: <?php echo $row1['name'];?>
              </div>
            </div>

      <?php 
        }
      }
      ?>

    </div>
    <a class="btn btn-round btn-primary" href="changemakers.php?page=<?php echo $nextpage;?>" >Next</button>
            
<?php
    }
  include "footer.php";
?>