 <?php


class User extends Db_object{

    protected static $db_table = "users";
    protected static $db_table_fields  = array('username, password, user_firstname, user_lastname');
    public $user_id;
    public $username;
    public $password;
    public $user_firstname;
    public $user_lastname;













	    public static function verify_user($username, $password){

	    global $database;
	    $username = $database->escape_string($username);
        $password = $database->escape_string($password);

        $sql  = "SELECT * FROM " . self::$db_table . " WHERE ";
        $sql .= "username = '{$username}' ";
        $sql .= "AND password = '{$password}' ";
        $sql .= "LIMIT 1";

        $the_result_array = self::find_this_query($sql);
        return !empty($the_result_array) ? array_shift($the_result_array) : false;

    }












            protected function properties() {
	      //  return get_object_vars($this);

                $properties = array();

                foreach (self::$db_table_fields as $db_field) {

                    // property_exists — Checks if the object or class has a property
                    if(property_exists($this, $db_field)){

                        $properties[$db_field] = $this->$db_field;
                    }
                }

                return $properties;

    }



    protected function clean_properties() {
	        global $database;
	        $clean_properties = array();
	        foreach ($this->properties() as $key =>$value) {

	            $clean_properties[$key] = $database->escape_string($value);

            }

            return $clean_properties;


    }











        public function save(){

               // if                if the's          if not
	    return isset($this->user_id) ? $this->update() : $this->create();
}









        public function create(){
	    global $database;
	    $properties = $this->clean_properties();
	    $sql  = "INSERT INTO " . self::$db_table . "(" . implode(",", array_keys($properties)) .")";
	    //implode — Join array elements with a string
	    $sql .="VALUES ('". implode("','", array_values($properties))  ."')";

//	    $sql .=$database->escape_string($this->username) . "', '";
//        $sql .=$database->escape_string($this->password) . "', '";
//        $sql .=$database->escape_string($this->user_firstname) . "', '";
//        $sql .= $database->escape_string($this->user_lastname) . "' )";

        if($database->query($sql)) {

            $this->user_id = $database->the_insert_id();

             return true;

        } else{

            return false;
        }

    }






        // update the name

        public function update() {
        global $database;

        $properties = $this->clean_properties();
        $properties_pairs = array();
        foreach ($properties as $key => $value) {
            $properties_pairs[] = "{$key}='{$value}'";
        }
        //query
        $sql = "UPDATE " .self::$db_table . " SET ";

          // implode — Join array elements with a string
        $sql .=implode(", ", $properties_pairs);
                 // key                                       value
//        $sql .= "username= '" . $database->escape_string($this->username)       . "',";
//        $sql .= "password= '" . $database->escape_string($this->password)       . "',";
//        $sql .= "user_firstname= '" . $database->escape_string($this->user_firstname) ."'," ;
//        $sql .= "user_lastname= '" . $database->escape_string($this->user_lastname)  . "' ";
        $sql .= "WHERE user_id= " . $database->escape_string($this->user_id);

        // send query
        $database->query($sql);
                                                          // if / then / else
                                                 //           ^     ^     ^
                                                          //  | /   |  /  |
        // check query //mysqli_affected_rows — Gets the number of affected rows in a previous MySQL operation
        return (mysqli_affected_rows($database->connection ) == 1 ) ? true : false;

}







        public function delete() {

	    global $database;

	    $sql  = "DELETE FROM " . self::$db_table . " ";
	    $sql .= "WHERE user_id=" . $database->escape_string($this->user_id);
	    $sql .= " LIMIT 1";
	    $database->query($sql);
	    return (mysqli_affected_rows($database->connection) == 1) ? true : false;

}







}




?>