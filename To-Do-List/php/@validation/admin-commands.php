<?php
Class AdminCommand extends Connect{

	public function callCreateTablePrefab(int $typeTable){
		/* TABLE TYPES NAMES
            00 - Logs
            01 - Logins
        */
            
        $return = "";
        if(is_int($typeTable)){
            $return = Connect::CreateTablePrefab($typeTable);
        } else{
            $return = "Parameter inserted incorrectly: Integer Required.";
        }

        return $return;
    }
}


?>