<div class="content-page">
  <!-- Start content -->
  <div class="content">
    <div class="container">
      <!-- Page-Title -->
      <div class="row">
        <div class="col-sm-12">
          <h4 class="page-title">Send Notification</h4>
          <ol class="breadcrumb">
            <li>
              <a href="<?= base_url() ?>">Dashboard</a>
            </li>
            <li class="active">
              Send Notification
            </li>
          </ol>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <div id="add_sub_msg"></div>
          <form id="send_notification_form" name="send_notification_form" role="form" method="post"
            enctype="multipart/form-data">
            <div class="card-box">
              <h4 class="m-t-0 header-title"><b>Send Notification</b></h4></br></br>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control required" id="title" name="title" maxlength="500">
                    <span id="title-error" class="text-danger"></span>
                  </div>
                  <div class="form-group">
                    <label>Message</label>
                    <textarea class="form-control required" id="message" name="message" maxlength="1000" rows="5"></textarea>
                    <span id="message-error" class="text-danger"></span>
                  </div>
                  <button type="button" class="btn btn-primary" onclick="get_data_for_notification()">Send Notification</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div> <!-- container -->
  </div> <!-- content -->
  <script type="text/javascript">
  function get_data_for_notification() {
    console.log('insidedd');
    var title = document.getElementById('title').value;
    var subtitle = document.getElementById('message').value;
    if(title == ""){
      $("#title-error").html("Enter title");
    }
    if(subtitle == ""){
      $("#message-error").html("Enter Message");
    }
    if(title != "" & subtitle != ""){     
      $("#title-error").html("");
      $("#message-error").html("");
      $.ajax({
      type: 'POST',
      url: "https://fcm.googleapis.com/fcm/send",
      headers: {
        Authorization: "key=<?php echo $token; ?>"
      },
      contentType: 'application/json',
      dataType: 'json',
      data: JSON.stringify({
        "to": "/topics/all",
        "data" : {
          "priority": "high",
        },
        "notification": { "title": title, "body": subtitle }
      }),
      success: function(){
        document.getElementById('add_sub_msg').innerHTML = '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Notification Sent  Successfully!!</strong></div>'
        location.reload();
        console.log("Success");
      },
      error: console.log('error'),
    });
    
  }
  }
</script>
