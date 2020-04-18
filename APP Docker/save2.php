<?php
if( isset($_POST['Enviar'])){
    if(isset($_POST['IMAGENES'])){
        echo "FROM ";
        foreach ($_POST['IMAGENES'] as $value){
            echo $value . " : ";
        if(isset($_POST['VERSION'])){
            foreach($_POST['VERSION'] as $value){
                echo $value;
            }
        }
            echo "<br>";
        }

    }
    if(isset($_POST['SERVICIOS'])){
        echo "RUN apt-get install -y ";
        foreach ($_POST['SERVICIOS'] as $value) {
            echo $value . " "  ;
        }
        echo "&& ";
    }

}
?>