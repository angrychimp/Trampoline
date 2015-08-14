#!/bin/env php
<?php

if (!isset($_ENV['ORIGINAL_RECIPIENT'])) {
    exit("Bad recipient or no recipient found");
}

echo "Processing message for {$_ENV['ORIGINAL_RECIPIENT']}...\n";
list($user, $domain) = explode('@', $_ENV['ORIGINAL_RECIPIENT']);

// handle user plus addressing
list($script) = explode('+', $user);

if (!file_exists('php-handlers/'.$script)) {
    exit("Bad recipient or no recipient found");
}

require_once('php-handlers/'.$script);