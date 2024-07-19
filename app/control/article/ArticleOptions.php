<?php

use Adianti\Control\TAction;
use Adianti\Core\AdiantiCoreApplication;
use Adianti\Database\TTransaction;
use Adianti\Widget\Container\THBox;
use Adianti\Widget\Form\TButton;
use Adianti\Widget\Form\TForm;


class ArticleOptions extends THBox
{
  function __construct($articleId)
  {
    parent::__construct();

    $deleteForm = new TForm('delete_form');
    $this->add($deleteForm);

    $deleteButton = new TButton("delete");
    $deleteForm->add($deleteButton);
    $deleteForm->addField($deleteButton);
    $deleteButton->setAction(new TAction([$this, 'onDelete'], ['id' => $articleId]));
    $deleteButton->setImage('fa:trash red');
    $deleteButton->class = 'btn';
    $deleteButton->type = 'submit';
    $deleteButton->setLabel("Delete Article");

    $editForm = new TForm('edit_form');
    $this->add($editForm);

    $editButton = new TButton("edit");
    $editForm->add($editButton);
    $editForm->addField($editButton);
    $editButton->setAction(new TAction([$this, 'onEdit'], ['id' => $articleId]));
    $editButton->setImage('fa:edit blue');
    $editButton->class = 'btn';
    $editButton->type = 'submit';
    $editButton->setLabel("Edit Article");
  }


  function onDelete($params)
  {
    TTransaction::open('sample');
    $article = new Article();
    $article->delete($params['id']);
    TTransaction::close();

    AdiantiCoreApplication::loadPageURL('index.php?class=ArticlesView');
  }

  function onEdit($params)
  {
    AdiantiCoreApplication::loadPageURL('index.php?class=EditArticleView&id=' . $params['id']);
  }
}
