<?php

function UrlQueryString($key, $defaultValue=null){
    $result = null;
    if (isset($_GET[$key]))
    {
        if ($_GET[$key]!="")
            $result = htmlspecialchars($_GET[$key]);
    }
    if ($result==null  && $defaultValue !=null)
        $result = $defaultValue;
    return $result;
}

function UrlQueryInt($key,$defaultValue=null){
    $result = null;
    if (filter_input(INPUT_GET, $key, FILTER_VALIDATE_INT)) {
        $result = (float)$_GET[$key];
    } 
    if ($result==null  && $defaultValue !=null)
        $result = $defaultValue;
    return $result;
}

function UrlQueryFloat($key,$defaultValue=null){
    $result = null;
    if (filter_input(INPUT_GET, $key, FILTER_VALIDATE_FLOAT)) {
        $result = (float)$_GET[$key];
    } 
    if ($result==null  && $defaultValue !=null)
        $result = $defaultValue;
    return $result;
}

function UrlQueryBoolean($key,$defaultValue=null){
    $result = null;
    if (filter_input(INPUT_GET, $key, FILTER_VALIDATE_BOOLEAN)) {
        $result = (boolean)$_GET[$key];
    } 
    if ($result==null  && $defaultValue !=null)
        $result = $defaultValue;
    return $result;
}

?>