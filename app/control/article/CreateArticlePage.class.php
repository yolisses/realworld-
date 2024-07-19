<?php

use Adianti\Control\TPage;
use Adianti\Database\TTransaction;
use Adianti\Widget\Dialog\TMessage;

class ArticlePage extends TPage
{
  public function __construct()
  {
    parent::__construct();
    try {
      TTransaction::open('sample');

      $article = new Article;
      $article->slug = 'how-to-train-your-dragon';
      $article->title = 'How to train your dragon';
      $article->description = 'Ever wonder how?';
      $article->body = 'It takes a Jacobian';
      // $article->tagList = ['dragons', 'training'];
      // $article->createdAt = date('Y-m-d H:i:s');
      // $article->updatedAt = date('Y-m-d H:i:s');
      // $article->favorited = false;
      $article->favoritesCount = 0;
      $article->store();

      new TMessage('info', 'Object stored successfully');
      TTransaction::close();
    } catch (Exception $e) {
      new TMessage('error', $e->getMessage());
    }
  }
}
