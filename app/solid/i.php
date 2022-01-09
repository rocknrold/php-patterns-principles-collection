<?php

// INTERFACE SEGREGATION PRINCINPLE
/**
 *  The principle states that " A client should never be forced to implement an interface/methods that it doesn't use,
 *  or clients shoudln't be forced to depend on methods they do not use.
 */

// interface === contract
// segration === separating/separation/splitting

namespace solid;

interface File
{
    public function parse();
}

interface Html
{
    public function htmlContent();
}

class JsonFile implements File
{
    public function __construct()
    {
        
    }

    public function parse()
    {
        // parse json content here...
    }
}

class HtmlFile implements File, Html
{
    public function __construct()
    {
        
    }

    public function parse()
    {
        // parse json content here...
    }

    public function htmlContent()
    {
        
    }
}