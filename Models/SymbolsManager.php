<?php

Class SymbolsManager extends Manager
{
    protected $_table;
    protected $_class;
    
    public function __construct($db)
    {
        parent::__construct($db);
        $this->_table = $this->_database.".symbols";            
        $this->_class = 'Symbols';
    }
}

global $symbolsManager;
$symbolsManager = new SymbolsManager($GLOBALS["db"]);
global $symbols;
$symbols = $symbolsManager->getList('asc');