<?php
  include "header.php";
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
    $sql = "INSERT INTO vendors (uid, name, email, mobile_cc, mobile, address, note) VALUES ($id, '$name', '$email', '$mobile_cc', '$mobile', '$address', '$note')";

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
          $sql1 = "UPDATE posts SET vendor_id=".$last_id." WHERE id=".$postid;
          if ($conn->query($sql) === TRUE) {
                header("Location:step4.php?postid=".$postid);
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
      <div class="content">
        <div class="row">
          <div class="col-md-4">
            <div class="card card-user">
              <div class="image">
                <img src="assets/img/damir-bosnjak.jpg" alt="...">
              </div>
              <div class="card-body">
                <div class="author">
                  <a href="#">
                    <img class="avatar border-gray" src="assets/img/mike.jpg" alt="...">
                    <h5 class="title"><?php echo $_SESSION['name']; ?></h5>
                  </a>
                  <p class="description">
                    <?php echo $_SESSION['email'];?>
                  </p>
                </div>
                <p class="description text-center">
                  "Random Quote of the day"
                  <br> 
                  <br> 
                </p>
              </div>
              <div class="card-footer">
                <hr>
                <div class="button-container">
                  <div class="row">
                    <div class="col-lg-3 col-md-6 col-6 ml-auto">
                      <h5>0
                        <br>
                        <small>Shares</small>
                      </h5>
                    </div>
                    <div class="col-lg-4 col-md-6 col-6 ml-auto mr-auto">
                      <h5>0
                        <br>
                        <small>Changes</small>
                      </h5>
                    </div>
                    <!-- <div class="col-lg-3 mr-auto">
                      <h5>0
                        <br>
                        <small>Changes Saw</small>
                      </h5>
                    </div> -->
                  </div>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Added Vendors</h4>
              </div>
              <div class="card-body">
                <ul class="list-unstyled team-members">
                  <li>
                    <div class="row">
                      <div class="col-md-2 col-2">
                        <div class="avatar">
                          <img src="assets/img/faces/ayo-ogunseinde-2.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                        </div>
                      </div>
                      <div class="col-md-7 col-7">
                        Krushna S.
                        <br />
                        <span class="text-muted">
                          <small>Mud Cups</small>
                        </span>
                      </div>
                      <div class="col-md-3 col-3 text-right">
                        <btn class="btn btn-sm btn-outline-success btn-round btn-icon"><i class="fa fa-envelope"></i></btn>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="row">
                      <div class="col-md-2 col-2">
                        <div class="avatar">
                          <img src="assets/img/faces/joe-gardner-2.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                        </div>
                      </div>
                      <div class="col-md-7 col-7">
                        Ramesh R.
                        <br />
                        <span class="text-success">
                          <small>Paper Bags</small>
                        </span>
                      </div>
                      <div class="col-md-3 col-3 text-right">
                        <btn class="btn btn-sm btn-outline-success btn-round btn-icon"><i class="fa fa-envelope"></i></btn>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="row">
                      <div class="col-md-2 col-2">
                        <div class="avatar">
                          <img src="assets/img/faces/clem-onojeghuo-2.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                        </div>
                      </div>
                      <div class="col-ms-7 col-7">
                        Ram d.
                        <br />
                        <span class="text-danger">
                          <small>Milk Bottles</small>
                        </span>
                      </div>
                      <div class="col-md-3 col-3 text-right">
                        <btn class="btn btn-sm btn-outline-success btn-round btn-icon"><i class="fa fa-envelope"></i></btn>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-8">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Would you like to add any vendor?</h5>
              </div>
              <div class="card-body">
                <form action="step3.php" method="post">
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
        </div>
      </div>
<?php
  include "footer.php";
?>