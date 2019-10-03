<?php
class Input{

  public static function get($item) {
    if (isset($item)) {
      return trim($item);
    }
    else if (isset($item)) {
      return trim($item);
    }
    header('Location:' . BASEURL . '/home/tampil_barang');
  }

  public static function getSearch($item) {
    if (isset($_POST[$item])) {
      return trim($_POST[$item]);
    }
    else if (isset($_GET[$item])) {
      return trim($_GET[$item]);
    }
    return '';
  }

  public static function geturl($item) {
    if (isset($item)) {
      $url = rtrim($item, '/');
      $url = filter_var($url, FILTER_SANITIZE_URL);
      $url = explode('/', $url);
      return $url;
    }
  }


  public static function runSanitize($value,$sanitizeType){
    switch($sanitizeType) {
      case 'string':
        $sanitizeValue = filter_var($value, FILTER_SANITIZE_STRING);
      break;
      case 'int':
        $sanitizeValue = filter_var($value, FILTER_SANITIZE_NUMBER_INT);
      break;
      case 'float':
        $sanitizeValue = filter_var($value, FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
      break;
      case 'email':
        $sanitizeValue = filter_var($value, FILTER_SANITIZE_EMAIL);
      break;
      case 'url':
        $sanitizeValue = filter_var($value, FILTER_SANITIZE_URL);
      break;
    }
    return $sanitizeValue;
  }

  public static function generateOption($arr,$selectedValue = "") {
    $arrOption = [];
    foreach ($arr as $key => $value) {
      if ($value==$selectedValue){
        $arrOption [] = "<option value = \"$value\" selected> $value </option> ";
      } else {
        $arrOption [] = "<option value = \"$value\"> $value </option>";
      }
    }
    return implode($arrOption,' ');
  }


}
