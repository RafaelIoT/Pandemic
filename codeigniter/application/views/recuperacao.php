
<!DOCTYPE html>
<html>
    <head> 
        <meta charset="utf-8">
        <!-- home.html -->
        <title>Recuperacao</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/look.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        
    </head>
    <body>
    <div id="header">
        <a id="logo" href="home">Pandemic</a>
        <a id="login" href="registo">Register</a>
        <a id="register" href="login">Login</a>
    </div>

<div id="recup">
<form method="POST" action="recuperacao1" id="formm">
    <p id="mail"> Insira o seu email:</p><br>
  <input type="text" name="email" id="targ1"><br>
    <p id="perg"> Insira a resposta à pergunta de segurança:</p><br>
  <input type="text" name="seg" id="targ2"><br>
          <input type="submit" name="submit" value="Recuperar" id="btn"/>
</form>
        </div>
        
        <script>
        $('document').ready(function(){
        $('input[type=text]').keyup(function() {
        if ($('#targ1').val() !='' && $('#targ2').val() !=''){
            $("#btn").css("display","block");
        } else {
            $("#btn").css("display","none");
            }
    });});
        
        </script>
    </body>
</html>