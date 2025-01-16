<?php

Class IndicatorsManager extends Manager
{
    protected $_table;
    protected $_class;
    
    public function __construct($db)
    {
        parent::__construct($db);
        $this->_table = $this->_database.".indicators";            
        $this->_class = 'Indicators';
    }
}

global $indicatorsManager;
$indicatorsManager = new IndicatorsManager($GLOBALS["db"]);
global $indicators;
$indicators = $indicatorsManager->getList('asc');