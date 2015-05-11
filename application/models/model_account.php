<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Description of model_account
 *
 * @author katherinedepadua
 */
class model_account extends CI_Model
{
    private $table;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->table = 'account';
    }

    public function authenticate()
    {
        $sql = "SELECT account_id, firstname, lastname, active FROM account WHERE active = 1;";
        $query = $this->db->query($sql, array($_POST['email'], $_POST['password']));
        return $query->result();
    }

    public function get_account($id)
    {
        $sql = "SELECT account_id, msisdn, firstname, lastname FROM account WHERE account_id=? AND active = 1;";
        $query = $this->db->query($sql, $id);
        return $query->result();
    }

    public function update_account($condition,$data)
    {
         $this->db->where('account_id', $condition);
        $this->db->update($this->table, $data);
    }

    public function __destruct()
    {
        $this->db->close();
    }

}
?>
