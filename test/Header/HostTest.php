<?php

/**
 * @see       https://github.com/laminas/laminas-http for the canonical source repository
 * @copyright https://github.com/laminas/laminas-http/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-http/blob/master/LICENSE.md New BSD License
 */

namespace LaminasTest\Http\Header;

use Laminas\Http\Header\Host;

class HostTest extends \PHPUnit_Framework_TestCase
{
    public function testHostFromStringCreatesValidHostHeader()
    {
        $hostHeader = Host::fromString('Host: xxx');
        $this->assertInstanceOf('Laminas\Http\Header\HeaderInterface', $hostHeader);
        $this->assertInstanceOf('Laminas\Http\Header\Host', $hostHeader);
    }

    public function testHostGetFieldNameReturnsHeaderName()
    {
        $hostHeader = new Host();
        $this->assertEquals('Host', $hostHeader->getFieldName());
    }

    public function testHostGetFieldValueReturnsProperValue()
    {
        $this->markTestIncomplete('Host needs to be completed');

        $hostHeader = new Host();
        $this->assertEquals('xxx', $hostHeader->getFieldValue());
    }

    public function testHostToStringReturnsHeaderFormattedString()
    {
        $this->markTestIncomplete('Host needs to be completed');

        $hostHeader = new Host();

        // @todo set some values, then test output
        $this->assertEmpty('Host: xxx', $hostHeader->toString());
    }

    /** Implementation specific tests here */

    /**
     * @see http://en.wikipedia.org/wiki/HTTP_response_splitting
     * @group ZF2015-04
     */
    public function testPreventsCRLFAttackViaFromString()
    {
        $this->setExpectedException('Laminas\Http\Header\Exception\InvalidArgumentException');
        $header = Host::fromString("Host: xxx\r\n\r\nevilContent");
    }

    /**
     * @see http://en.wikipedia.org/wiki/HTTP_response_splitting
     * @group ZF2015-04
     */
    public function testPreventsCRLFAttackViaConstructor()
    {
        $this->setExpectedException('Laminas\Http\Header\Exception\InvalidArgumentException');
        $header = new Host("xxx\r\n\r\nevilContent");
    }
}
