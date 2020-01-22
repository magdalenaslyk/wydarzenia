<?php

use PHPUnit\Framework\TestCase;

require_once ('Class\DBConnection.php');
require_once ('Class\Event.php');
require_once ('Class\User.php');
require_once ('Class\ToGo.php');
require_once ('Class\Filter.php');
require_once ('Class\ImgUpload.php');

class Test extends TestCase
{

    public function testFirstTest()
    {
        $user = new User();
        $user->setID(1);
        $this->assertEquals(1,$user->getId());

    }

    public function testSecondTest()
    {

      $user = new User();
      $user->logout('login');
      $this->assertEquals('login',$user->doLogin());

    }

}
