<?php

use Adianti\Control\TPage;
use Adianti\Database\TTransaction;
use Adianti\Widget\Container\THBox;
use Adianti\Widget\Container\TVBox;
use Adianti\Widget\Form\TButton;
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
    TTransaction::close();

    $title = new TLabel($article->title);
    $title->setTagName("h1");
    $container->add($title);

    $optionsContainer = new THBox;
    $container->add($optionsContainer);

    $deleteButton = new TButton("delete");
    $deleteButton->setLabel("Delete Article");
    $deleteButton->setImage('fa:trash red');
    $deleteButton->class = 'btn';
    $optionsContainer->add($deleteButton);

    $editButton = new TButton("edit");
    $editButton->setLabel("Edit Article");
    $editButton->setImage('fa:edit blue');
    $editButton->class = 'btn';
    $optionsContainer->add($editButton);


    $paragraphs = explode("\n", $article->body);

    foreach ($paragraphs as $paragraphText) {
      $paragraph = new TLabel($paragraphText);
      $paragraph->setTagName("p");
      $container->add($paragraph);
    }
  }
}
