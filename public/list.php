<?php
//backtick alt +
if (isset($_POST['id']))
    include  'delete.php';
include 'connect.php';

include '../templates/layout.html.php';





/*if (!isset($_POST['primonome'])) {
    include '../templates/layout.html.php';
} else {
    try {

        $name = '';
        $cognome = '';
        $name = $_POST['primonome'];
        $cognome = $_POST['secondnome'];
        if ($name != '' && $cognome != '')
            include '../templates/count.php';
        else
            include '../templates/layout.html.php';
    } catch (PDOException $e) {
        echo $output = 'dont todatabase connection esteibelshet   ',
            $e->getMessage() . '      ' . $e->getFile() . $e->getLine();

        include '../templates/layout.html.php';
    }
}

//echo $name." questo è il nome ".$cognome." questo è il cognome <BR>";
*/