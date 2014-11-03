--TEST--
correctly handles setting and getting style
--SKIPIF--
<?php if (!extension_loaded("sass")) print "skip"; ?>
--FILE--
<?php

$sass = new Sass();
// test default from constructor
echo $sass->getStyle();

// test SASS_OUTPUT_NESTED
$sass->setStyle(Sass::STYLE_NESTED);
echo $sass->getStyle();

// test SASS_OUTPUT_EXPANDED
$sass->setStyle(Sass::STYLE_EXPANDED);
echo $sass->getStyle();

// test SASS_OUTPUT_COMPACT
$sass->setStyle(Sass::STYLE_COMPACT);
echo $sass->getStyle();

// test SASS_OUTPUT_COMPRESSED
$sass->setStyle(Sass::STYLE_COMPRESSED);
echo $sass->getStyle();

// test SASS_OUTPUT_FORMATTED
$sass->setStyle(Sass::STYLE_FORMATTED);
echo $sass->getStyle();

?>
--EXPECT--
001234