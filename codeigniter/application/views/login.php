<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />

    <title>Home</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="http://appserver-01.alunos.di.fc.ul.pt/~asw011/etapa2/codeigniter/assets/css/style.css">

</head>
    
<body>
    <div id="header"> 
        <a href="home" id="logo">Pandemic</a>

    </div>
    
    <div id="form_back"></div>
    
    <div id="form_login">
        
        <form method="post" action="login_check">
			<p id="email_log">E-mail</p>
			<input id="e" type="text" name="email" value="">
			<span class="error"></span>
			<br><br>
			
			<p id="user_log">Username</p>
			<input id="u"  type="text" name="username" value="">
			<span class='error'></span>
			<br><br>
			
			<p id="pass_log">Password</p>
			<input id="p" type="password" name="password" value="">
			<br><br>
			
            <a id="recuperacao" href="recuperacao">Esqueci-me da password</a>
            <br><br>
			<input type="submit" name="submit" value="Submit">  
		</form>
        
    </div>
    
    
    
    
</body>
    
</html>

<script>
$(document).ready(function (){
    validate();
    $('#u, #p, #e').change(validate);
});

function validate(){
    if ($('#u').val().length>0 ||
        $('#p').val().length>0 &&
        $('#e').val().length>0) {
        $("input[type=submit]").prop("disabled", false);
    }
    else {
        $("input[type=submit]").prop("disabled", true);
    }
}


    

</script>