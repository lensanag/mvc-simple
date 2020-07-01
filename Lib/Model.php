<?php
declare(strict_types=1);

namespace Lib;

use Lib\Connection;

class Model
{
    protected $name;

    protected $columns;

    public $connection;

    public function __construct() {
        $this->connection = (new Connection())();
    }

    public function getName() {
        return $this->name;
    }

    public function setName(string $name) {
        $this->name = $name;
    }

    public function getAll(array $columns) {
        try {

            $this->check();

            $sql = $this->contactColumns($columns);            

            $sql = 'SELECT ' . $sql . ' FROM ' . $this->name . ';';

            return $this->connection->query($sql);

        } catch (\Throwable $th) {
            throw $th;
        }        
    }

    public function exec(string $values) {
        try {
            $this->check();

            $sql = $values;

            return $this->connection->query($sql);
            
        } catch (\Throwable $th) {
            throw $th;
        } 
    }

    public function find(array $criteria, array $columns) {
        try {

            $this->check();

            $sql = $this->contactColumns($columns);

            $sql = 'SELECT ' . $sql . ' FROM ' . $this->name . ' WHERE ' . $criteria[0] . '=:' . $criteria[0] . ' LIMIT 1;';

            $stmt = $this->connection->prepare($sql);

            $stmt->execute([$criteria[0] => $criteria[1]]);

            return $stmt->fetch();

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    private function check() {
        try {
            if(!isset($this->name)) {
                throw new \Exception("Debe asignar el nombre", 1);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    private function contactColumns(array $columns) {
        try {

            $sql = '';

            foreach ($columns as $key => $value) {
                $sql .= $value . ',';
            }

            $sql = substr($sql,0,strlen($sql)-1);

            return $sql;

        } catch (\Throwable $th) {
            throw $th;
        }        
    }
}
