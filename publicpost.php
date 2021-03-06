<?php
  include "header.php";
  if(isset($_GET['postid'])){
    $postid = $_GET['postid'];
    $sql = "SELECT  * FROM posts as p INNER JOIN users as u ON p.uid = u.id WHERE p.id=".$postid;
    $result = $conn->query($sql);
    if ($result->num_rows == 0) {
      header("Location:step1.php");
    }else{
      while($row = $result->fetch_assoc()) {
          if($row['change_maker'] == 1){
            $context = "I am the change!";
            $css = 'gradiamchange';
          }
          else {
            $context = "I saw the change!";
            $css = 'gradisawchange';
          }
          $title = $row['title'];
          $description = $row['description'];
          $name = $row['name'];
      }
    }
  }
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
            <div class="card text-white bg-primary <?php echo $css;?>">
              <div class="card-header">
                <h5 class="card-title"><?php echo $context;?></h5>
              </div>
              <div class="card-body">
                <?php echo $name;?>
                
              </div>
            </div>
          </div>
        <div class="col-md-12">
          <div class="card ">
            <div class="card-header">
              <h5 class="card-title">Would you like be the change?</h5>
            </div>
            <div class="card-body">
              Please <a href="step1.php" class="btn btn-primary">Click Here</a> to add your experience and share it with your friends so that we can make a better place.
                
            </div>
          </div>
        </div>
<?php
  include "footer.php";
?>