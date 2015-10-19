<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Administrator Portal Investasi Kota Makassar</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta content="" name="description" />
  <meta content="" name="author" />
  <link href="<?=base_url()?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <link href="<?=base_url()?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link href="<?=base_url()?>assets/css/style_adminpanel.css" rel="stylesheet" />
  <link href="<?=base_url()?>assets/css/style_responsive_adminpanel.css" rel="stylesheet" />
  <link href="<?=base_url()?>assets/css/style_default_adminpanel.css" rel="stylesheet" id="style_color" />
</head>
<body id="login-body">
   <div class='loginheader1'></div>
		<div class='headerloginnya'>
			<center><img src="<?=base_url()?>assets/images/logo_login.png" alt="logo" class="center" /></center>
		</div>
   <div class='loginheader1'></div>
  <!-- BEGIN LOGIN -->
  <div id="login">
    <!-- BEGIN LOGIN FORM -->
    <form id="loginform" class="form-vertical no-padding no-margin" method="post" action="<?=base_url()?>login/dologiners">
      <div class="lock">
          <i class="icon-lock"></i>
      </div>
      <div class="control-wrap">
          <h4>ADMINISTRATOR LOGIN</h4>
          <div class="control-group">
              <div class="controls">
                  <div class="input-prepend">
                      <span class="add-on"><i class="icon-user"></i></span>
					  <input id="input-username" name='username' type="text" placeholder="Username" />
                  </div>
              </div>
          </div>
          <div class="control-group">
              <div class="controls">
                  <div class="input-prepend">
                      <span class="add-on"><i class="icon-key"></i></span>
					  <input id="input-password" name='password' type="password" placeholder="Password" />
                  </div>
                  <div class="clearfix space5"></div>
              </div>

          </div>
      </div>

      <input type="submit" id="login-btn" class="btn btn-block login-btn" value="Login" />
    </form>
    <!-- END LOGIN FORM -->        
  </div>
  <!-- END LOGIN -->
  <!-- BEGIN COPYRIGHT -->
  <div id="login-copyright">
      2013 &copy;  PORTAL INVESTASI KOTA MAKASSAR 
  </div>
</body>
<!-- END BODY -->
</html>