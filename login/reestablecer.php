<?php
include('../admin/bd.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../PHP-mailer/Exception.php';
require '../PHP-mailer/PHPMailer.php';
require '../PHP-mailer/SMTP.php';


$errores = '';
$enviado = '';

// Comprobamos que el formulario haya sido enviado.
if (isset($_POST['submit'])) {
	
	$correo = $_POST['correo'];


	if (!empty($correo)) {
		$correo = filter_var($correo, FILTER_SANITIZE_EMAIL);
		// Comprobamos que sea un correo valido
		if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
			$errores.= "Por favor ingresa un correo valido.<br />";
		}
	} else {
		$errores.= 'Por favor ingresa un correo.<br />';
	}



// Comprobamos si hay errores, si no hay entonces enviamos.
	if (!$errores) {
		
		//Create an instance; passing `true` enables exceptions
		$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.office365.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'maximilianojlopez@hotmail.com';                     //SMTP username
    $mail->Password   = 'mailen13082019';                               //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('maximilianojlopez@hotmail.com');
    $mail->addAddress($correo);     //Add a recipient
    
    
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Reestablecer password';
    $mail->Body =file_get_contents('reset.php');
    $mail->send();

    
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
		
	}
}
	
?>

<!doctype html>
<html lang="es">
  <head> 
  	<title>Malusa Coffee</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">

	</head>
	<body class="img js-fullheight" style="background-image: url(../img/fotos/fondos/13.jpg);">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section"></h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
					<br><br>
		      	<h3 class="mb-4 text-center">Reestablecer contraseña</h3>
				<br>
				<form action="" method="post">
				<div class="form-group">
		      			<input type="text" name="correo" id="correo" class="form-control" placeholder="Correo  electronico" required>
		      		</div><br>
	            <div class="form-group">
	            	<button type="submit" name="submit" class="form-control btn btn-primary submit px-3">Reestablecer</button>
	            </div>
				<div class="form-group">
					<a name="" id="" class="form-control btn btn-primary submit px-3" href="index.php" role="button">Cancelar</a>
	            </div>
				
	          </form>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="js1/jquery.min.js"></script>
  <script src="js1/popper.js"></script>
  <script src="js1/bootstrap.min.js"></script>
  <script src="js1/main.js"></script>

	</body>
</html>

