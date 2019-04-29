<?php

function ReadString($key, $cleanValue=false,$defaultValue=null){
    $result = null;
    if (isset($_POST[$key]))
    {
        if ($cleanValue)
        {
            $result = filter_var($_POST[$key], FILTER_SANITIZE_STRING);
            if ($result!=null && $result!= "")
                $result = trim($result);
        }
        else
            $result = $_POST[$key];
    }
    if ($result==null  && $defaultValue !=null)
        $result = $defaultValue;
    return $result;
}

function ReadInt($key,$defaultValue=null){
    $result = null;
    if (isset($_POST[$key]))
        $result = filter_var($_POST[$key],FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE);
    if ($result==null  && $defaultValue !=null)
        $result = $defaultValue;
    return $result;
}

function ReadFloat($key,$defaultValue=null){
    $result = null;
    if (isset($_POST[$key]))
        $result = filter_var($_POST[$key], FILTER_VALIDATE_FLOAT, FILTER_NULL_ON_FAILURE);
    if ($result==null  && $defaultValue !=null)
        $result = $defaultValue;
    return $result;
}

function ReadBoolean($key,$defaultValue){
    $result = null;
    if (isset($_POST[$key]))
        $result = filter_var($_POST[$key],FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
    if ($result==null  && $defaultValue !=null)
        $result = $defaultValue;
    return $result;
}

function ReadCheckbox($key){
    if (isset($_POST[$key]) )
    {
       if (is_array($_POST[$key]))
            return $_POST[$key];
        else
            return Array();
    } 
    return Array();
}