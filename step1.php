<?php
  include "header.php";
  if(isset($_POST['change_maker'])){
    $title = $_POST['title'];
    $description = $_POST['description'];
    $change_maker = $_POST['change_maker'];
    $id = $_SESSION['id'];
    $sql = "INSERT INTO posts (uid, title, description, change_maker) VALUES ($id, '$title', '$description', '$change_maker')";

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
        if($change_maker == 2){
          header("Location:step2.php?postid=".$last_id);
        } else {
          header("Location:step3.php?postid=".$last_id);
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
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Who is the Change?</h5>
              </div>
              <div class="card-body">
                <form action="step1.php" method="post">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="container">I am the change
                          <input type="radio" name="change_maker" value="1">
                          <span class="checkmark"></span>
                        </label>
                      </div>
                    </div>
                  
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="container">I saw the change
                          <input type="radio" name="change_maker" value="2">
                          <span class="checkmark"></span>
                        </label>
                      </div>
                    </div>
                  </div>
                  <!-- 
                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <button class="btn btn-primary btn-round">Next</button>
                    </div>
                  </div> -->
              </div>
            </div>
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">What is the change you experienced?</h5>
              </div>
              <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Home Address" value="Tea cups made of mud">
                      </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Detail Description</label>
                        <textarea name="description" class="form-control textarea">I saw a tea seller stall. This guy was using cups for selling tea which were made from mud. This is super exciting, No plastic polution. I saw he was charging 1 rs extra for tea cup and people were happily giving it to him for his initiativie towords plastic cup ban.</textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <button type="submit" class="btn btn-primary btn-round">Next</button>
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