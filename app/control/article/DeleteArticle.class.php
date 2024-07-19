<?php

use Adianti\Control\TPage;
use Adianti\Core\AdiantiCoreApplication;
use Adianti\Database\TTransaction;

class DeleteArticle extends TPage
{

  function onDelete($params)
  {
    TTransaction::open('sample');
    $article = new Article();
    $article->delete($params['id']);
    TTransaction::close();
    AdiantiCoreApplication::loadPageURL('index.php?class=ArticlesView');
  }
}
