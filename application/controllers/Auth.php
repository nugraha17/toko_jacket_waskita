<?php

class Auth extends CI_Controller

{
    public function login_user()
    {
				$this->form_validation->set_rules('username', 'Email', 'required', array(
						'required' => '%s Harus Di isi !!'
				));

				$this->form_validation->set_rules('username', 'Password', 'required', array(
						'required' => '%s Harus Di isi !!'
				));
        if ($this->form_validation->run() == TRUE) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $this->user_login->login($username, $password);
        }
            $data = array(
                'title' => 'Login User',
            );
            $this->load->view('v_login_user', $data, FALSE);
    }

    public function logout_user()
    {
        $this->user_login->logout();
    }
}
