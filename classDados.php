<?php

class dadosDoPost{
  public $postTitle ;
  public $postId ;
  public $postType ; 
  public $postAuthors ; 
  public $authorsInstituitions ;

  public function __construct($postTitle, $postId, $postType, $postAuthors, $authorsInstituitions) {
    $this->postTitle = $postTitle;
    $this->postId = $postId;
    $this->postType = $postType;
    $this->postAuthors = $postAuthors;
    $this->authorsInstituitions = $authorsInstituitions;
  }
};