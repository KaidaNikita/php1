<?php
    $errors=array();
    $email='';
    $password='';
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        if(isset($_POST['email']) and !empty($_POST['email']))
        {
            $email=$_POST['email'];
        }
        else
            $errors["email"]="Поле пошта є обов'язковим";

            if(isset($_POST['password']) and !empty($_POST['password']))
            {
                $password=$_POST['password'];
            }
            else
                $errors["password"]="Поле пароль є обов'язковим";

        if($email!="admin@gmail.com")
        {
            $errors["email"]="Не правильна пошта";
        }
        if($password!="123456")
        {
            $errors["password"]="Не правильний пароль";
        }

        if(count($errors)==0) {
            header("Location: /index.php");
            exit;
        }
    }
?>

<?php include "_header.php"; ?>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?php if(count($errors)!=0) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $errors["email"] ?>
                            .
                            <?php echo $errors["password"] ?>
                        </div>
                    <?php } ?>
      <div class="login-container">
            <div class="row">
                <div class="offset-md-3 login-form-1">
                    <h3>Login for Form 1</h3>
                    <form id="myForm" method="post">
                    <div>
                        <div class="form-group">
                            <input type="email" 
                                class="form-control" 
                                name="email"
                                placeholder="Your Email *" 
                                value="" />
                        </div>
                        <div class="form-group">
                            <input type="password" 
                             name="password" 
                             class="form-control"
                             placeholder="Your Password *" 
                             value="" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" id="submitBtn"  value="Login" />
                        </div>
                        <div class="form-group">
                            <a href="#" class="ForgetPwd">Forget Password?</a>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
      </div>
    </div>
  </div>
</div>


<?php include "_footer.php"; ?>
