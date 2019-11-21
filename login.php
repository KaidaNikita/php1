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

            if (isset($_POST['password']) and !empty($_POST['password'])) {
                $password = $_POST['password'];
            } else {
                $errors["password"] = "Поле пароль є обов'язковим";
            }

        if($email!="admin@gmail.com"&&!empty($email))
        {
            $errors["email"]="Не правильна пошта";
        }
        if($password!="123456"&&!empty($password))
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
<?php include_once "input-helper.php"/*Використав input-helper.php для зручності*/?>
<div class="login-container">
            <div class="row">
                <div class="offset-md-3 col-md-6 login-form-1">
                    <h3 class="center">Вхід в акаунт</h3>
                    <?php if(count($errors)!=0) { ?>
                        <div class="alert alert-danger" role="alert">
                              <?php 
                                if(!empty($errors["email"]))                              
                                echo $errors["email"];
                                echo "<br/>";
                                if(!empty($errors["password"]))
                                echo $errors["password"];
                              ?>
                        </div>
                    <?php } ?>
                    <form method="post" id="form_register">

                    <?php create_input("email", "Електронна пошта", "email", $errors); ?>

                    <?php create_input("password","Пароль", "password", $errors); ?>
                    <div class="form-group">
                    <input type="submit" class="btnSubmit" value="Логін"/>
                    </div>
                        <div class="form-group">
                            <a href="register.php" class="ForgetPwd">Реєстрація</a>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>

<?php include "_scripts.php"; ?>

<?php include "_footer.php"; ?>
