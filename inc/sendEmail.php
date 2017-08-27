<?php

//Replace this with your own email address


if($_POST) {

   $name = trim(stripslashes($_POST['contactName']));
   $email = trim(stripslashes($_POST['contactEmail']));
   $subject = trim(stripslashes($_POST['contactSubject']));
   $contact_message = trim(stripslashes($_POST['contactMessage']));

   // Check Name
	if (strlen($name) < 2) {
		$error['name'] = "Please enter your name.";
	}
	// Check Email
	if (!preg_match('/^[a-z0-9&\'\.\-_\+]+@[a-z0-9\-]+\.([a-z0-9\-]+\.)*+[a-z]{2}/is', $email)) {
		$error['email'] = "Please enter a valid email address.";
	}
	// Check Message
	if (strlen($contact_message) < 15) {
		$error['message'] = "Please enter your message. It should have at least 15 characters.";
	}
   // Subject
	if ($subject == '') { $subject = "Contact Form Submission"; }

	echo '<script type="text/javascript">',
 	'function sendMail(){'
         'var name= document.getElementById("contactName").value;'
         'var email= document.getElementById("contactEmail").value;'
         'var subject= document.getElementById("contactSubject").value;'
         'var message= document.getElementById("contactMessage").value;'
         'var nameMixed= name + "("+ email+")";'
        'emailjs.send("gmail","template_PbfUfhx5",{from_name: nameMixed, message_html: message, to_name: subject })'
        '.then(function(response) {'
         'console.log("SUCCESS. status=%d, text=%s", response.status, response.text);'
         '}, function(err) {'
          '  console.log("FAILED. error=", err);'
         '});'
	'}'
	 '</script>'
	 ;
}

?>