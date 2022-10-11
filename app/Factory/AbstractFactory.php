<?php


namespace App\Factory;


use App\Contracts\IFactory;
use App\Contracts\IStore;
use App\Exceptions\ServiceNotFoundException;
use App\Exceptions\StoreNotFoundException;

class AbstractFactory implements IFactory
{

    /**
     * DEFAULT Service NAMESPACE
     */
    const SERVICE_NAMESPACE = "App\Services\\";

    /**
     * @param string $serviceName
     * @param string $nameSpace
     * @param string $separator
     * @return mixed
     * @throws ServiceNotFoundException
     */
    static function Instantiate(string $serviceName, string $nameSpace = '',$separator="_")
    {
        $service = static::SERVICE_NAMESPACE . self::getServiceClassName($serviceName,$separator);
        if (class_exists($service)) {
            return new $service();
        }
        throw  new ServiceNotFoundException($serviceName);
    }

    private static function getServiceClassName($serviceName,$separator)
    {
        $names= explode($separator, $serviceName);
        $className="";
        foreach ($names as $name){
            $className.=ucfirst($name);
        }
        return $className;
    }
}
