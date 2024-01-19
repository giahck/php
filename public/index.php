<?php 

    try {
       include __DIR__.'/../includes/autoloader.php';

       // $route = ltrim(strtok($_SERVER['REQUEST_URI'], '?'), '/');
       // $ij=new \Ijdb\IjdbRoutes();
        $route = ltrim(strtok($_SERVER['REQUEST_URI'], '?'), '/');
          $entryPoint=new \Ninja\EntryPoint($route,$_SERVER['REQUEST_METHOD'], new \Ijdb\IjdbRoutes());
        $entryPoint->run();


    }catch (PDOException $e) {
            echo $output = 'dont todatabase connection esteibelshet   ',
            $e->getMessage() . '      ' . $e->getFile() . $e->getLine();
        include '../templates/layout.html.php';
    }
/*  $route = ltrim(strtok($_SERVER['REQUEST_URI'], '?'), '/');
        echo $route.'         '.$_SERVER['REQUEST_METHOD'];
        $entryPoint=new \Ninja\EntryPoint($route,$_SERVER['REQUEST_METHOD'], new \ijdb\IjdbRoutes());
        $entryPoint->run();*/



























/*include __DIR__.'/../includes/DC.php';
        include __DIR__.'/../classes/DataB.php';
       // include __DIR__.'/../classes/jController.php';

        $jTable = new DataB($pdo,'joke','id');
        $aTable = new DataB($pdo,'author','id');
       // $tControl = new jController($jTable,$aTable);

      //  $rout=$_GET['rout']  ?? 'j/home';
        $route = ltrim(strtok($_SERVER['REQUEST_URI'], '?'), '/');

        if ($route==strtolower($route)){
            if ($route==='j/list') {
                include __DIR__.'/../classes/controller/jController.php';
                $tControl = new jController($jTable,$aTable);
                $output = $tControl->list();
            }else if ($route==='j/edit') {
                include __DIR__.'/../classes/controller/jController.php';
                $tControl = new jController($jTable,$aTable);
                $output = $tControl->edit();
            }else if ($route==='') {
                include __DIR__.'/../classes/controller/jController.php';
                $tControl = new jController($jTable,$aTable);
                $output = $tControl->home();
            }else if ($route==='j/delete') {
                include __DIR__.'/../classes/controller/jController.php';
                $tControl = new jController($jTable,$aTable);
                $output = $tControl->delete();
            }else if ($route === 'register') {
                include __DIR__ . '/../classes/controller/RegisterController.php';
                $controller = new RegisterController($aTable);
                $page = $controller->showForm();
            }

        }
        else{
            http_response_code(301);
            header('location: index.php?action='.strtolower($rout));
        }

        if (isset($output['var']))
            $output =loadP($output['template'],$output['var']);
        else
            $output=loadP($output['template']);*/

/*if (isset($_GET['list'])){
            $output=$tControl->list();

        }elseif (isset($_POST['idD'])){
            $tControl->delete();
        }elseif(isset($_GET['edit']))
        {
            $output=$tControl->edit();

        }
        else
        $output= $tControl->home();*/

/* $arr=['hhh'=>'world'];
 extract($arr);
 echo $hhh;*/
/*  ob_start();
   include '../templates/home.html.php';

   $output = ob_get_clean();*/
