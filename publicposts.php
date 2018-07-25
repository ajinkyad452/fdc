<?php
  include "header.php";
  $offset = 0;
    if(isset($_GET['page'])){
      $offset = $_GET['page'];
    }
    $nextpage = $offset + 10;
    if($offset != 0)
      $prevpage = $offset - 10;
    else
      $prevpage = 0;

    $sql = "SELECT * FROM posts limit ".$offset.",10";
    $result = $conn->query($sql);
    if ($result->num_rows == 0) {
      //header("Location:step1.php");
    }else{
      while($row = $result->fetch_assoc()) {
        $uid = $row['uid'];
          $sql1 = "SELECT * FROM users WHERE id = ".$uid;
          $result1 = $conn->query($sql1);
          $name = '';
          $css = 'gradiamchange';
          $context = 'I am the change!';
          while($row1 = $result1->fetch_assoc()) {
            $name = $row1['name'];
            if($row['change_maker'] == 1){
              $context = "I am the change!";
              $css = 'gradiamchange';
            }
            else {
              $context = "I saw the change!";
              $css = 'gradisawchange';
            }
          }
          
          $title = $row['title'];
          $description = $row['description'];
      ?>
          <div class="col-md-6">
            <div class="card <?php echo $css;?>">
              <div class="card-header">
                <h5 class="card-title"><?php echo $title;?></h5>
              </div>
              <div class="card-body">
                <?php echo $description;?>
                
              </div>
              <div class="card-footer">
                Published By: <?php echo $name;?>
              </div>
            </div>
          </div>
          <!-- <div class="col-md-4">
            <div class="card text-white bg-primary">
              <div class="card-header">
                <h5 class="card-title"><?php //echo $context;?></h5>
              </div>
              <div class="card-body">
                <?php //echo $name;?>
                
              </div>
            </div>
          </div> -->
        
<?php
      }
    }
      ?>
<a class="btn btn-round btn-primary" href="publicposts.php?page=<?php echo $prevpage;?>" >Previous</a>
    <a class="btn btn-round btn-primary" href="publicposts.php?page=<?php echo $nextpage;?>" >Next</a>

    <?php
  include "footer.php";
?>