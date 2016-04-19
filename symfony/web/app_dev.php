<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Debug\Debug;

// If you don't want to setup permissions the proper way, just uncomment the following PHP line
// read http://symfony.com/doc/current/book/installation.html#configuration-and-setup for more information
//umask(0000);

// This check prevents access to debug front controllers that are deployed by accident to production servers.
// Feel free to remove this, extend it, or make something more sophisticated.
// print __FILE__.':'.__LINE__.'<br/>';
if (isset($_SERVER['HTTP_CLIENT_IP'])
    || isset($_SERVER['HTTP_X_FORWARDED_FOR'])
    || !in_array(@$_SERVER['REMOTE_ADDR'], array('127.0.0.1', 'fe80::1', '::1'))
) {
    // header('HTTP/1.0 403 Forbidden');
    // exit('You are not allowed to access this file. Check '.basename(__FILE__).' for more information.');
	// print __FILE__.':'.__LINE__.'<br/>';
}
// print __FILE__.':'.__LINE__.'<br/>';

$loader = require_once __DIR__.'/../app/bootstrap.php.cache';
// print __FILE__.':'.__LINE__.'<br/>';
Debug::enable();
// print __FILE__.':'.__LINE__.'<br/>';

require_once __DIR__.'/../app/AppKernel.php';
// print __FILE__.':'.__LINE__.'<br/>';

$kernel = new AppKernel('dev', true);
// print __FILE__.':'.__LINE__.'<br/>';
$kernel->loadClassCache();
// print __FILE__.':'.__LINE__.'<br/>';
$request = Request::createFromGlobals();
// print __FILE__.':'.__LINE__.'<br/>';
$response = $kernel->handle($request);
// print __FILE__.':'.__LINE__.'<br/>';
$response->send();
// print __FILE__.':'.__LINE__.'<br/>';
$kernel->terminate($request, $response);
// print __FILE__.':'.__LINE__.'<br/>';
