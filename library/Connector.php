<?php
include_once("interfaces/ConnectorInterface.php");
class ConnectDB implements ConnectorInterface
{
    private $user;
    private $password;
    private $port;
    private $server;
    private $db_name;
    private $bd;

    public function save($value){
        $this->bd->query('INSERT INTO `attempts` (`variable`) VALUES (' . $value . ')');
    }

    public function getCount()
    {
        $count = $this->bd->query("SELECT COUNT(`variable`) FROM `attempts`");
        //$count->fetch_all();
        return ($count->fetch_row())[0];
    }

    public function lastValue()
    {
        $query = $this->bd->query('SELECT `variable` FROM `attempts` ORDER BY id DESC LIMIT 1');
        return ($query->fetch_array())['variable'];
    }

    public function __construct($user, $password, $db_name, $server_name = "localhost", $port = 3306){
        $this->db_name = $user;
        $this->password = $password;
        $this->server = $server_name;
        $this->db_name = $db_name;
        $this->port = $port;
        $this->bd = mysqli_connect($server_name, $user, $password, $db_name, $port);
        return $this->bd;
    }

    public function __destruct()
    {
        $this->bd->close();
    }
}