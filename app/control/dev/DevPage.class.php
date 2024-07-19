<?php

use Adianti\Control\TPage;

class DevPage extends TPage
{
  function __construct()
  {
    parent::__construct();

    $this->add(new UserButtons);
  }
}
