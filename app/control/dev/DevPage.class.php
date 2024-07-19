<?php

use Adianti\Control\TPage;
use Adianti\Core\AdiantiCoreApplication;
use Adianti\Registry\TSession;
use Adianti\Widget\Form\TLabel;

class DevPage extends TPage
{
  function __construct()
  {
    parent::__construct();

    $username = TSession::getValue('username');
    $this->add(new TLabel('username:' . $username));

    $logged = TSession::getValue('logged');
    $this->add(new TLabel('logged:' . $logged));

    AdiantiCoreApplication::loadPageURL('index.php?class=UserButtons');
  }
}
