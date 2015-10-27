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
/*# sourceMappingURL=data:application/json;base64,ewoJInZlcnNpb24iOiAzLAoJImZpbGUiOiAidGVzdHMvc3VwcG9ydC90ZXN0LmNzcyIsCgkic291cmNlcyI6IFsKCQkidGVzdHMvc3VwcG9ydC90ZXN0LnNjc3MiCgldLAoJIm1hcHBpbmdzIjogIkFBQUEsT0FBTyxDQUFDLDBCQUFJO0FBRVosR0FBRyxDQUFDO0VBQ0YsSUFBSSxFQUFFLDRCQUFpRCxHQUN4RDs7QUFJRCxHQUFHLENBQUM7RUFDQSxJQUFJLEVBQUUsWUFBYSxHQUN0QiIsCgkibmFtZXMiOiBbXQp9 */