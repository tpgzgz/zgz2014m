<?php
namespace Core\Application;

class Application
{
    protected static $request;
    private static $config;
    
    public static function setConfig($config)
    {
        include_once '../modules/Core/src/Router/models/parseUrl.php';
        include_once '../modules/Core/src/Module/models/moduleManager.php';
        
       
        
        self::$request = parseURL($_SERVER['REQUEST_URI']);
        self::$config = moduleManager($config);
    }
    
    public static function bootstrap()
    {
        session_start();
    }
    
    public static function dispatch()
    {       
                
        $controllerFile ='../modules/Application/src/Application/controllers/'.
                    self::$request['controller'].'.php';
//         echo $controllerFile;
//         include_once $controllerFile;       
        
        ob_start();
            $controllerName = "Application\\controllers\\".self::$request['controller'];
            $controller = new $controllerName(self::$config);
            $actionName = self::$request['action'];
            $controller -> $actionName();

        $view=ob_get_contents();
        ob_end_clean();
        
        self::twoStep($view,$controller->layout);
    }
    
    public static function twoStep($view, $layout)
    {
        include_once '../modules/Application/src/Application/layouts/'.
            $layout;
    }
    
    public static function getConfig()
    {
        return self::$config;
    }
}