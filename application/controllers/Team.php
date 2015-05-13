<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->_check_session();
        
        $this->load->model(array('model_gameline'));

        $this->data['user'] = $this->session->userdata('firstname');
    }

    public function validate(){
    	$this->validation->field_name('Date&Time')
                ->field_value($_POST['game_date'])
                ->required();

        $this->validation->field_name('Match')
                ->field_value($_POST['game_match'])
                ->required();

        $this->validation->field_name('Team')
                ->field_value($_POST['game_lineup'])
                ->required();

         $this->validation->field_name('Standings')
                ->field_value($_POST['standings'])
                ->required();
        
        if (!$this->validation->err)
        {
            $id = $this->uri->segment(3,0);
            if($id){
                $this->model_gameline->update_game($id,$_POST);
            }else{
                $id = $this->model_gameline->insert_game($_POST);
            } 
        }

        echo json_encode($this->validation->err);
    }

    public function manage(){
        
        $lineup = $this->model_gameline->get_match();

        foreach ($lineup as $key => $value) { 
            $data = $this->model_gameline->get_game($value->game_match);

            $value->game_lineup1 = @$data[0]->game_lineup;
            $value->game_lineup2 = @$data[1]->game_lineup;
            $value->standings1 = @$data[0]->standings;
            $value->standings2 = @$data[1]->standings;
            $value->win1 = @$data[0]->win;
            $value->win2 = @$data[1]->win;
            $value->lose1 = @$data[0]->lose;
            $value->lose2 = @$data[1]->lose;
            $value->id1 = @$data[0]->gameline_id;
            $value->id2 = @$data[1]->gameline_id;
        }

        $this->data['today'] = date('M d, Y');
        $this->data['line_list'] = $lineup;
        $this->data['page'] = $this->parser->parse('manage_view', $this->data, TRUE);

        $this->template('dashboard_view');
    }

    public function edit(){

        $id = $this->uri->segment(3,0); //var_dump($id);
        $details = $this->model_gameline->get_game_details($id);
        $this->data['gameline_id'] = $details[0]->gameline_id;
        $this->data['game_date'] = date("m/d/Y H:i:s",strtotime($details[0]->game_date)); var_dump($this->data['game_date']);
        $this->data['game_match'] = $details[0]->game_match;
        $this->data['game_lineup'] = $details[0]->game_lineup;
        $this->data['standings'] = $details[0]->standings;
        $this->data['win'] = $details[0]->win;
        $this->data['lose'] = $details[0]->lose;
        $this->data['page'] = $this->parser->parse('add_view', $this->data, TRUE);

        $this->template('dashboard_view');
    }

    public function delete(){ //echo "TESSTT";
        $id = $this->uri->segment(3,0);
        $this->model_gameline->delete_game($id);
        redirect(base_url());
    }


}