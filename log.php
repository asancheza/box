<?php
  require __DIR__ . '/vendor/autoload.php';
  $log = new Monolog\Logger('name');
  $log->pushHandler(new Monolog\Handler\StreamHandler('app/logs/app.log', Monolog\Logger::WARNING));
  $log->addWarning('Foo');
?>