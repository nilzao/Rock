<?php

class Rock_Access_Dbt_DbConnect
{

    /**
     *
     * @var Rock_DbAl_Iface_IConn
     */
    private static $conn;

    protected static $quoteFields = false;

    protected static $quoteTableNames = false;

    private static function setDataBase()
    {
        if (empty(self::$conn)) {
            $dbname = dirname(__FILE__) . '/access.sqlite3';
            $dsn = 'jdbc:sqlite:' . $dbname;
            $conn = new Rock_DbAl_Conn($dsn);
            self::$conn = $conn->getConnection();
        }
    }

    /**
     *
     * @return Rock_DbAl_Iface_IConn
     */
    public static function getDataBase()
    {
        self::setDataBase();
        return self::$conn;
    }

    public static function disconnect()
    {
        if (! empty(self::$conn)) {
            self::$conn->Disconnect();
        }
    }

    public static function isQuotedFields()
    {
        return self::$quoteFields;
    }

    public static function isQuoteTableNames()
    {
        return self::$quoteTableNames;
    }
}
