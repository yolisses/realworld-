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

  protected $form;

  use Adianti\Base\AdiantiStandardFormTrait;

  public function __construct()
  {
    parent::__construct();

    $this->setDatabase('sample');
    $this->setActiveRecord('Article');

    $this->form = new BootstrapFormBuilder('form_Article');
    $this->form->setFormTitle("New post");

    $title = new TEntry('title');
    $description = new TEntry('description');
    $body = new TText('body');

    $this->form->addFields([new TLabel("Title")], [$title]);
    $this->form->addFields([new TLabel("Description")], [$description]);
    $this->form->addFields([new TLabel('Body')], [$body]);

    $this->form->addAction("Publish article", new TAction(array($this, 'onSave')), '');

    $this->add($this->form);
  }
}
