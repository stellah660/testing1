<?php

class Main_Models extends CI_Model {
    public function insert_data( $data)
    {
        $query= $this->db->insert('tbl_user',$data);
        return $query;
    }
    public function fetch_data()
    {
        $query=$this->db->get('tbl_user');
        return $query;
    }
    public function delete($id)
    {
        $this->db->where( "id",$id);
        $this->db->delete("tbl_user");
    }
    public function fetch_editing_data($user_id)
    {
        $this->db->where("id",$user_id);
        $query=$this->db->get('tbl_user');
        return $query;
    }
    public function can_login($username,$password)
    {
        $this->db-> where('username',$username);
        $this->db-> where('password',$password);
       $query= $this->db->get('tbl_user');
       if($query->num_rows() > 0)
       {
        return true;
       }
       else
       {
        return false;
       }


    }

}