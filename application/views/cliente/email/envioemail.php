<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
// use PHPMailer\PHPMailer\Exception;
//
//Load Composer's autoloader

  $firstname = $_GET['firstname'];
  $lastname = $_GET['lastname'];
  $email = $_GET['email'];
  $password = $_GET['password'];
  $gender = $_GET['gender'];

  require 'vendor/autoload.php';

  /*$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
                                // Enable verbose debug output
   $mail->isSMTP();                                      // Set mailer to use SMTP
      $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
      $mail->SMTPAuth = true;                               // Enable SMTP authentication
      $mail->Username = 'informatica.dgep@unmsm.edu.pe';                 // SMTP username
      $mail->Password = 'pYq8fuLv';                           // SMTP password
      $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
      $mail->Port = 587;                                    // TCP port to connect to

      $mail->setFrom('duvanbrabrid@gmail.com', 'Restaurante La Reserva');
      $mail->addAddress( $email, 'Restaurante La Reserva');     // Add a recipient

      $mail->addBCC('duvanbradbrid@gmail.com');

      $mail->isHTML(true);                                  // Set email format to HTML
      $mail->Subject = 'Restaurante La Reserva: Registro de datos';
      $mail->Body .="<h3>Estimado(a) ".$firstname."&nbsp;".$lastname."</h3>";
      $mail->Body .=" <p>Acaba de realizar su registro a trav&eacute;s de nuestra web.</p>";
      $mail->Body .=" <p>Te confirmamos que tus datos fueron registrados con &eacute;xito, como se indica:</p>";
      $mail->Body .=" <li>Nombres: <strong>".$firstname."</strong></li>";
      $mail->Body .=" <li>Apellidos: <strong>".$lastname."</strong></li>";
      $mail->Body .=" <li>Género: <strong>".$gender."</strong></li>";
      $mail->Body .=" <li>email: <strong>".$email."</strong></li>";
      $mail->Body .=" <li>contraseña: <strong>".$password."</strong></li>";
      $mail->Body .= "</ul><p>Esperamos que puedas disfrutar de una gran experiencia pidiendo tus platos favoritos!. Recuerda que en nuestra p&aacute;gina web puedes ver más informaci&oacute;n sobre los productos que ofrecemos.</p>";
      $mail->Body .=" --<br>Saludos.</p>";
      $mail->Body .=" <p style='font-weight: bold; font-size: 80%;'>Unidad de Inform&aacute;tica<br>Restaurante La Reserva<br>FISI - UNMSM</p>";
*/
      //if($mail->send()){
      //  echo "<script>location.href = 'http://localhost/disenio2/application/views/cliente/';</script>";
      //}else{
        echo "<script>location.href = 'http://localhost/disenio2/application/views/cliente/';</script>";
      //}
      
  ?>
