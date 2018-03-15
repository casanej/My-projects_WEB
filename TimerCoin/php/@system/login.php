<?php
if(!isset($_SESSION)) session_start();

require_once("../timercoin.php");

class login extends connect{
	private $connection;
	
	function __construct(){
		$this->connect = $this->mysqli_connect();	
	}
	
	public function force_close(){
		$this->mysqli_close($this->connect);
	}
	
	private function doLogin ($email, $password){
		$password = md5($password);
		
		$dados = "SELECT userId, name, permission, timezone, status FROM users WHERE email='$email' AND password='$password'";
		
		if($query = mysqli_query($this->connect, $dados)){
			if($rows = mysqli_num_rows($query)){
				if($info = mysqli_fetch_assoc($query)){
					if($info['status'] == 0){
						$_SESSION['Error']['login'] = "Please verify your email box to activate you account.";
						return false;
					} else if($info['status'] == 10){
						$_SESSION['Login']['error'] = "Your account is banned. Contact an administrator for further informations.";
						return false;
					} else{
						$_SESSION['User']['logged'] = true;
						$_SESSION['User']['userid'] = $info['userId'];
						$_SESSION['User']['name'] = $info['name'];
						$_SESSION['User']['permission'] = $info['permission'];
						$_SESSION['User']['timezone'] = $info['timezone'];
						$_SESSION['User']['status'] = $info['status'];

						return true;
					}	
				}	
			} else{
				$_SESSION['Error']['login'] = "Email or password wrong.";
				return false;
			}
		} else{
			$_SESSION['Error']['login'] = "Can't connect with database. Please contact an administrator with error: Login#".mysqli_error($this->connect);
			return false;
		}
	}
	
	public function calldoLogin($email, $password){
		$result = $this->doLogin($email, $password);
		return $result;
	}
	
	private function doLogoff(){
		$_SESSION['User']['logged'] = false;
		session_destroy();
		return true;
	}
	
	public function calldoLogoff(){
		$result = $this->doLogoff();
		return $result;
	}
}
?>