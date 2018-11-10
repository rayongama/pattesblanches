<?php

namespace Pattes\View;


use Pattes\Utils;

class ViewRessource extends View
{
    private $ressource_key;
    private $ressource;

    public function __construct()
    {
        parent::__construct();

        $this->addStyle("css/dl.css");
    }

    public function setRessourceKey(string $key): ViewRessource
    {
        $this->ressource_key = $key;
        $this->ressource = Utils::downloadRessources($key);
        return $this;
    }

    public function render(): View
    {
        $this->head_render();
        $photos_str = $this->ressource->getCount() === 1 ? "photo" : "photos";
        $size = Utils::formatBytes($this->ressource->getSize());
        echo <<<END
  <div id="container">
    <div>
      <h4>{$this->ressource->getName()}</h4><br />
      <p>{$this->ressource->getCount()} $photos_str<br />
      $size
      </p><br />
      <form method="post">
        <button>
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M13 3a1 1 0 1 0-2 0v11.586l-4.293-4.293a1 1 0 0 0-1.414 1.414l6 6a1 1 0 0 0 1.414 0l6-6a1 1 0 0 0-1.414-1.414L13 14.586V3zM5 21a1 1 0 0 1 1-1h12a1 1 0 1 1 0 2H6a1 1 0 0 1-1-1z" fill="#0C0C0D" fill-opacity=".8"></path></svg>
        </button>
      </form>
    </div>
  </div>

END;

        $this->foot_render();
        return $this;
    }

}
