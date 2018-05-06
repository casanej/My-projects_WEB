<?php
class UserManagement extends Connect{
    private function registerUser($name, $email, $password){
        $uuid = $this->createUUID();
        $password = $this->encryptPass();
        $datecreate = date('Y-m-d H:i:s');
        $datechange = $datecreate;
        $adressip = $this->getIp();
        $lastchange = $datecreate;

        $conn = $this->Connect = $this->createConnection(1);

        $stmt = $conn->prepare("INSERT INTO tblogins (uuid, name, email, password, datecreate, datechange, addressip, lastchange) VALUES (:UUID, :NAME, :EMAIL, :PASSWORD, :DATECREATE, :DATECHANGE, :ADDRESSIP, :LASTCHANGE)");
        $stmt->bindParam(":UUID", $uuid);
        $stmt->bindParam(":NAME", $name);
        $stmt->bindParam(":EMAIL", $email);
        $stmt->bindParam(":PASSWORD", $password);
        $stmt->bindParam(":DATECREATE", $datecreate);
        $stmt->bindParam(":DATECHANGE", $datechange);
        $stmt->bindParam(":ADDRESSIP", $adressip);
        $stmt->bindParam(":LASTCHANGE", $lastchange);

        var_dump($stmt);

        $stmt->execute();
        return $stmt;
    }

    public function callRegisterUser(string $name, string $email, string $password){
        $return;
        if(!empty($name) || !empty($email) || !empty($password)){
            $return = $this->registerUser($name, $email, $password);
        } else{
            $return = "Name, email or password is empty";
        }

        return $return;
    }


    /* REGISTER FUNCTIONS */
    private function createUUID(){
        $uuid = md5(uniqid(rand(), true));
        return $uuid;
    }

    private function getIp(){
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        return $ip;
    }

    private encryptPass($password){
        $options = [
            'cost' => 10,
        ];
        
        $pass = password_hash($password, PASSWORD_ARGON2I, $options);
        return $pass;
    }
}
?>