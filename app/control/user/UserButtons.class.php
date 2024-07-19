<?php

use Adianti\Control\TPage;
use Adianti\Widget\Form\TLabel;

class UserButtons extends TPage
{
  function __construct()
  {
    parent::__construct();
    parent::setTargetContainer('adianti_user_buttons');

    $this->add(new TLabel('hello'));
  }
}
