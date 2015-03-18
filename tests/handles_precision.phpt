--TEST--
correctly handles setting and getting precision
--SKIPIF--
<?php if (!extension_loaded("sass")) print "skip"; ?>
--FILE--
<?php

$sass = new Sass();
// test default from constructor
echo $sass->getPrecision();

// set to "large" number
$sass->setPrecision(10);
echo $sass->getPrecision();

// set to "small" number
$sass->setPrecision(1);
echo $sass->getPrecision();

?>
--EXPECT--
5101