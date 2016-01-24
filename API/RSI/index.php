<?php

$opts = array(
  'http'=>array(
    'method'=>"POST",
    'header'=>"Accept-language: en\r\n" .
              "Cookie: foo=bar\r\n"
  )
);

$context = stream_context_create($opts);

if(file_exists("test.json")) $d = file_get_contents("test.json");
else {
  $d = file_get_contents("https://robertsspaceindustries.com/api/starmap/bootup",false,$context);
  file_put_contents("test.json",$d);
}

echo "<pre>";
  print_r(json_decode($d));
echo "</pre>";
?>
