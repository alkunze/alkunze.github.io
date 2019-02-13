<?php
$errors = '';
$EmailFrom = $Email;
$EmailTo = "ashleykunze@gmail.com";

$Subject = "Email From Portfolio Website";
$Name = Trim(stripslashes($_POST['Name'])); 
$Email = Trim(stripslashes($_POST['Email'])); 
$Message = Trim(stripslashes($_POST['Message'])); 

// validation
$validationOK=true;
if (!$validationOK) {
  print "<meta http-equiv=\"refresh\" content=\"0;URL=error.htm\">";
  exit;
}

if(empty($_POST['Name'])  || 
   empty($_POST['Email']) || 
   empty($_POST['Message']))
{
    $errors .= "\n Error: All fields are required.";
}

if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
$Email))
{
    $errors .= "\n Error: Invalid email address.";
}

// prepare email body text
$Body = "";
$Body .= "Name: ";
$Body .= $Name;
$Body .= "\n";
$Body .= "Email: ";
$Body .= $Email;
$Body .= "\n";
$Body .= "Message: ";
$Body .= $Message;
$Body .= "\n";

// send email 
if( empty($errors))
{
	$success = mail($EmailTo, $Subject, $Body, "From: <$EmailFrom>");
} 



// redirect to success page 
if ($success){
  print "<meta http-equiv=\"refresh\" content=\"0;URL=contactthanks.php\">";
}
// else{
  // print "<meta http-equiv=\"refresh\" content=\"0;URL=error.htm\">";
// }
?>



<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head>
	<title>Error</title>
</head>

<body>
<!-- This page is displayed only if there is some error -->
<?php
echo nl2br($errors);
?>


</body>
</html>