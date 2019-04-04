<?php

event::listen('validateUserPassword', function($pass) {

  if(strlen($pass)<8) {
    view::alert('alert', $pass.' Password must be at least 8 characters.');
    return false;
  }
  if ($fh = fopen(__DIR__.'/list', 'r')) {
    while (!feof($fh)) {
      $line = trim(fgets($fh));
      if($pass==$line) {
        fclose($fh);
        view::alert('alert', 'Password is along the 50000 most common passwords.');
        return false;
      }
    }
    fclose($fh);
  }
  return true;
});
