<?php
class GetModel extends CI_Model{

    // Fetch info
    public function getInfo($table)
    {
        return $this->db->get($table)->result();
    }

    // Fetch info by id
    public function getInfoById($id, $table)
    {
        $this->db->where('id', $id);
        return $this->db->get($table)->row();
    }

    // Fetch info by order
    public function getInfoByOrder($table)
    {
        return $this->db->order_by('id', 'desc')
                        ->get($table)
                        ->result();
    }
    // Fetch info by order
    public function getInfoByLim($table, $lim)
    {
        return $this->db->order_by('id', 'desc')
                        ->limit($lim)
                        ->get($table)
                        ->result();
    }

    public function getRegInfo()
    {
        $this->db->select('*')
                ->from('partner_reg r')
                ->join('cities', 'cities.id = r.city_id', 'LEFT')
                ->join('states', 'cities.state_id = states.id', 'LEFT')
                ->join('reg_roles', 'reg_roles.role_id = r.role_id', 'LEFT');
        return $this->db->get()->result();
    }

    public function getRegInfoById($id)
    {
        $this->db->select('*')
                ->from('partner_reg r')
                ->join('cities', 'cities.id = r.city_id', 'LEFT')
                ->join('states', 'cities.state_id = states.id', 'LEFT')
                ->join('reg_roles', 'reg_roles.role_id = r.role_id', 'LEFT')
                ->where('r.reg_id', $id);
        return $this->db->get()->row();
    }

     // Fetch info with type
     public function getInfoType($table,$col,$key)
     {
         $this->db->where($col, $key);
         return $this->db->get($table)->result();
     }
    
    // Fetch Enquiries
    public function getEnquiries()
    {
        return $this->db->get('enquiries')->result();
    }

    // Count no. of rows in table 
    public function record_count($table) 
    {
        return $this->db->count_all($table);
    }
    
    // Fetch Admin Profile
    public function getAdminProfile()
    {
        return $this->db->get('users')->row();
    }

    // Fetch Website Profile
    public function getWebProfile()
    {
        return $this->db->get('webprofile')->row();
    }

    

}
?>