<?php include_once '_ses.php' ;?>
<!DOCTYPE html>
<html lang="en">
<?php include_once '_header.php';?>
<body>
    <h1>list of announcement</h1>
    <?php
    include_once '_db_connexion.php';
    include_once '_nav.php';
    ?>
    
            <?php 
            $inst=$db->prepare("SELECT * FROM announcement ORDER BY created_at DESC ") ;
            $inst->execute();
            $annances=$inst->fetchall(PDO::FETCH_OBJ);
            ?>      
            <div class="container">
              <div class="row"> 
               <?php foreach($annances as $annance):?>
		         <div class="col-lg-5 border border-primary-subtle border-2 p-1 rounded mb-4 me-6 ms-5">  
                     <h2><?php echo $annance->title ;?></h2>
                     <p><?php echo $annance->created_at ;?></p>
                     <p><?php echo $annance->content ;?></p>
                     <button type="button" class="btn btn-info" >
                         <a href="update.php?id='<?php echo $annance->id; ?>'" class="text-white">modifier</a>
                     </button>
                     <button type="button" class="btn btn-danger">
                      <a href="delete.php?id='<?php echo $annance->id; ?>'" name="delete" class="text-white">supprimer</a>
                    </button>
                 </div>
                 <?php endforeach; ?>
              </div>
              
            </div>
     <?php include_once 'footer.html';?>



</body>
</html>