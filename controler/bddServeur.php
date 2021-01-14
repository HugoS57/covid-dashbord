<?php
class bddServeur
{
    private $host = 'devbdd.iutmetz.univ-lorraine.fr';
    private $user = 'wurtz35u_appli';
    private $password = '31904442';
    private $database = 'wurtz35u_projetTut';
    private $port = '3306';
    private $connection;

    /**
     * bddServeur constructor.
     */
    public function __construct()
    {
        $this->connection = mysqli_connect($this->host, $this->user, $this->password, $this->database, $this->port);
    }

    public function query(string $sql): array
    {
        $result = $this->connection->query($sql);

        if($result === false){
            throw new Exception("Bdd Error : ".$this->connection->error);
        }

        return $result->fetch_all();

    }

    public function ajout(string $sql)
    {
        $result = $this->connection->query($sql);

        if($result === false){
            throw new Exception("Bdd Error : ".$this->connection->error);
        }

        return $result;
    }
}