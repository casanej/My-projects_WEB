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

	public function createTablePrefab($typeTable){
        /* TABLE TYPES NAMES
            00 - Logs
            01 - Logins
        */

        $return = "";
        $table = "";

        switch($typeTable){
            case 0:
                $table = "CREATE TABLE `tblogs` (
                            `index` INT(11) NOT NULL,
                            `error` VARCHAR(64) NOT NULL,
                            `page` VARCHAR(64) NOT NULL,
                            `description` VARCHAR(256) NOT NULL,
                            `status` VARCHAR(32) NOT NULL,
                            `foundby` VARCHAR(64) NOT NULL,
                            `datecreate` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
                            `datechange` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                            `addressip` VARCHAR(16) NOT NULL
                        )
                        ENGINE=InnoDB
                        ;";
                break;
            case 1:
                $table = "CREATE TABLE `tblogins` (
                        `number` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
                        `uuid` VARCHAR(32) NOT NULL,
                        `name` VARCHAR(128) NOT NULL,
                        `email` VARCHAR(64) NOT NULL,
                        `password` VARCHAR(64) NOT NULL,
                        `datecreate` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
                        `datechange` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
                        `addressip` VARCHAR(16) NOT NULL,
                        PRIMARY KEY (`uuid`),
                        UNIQUE INDEX `uuid` (`uuid`),
                        UNIQUE INDEX `email` (`email`),
                        INDEX `number` (`number`)
                    )
                    COMMENT='Table contains users logins'
                    COLLATE='latin1_swedish_ci'
                    ENGINE=InnoDB;";
                break;
            default:
                $return = "Error: Table prefab non exist.";
                break;
        }

        try {
            if($table != ""){
                $stmt = $this->conn->prepare($table);
                $stmt->execute();

                $stmt = null;
                $conn = null;

                $return = true;
            } else{
                $return .= " Table query not executed.";
            }
        }
        catch(PDOException $e) {
            $return = $e->getCode();
        }

        return $return;
    }

    public function query($rawQuery, $params=array()){
    	$stmt = $this->conn->prepare($rawQuery);

    	$this->setParams($stmt, $params);

    	$stmt->execute();

    	return $stmt;
    }

    /* OPERATIONS IN DATABSE ------------------------------------------------------------------------------- */
    public function select(string $rawQuery, array $params=array()):array {
    	$stmt = $this->query($rawQuery, $params);

    	return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

<<<<<<< HEAD
	public function insert(string $rawQuery, array $params=array()){
		$stmt = $this->query($rawQuery, $params);

		return $stmt;
	}

=======
	public function insert(){
		$sql = new system_sql();

	}
>>>>>>> f73fa81b423ab3338d3790c89b998d2efbfec3a2

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
