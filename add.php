<?php include_once '_ses.php' ;?>
<!DOCTYPE html>
<html lang="en">
<?php include_once '_header.php';?>
<body>
    <?php
    if(isset($_POST["submit"])){

        /*echo '<pre>';
        print_r($_POST);
        echo '</pre>';
        */
        $t=$_POST["title"];
        $cnt=$_POST["content"];
        $e=trim($t,' ');
        $p=trim($cnt,' ');
        if( empty($e) || empty($p)): ?>
        <div class=" p-2 mb-2 text-white border border-danger bg-danger bg-gradient ">
          <h3 >un champ est vide,tout les champs sont obligatoire</h3>
        </div>
        <?php
        else: 
        $date=date("y-m-d h:i:s");
        include_once 'connect_user.txt';
        $inst=$db->prepare("INSERT INTO announcement (title,content,created_at) VALUES (:t,:cnt,:ddate) ") ;
        $inst->bindParam(':t', $t);
        $inst->bindParam(':cnt', $cnt);
        $inst->bindParam(':ddate', $date);
        $inst->execute();
        $db=NULL;
        header('Location: announcement.php');
        //$last_id = $db->lastInsertId();
        //echo "New record created successfully. Last inserted ID is: " . $last_id;
        endif;
    }
    
    ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <h2> ajouter une annance </h2>
        <?php
        include_once '_nav.php';
        ?>
        <div class="mb-3">
          <label for="titre" class=" m-2 form-label" > titre de l'annace </label>
          <div class="col-sm-10">
            <input type="text" name="title" id="titre" class="form-control border-primary m-2"><br><br>
          </div>
        </div>
        <div class="mb-3">
          <label for="titre" class=" m-2 form-label" > le contenu de l'annace: </label>
          <textarea name="content"  cols="30" rows="10" class="form-control border-primary m-2"> </textarea><br><br>
        </div>
        <div class="col-12">
          <button type="submit" name="submit" class=" m-2 btn btn-primary"> ajouter </button>
        </div>
    </form>
    <? include_once 'footer.html'; ?>
</body>
</html>