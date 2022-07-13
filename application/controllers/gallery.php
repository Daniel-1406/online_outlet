<?php
class Gallery extends CI_Controller{
    
    function index(){
        if($this->input->post("upload")){
            $this->gallerymodel->do_upload();
        }
        $this->load->view("gallery");
        
    }
    
     public function do_upload()
        {
                $config['upload_path']          = './images/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
//                $config['max_size']             = 100;
//                $config['max_width']            = 1024;
//                $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('gallery', $error);
                }
                else
                {
                        $myupload=$this->upload->data();
                        $data = array('upload_data' => $myupload);
                        $this->gallerymodel->saveimage($myupload["file_name"]);
                        $this->load->view('gallery', $data);
                }
        }
    
    
}
?>
