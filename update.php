<?php include_once '_ses.php' ;?>
<!DOCTYPE html>
<html lang="en">
<?php include_once '_header.php';?>
<body>

    <?php
    include_once 'connect_data.txt';
    if(isset($_POST['submit'])){
        $id=$_POST['id'];
        $t=$_POST['title'];
        $cont=$_POST['content'];
        if(empty($t) || empty($cont)){
            echo 'tous les champs sont obligatoire';
        }
        else{
            $inst=$db->prepare("UPDATE announcement SET title=:t,content=:cont WHERE id=:id");
            $inst->bindParam(':t',$t);
            $inst->bindParam(':cont',$cont);
            $inst->bindParam(':id',$id);
            $inst->execute();
            //$inst->execute([$t,$cont,$id]);
            $db=NULL;
            header('Location: announcement.php');
        }
       }
    else
    $id=$_GET['id'];
    ?>
    <h1>modifier une annance</h1>
    <?php
    include_once 'nav.html';
    ?>
    
        <?php
            $inst=$db->prepare("SELECT * FROM announcement WHERE id=$id");
            $inst->execute();
            $annance=$inst->fetch(PDO::FETCH_OBJ);
        ?>
        
    <br><br>
    <h2> your new version </h2>
    <form class=''method='post' action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>'>
    <input type="hidden" name="id" id="titre" value="<?php echo $id;?>" >

        <div class="row mb-3">
            <label for="titre"> nouveau titre:</label>
            <div class="col-sm-10">
               <input type="text" name="title" id="titre"  
               value = "<?php echo $annance->title; ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label for="contenu"> nouveau contenu:</label><br>
            <div class="col-sm-10">
               <textarea id="contenu" name="content" cols="30" rows="5">
               <?php echo $annance->content;?>
               </textarea>
            </div>
        </div>
           
        <button type='submit' name='submit'> confirmer </button>
    </form>
    <?php include_once 'footer.html';?>
</body>
</html>