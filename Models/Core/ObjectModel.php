<?php

class ObjectModel{
	protected $_fields;

	public function __construct($fields)
    {
        if(!$fields)
        {
            foreach ($this->_fields as $key => $value) {
                $this->_fields[$key] = NULL;
            }
        }
        else
        {
            foreach ($fields as $key => $value) {
                $this->_fields[$key] = $value;
            }
        }
    }

    public function getFields()
    {
        return $this->_fields;
    }

    public function setFields($fields)
	{
	    $this->_fields = $fields;
	} 

    public function setId($id)
    {
        $this->_fields['id'] = $id;
    }

    public function getId()
    {
        return $this->_fields['id'];
    }

    public function toString()
    {
        return $this->getFields();
    }
}