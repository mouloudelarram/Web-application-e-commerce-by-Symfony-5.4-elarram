<?php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
class testController{

    public function test ():Response {
        return new Response("hello !! ");
    }
}