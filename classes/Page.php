<?php

class Page {
    private $title;
    private $content;

    public function __construct($title, $content) {
        $this->title = $title;
        $this->content = $content;
    }

    public function render() {
        include 'includes/header.php';
        echo "<main><h1>{$this->title}</h1><p>{$this->content}</p></main>";
        include 'includes/footer.php';
    }
}
