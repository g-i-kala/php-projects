<?php
// Using array() to construct an array:
$prime_numbers = array(2, 3, 5, 7, 11, 13, 17);  
  
// Using short array syntax:
$animals = ["dog", "cat", "turtle", "cow"];  

// Printing with print_r():
print_r($prime_numbers);

echo "\n\n";

// Printing with echo and implode()
echo implode(", ", $animals);

// Adding an element with square brackets:
$prime_numbers[] = 19;

// Accessing an array element:
$favorite_animal = $animals[0];
echo "\nMy favorite animal: " . $favorite_animal;

// Reassigning an element:
$animals[1] = "tiger";

// Using array_pop():
echo "\nBefore pop: " . implode(", ", $animals);
array_pop($animals);
echo "\nAfter pop: " . implode(", ", $animals);

// Using array_push():
echo "\nBefore push: " . implode(", ", $prime_numbers);
array_push($prime_numbers, 23, 29, 31, 37, 41);
echo "\nAfter push: " . implode(", ", $prime_numbers);

//Using array_shift():
echo "\nBefore shift: " . implode(", ", $animals);
array_shift($animals);
echo "\nAfter shift: " . implode(", ", $animals);

//Using array_unshift():
echo "\nBefore unshift: " . implode(", ", $animals);
array_unshift($animals, "horse", "zebra", "lizard");
echo "\nAfter unshift: " . implode(", ", $animals);

//Using chained operations with nested arrays:
$treasure_hunt = ["garbage", "cat", 99, ["soda can", 8, ":)", "sludge", ["stuff", "lint", ["GOLD!"], "cave", "bat", "scorpion"], "rock"], "glitter", "moonlight", 2.11];

echo "\nWe found " . $treasure_hunt[3][4][2][0];


// next one with key=>value

<?php
$doge_meme = ["top_text" => "Such Python", "bottom_text" => "Very language. Wow.", "img" => "very-cute-dog.jpg", "description" => "An adorable doge looks confused."];

$doge_meme["new value"] = "Woah I'm new";

echo "\n" . $doge_meme["new value"];

array_push($doge_meme, "just an example");

echo "\n" . $doge_meme[0] . "\n";

unset($doge_meme[0]);
unset($doge_meme["new value"]);

$doge_meme["description"] = "A wonderful dog picture with a brand new description.";

function createMeme ($meme) 
{
  $meme["top_text"] = "Much PHP";
  $meme["bottom_text"] = "Very programming. Wow.";
  return $meme;
}  

$php_doge = createMeme($doge_meme);

print_r($doge_meme);

print_r($php_doge);

function fixMeme (&$meme) 
{
  $meme["top_text"] = "I can haz";
  $meme["bottom_text"] = "PHP, plz?";
} 

$lame_meme = ["top_text" => "i don't know", "bottom_text" => "i can't think of anything", "img" => "very-fat-cat.jpg", "description" => "An very fat cat looks happy."];

print_r($lame_meme);

fixMeme ($lame_meme);

print_r($lame_meme);


//LOOPS ;)

<?php
# while
$count = 5;
echo "Countdown!\n";
while ($count > -1) {
  echo $count . "\n";
  $count--;
}
echo "Blastoff!\n\n";

# do...while
$lights = "off";
do {
  echo "The lights are " . $lights . "\n";
  if ($lights === "off") {
    $lights = "on";
  } else {
    $lights = "off";
  }
} while ($lights === "on");
echo "\n";

# for
$names = ["Ann", "Bob", "Cassidy", "Dave", "Ed"];
for ($index = 0; $index < count($names); $index+=2){
  echo $names[$index] . "\n";
}
echo "\n";

# foreach
$properties = [
  "temperature" => "cold",
  "weather" => "rainy",
  "sky" => "gray"
              ];
foreach ($properties as $key=>$value) {
  echo "The $key is $value.\n";
}
echo "\n";

# break and continue
# this skips printing Ann and will
# stop execution after printing
# Dave
$names = ["Ann", "Bob", "Cassidy", "Dave", "Ed"];
for ($index = 0; $index < count($names); $index+=1){
  if ($names[$index] == "Ann") {
    continue;
  }
  echo $names[$index] . "\n";
  if ($names[$index] == "Dave") {
    break;
  }
}