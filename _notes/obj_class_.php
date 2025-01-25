<!--

Classes are defined using the class keyword.
Preview: Docs Functions are blocks of code that can be repeatedly called by other code when it executes. A function is not called when it is defined, but only when another part of the code executes the function. The syntax for a user defined function in PHP is similar to other languages: php function functionName(parameters) { code to execute; }
Functions
 defined within a class become methods and 
Preview: Docs Variables store data for later use, and allow their contents to be updated or changed.
variables
 within the class are considered properties.
There are three levels of visibility for class members:
public (default) - accessible from outside of the class
protected - only accessible within the class or its descendants
private - only accessible within the defining class
Members can be defined to be static.
Static members are accessed using the Scope Resolution Operator (::).
Classes are instantiated into objects using the new keyword.
Members of an object are accessed using the Object Operator (->). -->

<?php

class Pet {
  private $name;
  function setName($name) {
    $this->name = $name;
  }
  function getName() {
    return $this->name;
  }
  function type(){
    return "jamnikens";
  }
}

class Dog extends Pet{
  function type() {
    return "dog";
  }
  function classify(){
    echo "This " . parent::type() . " is of type " . $this->type();
    // Prints: This pet is of type dog 
  }
}
class Pet2 {
  public $deserves_love;
  function __construct() {
    $this->deserves_love = TRUE;
  }
}
$my_dog = new Pet2();
if ($my_dog->deserves_love){
  echo "I love you!";
}
// Prints: I love you!

?>