<?php
class loginTest extends  \PHPUnit\Framework\TestCase 
{
    public function testGetEmail()
    {
        $user = new \App\login;

        $user ->setEmail('Ben@gmail.com');

        $this ->assertEquals($user -> getEmail(), 'Ben@gmail.com');
    }

    public function testGetPassword()
    {
        $user = new \App\login;

        $user ->setPassword('123abc');

        $this ->assertEquals($user -> getPassword(), '123abc');
    }
}