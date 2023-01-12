<?php include_once '_ses.php' ;?>
<!DOCTYPE html>
<html lang="en">
<?php include_once '_header.php';?>
<body>

    <h1> supprimer une annance</h1>
    <?php
    
    $id=$_GET['id'];
    include_once 'connect_data.txt';
    $inst=$db->prepare("SELECT * FROM announcement WHERE id=$id");
    
    $inst->execute();
    $annance=$inst->fetch(PDO::FETCH_OBJ);
    
    
    echo $annance->title.'<br><br>';
    echo $annance->content;
    
    if(isset($_GET['yes'])){
        
           $delete= $db->prepare("DELETE FROM announcement WHERE id=$id ") ;
           $delete->execute(); 
           header('Location: announcement.php');
        }
    elseif(isset($_GET['no']))  header('Location: announcement.php');

    $db=NULL;
    
    ?>
    <div class="ann">
    <p color='red'>Etes vous sur de vouloir supprimer l'annance au dessus? </p>
    <form method='get' method="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <input type="hidden" name="id" id="titre" value="<?php echo $id;?>" >
    <button type='submit' name='yes'> YES</button> &nbsp;&nbsp;&nbsp;
    <button type='submit' name='no' > NO</button>
    <div>
    </form>

    <?php include_once 'footer.html';?>
</body>
</html>