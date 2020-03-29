<?php
if(isset($_POST['submit'] === "submit")){
    $fh = fopen("Dockerfile") , "a");
    $content = "iso".$_POST("imagen")."\n";
    $content .= "servicios".$_POST("app")."\n");
    $content .= "app".$_POST["id"]
    fwrite($fh,$content);
    fclose($fh);
}
?>