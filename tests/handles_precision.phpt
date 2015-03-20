--TEST--
correctly handles setting and getting precision
--SKIPIF--
<?php if (!extension_loaded("sass")) print "skip"; ?>
--FILE--
<?php

$scss = <<<EOF
body{
  width: 10px / 30px * 100%;
}    
EOF;

$sass = new Sass();
// test default from constructor
echo $sass->getPrecision() . "\n";

// compile with above precision
echo $sass->compile($scss);

// set to "large" number
$sass->setPrecision(10);
echo $sass->getPrecision() . "\n";

// compile with above precision
echo $sass->compile($scss);

// set to "small" number
$sass->setPrecision(1);
echo $sass->getPrecision() . "\n";

// compile with above precision
echo $sass->compile($scss);

?>
--EXPECT--
5
body {
  width: 33.33333%; }
10
body {
  width: 33.3333333333%; }
1
body {
  width: 33.3%; }

