<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcomemodel extends CI_Model {

    function setuptables() {
        $q=  $this->db->query("SHOW TABLES LIKE 'admin' ");
        if($q->num_rows()>0){
            return;
        }
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

 
}