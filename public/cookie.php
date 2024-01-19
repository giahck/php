<?php
if (!isset($_COOKIE['visits'])){
    $_COOKIE['visits']=0;
}
$visits=$_COOKIE['visits']+1;
setcookie('visits',$visits,time()+3600*24*365);
if ($visits>1)
    echo 'visitato n'.$visits;
    else
        echo 'prima volta click to tour';

    session_start();
    if (!isset($_SESSION['visits'])){
        $_SESSION['visits']=0;
    }
    $_SESSION['visits']=$_SESSION['visits']+1;
    if ($_SESSION['visits']>1)
        echo 'visit n'.$_SESSION['visits'];
    else
        echo 'prima';