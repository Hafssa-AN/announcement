<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary ">
        <div class="collapse navbar-collapse justify-content-between" >
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="announcement.php" class="nav-link" >liste des Annances</a>                
                </li>
                <li class="nav-item">
                    <a href="add.php" class="nav-link" >ajouter une Annance</a>
                </li>
                
                <?php if(empty($_SESSION["email"])):?>
                <li>
                <div class="mb-3 rounded float-end " >
                  <button type="submit" name="log_in" class=" m-2 btn btn-primary " ><a href="form_conn.php" class="text-light"> log in</a></button>
                </div>
                </li>
                <li>
                 <div class="mb-3 rounded " >
                 <button type="submit" name="sing_up" class=" m-2 btn btn-primary " ><a href="form_inscript.php"  class="d-flex text-light" > creer un compte </a>
                </div>
                </li>
                <?php else: ?>
                <li class="nav-item">
                    <a href="user_account.php" class="nav-link " > mon compte </a>
                </li>
                <?php endif; ?>

                
            
            </ul>
        </div>

                 
    
    </nav>
</body>
</html>