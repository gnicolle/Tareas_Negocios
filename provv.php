<?php
  $registros=array();
  $lasInsertID = 0;
  $conexion= new mysqli("127.0.0.1","root","N1ct@3l","Negocios");
  if ($conexion->errno){
    die("DB no can: " . $conexion->error);
  }

  if(isset($_POST["btnenviar"])){
    $registro=array();
    $registro["Descripcion"]=$_POST["txtdescripcion"];
    $registro["Email"]=$_POST["txtemail"];
    $registro["Telefono"]=$_POST["txttelefono"];
    $registro["Contacto"]=$_POST["txtcontacto"];
    $registro["Direccion"]=$_POST["txtdireccion"];
    $registro["Estado"]=$_POST["optestado"];

    $sqlinsert ="INSERT INTO `proveedores` ( `prvdsc`, `prvemail`, `prvtel`, `prvcont`, `prvdir`, `prvest`)";
    $sqlinsert.="VALUES ('". $registro["Descripcion"] ."' , '". $registro["Email"] ."' , '". $registro["Telefono"] ."' , '". $registro["Contacto"] ."' , '". $registro["Direccion"] ."' , '". $registro["Estado"] ."');";
    $result = $conexion->query($sqlinsert);
  }
    $lasInsertID = $conexion->insert_id;
    $sqlQuery = "Select * from proveedores;";

    $resulCursor = $conexion->query($sqlQuery);

    while($registro = $resulCursor->fetch_assoc()){
      $registros[] = $registro;
    }

    



?>
<html>
  <head>
    <title>Tarea1</title>
  </head>
  <body>
    <h1>Tarea 1</h1>
    <h2>tabla de proveedores</h2>
    <form action="provv.php" method="POST">
      <label for="txtdescripcion">Descripcion</label>
      <input type="text" name="txtdescripcion"/>
      <br>
      <label for="txtemail">Email</label>
      <input type="text" name="txtemail"/>
      <br>
      <label for="txttelefono">Telefono</label>
      <input type="text" name="txttelefono"/>
      <br>
      <label for="txtcontacto">Contacto</label>
      <input type="text" name="txtcontacto"/>
      <br>
      <label for="txtdireccion">Direccion</label>
      <input type="text" name="txtdireccion"/>
      <br>
      <label for="optestado">Estado</label>
      <select name="optestado" id="estado">
        <option value="act">Activo</option>
        <option value="des">desactivo</option>
      </select>
      <br>
      <input type="submit" name="btnenviar" id="btnenviar" value="Enviar registro"/>
      <input type="submit" name="btnmodificar" id="btnenviar" value="modificar"/>
    </form>

    <div>
      <h2>Registros</h2>
      <table border="1">
        <tr>
          <th>Codigo</th>
          <th>Descripcion</th>
          <th>Email</th>
          <th>Telefono</th>
          <th>Contacto</th>
          <th>Direccion</th>
          <th>Estado</th>

        </tr>
          <?php
            foreach($registros as $registro){
              echo "<tr><td>".$registro["prvid"]."</td>";
              echo "<td>".$registro["prvdsc"]."</td>";
              echo "<td>".$registro["prvemail"]."</td>";
              echo "<td>".$registro["prvtel"]."</td>";
              echo "<td>".$registro["prvcont"]."</td>";
              echo "<td>".$registro["prvdir"]."</td>";
              echo "<td>".$registro["prvest"]."</td></tr>";

        }
          ?>
      </table>
    </div>
  </body>
</html>