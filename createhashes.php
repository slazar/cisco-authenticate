<?

$usernamesalt = generate_password(50);
$username = generate_password(20);
$passwordsalt = generate_password(50);
$password = generate_password(20);
$usernamehash = hash('sha512', $usernamesalt.$username);
$passwordhash = hash('sha512', $passwordsalt.$password);

echo "Store the username and password in a secure place.\n\n";
echo "Username: " . $username . "\n";
echo "Password: " . $password . "\n\n";

echo "Paste this in the top of authenticate.php\n\n";
echo "\$usernamesalt = '" . $usernamesalt . "';\n";
echo "\$usernamehash = '" . $usernamehash . "';\n";
echo "\$passwordsalt = '" . $passwordsalt . "';\n";
echo "\$passwordhash = '" . $passwordhash . "';\n";

function generate_password($length){
  $chars =  'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'.
            '0123456789``-=~!@#$%^&*()_+,./<>?;:[]{}\|';

  $str = '';
  $max = strlen($chars) - 1;

  for ($i=0; $i < $length; $i++)
    $str .= $chars[mt_rand(0, $max)];

  return $str;
}


?>
