<?php

namespace App;

class Conn
{
    public static function getDb()
    {
        return new \PDO("mysql:host=mysql05-farm67.uni5.net;dbname=tasks2","tasks2","c108u73l05");
    }
}
