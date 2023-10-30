<?php

function checked($params, $dir, $message="") {
  if (
    strpos($params, "'") !== false ||
    strpos($params, '"') !== false ||
    strpos($params, "*") !== false ||
    strpos($params, "+") !== false ||
    strpos($params, "-") !== false ||
    strpos($params, ".") !== false ||
    strpos($params, ",") !== false ||
    strpos($params, ";") !== false ||
    strpos($params, "`") !== false ||
    strpos($params, "~") !== false ||
    strpos($params, "(") !== false ||
    strpos($params, ")") !== false ||
    strpos($params, "{") !== false ||
    strpos($params, "}") !== false ||
    $params == "'" ||
    $params == '"' ||
    $params == "*" ||
    $params == "+" ||
    $params == "-" ||
    $params == "," ||
    $params == "." ||
    $params == ";" ||
    $params == "`" ||
    $params == "~" ||
    $params == "(" ||
    $params == ")" ||
    $params == "{" ||
    $params == "}" 
    ) {
    if (!$message) {
      header("location: ../$dir?message=$message");
    } else {
      header("location: ../$dir");
    }
  }
}