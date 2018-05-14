 <?php
class user_manager{
    private $transaction;

    private $uuid;
    private $name;
    private $email;
    private $addressip;

    public function __toString(){
        if($this->transaction){
            $data = json_encode(array(
                    "uuid"=>$this->getUuid(),
                    "name"=>$this->getName(),
                    "email"=>$this->getEmail(),
                    "addressip"=>$this->getAddressIp()
                ));
        } else {
            $data = "false";
        }

        return $data;
    }

    private function getUuid(){
        return $this->uuid;
    }
    private function getName(){
        return $this->name;
    }
    private function getEmail(){
        return $this->email;
    }
    private function getAddressIp(){
        return $this->addressip;
    }

    private function setUuid($value){
        $this->uuid = $value;
    }
    private function setName($value){
        $this->name = $value;
    }
    private function setEmail($value){
        $this->email = $value;
    }
    private function setAddressIp($value){
        $this->addressip = $value;
    }

    public function loadById($id){
        $sql = new system_sql();

        $results = $sql->select("SELECT uuid, name, email, addressip FROM tblogins WHERE numid=:NUMID", array(
            ":NUMID"=>$id
        ));

        if(count($results) > 0){
            $this->transaction = true;

            $row = $results[0];

            $this->setUuid($row['uuid']);
            $this->setName($row['name']);
            $this->setEmail($row['email']);
            $this->setAddressIp($row['addressip']);
        } else{
            $this->transaction = false;
        }
    }

    public static function loadByAll(){
        $sql = new system_sql();

        return $sql->select("SELECT uuid, name, email, addressip FROM tblogins ORDER BY numid;");
    }

    /* LOGIN */
    public function doLogin(string $login, string $password){
        $sql = new system_sql();

        $results = $sql->select("SELECT uuid, name, email, addressip FROM tblogins WHERE email=:LOGIN AND password=:PASSWORD", array(
            ":LOGIN"=>$login,
            ":PASSWORD"=>$password
        ));

        if(count($results) > 0){
            $this->transaction = true;

            $row = $results[0];

            $this->setUuid($row['uuid']);
            $this->setName($row['name']);
            $this->setEmail($row['email']);
            $this->setAddressIp($row['addressip']);
        } else{
            throw new Exception("Login e/ou senha inválidos");
        }
    }
    /* END LOGIN */

    /* REGISTER */
    public function doRegister($name, $email, $password){
        $sql = new system_sql();

        $uuid  = $this->createUUID();
        $name = rawurlencode($name);
        $password = $this->encryptPass($password);
        $ip = $this->getIp();

        $results = $sql->select("INSERT INTO tblogins (uuid, name, email, password, addressip) VALUES (:UUID, :NAME, :EMAIL, :PASS, :ADDRESS)", array(
            ":UUID"=>$uuid,
            ":NAME"=>$name,
            ":EMAIL"=>$email,
            ":PASS"=>$password,
            ":ADDRESS"=>$ip
        ));

        if(count($results) > 0){
            $this->transaction = true;

            $row = $results[0];

            $this->setUuid($row['uuid']);
            $this->setName($row['name']);
            $this->setEmail($row['email']);
            $this->setAddressIp($row['addressip']);
        } else{
            throw new Exception("Login e/ou senha inválidos");
        }

        return $return;
    }
    /* END REGISTER */

    /* REGISTER FUNCTIONS */
    private function checkEmail(string $email){
        $sql = new system_sql();

        $results = $sql->select("SELECT email FROM tblogins WHERE email=:EMAIL", array(
            ":EMAIL"=>$email
        ));

        if(count($results) > 0) $return = false; else $return = true;

        return $return;
    }

    private function createUUID():string {
        $uuid = md5(uniqid(rand(), true));
        return $uuid;
    }

    private function getIp():string {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        return $ip;
    }

    private function encryptPass(string $password):string {
        $options = [
            'cost' => 10,
        ];

        $pass = password_hash($password, PASSWORD_ARGON2I, $options);
        $pass = substr($pass, 28);

        return $pass;
    }

    /* LOGIN FUNCTION */
    private function decryptPass($password, $hash){
        $return;
        $hash = '$argon2i$v=19$m=1024,t=2,p=2'.$hash;

        if (password_verify($password, $hash)) {
            $return = true;
        } else {
            $return = false;
        }

        return $return;
    }
}
?>
