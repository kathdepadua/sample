<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

	public function __construct()
    {
        parent::__construct();

        $this->load->model(array('model_account','model_gameline'));
    }

    public function index()
    {
        if ($this->set_page()) {
            $this->dashboard();
        } else {
            $this->login();
        }
    }

    public function dashboard()
    {   
        //print_r($this->session->all_userdata()); 
        $this->data['user'] = $this->session->userdata('firstname'); 
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
		}

        $this->data['today'] = date('M d, Y');
        $this->data['line_list'] = $lineup;
        $this->data['page'] = $this->parser->parse('main_view', $this->data, TRUE);

        $this->template('dashboard_view');
    }

    public function admin(){

        $this->_check_session();
        
         $this->data['gameline_id'] = '';
        $this->data['game_date'] = '';
        $this->data['game_match'] = '';
        $this->data['game_lineup'] = '';
        $this->data['standings'] = '';
        $this->data['win'] = '';
        $this->data['lose'] = '';
    	$this->data['user'] = $this->session->userdata('firstname');
    	$this->data['page'] = $this->parser->parse('add_view', $this->data, TRUE);

        $this->template('dashboard_view');
    }


    public function login()
    {
        //$this->data['banner_ads'] = gif_banner_ad();
        $this->template('login_view');
    }

    public function __destruct()
    {
        parent::__destruct();
    }}
