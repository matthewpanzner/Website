<?php

require_once(CORE_DIR . "/Model.php");

class ErrorModel extends Model{
  private $msg;
  public function __construct($msg){$this->setMsg($msg);}
  public function setMsg($msg){$this->msg = $msg;}
  public function getMsg(){return $this->msg;}
}?>