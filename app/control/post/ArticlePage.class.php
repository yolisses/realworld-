<?php

use Adianti\Control\TPage;
use Adianti\Widget\Form\TLabel;

class ArticlePage extends TPage
{
  public function __construct()
  {
    parent::__construct();

    $label = new TLabel('Article Page');

    $this->add($label);
  }
}
