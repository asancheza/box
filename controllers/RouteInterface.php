<?php

interface RouteInterface {
  public function __construct();
  public function create();
  public function update();
  public function delete();
  public function show();
}

?>