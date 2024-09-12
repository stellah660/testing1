<?php
class main_controller extends CI_Controller {
    public function index()
    {
        $this->load->model('main_models');
        $data['fetch_data']= $this->main_models->fetch_data();
        $this->load->view('main_view',$data);
    }
    public function form_validation()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username','Username','required|is_unique[tbl_user.username]');
        $this->form_validation->set_rules('password','Password','required');

        if($this->form_validation->run())
        {
            $this->load->model('main_models');
            $data = array(
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password')
            );
            $this->main_models->insert_data($data);
            
            redirect(base_url().'main_controller/Inserted');
        }
        else
        {
            $this-> index();
        }
    }
    public function Inserted()
    {
        $this->index();
    }
    public function delete()
    {
        $id = $this->uri->segment(3);
        $this->load->model("main_models");
        $this->main_models->delete($id);
        redirect(base_url()."main_controller/deleted");

    }
    public function deleted(){
        $this->index();
    }
    public function update_data(){
        $user_id=$this->uri->segment(3);
        $this->load->model("main_models");
        $data['user_data']=$this->main_models->fetch_editing_data($user_id);
        $data['fetch_data']=$this->main_models->fetch_data();
        $this->load->view('main_view',$data);
    }
    public function login(){
        $data['title']='Welcom to the login page . Please key in your login credentials.';
        $this->load->view('login',$data);
    }
    public function login_validation(){
        echo 'ok';
      
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('password','Password','required');
        if($this->form_validation->run()){
            echo'ok';
            $username=$this->input->post('username');
            $password=$this->input->post('password');
            
            $this->load->model('main_models');
            
            if($this->main_models->can_login($username,$password)){
                
                $session_data = array(
                    'username'=> $username
                );
                $this->session->set_userdata($session_data);
                redirect(base_url().'main_controller/enter');
            }
            else{
                $this->session->set_flashdata('error','Invalid usernme or password');
                redirect(base_url().'main_controller/login');
            }

        }
        else{
            $this->login();

        }
    }
    public function enter(){
        if($this->session->userdata('username') != '') {
            echo 'Welcome to CRM platform '. $this->session->userdata('username');
            echo '<a href="'.base_url().'main_controller/logout">Logout</a>';
        } else {
            redirect(base_url().'main_controller/login');
        }
    }
    
    
    public function logout(){
        $this->session->destroy(); 
        redirect(base_url().'main_controller/login'); 
    }
    
  
}



