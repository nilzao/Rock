<?php

class Rock_DbtGen_Ctr_Gera implements Rock_Core_IController
{

    private $dirOut = '';

    private $keepCase = false;

    private $dirTemplate = '';

    public function __construct()
    {
        $this->dirOut = 'DbtGen/out';
        $this->dirTemplate = 'DbtGen/template';
    }

    public function handle()
    {
        $input = Rock_Core_Input::getInstance();
        $db = Rock_DbtGen_Model_Driver::getDb($input->getRequest('driver'));
        $db->setHost($input->getRequest('host'));
        $db->setDb($input->getRequest('db'));
        $db->setUser($input->getRequest('user'));
        $db->setPasswd($input->getRequest('pass'));
        $db->setDbproj($input->getRequest('dbproj'));
        $keepCase = $input->getRequest('keppCase');
        if (empty($keepCase) || $keepCase === 'false' || $keepCase === '0' || $keepCase === 0) {
            $keepCase = false;
        } else {
            $keepCase = true;
        }
        $this->keepCase = $keepCase;
        $this->prepareDir($db);
        $this->writeDbConn($db);
        $tables = $db->getTables();
        foreach ($tables as $t) {
            $this->writeDao($t);
            $this->writeEntity($t);
        }
        new Rock_Fst_Zip($this->dirOut, $this->dirOut . '/dbt.zip');
        $vl = Rock_Core_ViewLoader::getInstance();
        $vl->load('Gera');
    }

    private function createDir($path)
    {
        if (! is_dir($path)) {
            mkdir($path, 0777, true);
        }
    }

    private function prepareDir(Rock_DbtGen_Model_Structure $db)
    {
        Rock_Fst_Deltree::cleanDir($this->dirOut . '/');
        $dbProj = ucfirst($this->snakeToCamel($db->getDbproj()));
        $path = $this->dirOut . '/' . $dbProj;
        $this->createDir($path . '/Dao/Gen');
        $this->createDir($path . '/Ent/Gen');
    }

    private function writeDbConn(Rock_DbtGen_Model_Structure $db)
    {
        $dbProj = ucfirst($this->snakeToCamel($db->getDbproj()));
        $strFile = file_get_contents($this->dirTemplate . '/' . 'Dbname/DbConnect.php');
        $strFile = str_replace('DBGROUP', $dbProj, $strFile);
        $strFile = str_replace('DBUSER', $db->getUser(), $strFile);
        $strFile = str_replace('DBPASSWD', $db->getPasswd(), $strFile);
        $strFile = str_replace('DSN', $db->getDsn(), $strFile);
        $fileName = $this->dirOut . '/' . $dbProj . '/DbConnect.php';
        file_put_contents($fileName, $strFile);
    }

    private function writeDao(Rock_DbtGen_Model_Table $table)
    {
        $dbProj = ucfirst($this->snakeToCamel($table->getDbName()));
        $strFile = file_get_contents($this->dirTemplate . '/' . '/Dbname/Dao/Gen/template.php');
        $strFile = str_replace('DBGROUP', $dbProj, $strFile);
        $tableNameClass = $this->snakeToCamel($table->getTableName(), $this->keepCase);
        $strFile = str_replace('TABLENAMECLASS', $tableNameClass, $strFile);
        $fileName = $this->dirOut . '/' . $dbProj . '/Dao/Gen/' . $tableNameClass . '.php';
        file_put_contents($fileName, $strFile);
        $strFile = file_get_contents($this->dirTemplate . '/' . '/Dbname/Dao/template.php');
        $strFile = str_replace('DBGROUP', $dbProj, $strFile);
        $strFile = str_replace('TABLENAMECLASS', $tableNameClass, $strFile);
        $fileName = $this->dirOut . '/' . $dbProj . '/Dao/' . $tableNameClass . '.php';
        file_put_contents($fileName, $strFile);
    }

    private function snakeToCamel($snakeName, $keepCase = false)
    {
        $camelName = $snakeName;
        if (! $keepCase) {
            $camelName = strtolower($camelName);
        }
        $camelArray = explode('_', $camelName);
        $camelName = '';
        foreach ($camelArray as $m) {
            $camelName .= ucfirst($m);
        }
        $camelArray = explode('.', $camelName);
        $camelName = '';
        foreach ($camelArray as $m) {
            $camelName .= ucfirst($m);
        }
        $camelName = preg_replace('/[^A-z0-9]/', '', $camelName);
        return $camelName;
    }

    private function getStrProperties(Rock_DbtGen_Model_Table $table)
    {
        $fields = $table->getFields();
        $fieldsStr = '';
        foreach ($fields as $f) {
            $fieldsStr .= "    protected $" . $f->getName() . ";\n";
        }
        return $fieldsStr;
    }

    private function getStrPks(Rock_DbtGen_Model_Table $table)
    {
        $strPk = '';
        if (count($table->getPkFields()) > 0) {
            $strPk = "\n            '";
            $strPk .= implode("',\n            '", $table->getPkFields());
            $strPk .= "'\n        ";
        }
        return $strPk;
    }

    private function getStrMethods(Rock_DbtGen_Model_Table $table)
    {
        $fields = $table->getFields();
        $methodsStr = '';
        foreach ($fields as $f) {
            $methodName = $this->snakeToCamel($f->getName());
            $methodsStr .= "    public function get" . $methodName . "()\n";
            $methodsStr .= "    {\n        return \$this->" . $f->getName() . ";\n";
            $methodsStr .= "    }\n\n";
            $methodsStr .= "    public function set" . $methodName . "(\$" . $f->getName() . ", \$orderBy = false)\n";
            $methodsStr .= "    {\n";
            $methodsStr .= "        if (\$orderBy !== false) {\n";
            $methodsStr .= "            \$this->_addOrderBy('" . $f->getName() . "', \$orderBy);\n";
            $methodsStr .= "        }\n";
            $methodsStr .= "        \$this->" . $f->getName() . " = \$" . $f->getName() . ";\n";
            $methodsStr .= "        return \$this;\n";
            $methodsStr .= "    }\n\n";
        }
        return $methodsStr;
    }

    private function writeEntity(Rock_DbtGen_Model_Table $table)
    {
        $dbProj = ucfirst($this->snakeToCamel($table->getDbName()));
        $strFile = file_get_contents($this->dirTemplate . '/Dbname/Ent/Gen/template.php');
        $strFile = str_replace('DBGROUP', $dbProj, $strFile);
        $tableNameClass = $this->snakeToCamel($table->getTableName(), $this->keepCase);
        $strFile = str_replace('TABLENAMECLASS', $tableNameClass, $strFile);
        $strFile = str_replace('TABLENAME', $table->getTableName(), $strFile);
        $strFile = str_replace('// PROPERTIES', $this->getStrProperties($table), $strFile);
        $strFile = str_replace('// METHODS', $this->getStrMethods($table), $strFile);
        $strFile = str_replace('TABLEPKS', $this->getStrPks($table), $strFile);
        $fileName = $this->dirOut . '/' . $dbProj . '/Ent/Gen/' . $tableNameClass . '.php';
        file_put_contents($fileName, $strFile);
        $strFile = file_get_contents($this->dirTemplate . '/Dbname/Ent/template.php');
        $strFile = str_replace('DBGROUP', $dbProj, $strFile);
        $strFile = str_replace('TABLENAMECLASS', $tableNameClass, $strFile);
        $fileName = $this->dirOut . '/' . $dbProj . '/Ent/' . $tableNameClass . '.php';
        file_put_contents($fileName, $strFile);
    }
}
