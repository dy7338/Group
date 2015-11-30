<?php

namespace core\Group\Services;

use ServiceProvider;

class Service extends ServiceProvider
{
    private static $_instance;

    //to do 单列
	public function createDao($serviceName)
	{
		$serviceName = explode(":", $serviceName);

		$class = $serviceName[1]."DaoImpl";

		$className = "src\\Services\\".$serviceName[0]."\\Dao\\Impl\\".$class;

		return new $className;
	}

    public function register($serviceName)
    {
        return $this -> app -> singleton(strtolower($serviceName), function() use ($serviceName) {

            $serviceName = explode(":", $serviceName);

            $class = $serviceName[1]."ServiceImpl";

            $className = "src\\Services\\".$serviceName[0]."\\Impl\\".$class;

            return new $className($this -> app);

        });
    }
}

?>