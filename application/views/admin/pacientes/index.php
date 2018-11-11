
<h3>Listado de pacientes</h3>
<div class="table-responsive">
    <table class="tabla col-md-12">
        <thead class="tabla-th">
          <tr>
            <th>Apellido</th>
            <th>Nombre</th>
            <th>Cédula</th>
            <th>Correo</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($mostrarPacientes as $datos): ?>
            <tr>
                
                <td><span class="text-center"><?php echo $datos->Apellido ?></span></td>
                <td><span class="text-center"><?php echo $datos->Nombre ?></span></td>
                <td><span class="text-center"><?php echo $datos->Cedula ?></span></td>
                <td><span class="text-center"><?php echo $datos->Correo ?></span></td>
                
                <?php if ($_SESSION['rol'] == 'Administrador' || $_SESSION['rol'] == 'Secretaria/o'): ?>
                    
                    <td><a href="<?php echo base_url('index.php/pacientes/editar?id='.$datos->id) ?>" class="btn btn-info"><span class="fui-new"></span></a></td>

                    <td><a onclick="javascript:borrar(<?php echo $datos->id ?>,'paciente')"  class="btn btn-danger"><span class="fui-trash"></span></a></td>

                <?php endif ?>

                <td><a href="<?php echo base_url('index.php/doctor/consulta/' ). $datos->id ?>"  class="btn btn-primary">Consulta</span></a></td>

                <td><a class="btn btn-info" href="<?php echo base_url('index.php/doctor/expediente/' ). $datos->id ?>">Expediente</a></td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
</div>


<div id='div-imagenFlotante'>
  <a href='<?php echo base_url('index.php/pacientes/nuevo'); ?>'>
    <img id="imagenFlotante" src='<?php echo base_url('assets/images/agregar-icon.png'); ?>' width="100%"/>
  </a>
  <div class='tooltip1'>
    <strong>REGISTRAR NUEVO PACIENTE</strong>
  </div>
</div>


