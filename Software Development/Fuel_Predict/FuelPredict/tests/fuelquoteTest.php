<?php
class fuelQuoteTest extends  \PHPUnit\Framework\TestCase 
{
    public function testGetGallons()
    {
        $user = new \App\fuelquote;

        $user ->setGallons('1000');

        $this ->assertEquals($user -> getGallons(), '1000');
    }

    public function testGetAddress()
    {
        $user = new \App\fuelquote;

        $user ->setAddress('123 abc st');

        $this ->assertEquals($user -> getAddress(), '123 abc st');
    }

    public function testGetDate()
    {
        $user = new \App\fuelquote;

        $user ->setDate('7/8/2022');

        $this ->assertEquals($user -> getDate(), '7/8/2022');
    }
}