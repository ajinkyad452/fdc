<?php
  include "header.php";
  if(!isset($_SESSION['aut'])){
    header("Location:index.html");
  }
  $id = $_SESSION['id'];
  if(isset($_GET['postid'])){
    $sql = "SELECT * FROM posts WHERE id=".$_GET['postid']." AND uid=".$id;
    $result = $conn->query($sql);
    if ($result->num_rows == 0) {
      header("Location:step1.php");
    }
  }
  if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile_cc = $_POST['mobile_cc'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $note = $_POST['note'];
    $postid = $_POST['postid'];
    $sql = "INSERT INTO change_makers (uid, name, email, mobile_cc, mobile, address, note) VALUES ($id, '$name', '$email', '$mobile_cc', '$mobile', '$address', '$note')";

    if ($conn->query($sql) === TRUE) {
        ?>
          <div class="alert alert-success alert-dismissible fade show">
                          <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="nc-icon nc-simple-remove"></i>
                          </button>
                          <span>
                            <b> Success - </b> Post added</span>
                        </div>
        <?php
        $last_id = $conn->insert_id;
          $sql1 = "UPDATE posts SET change_maker_id=".$last_id." WHERE id=".$postid;
          if ($conn->query($sql1) === TRUE) {
                header("Location:step3.php?postid=".$postid);
            }else {
              ?>
                  <div class="alert alert-danger alert-dismissible fade show">
                                    <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                                      <i class="nc-icon nc-simple-remove"></i>
                                    </button>
                                    <span>
                                      <b> Error - </b> Something went wrong</span>
                                  </div>
              <?php
            }
          

    } else {
        ?>
        <div class="alert alert-danger alert-dismissible fade show">
                          <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="nc-icon nc-simple-remove"></i>
                          </button>
                          <span>
                            <b> Error - </b> Something went wrong</span>
                        </div>
    <?php
    }
  }
?>
          <div class="col-md-8">
            <div class="card card-user">
              <div class="card-header">
                <a href="step3.php?postid=<?php echo $_GET['postid'];?>" class="pull-right">Skip</a>
                <h5 class="card-title">Details about the change maker</h5> 
              </div>
              <div class="card-body">
                <form action="step2.php" method="post">
                  <input type="hidden" name="postid" value="<?php echo $_GET['postid'];?>">
                  <div class="row">
                    <div class="col-md-12 pr-1">
                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" required="true" class="form-control" placeholder="Company" value="Ram D.">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 pr-1">
                      <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" placeholder="test@example.com" >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 pr-1">
                      <div class="form-group">
                        <label>Mobile</label>
                        <input type="text" name="mobile_cc" required="true" class="form-control" placeholder="+91">
                        <input type="text" name="mobile" required="true" class="form-control" placeholder="90000000000">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" required="true" class="form-control" placeholder="Address" value="Pune, India">
                      </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Note</label>
                        <textarea name="note" class="form-control textarea">Please Refer my name "Ajinkya Dube"</textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <button type="submit" name="submit" class="btn btn-primary btn-round">Next</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        
<?php
  include "footer.php";
?>