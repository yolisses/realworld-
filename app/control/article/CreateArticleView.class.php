<?php

use Adianti\Control\TAction;
use Adianti\Control\TPage;
use Adianti\Core\AdiantiCoreApplication;
use Adianti\Database\TTransaction;
use Adianti\Widget\Form\TEntry;
use Adianti\Widget\Form\TLabel;
use Adianti\Widget\Form\TText;
use Adianti\Wrapper\BootstrapFormBuilder;

class CreateArticleView extends TPage
{
  public function __construct()
  {
    parent::__construct();
    $this->form = new BootstrapFormBuilder;
    $this->form->setFormTitle("New post");

    $title = new TEntry('title');
    $description = new TText('description');
    $body = new TEntry('body');

    $this->form->addFields([new TLabel("Title")], [$title]);
    $this->form->addFields([new TLabel("Description")], [$description]);
    $this->form->addFields([new TLabel('Body')], [$body]);

    $this->form->addAction("Publish article", new TAction(array($this, 'onSend')), '');

    $this->add($this->form);
  }

  function onSend()
  {
    $data = $this->form->getData();

    TTransaction::open('sample');

    $article = new Article;
    $article->title = $data->title;
    $article->description = $data->description;
    $article->body = $data->body;
    $article->slug = Article::slugify($data->title);
    $article->store();

    TTransaction::close();
  }
}
