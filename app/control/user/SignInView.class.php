<?php

use Adianti\Control\TAction;
use Adianti\Control\TPage;
use Adianti\Widget\Form\TEntry;
use Adianti\Widget\Form\TLabel;
use Adianti\Widget\Form\TPassword;
use Adianti\Wrapper\BootstrapFormBuilder;

class SignInView extends TPage
{
  public function __construct()
  {

    parent::__construct();

    $email = new TEntry("email");
    $password = new TPassword("password");

    $form = new BootstrapFormBuilder;
    $this->add($form);
    $form->setFormTitle('Sign In');

    $form->addFields([new TLabel("Email")], [$email]);
    $form->addFields([new TLabel("Password")], [$password]);

    $form->addAction("Sign in", new TAction(array($this, 'onSend')), "");
  }

  public function onSend()
  {
    echo "here";
  }
}
