<?php

//Lista de todos los alumnos registrados en la tabla alumnos

//Se crea un objeto de tipo controlador para poder llamar los metodos para traer toda la informacion
$controlador = new Controlador();

//Se crea un array que va a recibir todos los obejtos 
$datosTemas = array();

//Y se llena ese array con la respuesta con los datos
$datosTemas = $controlador -> obtenerDatosTemas();

?>

<section class="content-header">
    <h1>
        Temas de tutorias
    </h1>
    
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Temas de tutorias </a></li>
        <li class="active"> Lista de temas</li>
    </ol>

</section>

<!-- Main content -->
<section class="content">

<div class="box box-primary">


<div class="box">

    <div class="box-header">
        <!--<h3 class="box-title">Data Table With Full Features</h3> -->
        <a href="index.php?action=agregar_tema" class="btn btn-primary " > <i class="fas fa-plus-square"></i> Agregar nuevo tema </a>
        <hr>
    </div>

    <!-- /.box-header -->
    <div class="box-body">
        <table id="tabla" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <!--Columnas de la cabecera de la tabla-->
                    <th>Id</th>
                    <th>Tema</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    //La tabla es llenada dinamicamente creando una nueva fila por cada registro en la tabla, toda la ifnormacion que aqui se despliega se trajo desde el controler con el metodo anteriormente definido
                    for($i=0; $i < count($datosTemas); $i++ ){
                        echo '<tr>';
                            echo '<td>'. $datosTemas[$i]['tema_id'] .'</td>';
                            echo '<td>'. $datosTemas[$i]['tema_nombre'] .'</td>';

                            //Estos dos de abajo son los botones, se puede observar que estan listos para redirigir el flujo de la app a una pagina, teniendo un parametro el cual es la matricula del alumno a administrar

                            echo '<td> <a href="index.php?action=editar_tema&id='.$datosTemas[$i]['tema_id'] .'" type="button" class="btn btn-warning"> <i class="fas fa-edit"></i> </a> </td>';
                            
                            echo '<td>  <a href="index.php?action=temas&accion=eliminar_tema&id='.$datosTemas[$i]['tema_id'] .'" type="button"  class="btn btn-danger"> <i class="fas fa-trash-alt"></i>  </a> </td>';

                        echo '</tr>';
                    }
                
                ?>
            </tbody>
        </table>
    </div>
</div>

</section>
<!-- /.content -->

<?php

//Valida que se accion el metodo solo si se hace clic en el boton y no cuando se cargue pagina
if(isset($_GET['accion'])) {
    if( $_GET['accion'] == "eliminar_tema"){
        $controlador -> eliminarTema();
    }
}

?>