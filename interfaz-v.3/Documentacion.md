# Contenido nuevo
He añadido a mi aplicacion web aparte de estilos para que quede mas o menos como una pagina bien diseñada de un alumno del ciclo superiro, las funciones de crear el contenedor con un nombre dado por el usuario y otra funcion que es para monitorizar o ver que contenedores estan ejecutandose y cuales no.
```
#nombre contenedor
$nombre = $_POST['NOMBRE'];
foreach($nombre as $key => $i){
    #print "Tu contenedor se ha creado con el nombre de: " .$i."\n";
    exec("docker build -t" .$i." ." );
}
#monitorizar
if( isset($_POST['monitor'])){
    exec("docker ps");
}
```
Basicamente es lo mismo que hice arriba.

Por lo demas nada nuevo en mi aplicacion.

Y tambien hice que el campo de actualizacion sea requerido para que el usuario no se lo salte ya que hace falta si o si actualizar el contenedor la primera vez que se usa.
```
<td colspan="3">
    <input type="checkbox" name="ACTUALIZAR[]" value="update" required> &nbsp; Actualizar
</td>
```

Estoy tratando de trabajar sobre el control de errores que de momento no veo como implementarlo en el codigo.