<?php

use Okneloper\Debug\Debug;

class DebugTest extends \PHPUnit\Framework\TestCase
{
    public function testSetsRootPath()
    {
        $debug = new Debug();
        $this->assertNull($debug->getRootPath());

        $debug->setRootPath('/home/user/public_html');

        $this->assertEquals('/home/user/public_html', $debug->getRootPath());
    }

    public function testRegisterReturnsAnInstance()
    {
        $debug = Debug::registerFirePhpHandler();
        $this->assertInstanceOf(Debug::class, $debug);
    }
}
