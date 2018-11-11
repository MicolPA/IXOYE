
<div class="container">
<div class="jumbotron">
<div class="text-center">
    <h2>Hola bienvenido! Doctor</h2> 



<?php
    if($this->session->userdata('isUserLoggedIn'))
    {
        $u=$this->session->userdata('userId');
        $doctor = $this->db->query("SELECT * FROM `doctores` WHERE idDoctores = {$u} limit 1")->row();
        //var_dump($paciente);

        echo $doctor->Nombre;
        //load the view
    
    
?>
<?php }else{ ?>
    <h3>Primero lo primero debes iniciar</h3> <br /><br /> 
    
    <a class="btn btn-default" href="<?=base_url('login');?>">Session</a>    

<?php } ?>

<div>
<div>
<div>