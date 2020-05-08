<?php
if( isset($_POST['Enviar'])){
#Los 3 primeros IF muestran por pantalla el formato del archivo el como ha elegido el usuario.
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

        if(isset($_POST['APLICACIONES'])){
            echo "apt-get install -y ";
            foreach ($_POST['APLICACIONES'] as $aplicaciones) {
                echo $aplicaciones . " "  ;
            }
            echo "&& ";
        }
                #Funcion de guardar en un archivo de texto
                $doc = fopen("Dockerfile.txt","w+") or die('Cannot open or create the file');
                $var1 = "FROM"; #Decirle de que imagen parta la instalacion
                $var2 = "\nRUN apt-get install -y"; #Lanzar un comando
                $var3 = "&&";
                fwrite($doc,"$var1 $image:$version");
                fwrite($doc,"$var2 $aplicaciones $var3");
                fclose($doc);
                print_r(error_get_last());
    }
##Parte de la creacion del contenedor
$nombre = $_POST['NOMBRE'];
foreach($nombre as $key => $i){
    #print "Tu contenedor se ha creado con el nombre de: " .$i."\n";
    exec("docker build -t" .$i." ." );
}
?>