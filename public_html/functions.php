<?php
  function redirect ($new_location){
    header('Location: ' . $new_location);
    exit;
  }

  function new_header($name="Default"){
    echo "<head>";
    echo "<meta charset='utf-8'>";
    echo "<title>$name</title>";
    echo "<link rel='stylesheets'";
    echo "href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css'>";
    echo "<link rel='stylesheet' href='stylesheets/styles.css'>";
    echo "</head>";
  }

  function new_header_profile($name="Default"){
    echo "<head>";
    echo "<meta charset='utf-8'>";
    echo "<title>$name</title>";

    echo "<link rel='stylesheet' href='stylesheets/profile.css'>";
    echo "</head>";
  }

  function new_footer($name="Default"){
    echo "<footer id='footer'>Made by $name, Spring 2020</footer>";
    echo "<script src='Javascript/main.js'></script>";
  }

  function password_encrypt($password) {
	  $hash_format = "$2y$10$";   // Use Blowfish with a "cost" of 10
	  $salt_length = 22; 					// Blowfish salts should be 22-characters or more
	  $salt = generate_salt($salt_length);
	  $format_and_salt = $hash_format . $salt;
	  $hash = crypt($password, $format_and_salt);
	  return $hash;
	}

	function generate_salt($length) {
	  // MD5 returns 32 characters
	  $unique_random_string = md5(uniqid(mt_rand(), true));

	  // Valid characters for a salt are [a-zA-Z0-9./]
	  $base64_string = base64_encode($unique_random_string);

	  // Replace '+' with '.' from the base64 encoding
	  $modified_base64_string = str_replace('+', '.', $base64_string);

	  // Truncate string to the correct length
	  $salt = substr($modified_base64_string, 0, $length);

		return $salt;
	}

	function password_check($password, $existing_hash) {
	  // existing hash contains format and salt at start
	  $hash = crypt($password, $existing_hash);
	  if ($hash === $existing_hash) {
	    return true;
	  }
	  else {
	    return false;
	  }
	}
  ?>
