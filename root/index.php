<?php
session_start();
require_once "../include/config.php";
require_once CLASS_DIR . "/model/ErrorModel.php";
require_once CLASS_DIR . "/controller/ErrorController.php";
require_once CLASS_DIR . "/core/View.php";
require_once CLASS_DIR . "/core/Router.php";

class M {public $num; public function __construct(){$this->num = 4;} public function set($val){$this->num = $val;}}
class V {public $M;  public function __construct($m){$this->M = $m;}}
class C {public $M;  public function __construct($m){$this->M = $m;} public function change($val){$this->M->num = $val;}}
class R {public $M; public $V; public $C; public function __construct($m, $v, $c){$this->M = $m; $this->V = $v; $this->C = $c;}}
$names = new R('M', 'V', 'C');
$mName = $names->M;
$vName = $names->V;
$cName = $names->C;
$test = new $mName();

$m = new ErrorModel("IAMERROR");
$c = new ErrorController($m);
$v = new View($m, $c->onUnauthorized());

?>
