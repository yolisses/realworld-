<?php

use Adianti\Control\TAction;
use Adianti\Control\TPage;
use Adianti\Widget\Container\THBox;
use Adianti\Widget\Form\TForm;
use Adianti\Widget\Form\TLabel;
use Adianti\Widget\Util\TActionLink;

class UserButtons extends TPage
{
  function __construct()
  {
    parent::__construct();
    parent::setTargetContainer('adianti_user_buttons');

    $row = new THBox;
    $row->class = 'row';

    $signIn = new TActionLink('Sign in', new TAction(array('SignInView', 'dumb')), 'white');
    $signIn->class = 'btn mx-2';

    $signUp = new TActionLink('Sign up', new TAction(array('SignUpView', 'dumb')), 'white');
    $signUp->class = 'btn mx-2';

    $row = THBox::pack($signIn, $signUp);
    $this->add($row);
  }

  function onShow()
  {
  }
}
