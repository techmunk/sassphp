--TEST--
compiles SASS file in comparison to SCSS based SASS file
--SKIPIF--
<?php if (!extension_loaded("sass")) print "skip"; ?>
--FILE--
<?php

$sass = new Sass();
$sass->setIndent(true);
$css = $sass->compileFile(__DIR__.'/support/minix.sass');
echo $css;


?>
--EXPECT--

