<?php

$welcome_file = fopen("welcome.txt","r");
$size = filesize("welcome.txt");
$welcome_text = fread($welcome_file,$size);
echo $welcome_text;
fclose($welcome_file);


$bands_file = fopen("my-bands.txt","w");
fwrite($bands_file, "Spice Girls");
fclose($bands_file);

$pets_file = fopen("cool-pets.txt", "a");
fwrite($pets_file,"/n Lilianka");
fclose($pets_file);

$read_text = file_get_contents("read-me.txt");
$append_file = file_put_contents("append-me.txt", "I love PHP!", FILE_APPEND);

$exists = file_exists($name);

$todo = file_put_contents("to-do.txt", "wciągnij dane",FILE_APPEND);
$to_do_file = fopen("to-do.txt","r");
$to_do_size = filesize("to-do.txt");
$todotext = fread($to_do_file,$to_do_size);
echo $todotext;
fclose($to_do_file);

