# Esta vez he cambiado una cosa con respecto al formato de como se guardaba el archivo de configuracion.

### Como se puede ver en el codigo esa es una de las maneras mas feas que pude pensar en su momento para dar forma al archivo de configuracion. Pero se me ocurrio una idea que quedaria mas bonito y me permitiria usar el caracter "\\" ya que hace de salto de lineas.

```
$doc = fopen("Dockerfile.txt","w+") or die('Cannot open or create the file');
$var1 = "FROM"; #Decirle de que imagen parta la instalacion
$var2 = "\nRUN apt-get install -y"; #Lanzar un comando
$var3 = "&&";
fwrite($doc,"$var1 $image:$version");
fwrite($doc,"$var2 $aplicaciones $var3");
fclose($doc);
```

### Esta es la idea bonita y que me siento orgulloso de ella.
```
$doc = fopen("Dockerfile.txt","w+") or die('Cannot open or create the file');
fwrite($doc, "FROM " .$image. ":" .$version);
fwrite($doc, "\nRUN apt-get " .$actualizar." && \\ \n");
fwrite($doc, "apt-get install -y ".$aplicaciones. " && \\ \n");
fwrite($doc, "EXPOSE 80 443");
fclose($doc);
print_r(error_get_last());
```
### Aqui como se puede apreciar tiene mas forma y se puede entender mejor, el hecho de usar variables con un texto predeterminado lo hacia mas lioso a la hora de leer el codigo, uno de mis problemas era que no tenia el parametro "EXPOSE" para activar los puertos de las aplicaciones.

### Cosas que he pensado hacer, sigo sin poder hacer que me coja mas de una opcion en la variable de las aplicaciones, estoy pendanso en como hacerlo todavia.
### Otra cosa es hacer un if para el tema de los puertos no me gusta la idea de abrir tantos puertos de golpe.
### Dar un aspecto mas atractvo a la pagina, parece de un principiante.