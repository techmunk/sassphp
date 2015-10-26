--TEST--
correctly handles setting and getting SCSS / SASS file indents
--SKIPIF--
<?php if (!extension_loaded("sass")) print "skip"; ?>
--FILE--
<?php

$sass = new Sass();
// test default from constructor
echo $sass->getIndent();

// test SCSS
$sass->setIndent(false);
echo $sass->getIndent();

// test SASS
$sass->setIndent(true);
echo $sass->getIndent();


?>
--EXPECT--
001
