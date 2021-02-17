<?php
    require "includes/class.phpmailer.php";
    require 'vendor/autoload.php';


  $mail = new phpmailer();
  $mail->PluginDir = "includes/";

  $mail->Mailer = "smtp";

  /*Asignamos a Host el nombre de nuestro servidor smtp*/
  $mail->Host = "smtp.google.com";

  /*El server requiere autentificacion*/
  $mail->SMTPAuth = true;

  /*Le decimos cual es nuestro nombre de usuario y password*/
  $mail->Username = "sbazgra003.alumnado@politecnicomalaga.com";
  $mail->Password = "Politecnico.1";

  /*Indicamos el correo y el nombre que queremos que vea el usuario*/
  $mail->From = "admin@TiendaWeb.com";
  $mail->FromName = "Equipo 1 Politecnico";

  $mail->Timeout=30;
    
  //Indicamos cual es la dirección de destino del correo
  $mail->addAddress($emailalta);

  //Asignamos asunto y cuerpo del mensaje
  //El cuerpo del mensaje lo ponemos en formato html, haciendo
  //que se vea en negrita
  $mail->Subject = "Alta correcta";
  $mail->Body = "<b>Muy bien, ya esta dado de alta en nuestra tienda</b>";

  //Definimos AltBody por si el destinatario del correo no admite email con formato html
  $mail->AltBody = "Muy bien, ya esta dado de alta en nuestra tienda";

  //se envia el mensaje, si no ha habido problemas
  //la variable $exito tendra el valor true
  $exito = $mail->Send();

  //Si el mensaje no ha podido ser enviado se realizaran 4 intentos mas como mucho
  //para intentar enviar el mensaje, cada intento se hara 5 segundos despues
  //del anterior, para ello se usa la funcion sleep
  $intentos=1;
  while ((!$exito) && ($intentos < 5)) {
	sleep(5);
     	//echo $mail->ErrorInfo;
     	$exito = $mail->Send();
     	$intentos=$intentos+1;

   }


   if(!$exito)
   {
	echo "Problemas enviando correo electrónico a ".$valor;
	echo "<br/>".$mail->ErrorInfo;
   }
   else
   {
	echo "Mensaje enviado correctamente";
   }
?>
