<?php
defined('BASEPATH') or exit('No direct script access allowed');


class  Academics extends CI_controller
{

    public function index()
    {
        //  $this->welcomemodel->setuptables();
        $menu["menudata"] = $this->menumodel->getpagemenu();
        $slideshow = $this->carouselmodel->displaycarousel();
        $facilities = $this->facilitymodel->getfacilities();
        $data = $this->students->getschoolinfo();
        $data1 = $this->welcomemodel->getnews();

        $features["rtnschoolidentity"] = $data["schoolidentity"];
        $features["rtnaddress"] = $data["address"];
        $features["rtnmajorcolor"] = $data["majorcolor"];
        $features["rtnminorcolor"] = $data["minorcolor"];

        $features["rtncarousel"] = $slideshow["carousel"];
        $features["rtnslide"] = $slideshow["slide"];
        $features["menu"] = $menu["menudata"];
        $features["news"] = $data1;
        $features["facilities"] = $facilities;
        $this->load->view("frontend/homepage", $features);
    }

    public function gallery($adss)
    {
        $this->welcomemodel->setuptables();
        $menu["menudata"] = $this->menumodel->getpagemenu();
        $gallery = $this->gallerymodel->getitems();

        $data = $this->students->getschoolinfo();
        $features["rtnschoolidentity"] = $data["schoolidentity"];
        $features["rtnaddress"] = $data["address"];
        $features["rtnmajorcolor"] = $data["majorcolor"];
        $features["rtnminorcolor"] = $data["minorcolor"];

        $features["gallery"] = $gallery;
        $features["menu"] = $menu["menudata"];
        $this->load->view("frontend/gallery", $features);
    }
    public function opennewsarchive()
    {
        $menu["menudata"] = $this->menumodel->getpagemenu();
        $data = $this->students->getschoolinfo();
        $data1 = $this->welcomemodel->getnewsarchive();

        $features["rtnschoolidentity"] = $data["schoolidentity"];
        $features["rtnaddress"] = $data["address"];
        $features["rtnmajorcolor"] = $data["majorcolor"];
        $features["rtnminorcolor"] = $data["minorcolor"];

        $features["menu"] = $menu["menudata"];
        $features["newsarchive"] = $data1;
        $this->load->view("frontend/newsarchive",$features);
    }
     public function openwholenews()
    {
         $menu["menudata"] = $this->menumodel->getpagemenu();
         $data = $this->students->getschoolinfo();
         $data1 = $this->welcomemodel->getfullnews($this->uri->segment(3));
         $data2 = $this->welcomemodel->getothernews($this->uri->segment(3));
        // $data1 = $this->welcomemodel->getnewsarchive();

         $features["rtnschoolidentity"] = $data["schoolidentity"];
         $features["rtnaddress"] = $data["address"];
         $features["rtnmajorcolor"] = $data["majorcolor"];
         $features["rtnminorcolor"] = $data["minorcolor"];
         $features["menu"] = $menu["menudata"];
         $features["fullnews"] = $data1;
         $features["othernews"] = $data2;
        $this->load->view("frontend/fullnews",$features);
    }
}
