<?php

//THE KEY FOR ENCRYPTION AND DECRYPTION
$key = 'qkwjdiw239&&jdafwertrhrhgfdgdfgdfgre^%$ggdnawhd4njshjwuuO';
//ENCRYPT FUNCTION
function encryptthis($data, $key) {
$encryption_key = base64_decode($key);
$iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
$encrypted = openssl_encrypt($data, 'aes-256-cbc', $encryption_key, 0, $iv);
return base64_encode($encrypted . '::' . $iv);
}
  //THE ENCRYPTION PROCESS
  $emailencrypted=encryptthis($email, $key);
  $passencrypted=encryptthis($password, $key);
  $cpassencrypted=encryptthis($cpassword, $key);

  //DECCRYPT FUNCTION
function decryptthis($data, $key) {
  $encryption_key = base64_decode($key);
  list($encrypted_data, $iv) = array_pad(explode('::', base64_decode($data), 2),2,null);
  return openssl_decrypt($encrypted_data, 'aes-256-cbc', $encryption_key, 0, $iv);
  }
  //THE DECRYPTION PROCESS
$passdecrypted=decryptthis($passencrypted, $key);
$emaildecrypted=decryptthis($emailencrypted, $key);
$cpassdecrypted=decryptthis( $cpassencrypted, $key);
?>