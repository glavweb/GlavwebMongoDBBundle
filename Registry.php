<?php

/*
* This file is part of the "GlavwebMongoDBBundle" package.
*
* (c) Andrey Nilov <nilov@glavweb.ru>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

namespace Glavweb\MongoDBBundle;

/**
 * Class Registry
 *
 * @package Glavweb\MongoDBBundle
 * @author Andrey Nilov <nilov@glavweb.ru>
 */
class Registry
{
    /**
     * @var string
     */
    private $dbname;

    /**
     * @var \MongoDB\Client
     */
    private $client;

    /**
     * Registry constructor.
     *
     * @param string $host
     * @param string $dbname
     * @param string $username
     * @param string $password
     */
    public function __construct(string $host, string $dbname, string $username, string $password)
    {
        $this->dbname = $dbname;

        $uri = sprintf('mongodb://%s/', $host);
        $this->client = new \MongoDB\Client($uri, [
            'username' => $username,
            'password' => $password,
        ]);
    }

    /**
     * @return \MongoDB\Client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @return \MongoDB\Database
     */
    public function getDatabase()
    {
        return $this->getClient()->selectDatabase($this->dbname);
    }
}