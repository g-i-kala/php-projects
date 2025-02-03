<?php

setcookie("name","Kalissima", time()+60, '/');
//setcookie("name","Kalissima", time()-60, '/');

echo "<pre>";
var_dump($_COOKIE);
echo "</pre>";