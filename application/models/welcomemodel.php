<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Welcomemodel extends CI_Model
{

    function registerschoolinfo()
    {
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
        $this->db->insert("schoolinformation", $val);
        return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  School Information Updated Successfully ...
                </div>';
    }

    function socialmedia()
    {
        $val["twitter"] = $this->input->post("twitter");
        $val["facebook"] = $this->input->post("facebook");
        $val["instagram"] = $this->input->post("instagram");
        $this->db->query("truncate socialmedia");
        $this->db->insert("socialmedia", $val);
        return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Social Media Links Updated Successfully ...
                </div>';
    }

    function getnigeriastates()
    {
        $qq = $this->db->query("select * from nigeirastates order by name");
        $record = array();
        foreach ($qq->result() as $k) {
            $record[$k->name] = $k->name;
        }

        return $record;
    }

    function getmajorcolor()
    {
        $q = $this->db->query("select majorcolour from schoolinformation ");
        $color = "";
        foreach ($q->result() as $rows) {
            $color = $rows->majorcolour;
        }
        return $color;
    }

    function getsocialmedialinks()
    {
        $qq = $this->db->get("socialmedia");
        $record = array();
        if ($qq->num_rows() > 0) {
            $row = $qq->row();
            $record["twitter"] = $row->twitter;
            $record["facebook"] = $row->facebook;
            $record["instagram"] = $row->instagram;
        } else {
            $record["twitter"] = "";
            $record["facebook"] = "";
            $record["instagram"] = "";
        }
        return $record;
    }

    function getschoolinformation()
    {
        $qq = $this->db->get("schoolinformation");
        $record = array();
        if ($qq->num_rows() > 0) {
            $row = $qq->row();
            $record["schoolname"] = $row->schoolname;
            $record["schoolmotto"] = $row->schoolmotto;
            $record["email"] = $row->email;
            $record["address"] = $row->address;
            $record["nigeirastates"] = $row->nigeirastates;
            $record["city"] = $row->city;
            $record["majorcolour"] = $row->majorcolour;
            $record["minorcolour"] = $row->minorcolour;
            $record["phonenumber"] = $row->phonenumber;
        } else {
            $record["schoolname"] = "";
            $record["schoolmotto"] = "";
            $record["email"] = "";
            $record["address"] = "";
            $record["nigeirastates"] = "";
            $record["city"] = "";
            $record["majorcolour"] = "";
            $record["minorcolour"] = "";
            $record["phonenumber"] = "";
        }
        return $record;
    }

    function getnews()
    {
        $data = "";
        $query = $this->db->query("select * FROM news where deleted='f' order by date DESC LIMIT 3");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $result) {
                $news = substr($result->description, 0, 280);
                $data .= "<li class = 'clear'>
       <div class = 'imgl borderedbox' style='width:120px; height:100%;'><img src = 'images/$result->photo' alt = ''></div>
        <p class = 'nospace btmspace-15'><a href = 'index.php/academics/openwholenews/$result->id'>$result->name</a></p>
        <p>$news ...</a></p>
        </li >";
            }
        }
        return $data;
    }
    
    function getfullnews($id)
    {
        $data = "";
        $query = $this->db->query("select * FROM news where id= '$id'");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $result) {
                $news = substr($result->description, 0, 280);
                $data .= " <li class='one_half first' style='width:100%;'>
                <h2 style='text-align:center;'>$result->name</h2>
                <article><img class='borderedbox' style='width:100%; height:300px; padding:10px 20px;' src='".base_url()."/images/$result->photo' style='width:100%;padding:20px;' alt=''>
                    <h1 style='text-align:right;'>$result->date</h1>
                    <p style='padding:20px;'>$result->description</p>
                </article>
            </li>";
            }
        }
        return $data;
    }
    function getothernews($id){
        $data="";
        $query = $this->db->query("select * FROM news where not id= '$id' order by date DESC LIMIT 3");
        if($query->num_rows() > 0){
            $x=0;
            foreach($query->result() as $result ){
                $news = substr($result->description, 0, 100);
                if($x==0){
                    $data.="<li class='one_third first'>
                    <article><img class='borderedbox' style='width:450px; height:300px;' src='".base_url()."/images/$result->photo' alt='' >
                        <h2>$result->name</h2>
                        <p>$news ...</p>
                        <p class='right'><a href='#'>Read More Here &raquo;</a></p>
                    </article>
                </li>";
                }else{
                    $data.="<li class='one_third'>
                    <article><img class='borderedbox' style='width:450px; height:300px;' src='".base_url()."/images/$result->photo' alt=''>
                        <h2>$result->name</h2>
                        <p>$news ...</p>
                        <p class='right'><a href='#'>Read More Here &raquo;</a></p>
                    </article>
                </li>";
                }      
        $x++;
            }    
        }
        return $data;
    }

    function getnewsarchive()
    {
        $data = "";
        $query = $this->db->query("select * FROM news where deleted='f' order by date DESC");
        $x=0;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $result) {
                $news = substr($result->description, 0, 120);
                $name=strtoupper($result->name);
                if($x==0){
                    $data.="<li class='one_third first'>
                <article><img class='borderedbox' src='<?=base_url()?>/images/$result->photo' alt='' style='padding:5px; height:250px; width:200px;'>
                    <h1>$name</h1> 
                    <p>$news ...</p>
                    <p class='right'><a href='openwholenews/$result->id'>Read More Here &raquo;</a></p>
                </article>
            </li>";

                }else{
                    $data.="<li class='one_third'>
                <article><img class='borderedbox' src='../../images/$result->photo' alt='' style='padding:5px; height:250px; width:200px;'>
                    <h1>$name</h1> 
                    <p>$news ...</p>
                    <p class='right'><a href='openwholenews/$result->id'>Read More Here &raquo;</a></p>
                </article>
            </li>";

                }
            $x++;
            }
        }
        return $data;
    }


    function setuptables()
    {

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
