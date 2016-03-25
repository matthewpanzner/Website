<?php
session_start();
include "../include/config.php";
include TEMPLATE_DIR . "/frontend/header.php";
include TEMPLATE_DIR . "/frontend/leftPanel.php";

class M {public $num; public function __construct(){$this->num = 4;} public function set($val){$this->num = $val;}}
class V {public $M;  public function __construct($m){$this->M = $m;}}
class C {public $M;  public function __construct($m){$this->M = $m;} public function change($val){$this->M->num = $val;}}
class R {public $M; public $V; public $C; public function __construct($m, $v, $c){$this->M = $m; $this->V = $v; $this->C = $c;}}
$names = new R('M', 'V', 'C');
$mName = $names->M;
$vName = $names->V;
$cName = $names->C;
$test = new $mName();
$m = &$test;
$v = new $vName($m);
$c = new $cName($m);


$_SESSION['model'] = $m;

$test = null;
include('home.php');
?>



<?php
include TEMPLATE_DIR . "/frontend/footer.php";
?>