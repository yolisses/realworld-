<?php

use Adianti\Control\TPage;
use Adianti\Database\TTransaction;
use Adianti\Widget\Base\TElement;
use Adianti\Widget\Container\TVBox;
use Adianti\Widget\Form\TLabel;

class ArticlesView extends TPage
{
  public function __construct()
  {
    parent::__construct();

    TTransaction::open('sample');
    $articles = Article::all();
    TTransaction::close();

    $list = new TVBox;
    $list->class = "col";
    $this->add($list);

    foreach ($articles as $article) {
      $link = new TElement('a');
      $link->href = 'index.php?class=ArticleView&method=onLoad&id=' . $article->id;
      $list->add($link);

      $card = new TVBox;
      $card->class = "card col-sm-12 mt-2";
      $link->add($card);

      $header =  new TVBox;
      $header->class = 'card-header';
      $card->add($header);

      $title = new TLabel($article->title);
      $title->class = "card-title";
      $header->add($title);

      $body = new TVBox();
      $body->class = 'card-body';
      $card->add($body);

      $description = new TLabel($article->description);
      $body->add($description);
    }
  }
}
