# Cambios realizados en la aplicacion.

## Lo que he implementado es un campo donde se le tenga que asignar un nombre al contenedor.
## Y he modificado las variables del codigo de php de los campos de los servicios.

### Codigo HMTL
```
<p>Nombre del Contenedor</p>
<input type="text" name="NOMBRE[]">
<br>
<input type="submit" name="Enviar" value="Crear">
```
### Codigo PHP
```
$nombre = $_POST['NOMBRE'];
foreach($nombre as $key => $i){
    #print "Tu contenedor se ha creado con el nombre de: " .$i."\n";
    exec("docker build -t " .$i." ." );
}
```
### Lo que la variable nombre hace es que recogera el texto introducido en el campo para despues usarla en el foreach, la primera linea del foreach hara lo siguiente:
### el valor que tiene nombre se lo dara a la variable key y despues la guardara en otra variable mas sencilla en mi caso la i.
### Y para poder ejecutar un comando usando PHP hay que poner exec y el comando deseado.
### El print lo he puesto para comprobar que funcione el foreach.

# Cosas que me quedan por hacer
### Conseguir hacer que en el archivo de configuracion guarde mas de una seleccion de los checkbox, por pantalla si los saca pero en el archivo de configuracion no, solo saca uno.
### Tambien tendre que pensar como hago para definir las variables de entorno para ciertos servicios, como apache, mysql.
### Y poner bonito la aplicacion web, pero eso sera lo ultimo que haga.