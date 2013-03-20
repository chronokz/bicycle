<?php echo View::make('admin.inc.meta', get_defined_vars() )->render()?>
    <title>Login &lt; <?php echo ADMIN_TITLE?></title>
  </head>
  <body class="admin-sign-in">
      <div class="sign-in">
          <h1>Sign In</h1>
          <?php echo Form::open('admin/login', 'POST',array('class'=>'form-inline'));?>
          <?php echo Form::token()?>
            <div class="control-group">
              <div class="controls">
                <input type="text" class="input-xlarge" id="username" name="username" placeholder="Username...">
              </div>
            </div>
            <div class="control-group">
              <div class="controls">
                <input type="password" class="input-xlarge" id="password" name="password" placeholder="Password...">
              </div>
            </div>
            <input type="submit" class="btn btn-primary" value="Login To Dashboard" />
          <?php echo Form::close()?>
      </div>
    <?php echo View::make('admin.inc.scripts', get_defined_vars() )->render()?>
  </body>
</html>