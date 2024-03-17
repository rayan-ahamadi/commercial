<?php
    require_once __DIR__ . '/../vendor/autoload.php';
    use Dotenv\Dotenv as Dotenv;

    class eventRepository{
       

        public $servername;
        public $username;
        public $password;
        public $dbname;
    
        public function __construct() {
            //__DIR__ est la constante magique pour désigner le chemin absolu de ce fichier
            $dotenv = Dotenv::createImmutable(__DIR__."/../");
            $dotenv->load();
            $this->servername = $_ENV["SERVERNAME"]; 
            $this->username = $_ENV["USERNAME"];
            $this->password = $_ENV["PASSWORD"];
            $this->dbname   = $_ENV["DB_NAME"];
        }
        

        function addEvents($idOpp,$idEtape,$actions){
            try{
                $conn = new mysqli($this->servername, $this->username,$this->password,$this->dbname);
                $sql = "INSERT INTO evenements (`idOpp`, `idEtape`, `actions`) VALUES ('{$idOpp}','{$idEtape}','{$actions}')";
                $response = $conn->query($sql);
                $conn->close();
                return $response;
                
            }catch (mysqli_sql_exception $e){
                return "".$e->getMessage()."";
            }
           
        }

        function getIdEtapes($id){
          try{
            $conn = new mysqli($this->servername, $this->username,$this->password,$this->dbname);
            $sql = "SELECT idEtape FROM opportunités WHERE id = {$id}";
            $response = $conn->query($sql);
            $conn->close();
            return $response;
          }catch (mysqli_sql_exception $e){
              return "".$e->getMessage()."";
          }
        }

        function getEvents(){
            try{
                $conn = new mysqli($this->servername, $this->username,$this->password,$this->dbname);
                $sql = "SELECT evenements.id,idOpp,evenements.idEtape,nom,prenom,actions FROM evenements INNER JOIN opportunités ON evenements.idOpp = opportunités.id";
                $response = $conn->query($sql);
                $conn->close();
                return $response;
            }catch (mysqli_sql_exception $e){
                return "".$e->getMessage()."";
            }
        }


    
    }
?>