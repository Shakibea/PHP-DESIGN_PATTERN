<?php

abstract class AbstractConnection{
    abstract function conn();
}
class MySQL extends AbstractConnection{
    function conn(){
        echo "MySQL\n";
    }
}
class PostgreSQL extends AbstractConnection{
    function conn(){
        echo "PostgreSQL\n";
    }
}
class SQLServer extends AbstractConnection{
    function conn(){
        echo "SQLServer\n";
    }
}

abstract class AbstractCreateConn{
    abstract function createConnection();
}
class MySQLFactory extends AbstractCreateConn{
    function createConnection(){
        return new MySQL();
    }
}
class PostgreSQLFactory extends AbstractCreateConn{
    function createConnection(){
        return new PostgreSQL();
    }
}
class SQLServerFactory extends AbstractCreateConn{
    function createConnection(){
        return new SQLServer();
    }
}

Class DataBaseFactory{
    function mysql(){
        return new MySQLFactory();
    }
    function postgresql(){
        return new PostgreSQLFactory();
    }
    function sqlserver(){
        return new SQLServerFactory();
    }
}


$bf = new DataBaseFactory();
$myf = $bf->mysql()->createConnection()->conn();
// $mql = $myf->createConnection();
// $mql->conn();
$my2 = $bf->postgresql()->createConnection()->conn();
$my2 = $bf->sqlserver()->createConnection()->conn();

