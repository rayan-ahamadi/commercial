<?php
    require_once __DIR__ . '/../vendor/autoload.php';
    use Dotenv\Dotenv as Dotenv;

    class oppRepository{
       

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

        function modifOpportunités ($id,$nom,$prenom,$tel,$email,$idEtape){
            try{
                $conn = new mysqli($this->servername, $this->username,$this->password,$this->dbname);
                $sql = "UPDATE opportunités 
                        SET nom = '{$nom}',
                            prenom = '{$prenom}',
                            tel = '{$tel}',
                            email = '{$email}',
                            idEtape= {$idEtape}
                        WHERE id = '{$id}'
                        ";
                $response = $conn->query($sql);
                $conn->close();
                return $response;
                
            }catch (mysqli_sql_exception $e){
                return "".$e->getMessage()."";
            }
           
        }

        function getOpportunités(){
            try{
                $conn = new mysqli($this->servername, $this->username,$this->password,$this->dbname);
                $sql = "SELECT * FROM opportunités";
                $response = $conn->query($sql);
                $conn->close();
                return $response;
            }catch (mysqli_sql_exception $e){
                return "".$e->getMessage()."";
            }
        }

        function getOppById($id){
            try{
                $conn = new mysqli($this->servername, $this->username,$this->password,$this->dbname);
                $sql = "SELECT * FROM opportunités WHERE id = {$id}";
                $response = $conn->query($sql);
                $conn->close();
                return $response;
            }catch (mysqli_sql_exception $e){
                return "".$e->getMessage()."";
            }
        }

        function deleteOpp($id){
            try{
                $conn = new mysqli($this->servername, $this->username,$this->password,$this->dbname);
                $sql = "DELETE FROM opportunités WHERE id = '{$id}'";
                $response = $conn->query($sql);
                $conn->close();
                return $response;
            }catch (mysqli_sql_exception $e){
                return "".$e->getMessage()."";
            }
        }

        function deleteAllEventById($id){
            try{
              $conn = new mysqli($this->servername, $this->username,$this->password,$this->dbname);
              $sql = "DELETE FROM evenements WHERE idOpp = {$id}";
              $response = $conn->query($sql);
              $conn->close();
              return $response;
            }catch (mysqli_sql_exception $e){
                return "".$e->getMessage()."";
            }
          }
    
    }
?>