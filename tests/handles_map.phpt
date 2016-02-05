--TEST--
correctly handles setting and getting source map formats
--SKIPIF--
<?php if (!extension_loaded("sass")) print "skip"; ?>
--FILE--
<?php

$sass = new Sass();
// test default from constructor
$sass->setComments(true);
$sass->setMapPath(__DIR__.'/support/test.css.map');
$sass->compileFile(__DIR__.'/support/test.scss');
$css = $sass->compileFile($source);
file_put_contents(__DIR__.'test.css.map',$css[1]);
?>
--EXPECT_EXTERNAL--
test.css.map