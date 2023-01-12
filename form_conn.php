<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<?php
include_once '_header.php';
?>
<body>
    <?php
    if(isset($_POST["log_in"])){
        $email=$_POST["email"];
        $passw=$_POST["password"];
        $e=trim($email,' ');
        $p=trim($passw,' ');
        $passw=md5($passw);
        echo $passw;
        if( empty($e) || empty($p)): ?>
        <div class=" p-2 mb-2 text-white border border-danger bg-danger bg-gradient ">
          <h3 >un champ est vide,tout les champs sont obligatoire</h3>
        </div>
        <?php
        else:                   
          include_once '_db_connexion.php';
          $inst=$db->prepare("SELECT * from user WHERE email=:e AND passwordd=:p");
          $inst->bindParam(':e',$email); 
          $inst->bindParam(':p',$passw);
          $inst->execute();
          $user=$inst->fetch(PDO::FETCH_OBJ);
          if(!empty($user)){
            $_SESSION["id"]=$user->id;
            $_SESSION["name"]=$user->name;
            $_SESSION["email"]=$user->email;
            $_SESSION["password"]=$user->passwordd;
            $_SESSION["created_at"]=$user->created_at;
            $_SESSION["update_at"]=$user->updated_at;
            header('Location: announcement.php');
        }
        else echo "your email or your password is incorrect";
      
    endif;
    }   
    ?>
    <h1> se connecter </h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <div class="container">
	      <div class="row">
		      <div class="col-lg-6 m-auto">
            <div class="mb-3" >
             <label class=" m-2 form-label" > email: </label>
             <input type="text" name="email" class="form-control border-primary m-2" >
            </div>
            <div class="mb-3">
             <label class=" m-2 form-label" > password: </label>
             <input type="password" name="password" class="form-control border-primary m-2" >
            </div>
            <div class="mb-3" >
             <button type="submit" name="log_in" class=" m-2 btn btn-primary" > log in</button>
            </div>
            <div class="mb-3" >
             <a href="form_inscript.php" name="sign_up"  > creer un compte </a>
            </div>

          </div>  
        </div>
      </div>

    </form>
    <?php include_once 'footer.html';?>
</body>
</html>