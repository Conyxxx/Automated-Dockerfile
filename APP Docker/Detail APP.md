# Aplicacion Automated Dockerfile V.1
## Voy a explicar el codigo del primer borrador de la aplicacion para crear un dockerfile al gusto del cliente.


### Codigo HTML
```
<form action="save2.php" method="POST">
        <p>Imagenes</p>
        <input type="checkbox" name="IMAGENES[]" value="debian"> &nbsp; Debian <br>
        <input type="checkbox" name="IMAGENES[]" value="ubuntu">&nbsp; Ubuntu<br>
        <br>
        <p>Versiones de Imagenes</p>
        <input type="checkbox" name="VERSION[]" value="slim">&nbsp; Slim <br>
        <input type="checkbox" name="VERSION[]" value="jessie">&nbsp; Jessie <br>
        <input type="checkbox" name="VERSION[]" value="16.04">&nbsp; Ubuntu-16.04<br>
        <br>
        <p>Funcion</p>
        <input type="checkbox" name="ACTUALIZAR[]" value="update">&nbsp; Actualizar<br>
        <br>
        <p>Paquetes</p>
        <input type="checkbox" name="SERVICIOS[]" value="php">&nbsp; PHP <br>
        <input type="checkbox" name="SERVICIOS[]" value="mysql">&nbsp; Mysql <br>
        <input type="checkbox" name="SERVICIOS[]" value="apache">&nbsp; Apache<br>
        <input type="checkbox" name="SERVICIOS[]" value="nginx">&nbsp; NGINX<br>
        <br>
        <input type="submit" name="Enviar" value="Submit">
    </form>
```
<p>Como se puede observar es un codigo facil de entender, he optado por las opciones de checkbox, para hacer que el cliente elija desde la imagen que quiera usar hasta los servicios que quiera instalar.</p>
<p>En el valor de name=cosa[] es para que asi pueda almacenar la casilla marcada y poder usarla en el codigo php que explicare mas tarde</p>
### Codigo PHP
```
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
            $var3 = "&& \n";#Los saltos de linea para el archivo de configuracion
            fwrite($doc,"$var1 $image:$version");
            fwrite($doc,"$var2 $actualizar $var3");
            fwrite($doc, "$servicios $var3");
            fclose($doc);
            print_r(error_get_last());
}
?>
```
<p>Este es el codigo php para ver como sera el documento de configuracion y guardarlo en un archivo de texto plato.<p>
<p>La primera sentencia de if es para el boton de Enviar que al pulsarlo haga los demas if, y he ido jugando un poco con mas if anidados para que saquen por pantalla el documento de texto de como tiene que quedar el dockerfile.</p>
<p>Los simbolos && hacen la funcion de salto de linea.</p>
<p>Y a traves de algunas variables que he creado con un formato de texto he ido jugando con la funcion de fwrite, al guardar la seleccion de la variable de mas arriba.</p>
<p>De momento estoy atascado en como hacer que guarde mas de una apcion al elegir los servicios de instalacion ya que solo coge una, y no como muestra por pantalla.</p>

## P.D Esto es un borrador no es algo definitivo.