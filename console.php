#!/usr/bin/env php
<?php

require_once __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Console\Application;
use Console\TemperatureConverter;

$app = new Application();
$app->add(new TemperatureConverter());
$app->run();