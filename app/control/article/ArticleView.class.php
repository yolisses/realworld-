<?php

use Adianti\Control\TAction;
use Adianti\Control\TPage;
use Adianti\Core\AdiantiApplicationLoader;
use Adianti\Core\AdiantiCoreApplication;
use Adianti\Core\AdiantiCoreLoader;
use Adianti\Database\TTransaction;
use Adianti\Widget\Base\TScript;
use Adianti\Widget\Container\THBox;
use Adianti\Widget\Container\TVBox;
use Adianti\Widget\Form\TButton;
use Adianti\Widget\Form\TForm;
use Adianti\Widget\Form\TLabel;

class ArticleView extends TPage
{
  function __construct()
  {
    parent::__construct();
  }

  function onLoad($params)
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

    $deleteForm = new TForm('delete_form');
    $optionsContainer->add($deleteForm);

    $deleteButton = new TButton("delete");
    $deleteForm->add($deleteButton);
    $deleteForm->addField($deleteButton);
    $deleteButton->setAction(new TAction([$this, 'onDelete'], ['id' => $params['id']]));
    $deleteButton->setImage('fa:trash red');
    $deleteButton->class = 'btn';
    $deleteButton->type = 'submit';
    $deleteButton->setLabel("Delete Article");

    $editForm = new TForm('edit_form');
    $optionsContainer->add($editForm);

    $editButton = new TButton("edit");
    $editForm->add($editButton);
    $editForm->addField($editButton);
    $editButton->setAction(new TAction([$this, 'onEdit'], ['id' => $params['id']]));
    $editButton->setImage('fa:edit blue');
    $editButton->class = 'btn';
    $editButton->type = 'submit';
    $editButton->setLabel("Edit Article");

    $paragraphs = explode("\n", $article->body);

    foreach ($paragraphs as $paragraphText) {
      $paragraph = new TLabel($paragraphText);
      $paragraph->setTagName("p");
      $container->add($paragraph);
    }
  }

  function onDelete($params)
  {
    $container = new TVBox;
    $this->add($container);

    TTransaction::open('sample');
    $article = new Article();
    $article->delete($params['id']);
    TTransaction::close();

    AdiantiCoreApplication::loadPageURL('index.php?class=HomeView');
  }

  function onEdit($params)
  {
    AdiantiCoreApplication::loadPageURL('index.php?class=EditArticleView&method=onLoad&id=' . $params['id']);
  }
}
