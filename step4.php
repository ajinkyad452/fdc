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
     
          <div class="col-md-8">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Share Post</h5>
              </div>
              <div class="card-body">
                <form action="step4.php" method="post">
                  <input type="hidden" name="postid" value="<?php echo $_GET['postid'];?>">
                  <input type="hidden" id="shareurl" value="https://momsim.in/fdc/publicpost.php?postid=<?php echo $_GET['postid'];?>">
                  <input type="hidden" id="username" value="<?php echo $_SESSION['name']; ?>" name="">
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
    var username = document.getElementById('username').value;
    var shareurl = document.getElementById('shareurl').value;
    var overrideTitle = document.getElementById('overrideTitle').value;
    var overrideDescription = document.getElementById('overrideDescription').value;
    var overrideImage = 'https://momsim.in/fdc/img/btc.jpg';
    FB.ui({
      /*method: 'share',
      mobile_iframe: true,
      href: shareurl,*/
      hashtag: '#BeTheChange',
      method: 'share_open_graph',
      action_type: 'og.likes',
      action_properties: JSON.stringify({
        object: {
          'og:url': shareurl,
          'og:type': 'article',
          'og:title': username + ": " + overrideTitle,
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