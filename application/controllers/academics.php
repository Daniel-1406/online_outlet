<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class  Academics extends CI_controller{
    
    public function index(){
        $this->welcomemodel->setuptables();
        $menu["menudata"]=$this->menumodel->getpagemenu();
        $slideshow=$this->carouselmodel->displaycarousel();
        $data=$this->students->getschoolinfo();
        $features["rtnschoolidentity"]=$data["schoolidentity"];
        $features["rtnaddress"]=$data["address"];
        //$features["rtnmajorcolor"]=$data["majorcolor"];
        //$features["rtncolor"]=$data["minorcolor"];
        
        $features["rtncarousel"]=$slideshow["carousel"];
        $features["rtnslide"]=$slideshow["slide"];
        $features["menu"]=$menu["menudata"];
        $this->load->view("frontend/homepage",$features);
    }
    
}
?>
