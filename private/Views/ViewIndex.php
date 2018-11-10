<?php

namespace Pattes\View;


use Pattes\Utils;

class ViewIndex extends View
{

    public function __construct()
    {
        parent::__construct();

        $this->addStyle("css/index.css");
        $this->addScript("js/index.js");
    }

    private $filter = false;

    public function toggleFilter(): View
    {
        $this->filter = !($this->filter);
        return $this;
    }


    protected function header_bar_render(): View
    {
        echo <<<END
  <header>
    <a href="/">
    <picture>
      <source srcset="img/struct/webp/logo.webp" type="image/webp">
      <source srcset="img/struct/logo.png" type="image/png">
      <img src="img/struct/logo.png">
    </picture></a>
    <a class="title" href="/"><span>$this->title</span></a>
    <nav>
      <a href="/cosplay">Cosplay</a>
      <a href="#">Création</a>
      <a href="#">Contact</a>
      <a href="https://www.instagram.com/alaskaa_green/" id="instagram"></a>
    </nav>
  </header>
END;
        return $this;

    }

    public function render(): View
    {
        $this->head_render();
        $this->header_bar_render();
        echo <<<END
  <picture>
      <source srcset="img/struct/webp/bg_index.webp" type="image/webp">
      <source srcset="img/struct/bg_index.jpg" type="image/jpg">
      <img class="header" src="img/struct/bg_index.jpg">
  </picture>
  <div id="container">

END;
        $cosplay = [1, 2, 3, 4, 5, 6, 25, 26, 27, 28, 29, 30, 31, 32, 33];
        for ($i = 2; $i <= 38; $i += 1) {
            $class = "";
            if (in_array($i, $cosplay)) {
                $class = "cosplay";
            } else if ($this->filter) {
                $class = "none";
            }
            echo <<<END
    <picture>
      <source srcset="img/data/webp/$i.webp" type="image/webp">
      <source srcset="img/data/$i.jpg" type="image/jpg">
      <img class="$class" src="img/data/$i.jpg">
    </picture>

END;
        }
        echo <<<END
  </div>
END;


        $this->foot_render();
        return $this;
    }

}