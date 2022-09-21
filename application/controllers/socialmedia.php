<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Socialmedia extends CI_Controller {

   public function updatesocialmedia() {
        if ($this->session->userdata("admin") == "")
            redirect("welcome/");
        $this->form_validation->set_rules("twitter", "Twitter link", "required|trim|min_length[3]");
        $this->form_validation->set_rules("facebook", "Facebook Link", "required|trim|min_length[3]");
        $this->form_validation->set_rules("instagram", "Istagram Link", "required|trim|min_length[3]");

        if ($this->form_validation->run() == FALSE) {
            $this->socialmedia();
        } else {
            $lat["msg"] = $this->welcomemodel->socialmedia();
            $this->load->view("feedbacks/socialmedia", $lat);
        }
    }


}

?>
