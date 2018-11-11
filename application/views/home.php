<body>
<div class="container">
<div class="jumbotron">
<div class="text-center">
    <h2>Hola bienvenido!</h2> 



<?php
    if($this->session->userdata('isUserLoggedIn'))
    {
        $u=$this->session->userdata('userId');
        $paciente=$this->db->query("SELECT * FROM `paciente` WHERE id = {$u} limit 1")->row();
        //var_dump($paciente);

        echo $paciente->Nombre;
        //load the view
    }
    
?>
    <h3>Primero lo primero debes iniciar Sesión</h3> <br /><br /> 
    
    <a class="btn btn-default" href="<?=base_url('login');?>">Session</a>
<div>
<div>
<div>
</body>
</html>