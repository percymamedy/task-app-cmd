<?php

namespace App;

use PDO;

class DatabaseAdapter
{
    protected $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * Fetch all from a table.  
     *
     * @param string $tableName
     *
     * @return mixed
     */
    public function fetchAll(string $tableName)
    {
        return $this->connection->query("select * from {$tableName}")->fetchAll();
    }

    /**
     * Execute a query.
     *
     * @param string $sql
     * @param array  $parameters
     *
     * @return mixed
     */
    public function query(string $sql, array $parameters = [])
    {
        return $this->connection->prepare($sql)->execute($parameters);
    }
}
