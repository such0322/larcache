<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\DesignPatterns\Facade\Facade as Computer;
use App\DesignPatterns\Facade\Os;
use App\DesignPatterns\Facade\Bios;
use App\DesignPatterns\DependencyInjection\ArrayConfig;
use App\DesignPatterns\DependencyInjection\Connection;
use App\DesignPatterns\Singleton\Singleton;
use App\DesignPatterns\SimpleFactory\ConcreteFactory;
use App\DesignPatterns\FactoryMethod\FactoryMethod as FM;
use App\DesignPatterns\FactoryMethod\ItalianFactory;
use App\DesignPatterns\FactoryMethod\GermanFactory;

class DesignPatternsController extends Controller {

    public function FMTest() {
        $type = array(
            FM::CHEAP,
            FM::FAST
        );

        $shops = array(
            new GermanFactory(),
            new ItalianFactory()
        );
        
//        $car = $shops[0]->create($type[1]);
//        dump($car);
//        dump($car->getName());
        for ($i = 0; $i < 5; $i++) {
            $random1 = rand(0, 1);
            $random2 = rand(0, 1);
            $car = $shops[$random1]->create($type[$random2]);
//            dump($car);
            dump($car->getName());
        }
    }

    public function SFTest() {

        $factory = new ConcreteFactory();
        $type = array(
            'bicycle',
            'other',
            'car'
        );
        $bic = $factory->createVehicle($type[0]);
        dump($bic);
        $bic->driveTo("road");
    }

    public function SingletonTest() {
        $call1 = Singleton::getInstance();
        $call2 = Singleton::getInstance();

        dump($call1 === $call2);

        $refl = new \ReflectionObject($call1);
        $meth = $refl->getMethod("__construct");
        dump($meth->isPrivate());
    }

    public function DITest() {
        $source = array('host' => 'github.com');
        $config = new ArrayConfig($source);

        $connection = new Connection($config);
        dump($connection);
        $connection->connect();
        $host = $connection->getHost();
        dump($host);
    }

    public function DPFacade() {
        $os = new Os("linux");
        $bios = new Bios();
        $facade = new Computer($bios, $os);
        dump($facade);
        $facade->turnOn();
        $facade->dosome(3);
        $facade->turnOff();
        return;
    }

}
