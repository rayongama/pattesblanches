<?php

require '../vendor/autoload.php';
const INITIAL_TITLE = "Pattes Blanches";

$req = \GuzzleHttp\Psr7\ServerRequest::fromGlobals();
$path = $req->getUri()->getPath();
$key = substr($path, 1);
if (strlen($path) !== 1 && \Pattes\Utils::downloadKeyExists($key)) {
    if ($req->getMethod() === "POST") {
        header("Content-Disposition: attachment; photos.zip");
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-type: application/octet-stream");
        header("Content-Disposition: attachment; filename=photos.zip");
        header("Content-Transfer-Encoding: binary");
        header("Content-Length: " . filesize($_SERVER['DOCUMENT_ROOT'] . "/../dl/$key/archive.zip"));
        ob_end_flush();
        @readfile($_SERVER['DOCUMENT_ROOT'] . "/../dl/$key/archive.zip");
    } else {
        $view = (new \Pattes\View\ViewRessource())
            ->setTitle(INITIAL_TITLE)
            ->setRessourceKey($key)
            ->render();
    }
} else if ($key === "article") {
    $view = (new \Pattes\View\ViewArticle())
        ->setTitle(INITIAL_TITLE)
        ->render();
} else {
    $view = (new \Pattes\View\ViewIndex())
        ->setTitle(INITIAL_TITLE);
    if ($key === "cosplay" || $key === "cosplay/") {
        $view->toggleFilter();
    }
    $view->render();
}

