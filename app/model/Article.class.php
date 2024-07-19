<?php

use Adianti\Database\TRecord;

class Article extends TRecord
{
  const TABLENAME = 'article';
  const PRIMARYKEY = 'id';

  public function __construct($id = NULL)
  {
    parent::__construct($id);
    parent::addAttribute('slug');
    parent::addAttribute('title');
    parent::addAttribute('description');
    parent::addAttribute('body');
    // parent::addAttribute('tagList');
    parent::addAttribute('createdAt');
    parent::addAttribute('updatedAt');
    // parent::addAttribute('favorited');
    parent::addAttribute('favoritesCount');
  }

  public static function slugify($text, string $divider = '-')
  {
    // replace non letter or digits by divider
    $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

    // transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);

    // trim
    $text = trim($text, $divider);

    // remove duplicate divider
    $text = preg_replace('~-+~', $divider, $text);

    // lowercase
    $text = strtolower($text);

    if (empty($text)) {
      return 'n-a';
    }

    return $text;
  }
}
