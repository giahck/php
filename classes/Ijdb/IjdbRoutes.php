<?php
namespace Ijdb;

class IjdbRoutes implements \Ninja\Routes {
    public function getRoutes() {
        include __DIR__ . '/../../includes/DC.php';

        $jTable = new \Ninja\DataB($pdo, 'joke', 'id');
        $aTable = new \Ninja\DataB($pdo, 'author', 'id');

        $controller=new \Ijdb\Controller\jController($jTable,$aTable);
        $authorControll=new \Ijdb\Controller\Register($aTable);

        $routes=[
            'author/register'=>[
                'GET'=>[
                    'controller'=>$authorControll,
                    'action'=>'registerForm'
                ],
                'POST'=>[
                    'controller'=>$authorControll,
                    'action'=>'registerUser'
                ]
            ],
          ''=>[
              'GET'=>[
                  'controller'=>$controller,
                  'action'=>'home'
              ]
          ],
          'jo/list'=>[
              'GET'=>[
                  'controller'=>$controller,
                  'action'=>'list'
              ]
          ],
            'jo/edit'=>[
                'GET'=>[
                    'controller'=>$controller,
                    'action'=>'edit'
                ],
                'POST'=>[
                    'controller'=>$controller,
                    'action'=>'edit'
                ]
            ],
            'jo/delete'=>[
                'POST'=>[
                    'controller'=>$controller,
                    'action'=>'delete'
                ]
            ]
        ];
        return $routes;



        /*
        if ($route === 'jo/list') {
            $controller = new \Ijdb\Controller\jController($jTable, $aTable);
            $page = $controller->list();
        }
        else if ($route === '') {
            $controller = new \Ijdb\Controller\jController($jTable, $aTable);
            $page = $controller->home();
        }
        else if ($route === 'jo/edit') {
            $controller = new \Ijdb\Controller\jController($jTable, $aTable);
            $page = $controller->edit();
        }
        else if ($route === 'jo/delete') {
            $controller = new \Ijdb\Controller\jController($jTable, $aTable);
            $page = $controller->delete();
        }
*/


    }
}

/*class IjdbRoutes implements \Ninja\Routes
{
   public function getRoutes()
   {
       include __DIR__.'/../../includes/DC.php';
       $jTable=new \Ninja\DataB($pdo,'joke','id');
       $aTable=new \Ninja\DataB($pdo,'author','id');
       $jControl=new \Ijdb\controller\jController($jTable,$aTable);

           $routes = [
               'jo/edit' => [
                   'POST' => [
                       'controller' => $jControl,
                       'action' => 'save'
                   ],
                   'GET' => [
                       'controller' => $jControl,
                       'action' => 'edit'
                   ]

               ],
               'jo/delete' => [
                   'POST' => [
                       'controller' => $jControl,
                       'action' => 'delete'
                   ]
               ],
               'jo/list' => [
                   'GET' => [
                       'controller' => $jControl,
                       'action' => 'list'
                   ]
               ],
               '' => [
                   'GET' => [
                       'controller' => $jControl,
                       'action' => 'home'
                   ]
               ]
           ];

       return $routes;

   }
}
*/