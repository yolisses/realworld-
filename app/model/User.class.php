<?php

use Adianti\Database\TRecord;

class User extends TRecord
{
  const TABLENAME = 'user';
  const PRIMARYKEY = 'id';

  public function __construct($id = NULL)
  {
    parent::__construct($id);
    parent::addAttribute('bio');
    parent::addAttribute('email');
    parent::addAttribute('username');
    parent::addAttribute('passwordHash');
  }
}
