<?php
if(!isset($_SESSION)) session_start();

class timers extends connect{
	private $connect;
	
	function __construct(){
		$this->connect = $this->mysqli_connect();	
	}
	
	public function force_close(){
		$this->mysqli_close($this->connect);
	}
	
	/* TIMER INSERT */
	private function timerInsert($name, $link, $duration, $repeat){
		$dtcreate = $this->connect = $this->getDateHour();
		$owner = $this->connect = $this->getUserId();
		$this->connect = $this->mysqli_connect();
		$fields = "";
		$values = "";
		
		$fields .= $this->addField('ownerId'); $values .= $this->addValue($owner);
		$fields .= $this->addField('website'); $values .= $this->addValue($link);
		$fields .= $this->addField('duration'); $values .= $this->addValue($duration);
		$fields .= $this->addField('recount', 1); $values .= $this->addValue($repeat, 0, 1);
		
		$dados = "INSERT INTO timers ($fields) VALUES ($values)";
		$query = mysqli_query($this->connect, $dados);
		if($query){
			$result = 1;
		} else{
			$result = mysqli_error($this->connect);
		}
		
		$this->force_close();
		
		return $result;
	}
	
	public function callTimerInsert($name, $link, $duration, $repeat){
		$name = rawurlencode($name);
		$link = rawurlencode($link);
		$result = $this->timerInsert($name, $link, $duration, $repeat);
		return $result;
	}
	
	/* TIMER RETRIEVE */
	private function timerRetrieveAll(){
		$userID = $_SESSION['User']['userid'];
		$array = array();
		
		$dados = sprintf("SELECT id FROM timers WHERE ownerId='%s'", $userID);
		if($query = mysqli_query($this->connect, $dados)){
			while($info = mysqli_fetch_assoc($query)){
				array_push($array, $info);
			}
			$result = $array;
		} else{
			$result = mysqli_errno($this->connect);
		}
		
		$this->force_close();
		
		return $result;
	}
	
	public function callTimerRetrieveAll(){
		$result = $this->timerRetrieveAll();
		return $result;
	}
	
	private function timerRetrieveById($timerId){
		$userID = $_SESSION['User']['userid'];
		
		$array = array();
		
		$dados = sprintf("SELECT ownerId, name, website, lastclick, duration, recount FROM timers WHERE ownerId='%s' AND id='%s'", $userID, $timerId);
		if($query = mysqli_query($this->connect, $dados)){
			while($info = mysqli_fetch_assoc($query)){
				array_push($array, $info);
			}
			$result = $array;
		} else{
			$result = mysqli_errno($this->connect);
		}
		
		$this->force_close();
		
		return $result;
	}
	
	public function callRetrieveAllTimersId($timerId){
		$result = $this->timerRetrieveById($timerId);
		return $result;
	}
	
	/* UPDATE TIMERS */
	private function updateLastClick($idTimer){
		$userID = $_SESSION['User']['userid'];
		$lastclick = date('Y-m-d H:i:s');
		$colums = "";
		
		$colums .= $this->addValueUpdate('lastclick', $lastclick, 0, 1);
		
		$dados = "UPDATE timers SET $colums WHERE id=$idTimer AND ownerId='$userID'";
		
		if($query = mysqli_query($this->connect, $dados)){
			$result = true;
		} else{
			$result = mysqli_error($this->connect);
		}
		
		return $result;
	}
	
	public function callUpdateLastClick($idTimer){
		$result = $this->updateLastClick($idTimer);
		return $result;
	}
	
	/* USEFULL CODE*/
	private function addField($field, $typeStr=0){
		$result = $field;
		
		switch($typeStr){
			case 0:
				$result .= ', ';
				break;
			case 1:
				$result .= '';
				break;
		}
		
		return $result;
	}
	
	private function addValue($value, $typeVl=0, $typeStr=0){
		$result = "";
		
		switch($typeVl){
			case 0:
				$result .= sprintf("'%s'", $value);
				break;
			case 1:
				$result .= sprintf("%s", $value);
				break;
		}
		
		switch($typeStr){
			case 0:
				$result .= ', ';
				break;
			case 1:
				$result .= '';
				break;
		}
		
		return $result;
	}
	
	private function addValueUpdate($field, $value, $typeVl=0, $typeStr=0){
		$colum = ""; $string = "";
		
		switch($typeVl){
			case 0:
				$string .= sprintf("'%s'", $value);
				break;
			case 1:
				$string .= sprintf("%s", $value);
				break;
		}
		
		$colum = sprintf('%s=%s', $field, $string);
		
		switch($typeStr){
			case 0:
				$colum .= ', ';
				break;
			case 1:
				$colum .= '';
				break;
		}
		
		return $colum;
	}
}
?>