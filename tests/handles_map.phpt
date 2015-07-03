--TEST--
correctly handles setting and getting source map formats
--SKIPIF--
<?php if (!extension_loaded("sass")) print "skip"; ?>
--FILE--
<?php

$sass = new Sass();
// test default from constructor
$sass->setComments(true);
$sass->setMapPath(__DIR__.'/test.css.map');
$sass->compileFile(__DIR__.'/support/test.scss');

?>
--EXPECT--
huge.css.map

