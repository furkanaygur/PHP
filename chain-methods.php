<?php

class Database
{
    private $sql;
    public function from($tableName)
    {
        $this->sql = 'SELECT * FROM ' . $tableName;
        return $this;
    }
    public function select($coloum)
    {
        $this->sql = str_replace('*', $coloum, $this->sql);
        return $this;
    }
    public function get()
    {
        return $this->sql;
    }
}

$db = new Database;
$query = $db->from('table_name')->select('coloum_name1, coloum_name2')->get();
echo $query;
