<?php
include "../Services/Bookservice.php";
include "../Entity/Book.php";
$Service = new Bookservices();
function  presentation()
{
    echo "+-----------------------------------------+\n";
    echo "|            Welcome to library           |\n";
    echo "+-----------------------------------------+\n";
    echo "|             [V] : View books            |\n";
    echo "|             [A] : Add book              |\n";
    echo "|             [E] : Exit                  |\n";
    echo "+-----------------------------------------+\n";
}
function DisplayData()
{
    global $Service;
    foreach($Service->getbooks() as $key => $book)
    {
        echo ($key+1) . ") " . $book->Display() . "\n";
    }
}
function lastId():int
{
    global $Service;
    $books = $Service->getbooks();
    if(empty($books))
    {
        return 0;
    }
    else
    {
        $lastid = end($books)->getId();
        return intval($lastid);
    }
}
function AddBook()
{
    global $Service;
    $title = readline("Enter title book : ");
    $isbn  = readline("Enter ISBN book : ");
    $book = new Book(lastId()+1,$title, $isbn);
    $Service->addbook($book);
    echo "added book succes\n";
}
function start()
{
    presentation();
    $value = readline("enter value : ");
    $V = strtolower($value);
    switch ($V) {
        case "a":
            AddBook();
            start();
        case "v":
            DisplayData();
            start();
        case "e":
            exit;            
        default:
            echo "enter correct value :"; 
            start();           
    }
}







?>