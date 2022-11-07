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
        $events = $this->eventmodel->getevents();
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
        $features["events"] = $events;
        $this->load->view("frontend/homepage", $features);
    }

    public function gallery()
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

    public function openwholecarousel(){
        $menu["menudata"] = $this->menumodel->getpagemenu();
         $data = $this->students->getschoolinfo();
         $data1 = $this->welcomemodel->getfullnews($this->uri->segment(3));
         $data2 = $this->welcomemodel->getothernews($this->uri->segment(3));
         $data3 = $this->carouselmodel->getcarousel($this->uri->segment(3));

         $features["rtnschoolidentity"] = $data["schoolidentity"];
         $features["rtnaddress"] = $data["address"];
         $features["rtnmajorcolor"] = $data["majorcolor"];
         $features["rtnminorcolor"] = $data["minorcolor"];
         $features["menu"] = $menu["menudata"];
         $features["fullnews"] = $data1;
         $features["othernews"] = $data2;
         $features["carousel"] = $data3;
        $this->load->view("frontend/wholecarousel",$features);
    }

    public function openwholefacility(){
        $menu["menudata"] = $this->menumodel->getpagemenu();
         $data = $this->students->getschoolinfo();
         $data1 = $this->welcomemodel->getfullnews($this->uri->segment(3));
         $data2 = $this->welcomemodel->getothernews($this->uri->segment(3));
         $data3 = $this->facilitymodel->getwholefacility($this->uri->segment(3));
         $data4 = $this->facilitymodel->getotherfacilities($this->uri->segment(3));

         $features["rtnschoolidentity"] = $data["schoolidentity"];
         $features["rtnaddress"] = $data["address"];
         $features["rtnmajorcolor"] = $data["majorcolor"];
         $features["rtnminorcolor"] = $data["minorcolor"];
         $features["menu"] = $menu["menudata"];
         $features["fullnews"] = $data1;
         $features["othernews"] = $data2;
         $features["facility"] = $data3;
         $features["otheritems"] = $data4;
        $this->load->view("frontend/wholefacility",$features);
    }

    public function openwholeevent(){
        $menu["menudata"] = $this->menumodel->getpagemenu();
         $data = $this->students->getschoolinfo();
         $data1 = $this->welcomemodel->getfullnews($this->uri->segment(3));
         $data2 = $this->welcomemodel->getothernews($this->uri->segment(3));
         $data3 = $this->eventmodel->getwholeevent($this->uri->segment(3));
         $data4 = $this->eventmodel->getotherevents($this->uri->segment(3));

         $features["rtnschoolidentity"] = $data["schoolidentity"];
         $features["rtnaddress"] = $data["address"];
         $features["rtnmajorcolor"] = $data["majorcolor"];
         $features["rtnminorcolor"] = $data["minorcolor"];
         $features["menu"] = $menu["menudata"];
         $features["fullnews"] = $data1;
         $features["othernews"] = $data2;
         $features["event"] = $data3;
         $features["otherevents"] = $data4;
        $this->load->view("frontend/wholeevent",$features);
    }

    public function page()
    {
        $menu["menudata"] = $this->menumodel->getpagemenu();
        $data= $this->students->getschoolinfo();
        $data1=$this->custompagemodel->displaypage();
        
        $features["rtnschoolidentity"] = $data["schoolidentity"];
        $features["rtnaddress"] = $data["address"];
        $features["rtnmajorcolor"] = $data["majorcolor"];
        $features["rtnminorcolor"] = $data["minorcolor"];
        $features["title"] = $data1["title"];
        $features["content"] = $data1["content"];
        $features["date"] = $data1["date"];

        $features["menu"] = $menu["menudata"];
        $this->load->view("frontend/page",$features);
    }
}
