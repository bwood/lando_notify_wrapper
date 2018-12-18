#!/usr/bin/env php
<?php

// Configure these variables for your system:
$lando_path = '/usr/local/bin/lando';
$lando_sites_path_match = 'Sites/lando';

$options = getopt('h', []);
$lando_cmd = array_shift($argv);
$x = 1;


switch ($lando_cmd) {
  case "list":
  case "start":
  case "restart":
  case "build":
  case "rebuild":
  case "destroy":
  case "init":
    $alert = TRUE;
    break;
  default;
    $alert = FALSE;
    break;
}

if ($alert) {
  exec($lando_path . ' ' . $lando_cmd, $out, $exit_code_lando);

  print implode("\n", $out);

  if ($exit_code_lando == 0) {
    $lando_status = 'Success';
  }
  else {
    $lando_status = "Failed ($exit_code_lando)";
  }

  preg_match("@$lando_sites_path_match/(\S+)@", $_SERVER['PWD'], $matches);
  if (is_array($matches) && array_key_exists(1, $matches)) {
    $site = 'Site: ' . $matches[1];
  }
  else {
    $site = '';
  }


  if ($alert) {
    $cmd_oascript = 'osascript -e "display notification \"' .  $lando_status . '\" with title \"lando ' . $lando_cmd. '\" subtitle \"' . $site . '\" sound name \"Tink\""';
    exec($cmd_oascript, $out_oascript, $exit_code_oascript);

    if ($exit_code_oascript != 0) {
      print "Error: Failed to execute $cmd_oascript\n";
    }
  }
  exit($exit_code_lando);

}