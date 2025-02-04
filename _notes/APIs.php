<?php
//query strings

$user_response = file_get_contents("https://randomuser.me/api/?results=5");
echo $user_response;

$data_object = json_decode($response);
$data_array = json_decode($response, true); //associative array

echo $data_object->info->version;
echo $data_array['info']['version'];


$data = json_decode($response, true); // decode response
if (isset($data['error'])) {
  echo 'Error: ' . $data['error']; // print error message
} else {
  echo 'Phone Number: ' . $data['results'][0]['phone']; // print phone number
}

//public APIs https://github.com/public-apis/public-apis