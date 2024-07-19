<?php

use Adianti\Control\TAction;
use Adianti\Control\TPage;
use Adianti\Widget\Wrapper\TQuickForm;
use Adianti\Wrapper\BootstrapFormWrapper;

class SignUpView extends TPage
{
  public function __construct()
  {
    parent::__construct();
    echo '<h1>Sign Up</h1>';
  }
}
