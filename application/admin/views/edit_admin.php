<body>

  <div class="account-pages"></div>
  <div class="clearfix"></div>
  <div class="wrapper-page">
    <div class=" card-box">
      <div class="panel-heading">
        <h3 class="text-center">Audio App <strong class="text-custom">Admin Panel
          </strong> </h3>
      </div>


      <div class="panel-body">
      <div id="edit_admin_msg"></div>
      <form class="form-horizontal m-t-20" method="post" role="form" action="EditAdmin/modify" id="edit_admin_form" name="edit_admin_form">
            <div class="form-group ">
            <div class="col-xs-12">
              <input class="form-control" type="text" required="" placeholder="Username" value="<?= $record; ?>" name="user_name" id="user_name">
            </div>
          </div>

          <div class="form-group">
            <div class="col-xs-12">
              <input class="form-control" type="password" required="" minlength="8" placeholder="Password" name="user_pass" id="user_pass">
            </div>
          </div>

          <div class="form-group">
            <div class="col-xs-12">
              <input class="form-control" type="password" required="" minlength="8" placeholder="Confirm Password" name="confirm_pass" id="confirm_pass">
            </div>
          </div>


          <div class="form-group text-right m-t-20">

            <div class="col-xs-12">
              <button class="btn btn-info btn-block text-uppercase waves-effect waves-light" type="submit">Submit</button>
            </div>
          </div>
      </div>
      </form>
    </div>
  </div>
  </div>