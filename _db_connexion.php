<?php
$server="localhost";
$username="root";
$password="";
$dbn="announcement";
try{
$db=new PDO("mysql:host=$server;dbname=$dbn",$username,$password);
}
catch(Exception $ex){
    $msg='probleme de connexion au data';
    echo $msg;
    $retval=mail('hafssa.2017m5@gmail.com','erreur',$msg);
    if( $retval == true ) {
        echo "Message sent successfully...";}

}
?>