


<div class="row margin_top_full margin_bottom_full">
        <div style="margin:auto;width:400px;margin-top: 50px">
            <form method="post" class="text-center">
                <div  class="text-center form-group">
                    <img src="<?=base_url('assets/images/user-i.png'); ?>" class="iconosPanel" width="150px" alt="Doctor">
                </div>
                <div class="">
                <?php
                    if(!empty($success_msg))
                    {
                    echo '<p class="alert-success">'.$success_msg.'</p>';
                    }elseif(!empty($error_msg)){  echo '<p class="alert alert-danger">'.$error_msg.'</p>';  }
                ?>
                    <div class="form-group">
                            <input  id="codigo" type="cedula" class="form-control text-center" name="cedula" placeholder="Cédula de identidad" required="">
                    </div>

                    <div class="form-group">
                            <input type="password" class="form-control border-input text-center" name="clave" placeholder="Clave de acceso" required="">
                            <?php echo form_error('password','<span class="help-block">','</span>'); ?>
                    </div>
                    
                
                    <div class="form-group">
                        <input type="submit" name="loginSubmit" class="btn btn-info btn-lg btn-block" value="Iniciar sesión"/>
                    </div>
                </div>
            </form>
        </div>
    </div>


