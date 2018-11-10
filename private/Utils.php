<?php

namespace Pattes;

class Utils {
  /**
   * Liste le contenue d'un répertoire.
   * Enlève les dossiers spéciaux.
   * @param string $path
   * @param string $base_path
   * @return array
   */
  static function directoryListing(string $path = "", string $base_path = "dl"): array {
    $f = function (string $s): bool {
      return ($s !== "." && $s !== "..");
    };
    return array_filter(scandir($_SERVER['DOCUMENT_ROOT'] . "/../$base_path/$path"), $f);
  }

  static function downloadKeyExists(string $key): bool {
    return in_array($key, Utils::directoryListing(), true);
  }

  static function downloadRessources(string $key) {
    $d = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/../dl/$key/info.json"));
    $r = new Ressource($d->name);
    $d = Utils::directoryListing($key);
    $size = 0;
    $c = 2;
    foreach ($d as $p) {
      if ($p !== "archive.zip" && $p !== "info.json") {
        $size += filesize($_SERVER['DOCUMENT_ROOT'] . "/../dl/$key/$p");
      }
    }
    if (!in_array("archive.zip", $d)) {
      $r->setCount(count($d) - 1);
      $zip = new \ZipArchive();
      $zip->open($_SERVER['DOCUMENT_ROOT'] . "/../dl/$key/archive.zip", \ZipArchive::CREATE);
      foreach ($d as $p) {
        if ($p !== "archive.zip" && $p !== "info.json") {
          $zip->addFile($_SERVER['DOCUMENT_ROOT'] . "/../dl/$key/$p", $p);
        }
      }
      $zip->close();
      $c = 1;
    }
    $r->setCount(count($d) - $c);
    $r->setSize($size);
    return $r;
  }

  static function formatBytes($bytes, $precision = 2): string {
    $units = array('B', 'KB', 'MB', 'GB', 'TB');

    $bytes = max($bytes, 0);
    $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
    $pow = min($pow, count($units) - 1);

    // Uncomment one of the following alternatives
    $bytes /= pow(1024, $pow);
    // $bytes /= (1 << (10 * $pow));

    return round($bytes, $precision) . ' ' . $units[$pow];
  }
}