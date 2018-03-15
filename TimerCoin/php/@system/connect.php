<?php
class connect{
	private $HOST = "localhost";
    private $USER = "root";
    private $PASS = "vertrigo";
	private $DB = "timercoin";

	protected function mysqli_connect(){
		$connect = mysqli_connect($this->HOST, $this->USER, $this->PASS, $this->DB);

		if(mysqli_connect_errno()){
			echo 'Há um erro na conexão. '.mysqli_connect_error();
			die();
		}
		return $connect;
	}

	protected function mysqli_close($conn){
		mysqli_close($conn);
	}
	
	public function getDateHour(){
		return date('Y-m-d H:i:s');
	}
	
	public function getIP(){
		return $ip;
	}
	
	public function getUserId(){
		if(!isset($_SESSION)) session_start();
		return $_SESSION['User']['userid'];
	}
}
?>