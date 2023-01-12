<!DOCTYPE html>
<html lang="en">
<?php
include_once '_header.php';
?>
<body>
    <?php 
    if(isset($_POST["sign_up"])){
        include_once '_db_connexion.php';
        $name=$_POST["name"];
        $email=$_POST["email"];
        $passw=$_POST["password"];
        $n=trim($name,' ');
        $e=trim($email,' ');
        $p=trim($passw,' ');
        $passw=md5($passw);
        if(empty($n) || empty($e) || empty($p)):?>
        <div class=" p-2 mb-2 text-white border border-danger bg-danger bg-gradient ">
          <h2>un champ est vide,tout les champs sont obligatoire</h3>
        </div>
        <?php
        else:
        $date=date("y-m-d h:i:s");
        $inst=$db->prepare("SELECT id from user WHERE email=:e ");
        $inst->bindParam(':e',$email); 
        $inst->execute();
        $user=$inst->fetch(PDO::FETCH_OBJ);
        if(!empty($user)){
            echo 'we have an account with this email';
        }
        else{

        $inst=$db->prepare("INSERT INTO user (name,email,passwordd,created_at) VALUES(:n,:e,:p,:d)");
        $inst->bindParam(':n',$name);
        $inst->bindParam(':e',$email);
        $inst->bindParam(':p',$passw);
        $inst->bindParam(':d',$date);
        $inst->execute();
        echo 'ton compte est cree avec succès';
        $db=NULL;}
      endif;
    }
    ?>
    <h1> create an account</h1>
    <form method="post" action=" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="container">
	       <div class="row">
		       <div class="col-lg-6 m-auto">
             <div class="mb-3" >
               <label class=" m-2 form-label"> name: </label>
               <input type="text" name="name"  class=" form-control border-primary m-2">
             </div>
             <div class="mb-3" >
               <label class="m-2 form-label"> email: </label>
               <input type="text" name="email" class=" form-control border-primary m-2" >
             </div>
             <div class="mb-3" >
               <label class="m-2 form-label"> password: </label>
               <input type="password" name="password" class="form-control border-primary m-2" >
             </div>
             <div class="mb-3" >
               <button type="submit" name="sign_up" class="m-2 btn btn-primary" > sign up</button>
             </div>
            </div>
          </div>
        </div>
    </form>
    <?php include_once 'footer.html';?>
</body>
</html>