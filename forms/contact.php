<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  // Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'ugen@qbnox.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  //$contact->to = $receiving_email_address;
  //$contact->from_name = $_POST['name'];
  //$contact->from_email = $_POST['email'];
  $contact->to = 'ugen@qbnox.com';
  $contact->from_name = 'Ugendreshwar Kudupudi';
  $contact->from_email = $receiving_email_address;
  $contact->subject = $_POST['subject'];

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  $contact->smtp = array(
    'host' => 'smtp-relay.brevo.com',
    'username' => 'ugen@qbnox.com',
    'password' => 'VA5BKkP1EH0bjwrq',
    'port' => '587'
  );

  $contact->add_message( $_POST['name'], 'From');
  $contact->add_message('');
  $contact->add_message( $_POST['email'], 'Email');
  $contact->add_message('');
  $contact->add_message( $_POST['message'], 'Message', 10);

  $contact->honeypot = $_POST['first_name'];

  $contact->recaptcha_secret_key = '6LdqB5IjAAAAAFET_04N6ELuWcTVGX_NPcsmd4NM';

  echo $contact->send();
?>
