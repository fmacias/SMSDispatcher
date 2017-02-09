<?php
namespace SMSTest\Message;

use SMS\Message\SmsDbAdapterFactory;
use SMS\SmsDbAdapter;
use SMSModel\Sms\SmsRepository\DataPersistanceInterface;
use Zend\Db\Adapter\Adapter;
use Zend\ServiceManager\ServiceManager;

class SmsDbAdapterFactoryTest extends \PHPUnit_Framework_TestCase{
    public function testCanCreateSmsDbAdapter(){
        $sm = new ServiceManager();

        $sm->setFactory(Adapter::class,function(){
            return new Adapter(array('driver' => 'Pdo'));
        });

        $factory=new SmsDbAdapterFactory();

        $SmsDbAdapter=$factory($sm,SmsDbAdapterFactory::class);
        $this->assertInstanceOf(SmsDbAdapter::class,$SmsDbAdapter);
    }
}