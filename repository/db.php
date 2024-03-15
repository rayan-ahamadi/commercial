<?php
    class connect_db{

        public $servername = "localhost";
        public $username = "rayan";
        public $password = "qxd8enkm";
        public $dbname = "commercial_db";
        

        function addOpportunités ($nom,$prenom,$tel,$email,$idEtape){
            try{
                $conn = new mysqli($this->servername, $this->username,$this->password,$this->dbname);
                $sql = "INSERT INTO opportunités (`nom`, `prenom`, `tel`, `email`, `idEtape`) VALUES ('{$nom}','{$prenom}','{$tel}','{$email}','{$idEtape}')";
                $response = $conn->query($sql);
                $conn->close();
                return $response;
                
            }catch (mysqli_sql_exception $e){
                return "".$e->getMessage()."";
            }
           
        }
    
    }
?>