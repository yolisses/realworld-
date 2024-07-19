<?php

use Adianti\Control\TAction;
use Adianti\Control\TPage;
use Adianti\Widget\Form\TEntry;
use Adianti\Widget\Form\TLabel;
use Adianti\Widget\Form\TPassword;
use Adianti\Widget\Wrapper\TQuickForm;
use Adianti\Wrapper\BootstrapFormBuilder;
use Adianti\Wrapper\BootstrapFormWrapper;

class SignUpView extends TPage
{
  public function __construct()
  {

    parent::__construct();


    $username = new TEntry('username');
    $email = new TEntry("email");
    $password = new TPassword("password");

    $form = new BootstrapFormBuilder;
    $this->add($form);
    $form->setFormTitle('Sign Up');

    $form->addFields([new TLabel("Username")], [$username]);
    $form->addFields([new TLabel("Email")], [$email]);
    $form->addFields([new TLabel("Password")], [$password]);

    $form->addAction("Sign up", new TAction(array($this, 'onSend')), "");
  }

  public function onSend()
  {
    echo "here";
  }
}
