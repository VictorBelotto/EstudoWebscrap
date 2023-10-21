<?php

class dadosDoPost{
  public $postId ;
  public $postTitle ;
  public $postType ; 
  public $postAuthors ; 
  public $authorsInstituitions ;

  public function __construct($postId,$postTitle, $postType, $postAuthors, $authorsInstituitions) {
    $this->postTitle = $postTitle;
    $this->postId = $postId;
    $this->postType = $postType;
    $this->postAuthors = $postAuthors;
    $this->authorsInstituitions = $authorsInstituitions;
  }
};