<?php

namespace Pattes\View;


use Pattes\Utils;

class ViewArticle extends ViewIndex
{
  public function __construct()
  {
    parent::__construct();

    $this->addStyle("css/article.css");
  }

  public function render(): View {
    $this->head_render();
    $this->header_bar_render();
    echo <<<END
  <article>
    <p>Bonjour à tous ! Aujourd'hui, je vais vous montrer mon premier tutoriel pour la Couronne!</p>
    <p>Tu auras besoin de :
    <ul>
      <li>Ciseaux</li>
      <li>Tapis de sol (créamousse, Worbla)</li>
      <li>Feutres</li>
      <li>Cure-dent</li>
      <li>Peinture jaune</li>
    </ul></p>
    <p>Télécharger et imprime le modèle, sans oublier de le modifier si nécessaire. (Pour ma part j'ai changé la longueur à 8cm)</p>
  </article>

END;
    $this->foot_render();
    return $this;
  }

}
