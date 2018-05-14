<?php
Class system_sql{
	private $conn;

	public function __construct(){
        $typeConnect = 1;
        switch($typeConnect){
            case 0:
                $dbURL = "mysql.hostinger.com.br";
                $dbUsername = "u778739886_rcbc";
                $dbPassword = "R@f@el2010rcbc";
                $dbDatabse = "u778739886_users";
                break;
            case 1:
                $dbURL = "localhost";
                $dbUsername = "root";
                $dbPassword = "";
                $dbDatabse = "todolist";
                break;
        }

        try {
            $this->conn = new PDO("mysql:dbname=$dbDatabse; host=$dbURL", "$dbUsername", "$dbPassword" );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }

    public function query($rawQuery, $params=array()){
    	$stmt= $this->conn->prepare($rawQuery);

    	$this->setParams($stmt, $params);

    	$stmt->execute();

    	return $stmt;
    }

    /* OPERATIONS IN DATABSE ------------------------------------------------------------------------------- */
    public function select(string $rawQuery, array $params=array()):array {
    	$stmt = $this->query($rawQuery, $params);

    	return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    /* DATA PROCESSING ------------------------------------------------------------------------------------- */
    private function setParams($statement, $parameters=array()){
		foreach ($parameters as $key => $value) {
    		$this->setParam($statement, $key, $value);
    	}
    }

    private function setParam($statement, $key, $value){
    	$statement->bindParam($key, $value);
    }
}
?>
