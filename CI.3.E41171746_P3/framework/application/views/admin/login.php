<?php
$data['Judul'] = 'Login';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Pemanggilan modul head.php -->
  <?php $this->load->view('admin/_partials/head' , $data);?>
</head>

    <div id="wrapper">


      <div id="content-wrapper">

        <div class="container-fluid">
          

          <!-- Icon Cards-->
          <body class="bg-dark">

        <div class="container">
        <div class="card card-login mx-auto mt-5">
            <div class="card-header">Login</div>
            <div class="card-body">
            <form action="<?= base_url('Login/login'); ?>" method="post">
                <div class="form-group">
                <div class="form-label-group">
                    <input type="text" id="inputEmail" class="form-control" placeholder="Email address" required="required" autofocus="autofocus" name="username">
                    <label for="inputEmail">Username</label>
                </div>
                </div>
                <div class="form-group">
                <div class="form-label-group">
                    <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="required" name="password">
                    <label for="inputPassword">Password</label>
                </div>
                </div>
                <div class="form-group">
                <div class="checkbox">
                    <label>
                    <input type="checkbox" value="remember-me">
                    Remember Password
                    </label>
                </div>
                </div>
                <button type="submit" name="login" class="btn btn-primary btn-block">Login</button>
            </form>
            <div class="text-center">
                <a class="d-block small mt-3" href="register.html">Register an Account</a>
                <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
            </div>
            </div>
        </div>
        </div>


        </div>  
        <!-- /.container-fluid -->       
        
      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript-->
    <?php $this->load->view('admin/_partials/js');?>

  </body>

</html>
