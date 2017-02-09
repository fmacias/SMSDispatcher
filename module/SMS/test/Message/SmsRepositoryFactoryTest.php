<?php

namespace SMSTest\Message;

use SMS\Message;
use SMS\Message\SmsRepositoryFactory;
use SMS\SmsDbAdapter;
use SMSModel\Sms\SmsRepository;
use SMSModelTest\Sms\SmsRepository\MockDataPersistance;
use Zend\ServiceManager\ServiceManager;

class SmsRepositoryFactoryTest extends \PHPUnit_Framework_TestCase{
    public function testCreateSmsRepository(){
        $sm = new ServiceManager();

        $sm->setFactory(Message::class,function(){
            return new MockMessage();
        });
        $sm->setFactory(SmsDbAdapter::class,function(){
            return new MockSmsDbAdapter();
        });

        $factory=new SmsRepositoryFactory();

        $SmsRespository=$factory($sm,SmsRepositoryFactory::class);
        $this->assertInstanceOf(SmsRepository::class,$SmsRespository);
    }
}