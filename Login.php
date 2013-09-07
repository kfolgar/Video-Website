<?php 
 
    session_start();
    include_once "conexion.php";
 
    //import_request_variables("GP", "");
    
    function verificar_login($usuario,$password,&$result)
    {
    	
        $sql = "SELECT * FROM registros WHERE usuario = '$usuario' and password = '$password'";
        $rec = mysql_query($sql);
        $count = 0;
        
        while($row = mysql_fetch_object($rec))
        {
            $count++;
            $result = $row;
        }
        if($count == 1)
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }
    
    if(!isset($_SESSION['userid']))
    {
        if(isset($_POST['login']))
        {
            if(verificar_login($_POST['usuario'],$_POST['password'],$result) == 1)
            {
                $_SESSION['userid'] = $result->idusuario;
                //$_SESSION['username'] = $result->usuario;
                //$_SESSION['name'] = $result->nombres;
                //$_SESSION['type'] = $result->type;
                    header("location:main.php");
            }
            else
            {
                echo '<div class="error">Su usuario es incorrecto, intente nuevamente.</div>';
            }
        }
     
 ?>
		<style type="text/css">
		
		body {
			background: url('img/finger.png') no-repeat fixed center ;
			background-repeat: repeat-x;
			background-x-position: center;
			background-y-position: top;
			background-attachment: fixed;
			margin-top: 0px;
			margin-right: 0px;
			margin-bottom: 0px;
			margin-left: 0px;
			font-family: 'Droid Sans', sans-serif;
		}
		
		*{
			font-size: 14px;
			font-family: sans-serif;
		}
		form.login {
		    background: none repeat scroll 0 0 #F1F1F1;
		    border: 1px solid #DDDDDD;
		    margin: 220px auto 0;
		    padding: 20px;
		    width: 278px;
		}
		form.login div {
		    margin-bottom: 15px;
		    overflow: hidden;
		}
		form.login div label {
		    display: block;
		    float: left;
		    line-height: 25px;
		}
		form.login div input[type="text"], form.login div input[type="password"] {
		    border: 1px solid #DCDCDC;
		    float: right;
		    padding: 4px;
		}
		form.login div input[type="submit"] {
		    background: none repeat scroll 0 0 #DEDEDE;
		    border: 1px solid #C6C6C6;
		    float: right;
		    font-weight: bold;
		    padding: 4px 20px;
		}
		.error{
			color: red;
		    font-weight: bold;
		    margin: 10px;
		    text-align: center;
		}
		
		</style>
          
           <form action="" method="post" class="login">
		    <div><label>Usuario: </label><input name="usuario" type="text" value=""></div>
		    <div><label>Clave: </label><input name="password" type="password" value=""></div>
		    <div><input name="login" type="submit" value="Iniciar"></div>
			</form>
    <?php
} else {
	echo 'Su usuario ingreso correctamente.';
	
}
?>

<script>
   $(document).ready(function () {
      var hash = window.location.hash;
      if (hash == "#mdx") {
         $('#myModal').modal();
      }
   });
</script>

