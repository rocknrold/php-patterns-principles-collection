<?php

// LISCOV'S substitution principle states that: 
/**
 *  A child class should be substitutable on its parent class
 *  STRONG - represents stricter rules ( sub-types must abide to this)
 *  BEHAVIORAL  - a class has a behavior on its methods and properties
 *  SUB-TYPING  - are methods or properties that is inherited on the parent class (where behavior is located) 
 */

 /**
  * Class must abide on theses 5 rules: 
  *  1. Child function arguments must match the function arguments of parent
  *  2. Child function return type must match the parent function return type
  *  3. Child pre-conditions cannot be greater than the parent function pre-condition
  *  4. Child function post-conditions cannot be lesser than the parent function post-condition 
  *  5. Exceptions thrown by child method must match the exceptions thrown by the parent method
  */


class ParentClass
{
    public int $id;

    public function setId($id) : int // int as return type 
    {
        $this->id = $id;

        return $this->id; // 
    }
}   

class ChildClass 
{
    public int $id;

    public function setId($id) : int // matches the signature and return type
    {
        $this->id = $id;

        return $this->id; // strict return type that matches the parent
    }
}


// IMPEMENTED USING INTERFACE

interface File
{
    public function __construct(string $file);
    public function parse() : string;
}


class JsonFile implements File
{
    public $file;

    public function __construct(string $file)
    {
        $this->file = $file;
    }

    public function parse() : string
    {
        // parsing json here
        return $this->file;
    }
}

class HtmlFile implements File
{
    public $file;

    public function __construct(string $file)
    {
        $this->file = $file;
    }

    public function parse() : string
    {
        // parsing html file
        return $this->file;
    }
}


function readFromFile(File $file)
{
    return $file->parse();
}


print_r(readFromFile(new JsonFile('{"name" : "harold"}')).PHP_EOL); 
print_r(readFromFile(new HtmlFile('<h1>this is html file</h1>')));

// FINAL NOTE: 
// LISCOV'S SUBSTITUTION PRINCIPLE only cares about the function definition
// But not the inner working of the function it self
// Meaning the parse() function above should match the interface function definition
// And it is up to the implementing class on how they are going to work on the inner
// functionality of that function, as long as it matches the interface/parent function definition
 