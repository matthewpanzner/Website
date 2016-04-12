function isHelp($str){
  if($str == "help")
    return true;
  return false;
}
function isInfo($str){
  if($str == "getInfo" || $str == "matthew.getInfo()" || $str == "matthew->getInfo()")
    return true;
  return false;
}