<?php

namespace App;

class Db
{
    protected $dbh;

    public function __construct()
    {

        $db = Config::getConfig();
        $config = $db->data;

        $dsn = $config['db'] . ':host=' . $config['host'] . ';dbname=' . $config['dbname'];
        $this->dbh = new \PDO($dsn, $config['user'], $config['password']);
    }

    public function query(string $sql, array $params = [], $class = \stdClass::class)
    {

        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);
        return $sth->fetchAll(\PDO::FETCH_CLASS, $class);


    }

    public function  execute(string $query, array $params=[])
    {
        $sth = $this->dbh->prepare($query);
        return $sth->execute($params);
    }

}