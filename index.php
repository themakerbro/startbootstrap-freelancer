<?php
$url = 'https://www.helpargentina.org/en/checkout';
$data = array('t' => 'addToCart', 'id' => '128', 'tipo' => 'ong', 'cant' => '1', 'precio' => 25);

// use key 'http' even if you send the request to https://...
$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data)
    )
);
$context  = stream_context_create($options);

$result = file_get_contents($url, false, $context);
if ($result === FALSE) { /* Handle error */ }

var_dump($result);

header('HTTP/1.1 307 Temporary Redirect');
header('Location: https://www.helpargentina.org/en/checkout');
exit;

?>
