--TEST--
compiles correct Sass file and provides source embedding
--SKIPIF--
<?php if (!extension_loaded("sass")) print "skip"; ?>
--FILE--
<?php

$sass = new Sass();
$sass->setEmbed(true);
$css = $sass->compileFile(__DIR__.'/support/test.scss');
echo $css;


?>
--EXPECT--
@import url(../blahblah/blah.blah);
div {
  blah: "hello 4 world px bloo blah"; }

div {
  blah: "foo iphone"; }

 /*# sourceMappingURL=data:application/json;base64,ewoJInZlcnNpb24iOiAzLAoJImZpbGUiOiAidGVzdHMvc3VwcG9ydC90ZXN0LmNzcyIsCgkic291cmNlcyI6IFsKCQkidGVzdHMvc3VwcG9ydC90ZXN0LnNjc3MiCgldLAoJIm1hcHBpbmdzIjogIkFBQUEsT0FBTyxDQUFDLDBCQUFJO0FBRVosQUFBQSxHQUFHLENBQUM7RUFDRixJQUFJLEVBQUUsNEJBQWlELEdBQ3hEOztBQUlELEFBQUEsR0FBRyxDQUFDO0VBQ0EsSUFBSSxFQUFFLFlBQWEsR0FDdEIiLAoJIm5hbWVzIjogW10KfQ== */
