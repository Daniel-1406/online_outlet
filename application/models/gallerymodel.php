<?php

class gallerymodel extends CI_Model{
    
//    var $gallery_path;
//    
//    function Gallerymodel(){
//        
//        parent::Model();
//        $this->gallery_path=realpath(APPPATH."../images");
//    }
//    
//    function do_upload(){
//        
//        $config=array(
//            "allowed_types"=>"jpg|jpeg|png",
//            "upload_path"=>$this->gallery_path
//            
//        );
//        $this->load->library("upload",$config);
//        //performing the upload itself
//        $this->upload->do_upload();
//    }
    
    function saveimage($nameimage){
        $data["surname"]="demo1";
        $data["firstname"]="demo1";
        $data["username"]="demo1";
        $data["gender"]="demo1";
        $data["picture"]=$nameimage;
        $this->db->insert("students",$data);
    }
    
}
?>
