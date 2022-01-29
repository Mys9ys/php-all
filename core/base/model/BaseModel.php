<?php

namespace core\base\model;

use core\base\controller\SingleTon;
use core\base\exceptions\DbException;

class BaseModel
{
    use SingleTon;

    protected $bd;

    private function __construct()
    {
        $this->bd = @new \mysqli(HOST, USER, PASS, DB_NAME);

        if ($this->bd->connect_error) {
            throw new DbException('Ошибка подключения к базе данных: '
                . $this->bd->connect_errno . ' ' . $this->bd->connect_error);
        }

        $this->bd->query('SET NAMES UTF8');
    }

    final public function query($query, $crud = 'r', $return_id = false)
    {

        $result = $this->bd->query($query);

        if ($this->bd->affected_rows === -1) {
            throw new DbException('Ошибка в SQL запросе: '
                . $query . $this->bd->errno . ' ' . $this->bd->error
            );
        }

        switch ($crud) {
            case 'r':
                if ($result->num_rows) {
                    $res = [];

                    for ($i = 0; $i < $result->num_rows; $i++){
                        $res[] = $result->fetch_assoc();
                    }

                    return $res;
                }

                return false;

                break;

            case 'c':
                if($return_id) return $this->bd->insert_id;

                return true;

                break;

            default:

                return true;

                break;
        }

    }
}