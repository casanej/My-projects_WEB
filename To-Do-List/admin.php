<?php
$options = [
    'cost' => 10,
];

echo $pass = password_hash('R@f@el2010', PASSWORD_ARGON2I, $options);
echo "<br><br>";
if (password_verify('R@f@el2010', '$argon2i$v=19$m=1024,t=2,p=2$Zy9sMU1iS1lTbTRhZnBTbg$/0tZI/xIJOQF6yaDPzojm7SHc+oGYXh3mR+gO5bdAZI')) {
    echo 'Password is valid!';
} else {
    echo 'Invalid password.';
}
?>
