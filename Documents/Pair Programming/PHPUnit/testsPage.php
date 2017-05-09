<?php
/**
 * Created by PhpStorm.
 * Date: 14.04.17
 * Time: 13:57
 */
require_once 'PHPUnit.php';
/* подключаем phpUnit и файл с тестируемым классом */
require_once('Class_Message.inc.php');

/* наследуем от PHPUnit_TestCase и добавляем тестирующие методы test<...> */

class MessageTest extends PHPUnit_TestCase
{
    function test_email_invalid()
    {
        $m = new Message('name', 'invalid', 'body');
        /* ожидаем, что m->is_valid() возвращает false */
        $this->assertFalse($m->is_valid());
    }

    function test_empty_input()
    {
        $m = new Message('', '', '');
        /* ожидаем, что m->is_valid() возвращает false */
        $this->assertFalse($m->is_valid());
    }

    function test_valid_input()
    {
        $m = new Message('name', 'invalid@mail.ru', 'body');
        $this->assertTrue($m->is_valid());
        $valid_string = << EOL
from: name(invalid@gmail . ru)

body 
EOL; 
            /* ожидаем, что эталонная строка и результат работы as_string() совпадут */ 
            $this->assertEquals($valid_string, $m->as_string());  
        }
}

/* запускаем набор тестов и выводим результат */
$suite = new PHPUnit_TestSuite('MessageTest');
$result = PHPUnit::run($suite);
echo $result->toHTML();

require_once('page.php');

class RemoteConnectTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
    }

    public function tearDown()
    {
    }

    public function testConnectionIsValid()
    {
        // проверка валидности соединения с сервером
        $connObj = new RemoteConnect();
        $serverName = 'www.google.com';
        $this->assertTrue($connObj->connectToServer($serverName) !== false);
    }
}

?>