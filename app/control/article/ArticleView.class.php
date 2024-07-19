<?php

use Adianti\Control\TPage;
use Adianti\Database\TTransaction;
use Adianti\Widget\Container\TVBox;
use Adianti\Widget\Form\TLabel;

class ArticleView extends TPage
{
  function __construct($params)
  {
    parent::__construct();
    $container = new TVBox;
    $this->add($container);

    TTransaction::open('sample');
    $article = new Article($params['id']);
    TTransaction::close();

    $title = new TLabel($article->title);
    $title->setTagName("h1");
    $container->add($title);

    $articleOptions = new ArticleOptions($params['id']);
    $container->add($articleOptions);

    $paragraphs = explode("\n", $article->body);

    foreach ($paragraphs as $paragraphText) {
      $paragraph = new TLabel($paragraphText);
      $paragraph->setTagName("p");
      $container->add($paragraph);
    }
  }
}
