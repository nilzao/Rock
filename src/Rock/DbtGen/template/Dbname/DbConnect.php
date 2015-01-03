<?php

class Rock_Dbt_DBGROUP_DbConnect
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
            $dbuser = 'DBUSER';
            $dbpassword = 'DBPASSWD';
            $dsn = 'DSN';
            $conn = new Rock_DbAl_Conn($dsn, $dbuser, $dbpassword);
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
