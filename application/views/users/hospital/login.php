    

                

    <div class="row">
        <div  style="margin:auto;width:400px;margin-top: 50px">
            <form method="post" class="text-center">
                <div  class="text-center form-group">
                    <img src="<?=base_url('assets/images/candado-icon.png'); ?>" class="iconosPanel" width="150px" alt="Doctor">
                </div>
                <div class="text-center">
                    <?php
                    if(!empty($success_msg)) {   echo '<span class="alert-success">'.$success_msg.'</span>'; }
                    
                    elseif(!empty($error_msg)) {echo '<div class="alert alert-danger">'.$error_msg.'</div>'; }?>
                    <div class="form-group">
                            <input  id="codigo" type="cedula" class="form-control text-center" name="cedula" placeholder="Cedula de identidad" required="">
                            <?php // onblur="al();" echo form_error('email','<span class="help-block">','</span>'); ?>
                    </div>

                    <div class="form-group">
                            <input type="password" class="form-control border-input text-center" name="clave" placeholder="Su clave de acceso" required="">
                            <?php echo form_error('password','<span class="help-block">','</span>'); ?>
                    </div>
                
                    <div class="form-group text-center">
                            <select class="form-control border-input text-center" name="rol" required>
                                <option value="">Seleccione su rol</option>
                                <option value="1">Soy doctor</option>
                                <option value="2">Soy Secretaria/o</option>
                                <option value="3">Soy Administrador</option>
                            </select> 
                    </div>
                
                    <div class="form-group">
                        <input type="submit" name="loginSubmit" class="btn btn-info btn-block" value="Iniciar sesión"/>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
