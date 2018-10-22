<?php


class Db_object {


    public static function find_all() {
//		global $d atabase;
//		$result_set = $database->query("SELECT * FROM users");
//		return $result_set;
        return self::find_this_query("SELECT * FROM " . self::$db_table . " ");
    }









    public static function find_by_id($user_id)
    {
        global $database;

        //  $result_set = $database->query("SELECT * FROM users WHERE user_id= $user_id ");

        $the_result_array = self::find_this_query("SELECT * FROM ". self::$db_table . " WHERE user_id = $user_id");

        // array_shift — Shift an element off the beginning of array
        return !empty($the_result_array) ? array_shift($the_result_array) : false;


        return $found_user;
    }








    public static function find_this_query($sql){
        global $database;
        $result_set = $database->query($sql);
        $the_object_array = array();

        while($row = mysqli_fetch_array($result_set)){

            $the_object_array[] = self::instantation($row);

        }
        return $the_object_array;
    }














    public static function instantation($the_record){

        $the_object = new self;
//
//        $the_object->user_id        = $found_user['user_id'];
//        $the_object->username       = $found_user['username'];
//        $the_object->password       = $found_user['password'];
//        $the_object->user_firstname = $found_user['user_firstname'];
//        $the_object->user_lastname  = $found_user['user_lastname'];

        foreach ($the_record as $the_attribute => $value) {

            if($the_object->has_the_attribute($the_attribute)) {
                $the_object->$the_attribute = $value;
            }
        }

        return $the_object;
    }





    private function has_the_attribute($the_attribute) {

        // Gets the properties of the given object
        $object_properties = get_object_vars($this);
        // array_key_exists — Checks if the given key or index exists in the array
        return array_key_exists($the_attribute, $object_properties);


    }







}












?>