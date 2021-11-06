<?php
    require 'connection.php';
    $message = '';

    if (!empty($_POST['nombre']) && !empty($_POST['apellido'])&& !empty($_POST['email'])&& !empty($_POST['pw'])) {
        $sql = "INSERT INTO usuarios (nombre,apellido,email,pw) VALUES (:nombre, :apellido,:email, md5(:pw))";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nombre', $_POST['nombre']);
        $stmt->bindParam(':apellido', $_POST['apellido']);
        $stmt->bindParam(':email', $_POST['email']);
        $stmt->bindParam(':pw', $_POST['pw']);

        if ($stmt->execute()) {
            $message = 'Nuevo usuario creado con éxito';
          }else{
              $message = 'Lo sentimos, debe haber un problema al crear su cuenta';
          }

    }else {  
    }

    

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <section>
		<div class="color"></div>
		<div class="color"></div>
		<div class="color"></div>
		<div class="box">
			<div class="square" style="--i:0;"></div>
			<div class="square" style="--i:1;"></div>
			<div class="square" style="--i:2;"></div>
			<div class="square" style="--i:3;"></div>
			<div class="square" style="--i:4;"></div>
			 <div class="container">
			 	<div class="form">

                    <?php if(!empty($message)): ?>
                        <p> <?= $message ?></p>
                    <?php endif; ?>

			 		<h2>SignUp</h2>
			 		<form method="post" action="signup.php">
                        <div class="inputBox">
                            <input type="text" name="nombre" placeholder="First Name"></br>
                        </div>
                        <div class="inputBox">
                            <input type="text" name="apellido" placeholder="Last Name"></br>
                        </div>
                        <div class="inputBox">
                            <input type="text" name="email" placeholder="Email"></br>
                        </div>
                        <div class="inputBox">
                            <input type="password" name="pw" placeholder="Password"></br>
                        </div>
                        <div class="inputBox">
                            <input type="submit" value="Sign Up">
                        </div>
                       <p> <a href="Login.php">Login</a> </p>
                       <p> <a href="Logout.php">Logout</a> </p>
                        
                    </form>

			 	</div>
			 </div>
		</div>
	</section>
</body>
</html>

