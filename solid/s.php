<?php


// THIS CLASS EXAMPLE VIOLATES THE SINGLE RESPONSIBILITY PRINCIPLE
// SRP STATES THAT " A CLASS SHOULD ONLY HAVE ONE REASON TO CHANGE AND HAS ONLY ONE RESPONSIBILITY"


/**
 * User class should only be responsible for the blueprint of user
 * and creating the user
 */
// class User 
// {
//     protected $id;
//     protected $name;

//     // initializing a user using constuctor is a responsibility of the user class
//     public function __construct(int $id, string $name)
//     {
//         $this->id = $id;
//         $this->name = $name;
//     }

//     // validating user input is not a responsibility of the user class
//     // should be separated in a validation class or any interface that can abstract the logic of validation
//     public static function validate(User $user) 
//     {
//         if($user->id < 0) throw new \Exception("Cannot process ID less than 0", 1);
//         if($user->name === '') throw new \Exception("Name is not provided", 1);
        
//        return $user; 
//     }    

//     // encoding to json is not a responsibility of the user class 
//     public static function encodeToJson(User $user)
//     {
//        $json = ['id' => $user->id, 'name' => $user->name];
//        return json_encode($json);
//     }

//     // this as well is not a responsibility of this class all formatting should be on another class
//     public function printToJson($user)
//     {
//        return json_decode($user);
//     }
// }

// $user = new User(1,'harold');

// User::validate($user);

// $tobedecoded = $user->encodeToJson($user);
// echo $tobedecoded . PHP_EOL;
// print_r($user->printToJson($tobedecoded)) . PHP_EOL;


// Correct way of confronting to Single responsibility princinple

// Create a user class that only responsible for creating a user
class User
{
    public $id;
    public $name;

    public function __construct(int $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;        
    }
}

interface Validation
{
    public function validator($data);
}

class UserValidation implements Validation
{
    public function validator($data)
    {
        if($data->id < 0) throw new \Exception("Cannot process ID less than 0", 1);
        if($data->name === '') throw new \Exception("Name is not provided", 1);
        
       return $data; 
    }
}

class JsonFormatter 
{
    public function encodeToJson(array $data) : string 
    {
        return json_encode($data);
    }

    public function decodeToJson(string $data)
    {
        return json_decode($data);
    }
}


$user = new User(1,'harold');

$validator = new UserValidation();

$validator->validator($user);

$tobedecoded = (new \JsonFormatter)->encodeToJson(['id' => $user->id, 'name' => $user->name]);
echo $tobedecoded . PHP_EOL;
print_r((new \JsonFormatter)->decodeToJson($tobedecoded)) . PHP_EOL;
