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

                    for ($i = 0; $i < $result->num_rows; $i++) {
                        $res[] = $result->fetch_assoc();
                    }

                    return $res;
                }

                return false;

                break;

            case 'c':
                if ($return_id) return $this->bd->insert_id;

                return true;

                break;

            default:

                return true;

                break;
        }

    }

    /**
     * @param $table - Таблица базы данных
     * @param $set - массив логики выборки
     * @return void
     * 'fields' => ['id', 'name'],
     * 'where'=> ['fio'=> 'smirnova', 'name'=> 'masha'],
     * 'operand' => ['=', '<>'],
     * 'condition' => ['AND'],
     * 'order' => ['fio', 'name'],
     * 'order_direction' => ['ASC', 'DESC'],
     * 'limit'
     */

    final public function get($table, $set = [])
    {

        $fields = $this->createFields($table, $set);
        $where = $this->createWhere($table, $set);

        $join_arr = $this->createJoin($table, $set);

        $fields .= $join_arr['fields'];
        $join = $join_arr['join'];
        $where .= $join_arr['where'];

        $fields = rtrim($fields, ',');

        $order = $this->createOrder($table, $set);

        $limit = $set['limit'] ? $set['limit'] : '';

        $query = "SELECT $fields FROM $table $join $where $order $limit";

        return $this->query($query);
    }
}