<?php
if( isset($_POST['Enviar'])){

    if(isset($_POST['IMAGENES'])){
        echo "FROM ";
        foreach ($_POST['IMAGENES'] as $image){
            echo $image . " : ";
        if(isset($_POST['VERSION'])){
            foreach($_POST['VERSION'] as $version){
                echo $version;
            }
        }
            echo "<br>";
        }

    }

    if(isset($_POST['ACTUALIZAR'])){
        echo "RUN apt-get ";
        foreach ($_POST['ACTUALIZAR'] as $actualizar){
            echo $actualizar . " ";
        }
        echo '&&';
        echo "<br>";
    }

    if(isset($_POST['SERVICIOS'])){
        echo "apt-get install -y ";
        foreach ($_POST['SERVICIOS'] as $servicios) {
            echo $servicios . " "  ;
        }
        echo "&& ";
    }
            #Funcion de guardar en un archivo de texto
            $doc = fopen("Dockerfile.txt","w+") or die('Cannot open or create the file');
            $var1 = "FROM"; #Decirle de que imagen parta la instalacion
            $var2 = "\nRUN apt-get -y"; #Lanzar un comando
            $var3 = "&&";
            fwrite($doc,"$var1 $image:$version");
            fwrite($doc,"$var2 $actualizar $var3");
            fclose($doc);
            print_r(error_get_last());
}
if(isset($_POST['Crear'])){
    exec("docker build -t .");
}
?>