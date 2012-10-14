<?php

namespace Social\Facebook;

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.0 on 2012-10-13 at 23:20:49.
 */
class ConnectionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var object
     */
    protected $cfg;

    /**
     * @var Connection
     */
    protected $connection;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->cfg = $GLOBALS['cfg']->facebook;
        $this->cfg->expires = strtotime('now + 1 hour');
        $this->connection = new Connection($this->cfg->appid, $this->cfg->secret, $this->cfg->access_token, $this->cfg->expires);
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
        $this->connection = null;
    }

    /**
     * Test object creation.
     */
    public function testConstruct()
    {
        $this->assertAttributeEquals($this->cfg->appid, 'appId', $this->connection);
        $this->assertAttributeEquals($this->cfg->secret, 'appSecret', $this->connection);
        $this->assertAttributeEquals($this->cfg->access_token, 'accessToken', $this->connection);
    }

    /**
     * Test object creation with access information.
     */
    public function testConstruct_Access()
    {
        $twitter = new Connection('foo', 'bar', (object)array('token' => 'dog'));

        $this->assertAttributeEquals('foo', 'appId', $twitter);
        $this->assertAttributeEquals('bar', 'appSecret', $twitter);
        $this->assertAttributeEquals('dog', 'accessToken', $twitter);
    }

    /**
     * @covers Social\Facebook\Connection::asUser
     * @todo   Implement testAsUser().
     */
    public function testAsUser()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Social\Facebook\Connection::getAppId
     */
    public function testGetAppId()
    {
        $this->assertEquals($this->cfg->appid, $this->connection->getAppId());
    }

    /**
     * @covers Social\Facebook\Connection::getAccessToken
     */
    public function testGetAccessToken()
    {
        $this->assertEquals($this->cfg->access_token, $this->connection->getAccessToken());
    }

    /**
     * @covers Social\Facebook\Connection::getAccessExpires
     */
    public function testGetAccessExpires()
    {
        $this->assertEquals($this->cfg->expires, $this->connection->getAccessExpires());
    }

    /**
     * @covers Social\Facebook\Connection::getAccessInfo
     */
    public function testGetAccessInfo()
    {
        $this->assertEquals((object)array('token' => $this->cfg->access_token, 'expires' => $this->cfg->expires), $this->connection->getAccessInfo());
    }
    
    /**
     * @covers Social\Facebook\Connection::isExpired
     */
    public function testIsExpired()
    {
        $this->assertFalse($this->connection->isExpired());
        $this->assertFalse($this->connection->isExpired(300));
        $this->assertTrue($this->connection->isExpired(4000));
    }

    /**
     * @covers Social\Facebook\Connection::isAuth
     */
    public function testIsAuth()
    {
        $this->assertTrue($this->connection->isAuth());
    }

    /**
     * @covers Social\Facebook\Connection::isAuth
     */
    public function testIsAuth_Not()
    {
        $this->connection = new Connection($this->cfg->appid, $this->cfg->secret);
        $this->assertFalse($this->connection->isAuth());
    }

  
    /**
     * @covers Social\Facebook\Connection::getCurrentUrl
     */
    public function testGetCurrentUrl()
    {
        $_SERVER['HTTP_HOST'] = 'example.com';

        $_SERVER['REQUEST_URI'] = '';
        $this->assertEquals("http://example.com/", $this->connection->getCurrentUrl());
        $this->assertEquals("http://example.com/connect.php", $this->connection->getCurrentUrl('connect.php'));
        $this->assertEquals("http://example.com/connect.php?lion=cat", $this->connection->getCurrentUrl('connect.php', array('lion' => 'cat')));

        $_SERVER['REQUEST_URI'] = '?fox=dog&code=foo&state=bar';
        $this->assertEquals("http://example.com/?fox=dog", $this->connection->getCurrentUrl());
        $this->assertEquals("http://example.com/?fox=dog&lion=cat", $this->connection->getCurrentUrl(null, array('lion' => 'cat')));
    }

    /**
     * Test simple get().
     * 
     * @depends testConstruct
     */
    public function testGet()
    {
        $response = $this->connection->get('platform', array(), false);
        
        $this->assertObjectHasAttribute('name', $response);
        $this->assertEquals('Facebook Developers', $response->name);
    }

    /**
     * Test an error using get().
     * 
     * @depends testConstruct
     */
    public function testGet_Error()
    {
        $this->setExpectedException('Social\Exception', "HTTP GET request for 'http://foo.bar' failed");
        $this->connection->get('http://foo.bar');
    }

    /**
     * @covers Social\Facebook\Connection::doRequest
     */
    public function testDoRequest()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Social\Facebook\Connection::multiRequest
     */
    public function testMultiRequest()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Social\Facebook\Connection::me
     * @todo   Implement testMe().
     */
    public function testMe()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Social\Facebook\Connection::entity
     * @todo   Implement testEntity().
     */
    public function testEntity()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Social\Facebook\Connection::collection
     * @todo   Implement testCollection().
     */
    public function testCollection()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Social\Facebook\Connection::convertData
     * @todo   Implement testConvertData().
     */
    public function testConvertData()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Social\Facebook\Connection::__sleep
     * @todo   Implement test__sleep().
     */
    public function test__sleep()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

}
