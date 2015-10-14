<?php require_once "/../header.php" ?>

  <div class="container-fluid">    
    <div class="col-md-4 col-md-offset-4">
      <div style="display: block; margin-top: 40px;">
      
      <?php if(App\Core\Session::exists('errors')) { ?>
      <div class="alert alert-danger">
      <?php
        foreach(App\Core\Session::flash('errors') as $error) {
          echo '<li>'. $error .'</li>';
        }
      ?>
      </div>
      <?php } ?>

      </div>
      <h1 class="page-header">Please Log In First</h1>
      <form action="<?php echo route('post-login') ?>" method="post">
        <div class="form-group">
          <label>Username</label>
          <input type="text" class="form-control" name="username" autofocus="autofocus">
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="password" class="form-control" name="password">
        </div>
        <div class="form-group">
          <input type="submit" value="Log In" class="btn btn-primary">
        </div>
      </form>
    </div>
  </div>

<?php require_once "/../footer.php" ?>