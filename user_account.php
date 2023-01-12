<?php include_once '_ses.php' ;?>
<!DOCTYPE html>
<html lang="en">
<?php
include_once '_header.php';
if(isset($_POST["decon"])){
    session_destroy();
}
?>
<body>
    <h1>hello <?php echo $_SESSION["name"] ?></h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
     <button typr="submit" name="decon"> deconnexion </button>
    </form>
    <?php include_once 'footer.html';?>
</body>
</html>