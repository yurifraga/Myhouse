<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function index()
    {
        $data['title'] = "Login - Codeigniter";
        $this->load->view('pages/login', $data);
    }

    public function store()
    {
        $this->load->model("login_model");
        $email = $this->input->post("email");
        $password = md5($this->input->post("password"));
        $user = $this->login_model->store($email, $password);

        if($user){
            $this->session->set_userdata("Login_efetuado", $user);
            redirect("dashboard");
        } else {
            redirect("login");
        }
    }

    public function logout()
    {
        $this->session->unset_userdata("Login_efetuado");
        redirect("login");
    }

}