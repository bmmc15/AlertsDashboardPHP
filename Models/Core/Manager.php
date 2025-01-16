<?php

Class Manager{
	protected $_db;
    protected $_database;
    protected $_class;
    protected $_table;
    
    public function __construct($db)
    {
        $this->setDb($db);
        $this->_database = "alertdashboard";
    }
    
    public function setDb($db)
    {
        $this->_db = $db;
    }
    
    public function is_localhost()
    {
        $whitelist = array( '127.0.0.1', '::1' );
        return in_array( $_SERVER['REMOTE_ADDR'], $whitelist);
    }

    public function getList($order = "desc")
    {
        $query = $this->_db->query('SELECT * FROM ' . $this->_table . ' ORDER BY id '.$order);
        $i=0;
        $items = array();
        while($data = $query->fetch(PDO::FETCH_ASSOC))
        {
            $items[$i] = new $this->_class($data);
            $i = $i +1;
        }
        
        $query->closeCursor();
        return $items;
    }

    public function getListWhere($where, $order = "desc", $orderField = "id")
    {

        $sql = 'SELECT * FROM ' . $this->_table;
        if($where != '')
            $sql .= ' WHERE ' . $where;
        $sql .= ' ORDER BY ' . $orderField . ' ' . $order;
        // echo $sql;
        // die;
        $query = $this->_db->query($sql);

        $i=0;
        $items = array();
        while($data = $query->fetch(PDO::FETCH_ASSOC))
        {
            $items[$i] = new $this->_class($data);
            $i = $i +1;
        }
        
        $query->closeCursor();
        return $items;
    }

    public function count($group_by)
    {

        $sql = 'SELECT '.$group_by.', COUNT(DISTINCT(visitor_ip)) AS value FROM ' . $this->_table;
        if($group_by != '')
            $sql .= ' GROUP BY ' . $group_by;
        // echo $sql;
        // die;
        $query = $this->_db->query($sql);
        $i=0;
        $items = array();
        while($data = $query->fetch(PDO::FETCH_ASSOC))
        {
            $items[$data[$group_by]] = $data['value'];
            $i = $i +1;
        }
        
        $query->closeCursor();
        return $items;
    }

    public function getFieldWhere($field,$where)
    {

        $sql = 'SELECT '.$field.' FROM ' . $this->_table;
        if($where != '')
            $sql .= ' WHERE ' . $where;
        // $sql .= ' ORDER BY id desc';
        $query = $this->_db->query($sql);

        $i=0;
        $items = array();
        while($data = $query->fetch(PDO::FETCH_ASSOC))
        {
            $items[$i] = $data[$field];
            $i = $i +1;
        }
        
        $query->closeCursor();
        return $items;
    }

    public function getLast()
    {
        $query = $this->_db->query('SELECT * FROM ' . $this->_table . ' ORDER BY id desc LIMIT 1');
        $i=0;
        $items = array();
        while($data = $query->fetch(PDO::FETCH_ASSOC))
        {
            $items[$i] = new $this->_class($data);
            $i = $i +1;
        }
        
        $query->closeCursor();
        return $items[0];
    }

    public function getFirst()
    {
        $query = $this->_db->query('SELECT * FROM ' . $this->_table . ' ORDER BY id asc LIMIT 1');
        $i=0;
        $items = array();
        while($data = $query->fetch(PDO::FETCH_ASSOC))
        {
            $items[$i] = new $this->_class($data);
            $i = $i +1;
        }
        
        $query->closeCursor();
        return $items[0];
    }

    public function getById($id)
    {
        $query = $this->_db->prepare('SELECT * FROM ' . $this->_table . ' WHERE id = ? LIMIT 1');
        $query->execute(array($id));
        $data = $query->fetch(PDO::FETCH_ASSOC);        
        $query->closeCursor();
        return new $this->_class($data);
    }

    public function add($object)
    {
        $sql = 'INSERT INTO ' . $this->_table .' VALUES (';
        $fields = $object->getFields();
        $keys = array_keys($fields);
        $nb_fields = sizeof($fields);
        for($i=0;$i<$nb_fields;$i++)
        {
            if($i==0)
                $sql .= 'null';
            if($i !=0)
                $sql .= ',';

            if($i!=0)
            {
                $sql .= $this->_db->quote($fields[$keys[$i]]);
            }          
        }
        $sql .=')';
        // var_dump($sql);
        // die;
        $query = $this->_db->query($sql);
        if($query)
        {
            return $this->_db->lastInsertId();
        }
        else
            return false;
    }

    public function delete($object_id)
    {
        $query = $this->_db->prepare('DELETE FROM ' . $this->_table .' WHERE id = ?');
        $query->execute(array($object_id));
        if($query)
        {
            return true;
        }
        else
            return false;
    }

    public function deleteFieldWhere($whereField,$whereFieldValue)
    {
        $sql = 'DELETE FROM ' . $this->_table .' WHERE ' . $whereField . ' = ' .  $this->_db->quote($whereFieldValue);
        $query = $this->_db->query($sql);
        return $query;
    }

    public function deleteWhere($where)
    {
        $sql = 'DELETE FROM ' . $this->_table .' WHERE ' . $where;
        $query = $this->_db->query($sql);
        return $query;
    }

    public function updateFieldWhere($field,$fieldvalue,$whereField,$whereFieldValue)
    {
        $sql = 'UPDATE ' . $this->_table .' SET ' . $field.' = ' . $this->_db->quote($fieldvalue) . ' WHERE ' . $whereField . ' = ' .  $this->_db->quote($whereFieldValue);
        $query = $this->_db->query($sql);
        return $query;
    }

    public function update($object)
    {
        $fields = $object->getFields();
        $sql = 'UPDATE ' . $this->_table .' SET ';
        $where = '';
        $i = 0;
        $len = count($fields);
        foreach ($fields as $fieldkey => $fieldvalue) {
            if($fieldkey == 'id')
            {
                $where = " WHERE id = ". $fieldvalue;
            }
            else
            {
                $sql .= $fieldkey . " = " . $this->_db->quote($fieldvalue);
            }
            if($i != 0  && $i != $len-1)
            {
                $sql .=", ";
            }
            $i++;
        }
        $sql .= $where;
        // var_dump($sql);
        // die;   
        $query = $this->_db->query($sql);
        if($query)
        {
            return true;
        }
        else
            return false;
        
    }
}