<?php

class Book 
{
    public $title;
    public $author;
    public int $year;


    public function __construct($title, $author, $year)
    {
        $this->title = $title;
        $this->author = $author;
        $this->year = $year;
    }

    public function getSummary()
    {
        return "'$this->title'($this->year) - $this->author"; 
    }

    public function isOld(): bool
    {
        return $this->year < 1975;
    }
}

$book1 = new Book("PHP base", "Semenov", 1998);
$book2 = new Book("JS: from beginner to profi", "Markov", 2010);
$book3 = new Book("C++: all in one book", "Dervi", 1965);

echo $book2->getSummary() . "\n";
echo $book3->getSummary() . "\n";
echo $book1->getSummary() . "\n";

echo $book2->isOld() . "\n";
echo $book3->isOld() . "\n";
echo $book1->isOld() . "\n";