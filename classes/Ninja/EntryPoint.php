<?php
namespace Ninja;
class EntryPoint
{
    private $route;
    private $routes;
    private $method;

    public function __construct(string $route,string $method,\Ninja\Routes $routes)
    {
        $this->route=$route;
        $this->routes=$routes;
        $this->method=$method;
        $this->checkUrl();
    }
    private function checkUrl(){
        if ($this->route !== strtolower($this->route)){
        http_response_code(301);
        header('location: '.strtolower($this->route));
        }
    }
    private function loadP($template,$var=[]){
        extract($var);
      //echo $template;
        ob_start();
        include __DIR__.'/../../templates/'.$template;

        return ob_get_clean();
    }

    public function run(){
        $routes=$this->routes->getRoutes();
        $controller=$routes[$this->route][$this->method]['controller'];
        $action=$routes[$this->route][$this->method]['action'];
        $output = $controller->$action();


        //$output=$this->loadP()
   // include __DIR__.'/../../templates/layout.html.php';
        if (isset($output['var']))
            $output =$this->loadP($output['template'],$output['var']);
        else
            $output=$this->loadP($output['template']);

        include __DIR__.'/../../templates/layout.html.php';


       /* $output=$this->routes->callAction($this->route);

        if (isset($output['var']))
            $output =$this->loadP($output['template'],$output['var']);
        else
            $output=$this->loadP($output['template']);

        include __DIR__.'/../../templates/layout.html.php';*/
    }


}