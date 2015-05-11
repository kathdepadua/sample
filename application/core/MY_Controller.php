<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Description of MY_Controller
 *
 * @author katherinedepadua
 */
class MY_Controller extends CI_Controller
{
    public $data = array();
    public $account_id;

    public function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Manila');

        $this->load->helper(array(
            'url',
            //'html',
            //'functions',
            //'html_snips'
        ));

        $this->load->library(array(
            'parser',
            'pagination',
            //'random_code',
            //'curl',
            'validation',
            'session'
        ));
        
        $this->account_id = @$this->session->userdata['account_id'];
        
    }

    public function template($template = '')
    {
        $this->data['base_url'] = base_url();
        
        $this->set_active_page();

        $this->data['body'] = $this->parser->parse($template, $this->data, TRUE);

        $this->parser->parse('masterpage_view', $this->data);
    }

    private function set_active_page(){
    }

    public function set_page()
    {
        if (empty($this->session->userdata['account_id'])) {
            return FALSE;
        }
        return TRUE;
    }

    public function _check_session()
    {
        if ((bool) !$this->set_page()) {
            //redirect(base_url());
        }
    }
    

    public function __destruct()
    {
        
    }

}
?>
