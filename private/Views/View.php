<?php

namespace Pattes\View;


class View
{

    private $stylesheets;
    private $scripts;

    public function __construct()
    {
        $this->stylesheets = [];
        $this->addStyle("css/base.css");
        $this->scripts = [];
    }

    public function addStyle($s): View
    {
        array_push($this->stylesheets, $s);
        return $this;
    }

    public function addScript($s): View
    {
        array_push($this->scripts, $s);
        return $this;
    }

    protected $title;

    public function setTitle(string $title): View
    {
        $this->title = $title;
        return $this;
    }

    protected function head_render(): View
    {
        echo <<<END
<!doctype html>
<html lang="fr">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
  <title>$this->title</title>

END;
        foreach ($this->stylesheets as $s) {
            echo <<<END
  <link rel="stylesheet" href="$s">

END;
        }
        foreach ($this->scripts as $s) {
            echo <<<END
  <script src="$s"></script>

END;
        }
        echo <<<END
</head>
<body>

END;
        return $this;
    }

    protected function foot_render(): View
    {
        echo <<<END
</body>
</html>
END;
        return $this;
    }

    public function render(): View
    {
        $this->head_render();
        echo "<h1>Pattes Blanches</h1>";
        $this->foot_render();
        return $this;
    }

}