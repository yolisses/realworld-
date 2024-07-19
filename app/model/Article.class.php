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
}
