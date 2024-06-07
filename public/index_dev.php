<?php

// Need to trace all kind of errors
error_reporting(-1);
ini_set('display_errors', 'On');

// if you don't want to set up permissions the proper way, just uncomment the following PHP line
// read http://symfony.com/doc/current/book/installation.html#configuration-and-setup for more information
//umask(0000);

// This check prevents access to debug front controllers that are deployed by accident to production servers.
// Feel free to remove this, extend it, or make something more sophisticated.

require_once dirname(__DIR__).'/vendor/autoload_runtime.php';

return fn() => new AppKernel('dev', true);
