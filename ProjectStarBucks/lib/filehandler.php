<?php
function file_writer($filenumber, $csssource, $htmlsource, $javascriptsource){
$file = fopen('./sourcestorage/'.$filenumber.'.php','w');
  fwrite($file,"<!DOCTYPE html><html><head><style>");
  fwrite($file,$csssource);
  fwrite($file,"</style></head><body>");
  fwrite($file,$htmlsource);
  fwrite($file,"<script>");
  fwrite($file,$javascriptsource);
  fwrite($file,"</script></body></html>");
fclose($file);
}
?>
