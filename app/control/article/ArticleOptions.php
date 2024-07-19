<?php

use Adianti\Control\TAction;
use Adianti\Widget\Container\THBox;
use Adianti\Widget\Form\TButton;
use Adianti\Widget\Form\TForm;


class ArticleOptions extends THBox
{
  function __construct($articleId)
  {
    parent::__construct();

    $deleteForm = new TForm();
    $this->add($deleteForm);

    $deleteButton = new TButton("delete");
    $deleteForm->add($deleteButton);
    $deleteForm->addField($deleteButton);

    $deleteButton->setAction(new TAction(['DeleteArticle', 'onDelete'], ['id' => $articleId]));

    $deleteButton->class = 'btn';
    $deleteButton->type = 'submit';
    $deleteButton->setImage('fa:trash red');
    $deleteButton->setLabel("Delete Article");

    $editForm = new TForm();
    $this->add($editForm);

    $editButton = new TButton("edit");
    $editForm->add($editButton);
    $editForm->addField($editButton);

    $editAction = new TAction(array('EditArticleView', 'onLoad'));
    $editAction->setParameter('id', $articleId);
    $editButton->setAction($editAction);

    $editButton->class = 'btn';
    $editButton->setLabel("Edit Article");
    $editButton->setImage('fa:edit blue');
  }
}
