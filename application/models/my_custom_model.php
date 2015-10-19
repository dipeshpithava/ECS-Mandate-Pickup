<?php
class My_Custom_model extends grocery_CRUD_Model{
    function __construct() {
        parent::__construct();
    }
    public function set_query_str($query_str) {
        $res = $this->db->query($query_str)->result();
        return $res;
    }
}
?>