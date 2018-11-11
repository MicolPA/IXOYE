<div class="container">
<div class="jumbotron">
<div class="text-center">
    <h2>Hola bienvenida! Secretaria </h2> 



<?php
    if($this->session->userdata('isUserLoggedIn'))
    {
        
        $s = $this->session->userdata('userId');
        //var_dump($this->session);
        $secre = $this->db->query("SELECT * FROM `secretaria` WHERE idSecretaria = {$s} limit 1")->row();
        //var_dump($paciente);

        echo $secre->Nombre;
        //load the view
    
    
?>
<?php }else{ ?>
    <h3>Primero lo primero debes iniciar</h3> <br /><br /> 
    
    <a class="btn btn-default" href="<?=base_url('login');?>">Session</a>    

<?php } ?>

<div>
<div>
<div>