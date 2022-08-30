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
        $features["rtnmajorcolor"]=$data["majorcolor"];
        $features["rtnminorcolor"]=$data["minorcolor"];
        
        $features["rtncarousel"]=$slideshow["carousel"];
        $features["rtnslide"]=$slideshow["slide"];
        $features["menu"]=$menu["menudata"];
        $this->load->view("frontend/homepage",$features);
    }
    
    public function gallery(){
             $this->welcomemodel->setuptables();
        $menu["menudata"]=$this->menumodel->getpagemenu();
        $gallery=$this->gallerymodel->getitems();
        
        $data=$this->students->getschoolinfo();
        $features["rtnschoolidentity"]=$data["schoolidentity"];
        $features["rtnaddress"]=$data["address"];
        $features["rtnmajorcolor"]=$data["majorcolor"];
        $features["rtnminorcolor"]=$data["minorcolor"];
        
        $features["gallery"]=$gallery;
        $features["menu"]=$menu["menudata"];
        $this->load->view("frontend/gallery",$features);
    }
    
    
}
?>
