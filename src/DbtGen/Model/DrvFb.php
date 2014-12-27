<?php

class DbtGen_Model_DrvFb extends DbtGen_Model_Structure
{

    private static $conn = null;

    /**
     * Retorna tabelas
     *
     * @return DbtGen_Model_Table[]
     */
    public function getTables()
    {
        $tables = array();
        $rs = $this->tablesRs();
        while ($arrTbl = $rs->fetch(PDO::FETCH_NUM)) {
            $tableName = trim($arrTbl[0]);
            $pkFields = $this->getPkFields($tableName);
            $tblTmp = new DbtGen_Model_Table($this->dbproj, $tableName, $pkFields);
            $this->setTableFields($tblTmp);
            $tables[] = $tblTmp;
        }
        return $tables;
    }

    public function __construct()
    {
        echo '<pre>';
        $this->driver = 'firebird';
    }

    private function connect()
    {
        // firebird:dbname=localhost:/var/lib/firebird/2.5/data/employee.fdb
        if (self::$conn === null) {
            $connectionString = 'firebird:dbname=' . $this->host . ':';
            $connectionString .= $this->db;
            self::$conn = new PDO($connectionString, $this->user, $this->passwd);
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
    }

    /**
     *
     * @param string $table            
     * @return string[]
     */
    private function getPkFields($table)
    {
        $this->connect();
        $query = 'select s.rdb$field_name as FIELD
        from
            rdb$indices i
        left join rdb$index_segments s on i.rdb$index_name = s.rdb$index_name
        left join rdb$relation_constraints rc on rc.rdb$index_name = i.rdb$index_name
        where
            rc.rdb$constraint_type = \'PRIMARY KEY\' 
            and rc.rdb$relation_name=\'' . $table . '\'';
        $rs = self::$conn->query($query);
        $pkFields = array();
        while ($obj = $rs->fetch(PDO::FETCH_OBJ)) {
            $pkFields[] = trim($obj->FIELD);
        }
        return $pkFields;
    }

    /**
     *
     * @return resource
     */
    private function tablesRs()
    {
        $this->connect();
        $query = 'SELECT RDB$RELATION_NAME
            FROM RDB$RELATIONS
            WHERE RDB$SYSTEM_FLAG = 0
            AND RDB$VIEW_BLR IS NULL
            ORDER BY RDB$RELATION_NAME';
        return self::$conn->query($query);
    }

    /**
     *
     * @param DbtGen_Model_Table $table            
     */
    private function setTableFields(DbtGen_Model_Table $table)
    {
        $this->connect();
        $query = 'select rdb$field_name as FIELD FROM rdb$relation_fields
            where rdb$relation_name=\'' . $table->getTableName() . '\'';
        $rs = self::$conn->query($query);
        while ($obj = $rs->fetch(PDO::FETCH_OBJ)) {
            $fieldTmp = new DbtGen_Model_Field(trim($obj->FIELD));
            $table->addField($fieldTmp);
        }
    }

    public function getDsn()
    {
        $this->dsn = 'jdbc:firebird:dbname=' . $this->host . ':';
        $this->dsn .= $this->db;
        return $this->dsn;
    }
}
