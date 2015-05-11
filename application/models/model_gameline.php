<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Description of model_gameline
 *
 * @author katherinedepadua
 */
class model_gameline extends CI_Model
{
    private $table;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->table = 'gameline';
    }

    public function get_game($match)
    {
        $sql = "SELECT * FROM gameline WHERE DATE(game_date) = DATE(NOW()) AND game_match = ?;";
        $query = $this->db->query($sql, $match);
        return $query->result();
    }

    public function get_match()
    {
        $sql = "SELECT game_match FROM gameline WHERE DATE(game_date) = DATE(NOW()) GROUP BY game_match;";
        $query = $this->db->query($sql);
        return $query->result();
    }

     public function get_game_details($id)
    {
        $sql = "SELECT * FROM gameline WHERE gameline_id = ?";
        $query = $this->db->query($sql,$id);
        return $query->result();
    }

    public function insert_game($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update_game($condition,$data)
    {
        $this->db->where('gameline_id', $condition);
        $this->db->update($this->table, $data);
    }

    public function delete_game($id)
    {
        $this->db->where('gameline_id', $id);
        $this->db->delete($this->table);
    }

    public function __destruct()
    {
        $this->db->close();
    }

}
?>
