<?php 
	$errors = '';
	$limit_size=10000000;
	$myemail = 'Example@gmail.com'; /*Replace with your email*/
	if(empty($_POST['name'])  ||
	   empty($_POST['email']) ||
	   empty($_POST['message']))
	{
	$errors .= "\n Error: Required Field";
	}	

    /*data*/
	$name = $_POST['name'];
	$email = $_POST['email'];
	$message = $_POST['message'];
	$headers = "From: $email";

	if (!eregi(
	"^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", 
	$email))
	{
	$errors .= "\n Error: Invalid Email Address";
	}

	if( empty($errors))
	{
	$to = $myemail;
	$email_subject = "A New Message Awaits: $subject";
	$txt = "You have received a new message from your website. Details are given below.\n Name: $name \n Email: $email \n Message: \n $message";
	
	// preparing attachments
	$files = array();
    if($file_one)
     {
		 array_push($files,$file_one);
	 }	  
	 
	  $semi_rand = md5(time()); 
	  $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 
	  $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 
	  $message = "This is a multi-part message in MIME format.\n\n" . "--{$mime_boundary}\n" . "Content-Type: text/plain; charset=\"iso-8859-1\"\n" . "Content-Transfer-Encoding: 7bit\n\n" . $txt . "\n\n"; 
	  $message .= "--{$mime_boundary}\n";
	  
      for($x=0;$x<count($files);$x++){
		  $file = fopen('tmp/'.$files[$x],"rb");
		  $data = fread($file,filesize('tmp/'.$files[$x]));
		  fclose($file);
		  $data = chunk_split(base64_encode($data));
		  $message .= "Content-Type: {\"application/octet-stream\"};\n" . " name=\"$files[$x]\"\n" . 
		  "Content-Disposition: attachment;\n" . " filename=\"$files[$x]\"\n" . 
		  "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
		  $message .= "--{$mime_boundary}\n";
	  }
 
	mail($to, $email_subject, $message, $headers);
	}
?>

