<?php

use Adianti\Control\TAction;
use Adianti\Control\TPage;
use Adianti\Core\AdiantiCoreApplication;
use Adianti\Database\TTransaction;
use Adianti\Registry\TSession;
use Adianti\Widget\Dialog\TMessage;
use Adianti\Widget\Form\TEntry;
use Adianti\Widget\Form\TPassword;
use Adianti\Widget\Wrapper\TQuickForm;


class SignInView extends TPage
{
  public function __construct()
  {
    parent::__construct();

    $email = new TEntry('email');
    $password = new TPassword('password');

    $this->form = new TQuickForm('login_form');
    $this->form->addQuickField('E-mail', $email);
    $this->form->addQuickField('Password', $password);
    $this->form->addQuickAction("Sign in", new TAction([$this, 'onLogin']));

    parent::add($this->form);
  }

  function dumb()
  {
  }

  public function onLogin()
  {
    try {
      TTransaction::open('sample');

      $data = $this->form->getData();

      $email = $data->email;
      $password = $data->password;

      $users = User::where('email', '=', $email)->load();

      var_dump($users);
      if (count($users) > 0) {
        $user = $users[0];
        if (password_verify($password, $user->passwordHash)) {
          TSession::setValue('logged', true);
          TSession::setValue('email', $user->email);
          TSession::setValue('role', $user->role);
          AdiantiCoreApplication::gotoPage('ArticlesView');
        } else {
          throw new Exception('Invalid password');
        }
      } else {
        throw new Exception('User not found');
      }


      TTransaction::close();
    } catch (Exception $e) {
      new TMessage('error', $e->getMessage());
      TTransaction::rollback();
    }
  }
}
