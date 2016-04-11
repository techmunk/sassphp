# sassphp

The `sass` extension for PHP gives you an object-oriented system of parsing [Sass](http://sass-lang.com/) from within your PHP applications. Under the hood it uses [libsass](https://github.com/hcatlin/libsass) to provide super speedy and compatible Sass parsing.

![Libsass 3.3.4](https://img.shields.io/badge/libsass-3.3.4-yellow.svg) [![Build Status](https://travis-ci.org/absalomedia/sassphp.svg)](https://travis-ci.org/absalomedia/sassphp)

## What's Sass?

Sass is a CSS pre-processor language to add on exciting, new, awesome features to CSS. Sass was the first language of its kind and by far the most mature and up to date codebase.

Sass was originally created by Hampton Catlin ([@hcatlin](http://twitter.com/hcatlin)). The extension and continuing evolution of the language has all been the result of years of work by Natalie Weizenbaum ([@nex3](http://twitter.com/nex3)) and Chris Eppstein ([@chriseppstein](http://twitter.com/chriseppstein)).

For more information about Sass itself, please visit [http://sass-lang.com](http://sass-lang.com)

## Installation

Currently, the only way to install the extension is manually:

    $ git clone git://github.com/sensational/sassphp

Remember to grab your submodules:

    $ git submodule init
    $ git submodule update

Also remember that libsass now uses submodules on its own, so update those too.

...and compile it! I've written a little PHP script to do all the stuff you need to do:

    $ php install.php

Run the tests:

    $ make test

Finally, you can install with `make`:

    $ make install

And then add it to your _php.ini_:

    extension=sass.so

## Usage

This extension has a very simple API:

    $sass = new Sass();
    $css = $sass->compile($source);

You can compile a file with `compileFile()`:

    $sass = new Sass();
    $css = $sass->compileFile($source);

You can set the include path for the library to use:

    $sass = new Sass();
    $sass->setIncludePath('/tmp');
    $css = $sass->compile($source);

You can set the style of your SASS file to suit your needs:

    $sass = new Sass();
    $sass->setStyle(Sass::STYLE_NESTED);

    $sass = new Sass();
    $sass->setStyle(Sass::STYLE_EXPANDED);

    $sass = new Sass();
    $sass->setStyle(Sass::STYLE_COMPACT);

    $sass = new Sass();
    $sass->setStyle(Sass::STYLE_COMPRESSED);

As the [Libsass](https://github.com/hcatlin/libsass) library has matured to get closer to 100% SASS coverage, so this extension has also matured:
* SASS file compilation is an array when a source map file is specified.
* The ability to define source comments
* The ability to embed the source map into the CSS output
* The ability to specify .SASS file input instead of .SCSS
* The ability to set a source map path, required when generating a dedicated .map file
* The ability to define a root directory for the source map itself
* PHP 5.4 to PHP 7.1 (nightly) support

The output of `compileFile()` is an array when creating source map files, allowing both compiled SASS file and .map file to be generated in the same function call.

As there are multiple ways of generating source comments, there are now PHP level settings to control that output.

To generate source comments for a file inline:

    $sass = new Sass();
    $sass->setComments(true);
    $css = $sass->compileFile($source);

Aliases also exist so you can also use:

    $css = $sass->compile_file($source);

You can tell the compiler to use indented syntax (SASS syntax). By default it expects SCSS syntax:

    $sass = new Sass();
    $sass->setIndent(true); //TRUE -> SASS, FALSE -> SCSS
    $css = $sass->compile($source);

You can tell the compiler to embed the source map into the actual CSS file as well:

    $sass = new Sass();
    $sass->setEmbed(true);
    $css = $sass->compile($source);

You can set the source map file for the library to use:

    $sass = new Sass();
    $sass->setMapPath('/random.output.css.map');
    $css = $sass->compileFile($source);

This needs to be done prior to getting the output of the map file. As it stands, both the output of the SASS file compile & the SASS source map file generation sequence are both strings.

The first array item will always be the compiled SASS file:
    $css[0]

The second array item will always be the source map output:
    $css[1]

You can set the root of the generated source map file like so:

    $sass = new Sass();
    $sass->setMapRoot('/some/dir');
    $sass->setMapPath('/random.output.css.map');
    $css = $sass->compileFile($source);

If there's a problem, the extension will throw a `SassException`:

    $sass = new Sass();

    try
    {
        $css = $sass->compile('dayrui3dui36di37');
    }
    catch (SassException $e)
    {
        // $e->getMessage() - ERROR -- , line 1: invalid top-level expression

        $css = FALSE;
    }

## Potential / known issues

* The file_comments test will fail as it remains unable to figure out the path the test has been run in. It generates the output successfully

## Variant builds

These extensions also utilise the [Libsass](https://github.com/hcatlin/libsass) library & remain in varying states of completion:

* Facebook [HHVM](https://github.com/absalomedia/sasshhvm) native (non Zend) extension - with Libsass 3.3.3 - tested up to HHVM 3.11.x
* [Nginx](https://github.com/absalomedia/sass-nginx-module) module - with Libsass 3.3.3

## Changelog

** Version 0.5.2
*  Delorean (Libsass 3.3.3) stable & PHP7 rewrite

** Version 0.5.1
*  Eleanor (Libsass 3.3.2) stable

** Version 0.5
*  PHP 7 compatibility

** Version 0.4.9
* Too Fast To Furious (Libsass 3.3.1) stable

** Version 0.4.8
* Greased Lightning (Libsass 3.3.0) stable

** Version 0.4.7
* SCSS vs SASS detection - indents

** Version 0.4.6
* Travis experimental (unreleased)

** Version 0.4.5
* Holiday Patch (Libsass 3.2.5) stable

** Version 0.4.4
* Refactor correctly for LibSass 3.2.4

** Version 0.4.2
* CamelCase compile sequence

** Version 0.4.1**
* SOURCE_DEFAULT works & is documented
* PHP test for SOURCE_DEFAULT (output unable to understand source directory in test, so functional pass, technical fail)
* Revise other tests to pass as output varies on source negotiation.

** Version 0.4**
* Reconciled file compliation loop
* Expand documentation
* Addition of basic test for source comments
* More work on compile sequence

** Version 0.3.9**
* Addition of source map url paths to SASS file compilation

** Version 0.3.5**
* Restructure of compile sequence (file only at this time) to account for source map output

** Version 0.3.0**
* Addition of source comments - none, inline, file. Set default to none.

** Version 0.2.0**
* Changed methods to be non-static
* Allow setting include-path and image-path

**Version 0.1.0 - IN DEVELOPMENT**
* Initial release
