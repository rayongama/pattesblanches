<?php

namespace Pattes\View;


use Pattes\Utils;

class ViewArticle extends ViewIndex
{
    private $needleArticle;

    public function __construct($needleArticle)
    {
        parent::__construct();

        $this->addStyle("/css/article.css");
        $this->needleArticle = strtolower($needleArticle);
    }

    private function index(): ViewArticle {
        echo "<article><ul>";
        $articles = array_slice(scandir(__DIR__ . DIRECTORY_SEPARATOR . "Articles"), 2);
        foreach ($articles as $article) {
            $name = str_replace('-', ' ', pathinfo($article, PATHINFO_FILENAME));
            echo "<li>${name}</li>";
        }

        return $this;
    }

    public function render(): View
    {
        $this->head_render();
        $this->header_bar_render();
        $articles = array_slice(scandir(__DIR__ . DIRECTORY_SEPARATOR . "Articles"), 2);
        $names = [];
        $lowerNames = [];
        foreach ($articles as $article) {
            $name = pathinfo($article, PATHINFO_FILENAME);
            array_push($names, $name);
            array_push($lowerNames, strtolower($name));
        }
        $name = array_search($this->needleArticle, $lowerNames);
        if ($name !== FALSE) {
            echo file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . "Articles" . DIRECTORY_SEPARATOR . $names[$name] . '.html' );
        } else {
            $this->index();
        }
        $this->foot_render();
        return $this;
    }

}
