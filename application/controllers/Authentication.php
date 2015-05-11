<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Description of authentication
 *
 * @author katherinedepadua
 */
class Authentication extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('model_account'));
    }
    
    public function validate()
    {
        $this->validation->field_name('Email')
                ->field_value($_POST['email'])
                ->required();

        $this->validation->field_name('Password')
                ->field_value($_POST['password'])
                ->required();
        
        if (!$this->validation->err)
        {
            $dataset = $this->model_account->authenticate();
              
            if (!empty($dataset))
            {
                if ($dataset[0]->active == 1)
                {
                    $this->session->set_userdata((array)$dataset[0]);

                    $this->validation->err['success'] = TRUE;
                    $this->validation->err['authenticate'] = TRUE;
                    $this->validation->err['message'] = 'Loading...';
                }
                else
                {
                    $this->validation->err[] = 'Disabled Account';
                }
            }
            else
            {
                $this->validation->err[] = 'Invalid Account';
            }
        }

        echo json_encode($this->validation->err);
        
    }
    
    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
        
    }
    
    

}
?>
