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
                <h5 class="card-title">Share Post</h5>
              </div>
              <div class="card-body">
                <form action="step4.php" method="post">
                  <input type="hidden" name="postid" value="<?php echo $_GET['postid'];?>">
                  <input type="hidden" id="shareurl" value="https://momsim.in/fdc/publicpost.php?postid=<?php echo $_GET['postid'];?>">
                  <div class="row">
                    <div class="col-md-12 pr-1">
                      <div class="form-group">
                        <label>Context</label>
                        <input type="text" class="form-control" disabled="true" placeholder="" value="<?php echo $context;?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 pr-1">
                      <div class="form-group">
                        <label>Title</label>
                        <input type="text" id="overrideTitle" class="form-control" disabled="true" placeholder="" value="<?php echo $title;?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Brief Desc.</label>
                        <textarea disabled="true" id="overrideDescription" class="form-control textarea"><?php echo $description;?></textarea>
                      </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <!-- <button id="shareBtn" class="btn btn-primary btn-round">Share on facebook</button> -->
                        <div id="shareBtn" class="btn btn-primary btn-round clearfix">Share on facebook</div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
<script>
// Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
  document.getElementById('shareBtn').onclick = function() {
    var shareurl = document.getElementById('shareurl').value;
    var overrideTitle = document.getElementById('overrideTitle').value;
    var overrideDescription = document.getElementById('overrideDescription').value;
    var overrideImage = 'https://momsim.in/fdc/img/cover.png';
    FB.ui({
      /*method: 'share',
      mobile_iframe: true,
      href: shareurl,*/
      method: 'share_open_graph',
      action_type: 'og.likes',
      action_properties: JSON.stringify({
        object: {
          'og:url': shareurl,
          'og:title': overrideTitle,
          'og:description': overrideDescription,
          'og:image': overrideImage
        }
      })
    }, function(response){});
  }
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1895986654043600',
      cookie     : true,  // enable cookies to allow the server to access 
                          // the session
      xfbml      : true,  // parse social plugins on this page
      version    : 'v2.8' // use graph api version 2.8
    });
  };
</script>
<?php
  include "footer.php";
?>