<?php
  include "header.php";
  if(isset($_GET['postid'])){
    $postid = $_GET['postid'];
    $sql = "SELECT * FROM posts WHERE id=".$postid;
    $result = $conn->query($sql);
    if ($result->num_rows == 0) {
      header("Location:step1.php");
    }else{
      while($row = $result->fetch_assoc()) {
          if($row['change_maker'] == 1){
            $context = "I am the change!";
          }
          else {
            $context = "I saw the change!";
          }
          $title = $row['title'];
          $description = $row['description'];
      }
    }
  }
?>
      <div class="content">
        <div class="row">
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
      </div>
<?php
  include "footer.php";
?>