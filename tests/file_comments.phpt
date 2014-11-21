--TEST--
parse_file()  parses correct Sass file and provides source comments
--SKIPIF--
<?php if (!extension_loaded("sass")) print "skip"; ?>
--FILE--
<?php

$sass = new Sass();
$sass->setComments(Sass::SOURCE_DEFAULT);
$css = $sass->compile_file('tests/support/test.scss');
echo $css;


?>
--EXPECT--
@import url(../blahblah/blah.blah);
/* line 3, tests/support/test.scss */
div {
  blah: "hello 4 world px bloo\n blah"; }

/* line 9, tests/support/test.scss */
div {
  blah: "foo iphone"; }

