--TEST--
correctly handles setting and getting source map formats
--SKIPIF--
<?php if (!extension_loaded("sass")) print "skip"; ?>
--FILE--
<?php

$sass = new Sass();
// test default from constructor
echo $sass->getComments();

// test SASS_SOURCE_NONE
$sass->setComments(Sass::SOURCE_NONE);
echo $sass->getComments();

// test SASS_SOURCE_DEFAULT
$sass->setComments(Sass::SOURCE_DEFAULT);
echo $sass->getComments();

// test SASS_SOURCE_MAP
$sass->setComments(Sass::SOURCE_MAP);
echo $sass->getComments();

?>
--EXPECT--
0012
