<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcomemodel extends CI_Model {

    function registerschoolinfo() {
        $val["schoolname"] = $this->input->post("schoolname");
        $val["schoolmotto"] = $this->input->post("schoolmotto");
        $val["email"] = $this->input->post("email");
        $val["address"] = $this->input->post("address");
        $val["nigeirastates"] = $this->input->post("nigeirastates");
        $val["city"] = $this->input->post("city");
        $val["majorcolour"] = $this->input->post("majorcolour");
        $val["minorcolour"] = $this->input->post("minorcolour");
        $val["phonenumber"] = $this->input->post("phonenumber");
        $this->db->query("truncate schoolinformation");
        $this->db->insert("schoolinformation",$val);
        return "School information updated successfully!";
    }
    
    function getnigeriastates(){
        $qq=$this->db->query("select * from nigeirastates order by name");
        $record=array();
        foreach($qq->result() as $k){
          $record[$k->name]=    $k->name;
        }
        
        return $record;
    }
    
    
    function getmajorcolor(){
        $q= $this->db->query("select majorcolour from schoolinformation ");
        $color="";
        foreach($q->result() as $rows){
            $color=$rows->majorcolour;
        }
           return $color; 
        }
        
    
    function getschoolinformation(){
        $qq=  $this->db->get("schoolinformation");
        $record=array();
        if($qq->num_rows()>0){ 
            $row=$qq->row();
            $record["schoolname"]=$row->schoolname;
            $record["schoolmotto"]=$row->schoolmotto;
            $record["email"]=$row->email;
            $record["address"]=$row->address;
            $record["nigeirastates"]=$row->nigeirastates;
            $record["city"]=$row->city;
            $record["majorcolour"]=$row->majorcolour;
            $record["minorcolour"]=$row->minorcolour;
            $record["phonenumber"]=$row->phonenumber;
        }else{
           $record["schoolname"]="";
            $record["schoolmotto"]="";
            $record["email"]="";
            $record["address"]="";
            $record["nigeirastates"]="";
            $record["city"]="";
            $record["majorcolour"]="";
            $record["minorcolour"]="";
            $record["phonenumber"]=""; 
        }
        return $record;
    }

    function setuptables() {
        
        $q = $this->db->query("SHOW TABLES LIKE 'admin' ");
        if ($q->num_rows() == 0) {
            $this->db->query("CREATE TABLE IF NOT EXISTS `admin` (
                            `id` int(5) NOT NULL AUTO_INCREMENT,
                            `username` varchar(50) NOT NULL,
                            `password` varchar(50) NOT NULL,
                            PRIMARY KEY (`id`)
                          )");

        $this->db->query("INSERT INTO `admin` (`id`, `username`, `password`) VALUES
                            (1, 'daniel', '0f281d173f0fdfdccccd7e5b8edc21f1'),
                            (2, 'david', 'dav123')");

        $this->db->query("CREATE TABLE IF NOT EXISTS `carousel` (
            `carouselid` int(3) NOT NULL AUTO_INCREMENT,
            `name` varchar(100) NOT NULL,
            `photo` varchar(200) NOT NULL,
            `heading` varchar(100) NOT NULL,
            `description` varchar(500) NOT NULL,
            `url` varchar(50) NOT NULL,
            `orientation` int(5) NOT NULL,
            `status` varchar(10) NOT NULL,
            `deleted` varchar(3) NOT NULL DEFAULT 'f',
            PRIMARY KEY (`carouselid`)
          )");

        $this->db->query("CREATE TABLE IF NOT EXISTS `menu` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `name` varchar(50) NOT NULL,
            `url` varchar(100) NOT NULL,
            `orientation` varchar(10) NOT NULL,
            `status` varchar(11) NOT NULL,
            `numbering` int(11) NOT NULL,
            `deleted` varchar(3) NOT NULL DEFAULT 'f',
            PRIMARY KEY (`id`)
          )");

        $this->db->query("CREATE TABLE IF NOT EXISTS `schoolinformation` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `schoolname` varchar(100) NOT NULL,
            `schoolmotto` varchar(1000) NOT NULL,
            `email` varchar(100) NOT NULL,
            `address` varchar(10000) NOT NULL,
            `postcode` varchar(100) NOT NULL,
            `city` varchar(50) NOT NULL,
            `majorcolour` varchar(50) NOT NULL,
            `minorcolour` varchar(50) NOT NULL,
            `phonenumber` varchar(20) NOT NULL,
            PRIMARY KEY (`id`)
          ) ");

        $this->db->query("CREATE TABLE IF NOT EXISTS `students` (
                                `id` int(5) NOT NULL AUTO_INCREMENT,
                                `surname` varchar(50) NOT NULL,
                                `firstname` varchar(50) NOT NULL,
                                `username` varchar(50) NOT NULL,
                                `password` varchar(50) NOT NULL,
                                `gender` varchar(10) NOT NULL,
                                `regdate` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
                                `deleted` varchar(3) NOT NULL DEFAULT 'f',
                                PRIMARY KEY (`id`)
                              )");
        }
        

        $q = $this->db->query("SHOW TABLES LIKE 'nigeirastates' ");
                if ($q->num_rows() == 0) {
                    $this->db->query("ALTER TABLE `schoolinformation` CHANGE `postcode` `nigeirastates` VARCHAR(50)");        
        
        $this->db->query("CREATE TABLE IF NOT EXISTS `nigeirastates` (
                            `id` int(11) NOT NULL,
                            `name` varchar(255) NOT NULL,
                            PRIMARY KEY (`id`)
                          )");

        $this->db->query("INSERT INTO `nigeirastates` (`id`, `name`) VALUES
                            (1, 'Abia'),
                            (2, 'Adamawa'),
                            (3, 'Akwa Ibom'),
                            (4, 'Anambra'),
                            (5, 'Bauchi'),
                            (6, 'Bayelsa'),
                            (7, 'Benue'),
                            (8, 'Borno'),
                            (9, 'Cross River'),
                            (10, 'Delta'),
                            (11, 'Ebonyi'),
                            (12, 'Edo'),
                            (13, 'Ekiti'),
                            (14, 'Enugu'),
                            (15, 'FCT'),
                            (16, 'Gombe'),
                            (17, 'Imo'),
                            (18, 'Jigawa'),
                            (19, 'Kaduna'),
                            (20, 'Kano'),
                            (21, 'Katsina'),
                            (22, 'Kebbi'),
                            (23, 'Kogi'),
                            (24, 'Kwara'),
                            (25, 'Lagos'),
                            (26, 'Nasarawa'),
                            (27, 'Niger'),
                            (28, 'Ogun'),
                            (29, 'Ondo'),
                            (30, 'Osun'),
                            (31, 'Oyo'),
                            (32, 'Plateau'),
                            (33, 'Rivers'),
                            (34, 'Sokoto'),
                            (35, 'Taraba'),
                            (36, 'Yobe'),
                            (37, 'Zamfara')");
                }
                 
         
    }

}
