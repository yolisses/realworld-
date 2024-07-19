<?php

use Adianti\Control\TPage;
use Adianti\Database\TTransaction;
use Adianti\Widget\Base\TElement;
use Adianti\Widget\Container\TVBox;
use Adianti\Widget\Form\TLabel;

class ArticleView extends TPage
{
  public function __construct()
  {
    parent::__construct();
  }

  public function onLoad($params)
  {
    $container = new TVBox;
    $this->add($container);

    TTransaction::open('sample');

    $article = new Article($params['id']);

    $title = new TLabel($article->title);
    $container->add($title);

    $paragraphs = explode("\n", $article->body);

    foreach ($paragraphs as $paragraphText) {
      $paragraph = new TLabel($paragraphText);
      $container->add($paragraph);
    }


    TTransaction::close();
  }
}
