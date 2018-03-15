<?php
require_once("../timercoin.php");

class register extends connect{
	private $connection;
	
	function __construct(){
		$this->connect = $this->mysqli_connect();	
	}
	
	public function force_close(){
		$this->mysqli_close($this->connect);
	}
	
	public function callVerifyEmail($email){
		$result = $this->VerifyEmail($email);
		return $result;
	}
	
	private function VerifyEmail($email){
		$dados = sprintf("SELECT email FROM users WHERE email='%s'", $email);
		$query = mysqli_query($this->connect, $dados);
		
		if($query){
			$rows = mysqli_num_rows($query);
			if($rows > 0){
				return true;
			} else{
				$_SESSION['Error']['register'] = "This email already taken, please chose other or do login";
				$result = false;
			}
		} else{
			$_SESSION['Error']['register'] = "Something wrong has occured! Contact an administrator with error: ".mysqli_error($this->connect);
			$result = false;
		}
		
		$this->force_close();
		
		return $result;
	}
	
	private function RegisterUser($name, $email, $password, $birthday, $country, $timezone, $safeword, $permission){
		$pass = md5($password);	
		$userId = $this->generateUniqId($safeword, $birthday, $pass, $birthday);
		$ip = getIP();
		$dados = sprintf("INSERT INTO users (userId, name, email, password, birtday, country, timezone, ip, permission) VALUES ('$userId', '$name', '$email', '$pass', '$birthday', '$country', '$timezone', '$ip', '$permission')");
		
		
		if($query = mysqli_query($this->connect, $dados)){
			$result = true;
		} else{
			$_SESSION['Error']['register'] = "Something wrong has occured! Contact an administrator with error: ".mysqli_error($this->connect)."<br>".$dados;
			$result = false;
		}
		
		$this->force_close();
		
		return $result;
	}
	
	public function callRegisterUser($name, $email, $password, $birthday, $country, $timezone, $safeword, $permission="basic"){
		$result = $this->RegisterUser($name, $email, $password, $birthday, $country, $timezone, $safeword, $permission);
		return $result;
	}
	
	private function generateUniqId($param1, $param2, $param3, $param4){
		$id = "";
		$alphabet = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');
		
		for($x=0;$x<=3;$x++){
			for($y=0;$y<=3;$y++){
				switch($x){
					case 0:
						for($z=0;$z<count($alphabet);$z++){
							if(is_int($param1[$y])){
								$id .= $param1[$y];
							} else{
								if($param1[$y] == $alphabet[$z]) $id .= $z;
							}
						}
						break;
					case 1:
						$x++;
						$id .= substr($param2, 0, 4);
						break;
					case 2:
						for($z=0;$z<count($alphabet);$z++){
							if(is_int($param1[$y])){
								$id .= $param1[$y];
							} else{
								if($param1[$y] == $alphabet[$z]) $id .= $z;
							}
						}
						break;
					case 3:
						for($z=0;$z<count($alphabet);$z++){
							if(is_int($param1[$y])){
								$id .= $param1[$y];
							} else{
								if($param1[$y] == $alphabet[$z]) $id .= $z;
							}
						}
						break;
				}
			} 
		}
		
		return $id;
	}
}
?>