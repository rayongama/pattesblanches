<?php

namespace Pattes\View;


use Pattes\Utils;

class ViewArticle extends ViewIndex
{
    public function __construct()
    {
        parent::__construct();

        $this->addStyle("/css/article.css");
    }

    public function render(): View
    {
        $this->head_render();
        $this->header_bar_render();
        echo <<<END
  <article>
    <p> In Path of Exile: Betrayal, Jun Ortoi is investigating a mysterious organisation known as the Immortal Syndicate. Help her to manipulate their ranks, reveal the identities of their members, uncover their safehouses and take down their mastermind.
Immortal Syndicate Encounters</p>
    <p>The Immortal Syndicate has four divisions, each with its own goals: Fortification, Transportation, Research and Intervention. In each area, you will encounter a Syndicate member. Other members can show up to aid their friends or sabotage their enemies. When the battle is complete, you must decide how to continue your investigation.
Manipulate the Syndicate</p>
    <p>There are eighteen Syndicate members, each with their own personalities, friendships and rivalries that change as you manipulate the organisation. You will need to bargain, execute, interrogate and even induce them to betray each other in order to further the investigation.
Raid Syndicate Safehouses
    <p>Your goal is to gain intelligence leading to the captains of each division. Raid their safehouses to pillage their supplies and uncover the ultimate identity of the Immortal Syndicate's mastermind.</p>
    <p>Each Syndicate member stores different item types in the safehouse. High-ranked members will have better items. Each division has a different twist on item rewards. Manipulate the Syndicate, maneuvering certain members into positions that are going to be the most rewarding for you.
Veiled Items</p>
    <p>Members of the Immortal Syndicate can drop items with new Veiled Modifiers. Take these to Jun to Unveil the item and pick from one of three properties for the item to receive. As you Unveil specific modifiers, you learn the ability to craft these onto other items and can work towards unlocking higher-level versions of these properties.
New Masters, Familiar Faces</p>
    <p>As the Immortal Syndicate ascended in power, the old cohort of Forsaken Masters mysteriously vanished. In their absence, Einhar, Alva, Niko, Jun and Zana have risen as a new group of Masters to aid you. Their league content, including Delve and Incursion, has been added as core Path of Exile content. Bestiary has been reimagined and simplified; Einhar will handle the nets as you focus on hunting the beasts.
Streamlined Mastercrafting</p>
    <p>We have revamped the entire process of Mastercrafting, from the user interface to the way you acquire new crafting options. Individual Mastercrafting options are now unlocked by completing specific content, such as Incursion rooms or Delve encounters, rather than by grinding Master levels.
Unified Hideout System</p>
    <p>Hideouts, favour and decorations are now shared across all leagues. You can load and save your hideout templates and share them with other community members.
New End-game Maps</p>
    <p>We have added four new maps to the Atlas of Worlds. These new maps are fleshed-out versions of fan-favourite tilesets from deep in Delve's Azurite Mine. The entire Atlas of Worlds has been rearranged.
New and Revamped Skills</p>
    <p>Alongside other balance improvements, Betrayal introduces ten new or revamped skills across three core character archetypes. These include several completely new types of skills, such as Brands and Banners.
Powerful New Items</p>
    <p>Many of the 15 new unique items in Betrayal have Veiled mods, allowing you to customise the item more than ever before. Betrayal also includes five new Divination Cards, designed by our supporters.
Betrayal Supporter Packs</p>
    <p>We're also launching two sets of Supporter Packs alongside Betrayal - the Undertaker and Soulstealer Packs. There are two price points available for each and they feature masses of points alongside new Armour Sets and other exclusive cosmetic microtransactions!</p>
    <p>Path of Exile: Betrayal will launch on December 7th (PST) on PC, December 10 on Xbox One and mid-December on PlayStation 4</p>
  </article>

END;
        $this->foot_render();
        return $this;
    }

}
