<?php

Class AlertsManager extends Manager
{
    protected $_table;
    protected $_class;
    
    public function __construct($db)
    {
        parent::__construct($db);
        $this->_table = $this->_database.".alerts";            
        $this->_class = 'Alerts';
    }

    public function add($object)
    {
        $sql = 'INSERT INTO ' . $this->_table .' (payload) VALUES (';
        $fields = $object->getFields();
        $keys = array_keys($fields);
        $sql .= $this->_db->quote($fields[$keys[1]]);

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



}
global $alertsManager;
$alertsManager = new AlertsManager($GLOBALS["db"]);
global $alerts;
$alerts = $alertsManager->getList();
