<?php

namespace App;

use App\Exceptions\DbExceptions;

class Db
{
    protected $dbh;

    public function __construct()
    {

        $instance = Config::getInstance();
        $config = $instance->data;

        $dsn = $config['db'] . ':host=' . $config['host'] . ';dbname=' . $config['dbname'];
        try {
            $this->dbh = new \PDO($dsn, $config['user'], $config['password']);

        } catch (\PDOException $ex) {
            throw new DbExceptions('Нет соединения с БД');
        }

    }

    public function query(string $sql, array $params = [], $class = \stdClass::class)
    {
        try {
            $sth = $this->dbh->prepare($sql);

        } catch (\PDOException $ex) {
            throw new DbExceptions('Ошибка в запросе');
        }

        $sth->execute($params);
        return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
    }

    public function  execute(string $query, array $params=[])
    {
        try {
            $sth = $this->dbh->prepare($query);

        } catch (\PDOException $ex) {
            throw new DbExceptions('Ошибка в запросе');
        }

        return $sth->execute($params);

    }

    public function lastId()
    {
        return $this->dbh->lastInsertId();
    }

}