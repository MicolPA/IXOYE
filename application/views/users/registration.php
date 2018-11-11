

<div class="text-center contenedor">
    <img src="<?php echo base_url('assets/images/user-i.png'); ?>" class="iconosPanel" width="150px">
</div>

    <form method="post" style="margin:auto;width:450px;margin-top: 30px">
    <div class="row">
    <div>    
        <div class="form-group">
            <label>Nombre</label>
            <input type="text" class="form-control border-input" name="name" placeholder="Nombre" required value="<?php echo !empty($user['nombre'])?$user['nombre']:''; ?>">
          <?php echo form_error('name','<span class="help-block">','</span>'); ?>
        </div>
    </div>

    <div>
        <div class="form-group">
            <label>Apellido</label>
            <input type="text" class="form-control border-input" name="lastname" placeholder="Apellido/s" required value="<?php echo !empty($user['apellido'])?$user['apellido']:''; ?>">
          <?php echo form_error('lastname','<span class="help-block">','</span>'); ?>
        </div>
        
        </div>

    <div>   
        <div class="form-group">
            <label>Cedula</label>
            <input type="text" id="codigo" class="form-control border-input" name="cedula" placeholder="Cedula" required value="<?php echo !empty($user['cedula'])?$user['cedula']:''; ?>">
          <?php echo form_error('cedula','<span class="help-block">','</span>'); ?>
        </div>
        
        </div>

        <div >    
        <div class="form-group">
            <label>Correo</label>
            <input type="email" class="form-control" name="correo" placeholder="E-mail" required value="<?php echo !empty($user['correo'])?$user['correo']:''; ?>">
          <?php echo form_error('correo','<span class="help-block">','</span>'); ?>
        </div>

        </div>
        <div >
        <div class="form-group">
            <label>Contraseña</label>
          <input type="password" class="form-control border-input" name="clave" placeholder="Clave" required>
          <?php echo form_error('clave','<span class="help-block">','</span>'); ?>
        </div>

        </div>

        <div >
        <div class="form-group">
            <label>Repetir contraseña</label>
          <input type="password" class="form-control border-input" name="conf_clave" placeholder="Confirme su clave" required>
          <?php echo form_error('conf_clave','<span class="help-block">','</span>'); ?>
        </div>
    </div>   

    <div>
        <div class="form-group">
        <label>Su fecha de nacimiento</label>
            <input type="date" class="form-control border-input" name="fecha_nacimiento">
        
        </div>

        </div>

    
    <div>
        <div class="form-group">
        <label>Sexo</label>
            <?php
            if(!empty($user['gender']) && $user['gender'] == 'Female'){
                $fcheck = 'checked="checked"';
                $mcheck = '';
            }else{
                $mcheck = '';
                $fcheck = '';
            }
            ?>
            <div class="form-group input-group">
                <label>
                <input type="radio" name="gender" value="Hombre" <?php echo $mcheck; ?>>
                Hombre
                </label>
            &nbsp;&nbsp;&nbsp;
                <label>
                  <input type="radio" name="gender" value="Mujer" <?php echo $fcheck; ?>>
                  Mujer
                </label>
            </div>
        </div>

        </div>


        <div >
        <div class="form-group">
        <input type="submit" name="regisSubmit" class="btn btn-primary btn-block" value="Registrar"/>
        </div>

        </div>
      
        </div>
        </div>
    </form>
</div>
</div>
        </div>
