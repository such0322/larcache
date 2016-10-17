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

use App\DesignPatterns\AbstractFactory\AbstractFactory;
use App\DesignPatterns\AbstractFactory\HtmlFactory;
use App\DesignPatterns\AbstractFactory\JsonFactory;

use App\DesignPatterns\Proxy\Record;
use App\DesignPatterns\Proxy\RecordProxy;

use App\DesignPatterns\Observer\User;
use App\DesignPatterns\Observer\UserObserver;

use App\DesignPatterns\Strategy\ObjectCollection;
use App\DesignPatterns\Strategy\IdComparator;
use App\DesignPatterns\Strategy\DateComparator;

use App\DesignPatterns\Decorator;

use App\DesignPatterns\Adapter\Book;
use App\DesignPatterns\Adapter\EBookAdapter;
use App\DesignPatterns\Adapter\Kindle;
use App\DesignPatterns\Adapter\EBookInterface;

class DesignPatternsController extends Controller {
    
    public function AdapterTest(){
        $book=new Book();
        $ebook=new EBookAdapter(new Kindle());
        
        $book->open();
        $ebook->open();
        
        $book->turnPage();
        $ebook->turnPage();
        
    }
    
    public function DecoratorTest(){
        $service=new Decorator\Webservice(array("foo"=>'bar'));
        
        $jonSer=new Decorator\RenderInJson($service);
        dump($jonSer->aaa());
    }
    
    public function StrategyTest(){
        $arr1=array(array('id' => 2), array('id' => 1), array('id' => 3));
        $obj1=new ObjectCollection($arr1);
        $obj1->setComparator(new IdComparator());
        $rs1=$obj1->sort();
        dump($rs1);
        
        
        
        $arr2=array(array('date' => '2014-03-03'), array('date' => '2015-03-02'), array('date' => '2013-03-01'));
        $obj2=new ObjectCollection($arr2);
        $obj2->setComparator(new DateComparator());
        $rs2=$obj2->sort();
        dump($rs2);
        
    }
    
    public function ObserverTest(){
        $observer=new UserObserver();
        
        //测试通知
//        $subject = new User();
//        $subject->property =123;
        
        //测试订阅
        $subject = new User();
        $reflection = new \ReflectionProperty($subject, 'observers');
        $reflection->setAccessible(true);
        dump($reflection);
        $observers = $reflection->getValue($subject);
        dump($observer);
        
        $subject->attach($observer);
//        $aaa=$subject->detach($observer);
        dump($subject);
        
        
        //测试 update() 调用
        $subject->notify();
    }
    
    public function ProxyTest (){
        $data=[];
        $record=new Record();
        $record->xyz="aa";
        dump($record);
        
        $proxy=new RecordProxy(null);
        dump($proxy);
        $proxy->xyz=false;
        dump($proxy);
        dump($proxy->xyz);
    }

    public function AFTest(){
        $html=new HtmlFactory();
        $pic1=$html->createPicture(asset("img/a.jpg"),"abc");
        $text1=$html->createText("asdfaksdjfkajfdklasjfa");
        echo $pic1->render();
        echo $text1->render();
        
        $json=new JsonFactory();
        $pic2=$json->createPicture(asset("img/a.jpg"),"cba");
        $text2=$json->createText("12312312312312312313");
        echo $pic2->render();
        echo $text2->render();
    }
    
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
