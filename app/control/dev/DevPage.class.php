<?php

use Adianti\Control\TPage;
use Adianti\Core\AdiantiCoreApplication;
use Adianti\Widget\Form\TLabel;

class DevPage extends TPage
{
  function __construct()
  {
    parent::__construct();

    $this->add(new TLabel('massa'));

    AdiantiCoreApplication::loadPage('UserButtons');
  }
}
