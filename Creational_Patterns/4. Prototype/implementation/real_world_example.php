<?php
class Page
{
    private $title;
    private $body;

    private $author;
    private $comments = [];

    private $date;

    public function __construct(string $title, string $body, Author $author)
    {
        $this->title = $title;
        $this->body = $body;
        $this->author = $author;
        $this->author->addToPage($this);
        $this->date = new \DateTime();
    }

    public function addComment(string $comment): void
    {
        $this->comments[] = $comment;
    }

    public function __clone()
    {
        $this->title = "Copy of " . $this->title;
        $this->author->addToPage($this);
        $this->comments = [];
        $this->date = new \DateTime();
    }
}

class Author
{
    private $name;

    private $pages = [];

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function addToPage(Page $page): void
    {
        $this->pages[] = $page;
    }
}

function clientCode()
{
    $author = new Author("Alisher");
    $page = new Page("Assalom", "Bugun kun ajoyib!", $author);

    $page->addComment("Xayrli kun tilayman!");

    $draft = clone $page;
    echo "Dump of the clone. Note that the author is now referencing two objects.<br><br>";

    echo "<pre>";
    print_r($draft);
    echo "</pre>";
}

clientCode();
