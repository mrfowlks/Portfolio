<?php
class profileTest extends  \PHPUnit\Framework\TestCase 
{
    public function testGetFullName()
    {
        $user = new \App\profile;

        $user ->setFullName('Ben Lee');

        $this ->assertEquals($user -> getFullName(), 'Ben Lee');
    }

    public function testGetAddress()
    {
        $user = new \App\profile;

        $user ->setAddress('123 abc st');

        $this ->assertEquals($user -> getAddress(), '123 abc st');
    }
    
    public function testGetAddress2()
    {
        $user = new \App\profile;

        $user ->setAddress2('1233 abc st');

        $this ->assertEquals($user -> getAddress2(), '1233 abc st');
    }

    public function testGetCity()
    {
        $user = new \App\profile;

        $user ->setCity('Sugar Land');

        $this ->assertEquals($user -> getCity(), 'Sugar Land');
    }
    
    public function testGetState()
    {
        $user = new \App\profile;

        $user ->setState('Texas');

        $this ->assertEquals($user -> getState(), 'Texas');
    }
    
    public function testGetZipcode()
    {
        $user = new \App\profile;

        $user ->setZipcode('77479');

        $this ->assertEquals($user -> getZipcode(), '77479');
    }
}