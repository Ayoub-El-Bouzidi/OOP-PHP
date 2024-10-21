<?php
include "../DB/Database.php";

Class BookDAO {
    public function getBooks()
    {
        $Books = new Database();
        return $Books->getBooks();
    }
    public function AddBook($book)
    {
        $Books = new Database();
        $Books->setBooks($book);
        $Books->saveData();
    }
}

?>