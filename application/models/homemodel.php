<?php

class Homemodel extends CI_Model {


    function getpagemenu() {
        $q = $this->db->query("select * from menu where orientation='Main' and deleted='f' order by numbering");
        $menu = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $res) {
                $submenu = $this->getsubmenu($res->id);
                if (!$submenu) {
                    $menu.="<li ><a href='$res->url'>$res->name</a></li>";
                } else {
                    $menu.="<li class='menu-item-has-children' ><a class='drop' href='JavaScript:void(0)'>$res->name</a>" . $submenu . "</li>";
                }
            }
        }
        return $menu;
    }

    function getsubmenu($menuid) {
        $q = $this->db->query("select * from menu where orientation=$menuid and deleted='f' order by numbering");
        if ($q->num_rows() > 0) {
            $sublist = "<ul class='sub-menu'>";
            foreach ($q->result() as $sub) {
                $childmenu=$this->getchildmenu($sub->id);
                if(!$childmenu){
                    $sublist.="<li><a href='$sub->url'>$sub->name</a></li>";
                }else{
                 $sublist.="<li class='menu-item-has-children' ><a href='javacript:void(0)'>$sub->name</a>".$childmenu."</li>";

                }
            }
            $sublist.="</ul>";
            return $sublist;
        } else {
            return false;
        }
    }
    function getchildmenu($id){
        $q=$this->db->query("select * from menu where orientation=$id and deleted='f' order by numbering");
        if($q->num_rows()>0){
            $sublist="<ul class='sub-menu'>";
            ;
            foreach($q->result() as $row){
                $sublist.="<li><a href='$row->url'>$row->name</a></li>";

            }
            $sublist.="</ul>";
            return $sublist;


        }else{
            return false;

        }
    }

    
function getfavicon()
{
    $qq = $this->db->get("footer_bg");
    if ($qq->num_rows() > 0) {
        $row = $qq->row();
        $favicon = $row->photo;
       
    } else {
        $favicon = "";
       
    }
    return $favicon;
}

function getchurchinformation()
    {
        $qq = $this->db->get("about");
        $record = array();
        if ($qq->num_rows() > 0) {
            $row = $qq->row();
            $record["churchname"] = $row->name;
            $record["heading"] = $row->heading;
            $record["information"] = $row->information;
            $record["address"] = $row->address;
            $record["telephone"] = $row->telephone;
            $record["twitter"] = $row->twitter;
            $record["facebook"] = $row->facebook;
            $record["instagram"] = $row->instagram;
            $record["youtube"] = $row->youtube;
            $record["googlemap"] = $row->googlemap;
            $record["email"] = $row->email;
            $record["maj_color"] = $row->maj_color;
            $record["min_color"] = $row->min_color;
        } else {
            $record["name"] = "";
            $record["heading"] = "";
            $record["information"] = "";
            $record["address"] = "";
            $record["telephone"] = "";
            $record["twitter"] = "";
            $record["facebook"] = "";
            $record["instagram"] = "";
            $record["youtube"] = "";
            $record["googlemap"] = "";
            $record["email"] ="";
            $record["maj_color"] ="";
            $record["min_color"] ="";
        }
        return $record;
    }

    function getcarousel() {
        $query = $this->db->query("select * from carousels where deleted='f' ");
        $data="<div class='hero-one-slider'>";

        foreach ($query->result() as $row) {
           $data.="<div>
           <img src='".base_url()."images/$row->photo' alt='hero-one-slider'>
           <div class='hero-data text-center'>
               <h1 style='font-family:algeria; text-shadow: 2px 2px 4px #000000'>$row->header</h1>
               <p style='text-shadow: 2px 2px 4px #000000'>$row->text</p>
           </div>
       </div>";
        }
        $data.="</div>";
      
        return $data;
    }

    function getrecord() {
        $query = $this->db->query("select * from records where deleted='f' order by numbering limit 4");
        $data="<div class='row'>";
        foreach ($query->result() as $row) {
           $data.="<div class='col-lg-3 col-md-6 col-sm-12'>
                <div class='dg-counter text-center'>
               <h3 class='text-white'><span class='counter'>$row->value</span></h3>
              <p class='text-white mx-auto'>$row->record</p>
     </div>
       </div>";
        }
        $data.="</div>";
      
        return $data;
    }

    function gettestimonies() {
        $query = $this->db->query("select * from testimonies where deleted='f'");
        $data="<div class='row slider-church-prayers'>";
        foreach ($query->result() as $row) {
           $data.="<div class='col-lg-6 col-md-12 col-sm-12'>
           <div class='quotes'>
               <img src='".base_url()."images/$row->photo' alt='quotes'>
               <div>
                   <p class='font-bold'>“$row->testimony ”</p>
                   <h4 class='font-bold'>- $row->name</h4>
               </div>
           </div>
       </div>";
        }
        $data.="</div>";
      
        return $data;
    }
    function getprograms() {
        $query = $this->db->query("select * from services where deleted='f' limit 4");
        $data="";
        foreach ($query->result() as $row) {
           $data.="<div class='col-lg-4 col-md-6 col-sm-12' data-aos='fade-up' data-aos-delay='300' data-aos-duration='1000'>
           <div class='extras'>
               <div class='position-relative overflow-hidden'>
                   <img style='width:370px; height:270px;' class='img-fluid w-100' src='".base_url()."images/$row->pic' alt='$row->title'>
               </div>
               <a class='flex-all font-bold' href='JavaScript:void(0)'>$row->title</a>
               <p class='flex-all' href='JavaScript:void(0)'>$row->duration</p>
           </div>
       </div>";
        }      
        return $data;
    }

    function getvideos() {
        $query = $this->db->query("select * from videos where deleted='f' order by id DESC limit 3");
        $data="";
        foreach ($query->result() as $row) {
            $timestamp=strtotime($row->date);
            $formattedDate=date('M d, Y',$timestamp);
           $data.="<div class='sermon' data-aos='zoom-in-right' data-aos-duration='1000'>
          <div class='sermon-img'>
               <div class='sermon-media'>
               <img src='".base_url()."images/$row->pic' alt='Sermon Image 1'>
               $row->link 
               </div>
               
               <ul>
                   <li><a class='s_video' href='JavaScript:void(0)'><img src='".base_url()."assets/images/play-button-2.svg' alt='Play Button'></a></li>
               </ul>
           </div>
           <div class='sermon-data'>
               <ul>
                   <li><b>$row->speaker</b></li>
                   <li><b>$formattedDate</b></li>
               </ul>
               <h3><a href='".base_url()."index.php/home/openvideodetail/$row->id'><b>$row->topic</b></a></h3>
               <p>$row->summary</p>
           </div>
       </div>";
        }      
        return $data;
    }
    function getallvideos() {
        $query = $this->db->query("select * from videos where deleted='f' order by id DESC");
        $data="";
        foreach ($query->result() as $row) {
            $timestamp=strtotime($row->date);
            $formattedDate=date('M d, Y',$timestamp);
           $data.="<div class='sermon' data-aos='zoom-in-right' data-aos-duration='1000'>
          <div class='sermon-img'>
               <div class='sermon-media'>
               <img src='".base_url()."images/$row->pic' alt='Sermon Image 1'>
               $row->link 
               </div>
               <ul>
                   <li><a class='s_video' href='JavaScript:void(0)'><img src='".base_url()."assets/images/play-button-2.svg' alt='Play Button'></a></li>
               </ul>
           </div>
           <div class='sermon-data'>
               <ul>
                   <li><b>$row->speaker</b></li>
                   <li><b>$formattedDate</b></li>
               </ul>
               <h3><a href='".base_url()."index.php/home/openvideodetail/$row->id'><b>$row->topic</b></a></h3>
               <p>$row->summary</p>
           </div>
       </div>";
        }      
        return $data;
    }
    function getpage($id) {
        $query = $this->db->query("select * from custompage where identifier='$id' and deleted='f' limit 1");
        $db_content = array();
        foreach ($query->result() as $row) {
            $db_content["name"] = $row->name;
            $db_content["identifier"] = $row->identifier;
            $db_content["date"] = $row->date;
            $db_content["banner"] = $row->banner;
            $db_content["content"] = $row->content;
        }
        return $db_content;
    }
    function getminicarousel() {
        $query = $this->db->query("select * from mini_carousel where deleted='f' order by numbering");
        $data="";
        foreach ($query->result() as $row) {
           $data.="<div>
           <img style='width:auto;height:424px;' class='img-fluid w-100' src='".base_url()."/images/$row->photo' alt='About Image'>
          <div class='slider-data'>
               <h2 class='text-white'>$row->text</h2>
               <h3 class='text-white'>$row->label</h3>
           </div>
       </div>";
        }      
        return $data;
    }
    function gethomefaqs() {
        $query = $this->db->query("select * from church_faq where deleted='f' and identifier='General' order by numbering");
        $data="";
        foreach ($query->result() as $row) {
           $data.="<button class='collapsible' style='text-align:center;'>$row->question?</button>
           <div class='content'>
             <p style='text-align:center; color:white;'>$row->answer</p>
           </div>";
        }      
        return $data;
    }
    function getrequestforms() {
        $query = $this->db->query("select * from form where deleted='f'");
        $data="";
        foreach ($query->result() as $row) {
           $data.='<div class="col-lg-12 col-md-12">
           <div class="row">
 <button style="text-align:center;" class="collapsible"><b>'.$row->title.'</b></button>
  <div class="content">

       '.form_open("home/sendrequest").'
       <div class="container">
         <h2>'.$row->title.'</h2>
         <p>'.$row->about.'</p>
       </div>

       <div class="formcontainer" style="background-color:white">
       <p style="color:red;"><b>'.validation_errors().'</b></p>
       <input type="text" placeholder="First Name" value="'.set_value("fname","").'" name="fname" required data-aos="fade-up" data-aos-delay="100" data-aos-duration="400">
       <input type="text" placeholder="Last Name" value="'.set_value("lname","").'" name="lname" required data-aos="fade-up" data-aos-delay="100" data-aos-duration="500">
       <input type="text" placeholder="Phone" name="phone" value="'.set_value("phone","").'" required data-aos="fade-up" data-aos-delay="400"data-aos-duration="700">
        <input type="text" placeholder="Email address" name="email" value="'.set_value("email","").'" required data-aos="fade-up" data-aos-delay="400"data-aos-duration="700">
        <textarea placeholder="Please Briefly Describe Your Request" value="'.set_value("request","").'" required data-aos="fade-up" data-aos-delay="400"data-aos-duration="700" name="request" ></textarea>
       <input type="hidden" name="id" value="'.$row->id.'" required>
       </div>

       <div class="formcontainer">
         <input type="submit" value="Submit">
       </div>
       '.form_close().'
  </div>
 </div>
           
       </div>';
        }      
        return $data;
    }
    function getspecificfaqs($id) {
        $query = $this->db->query("select * from church_faq where deleted='f' and identifier='$id' order by numbering");
        if($query->num_rows()>0){
            $data="<section class='gap'>
            <div class='container'>
                <div class='row'>
                <div class='heading'>
                <img src='".base_url()."images/event.svg' alt='Heading Image'>
                    <h1>FAQs</h2>
                    <br>
                </div>";

            foreach ($query->result() as $row) {
                $data.="<button class='collapsible'>$row->question?</button>
                <div class='content'>
                  <p>$row->answer</p>
                </div>";
             } 
             $data.="</div>
             </div>
             </section>";    
            }
            else{
                $data="";
                
            
        }
        return $data;

       
    }
    function getrandomphotos() {
        $query = $this->db->query("select id from gallery where deleted='f'");
        $data="";
        $ids=array();
        foreach ($query->result() as $row) {
           array_push($ids,$row->id);
        }
        $random_keys=array_rand($ids,2);
        for($x=0;$x<=1;$x++){
            $id=$ids[$random_keys[$x]];
            $query1=$this->db->query("select * from gallery where id='$id'");
            foreach ($query1->result() as $row) {
                $data.="<figure>
                <img src='".base_url()."/images/$row->name' alt='$row->caption'>
                <a data-fancybox='gallery' href='".base_url()."images/$row->name'>
                <img src='".base_url()."assets/images/plus.svg' alt='Plus'></a>
         </figure>";
             }

        }
        return $data;
    }
    function getrandompage() {
        $query = $this->db->query("select id from custompage where deleted='f'");
        $data="";
        $ids=array();
        foreach ($query->result() as $row) {
           array_push($ids,$row->id);
        }
        $random_keys=array_rand($ids,3);
        for($x=0;$x<=2;$x++){
            $id=$ids[$random_keys[$x]];
            $query1=$this->db->query("select * from custompage where id='$id'");
            foreach ($query1->result() as $row) {
                $data.="<div class='col-lg-4 col-md-6 col-sm-12'>
                <div class='gallery'>
                    <figure style='width:350px; height:400px;'>
                        <img src='".base_url()."images/$row->banner' alt='$row->name'>
                        <a style='text-shadow: 2px 2px 4px #000000' href='".base_url()."index.php/home/page/$row->identifier'><h2 class='text-white'>$row->name</h2><img src='".base_url()."assets/images/plus.svg' alt='Plus'></a>
                    </figure>
                </div>
            </div>";
             }

        }
        return $data;
    }

    
    function getmemories() {
        $query = $this->db->query("select * from gallery where deleted='f' order by id DESC limit 6");
        $place1=0;
        $place2=0;
        $place3=0;
        $place4=0;
        $place5=0;
        $place6=0;
        $data="";        
        foreach ($query->result() as $row) {
          if($place6>0){
	$data.="<div class='row'><div class='col-lg-6 col-md-12'>
    <div class='row'>
        <div class='col-lg-6 col-md-6 col-sm-12'>
            <div class='gallery'>
                <figure>
                    <img style='width:270px;height:280px;' src='".base_url()."images/$row->name' alt='$row->caption'>
                    <a data-fancybox='gallery' href='".base_url()."images/$row->name'><img src='".base_url()."assets/images/plus.svg' alt='Plus'></a>
                </figure>
            </div>
        </div>";
	$place1=1;
	$place2=0;
	$place3=0;
	$place4=0;
	$place5=0;
	$place6=0;
    "href='".base_url()."images/$row->name";
}else{
	if($place1==0){
		$data.="<div class='row'><div class='col-lg-6 col-md-12'>
        <div class='row'>
            <div class='col-lg-6 col-md-6 col-sm-12'>
                <div class='gallery'>
                    <figure>
                        <img style='width:270px;height:280px;' src='".base_url()."images/$row->name' alt='$row->caption'>
                        <a data-fancybox='gallery' href='".base_url()."images/$row->name'><img src='".base_url()."assets/images/plus.svg' alt='Plus'></a>
                    </figure>
                </div>
            </div>";
		$place1++;
	}else{
		if($place2<$place1){
			$data.="<div class='col-lg-6 col-md-6 col-sm-12'>
            <div class='gallery'>
                <figure>
                    <img style='width:270px;height:280px;' src='".base_url()."images/$row->name' alt='$row->caption'>
                    <a data-fancybox='gallery' href='".base_url()."images/$row->name'><img src='".base_url()."assets/images/plus.svg' alt='Plus'></a>
                </figure>
            </div>
        </div>";
			$place2++;
		}else{
			if($place3<$place2){
				$data.="</div>
                <div class='gallery'>
                    <figure>
                        <img style='width:570px;height:590px;' src='".base_url()."images/$row->name' alt='$row->caption'>
                        <a data-fancybox='gallery' href='".base_url()."images/$row->name'><img src='".base_url()."assets/images/plus.svg' alt='Plus'></a>
                    </figure>";
				$place3++;
			}else{
				if($place4<$place3){
					$data.="</div>
                    </div>
                    <div class='col-lg-6 col-md-12'>
                        <div class='gallery'>
                            <figure>
                                <img style='width:570px;height:590px;' src='".base_url()."images/$row->name' alt='$row->caption'>
                                <a data-fancybox='gallery' href='".base_url()."images/$row->name'><img src='".base_url()."assets/images/plus.svg' alt='Plus'></a>
                            </figure>";
					$place4++;
				}else{
					if($place5<$place4){
						$data.="</div>
                        <div class='row'>
                            <div class='col-lg-6 col-md-6 col-sm-12'>
                                <div class='gallery'>
                                    <figure>
                                        <img style='width:270px;height:280px;' src='".base_url()."images/$row->name' alt='$row->caption'>
                                        <a data-fancybox='gallery' href='".base_url()."images/$row->name'><img src='".base_url()."assets/images/plus.svg' alt='Plus'></a>
                                    </figure>
                                </div>";
						$place5++;
					}else{
						if($place6<$place5){
							$data.="</div>
                            <div class='col-lg-6 col-md-6 col-sm-12'>
                                <div class='gallery'>
                                    <figure>
                                        <img style='width:270px;height:280px;' src='".base_url()."images/$row->name' alt='$row->caption'>
                                        <a data-fancybox='gallery' href='".base_url()."images/$row->name'><img src='".base_url()."assets/images/plus.svg' alt='Plus'></a>
                                    </figure>
                                </div>
                            </div></div></div></div>";
							$place6++;
						}
					}
				}
			}
		}
		
	}
	
}

        }
      
        return $data;
    }




    function getexhortations() {
        $query = $this->db->query("select * from exhortations where deleted='f' order by id DESC limit 3");
        $data="";
        foreach ($query->result() as $row) {
            $timestamp=strtotime($row->date);
            $formattedDate=date('M d, Y',$timestamp);
           $data.="<div class='col-lg-4 col-md-6 col-sm-12'>
           <div class='blog-meta' data-aos='fade-up' data-aos-delay='400' data-aos-duration='600'>
               <figure>
                   <img class='img-fluid' src='".base_url()."images/$row->photo' alt='$row->title'>
                 </figure>
               <ul>
                   <li class='date'>$formattedDate</li>
                   <li>$row->author</li>
               </ul>
               <a href='index.php/home/openexhortation/$row->id' class='font-bold'>$row->title</a>
               <p>$row->summary</p>
           </div>
       </div>";
        }
      
        return $data;
    }
    function getaudio(){
        $query=$this->db->query("select * from audio where deleted='f'");
        $data="";
        foreach($query->result() as $row){
            $data.='<div class="col-lg-4 col-md-6 col-sm-12">
            <p class="font-bold" style="text-align:center;">'.$row->title.'</p>
          <audio controls muted>
        <source src="'.base_url().'/images/'.$row->audioname.'" type="audio/ogg">
        <source src="'.base_url().'/images/'.$row->audioname.'" type="audio/mpeg">
      Your browser does not support the audio element.
      </audio>
      </div>';

        }
        return $data;
    }
    function getprayerresources() {
        $query = $this->db->query("select * from prayer_resources where deleted='f' order by id DESC limit 3");
        $data="";
        foreach ($query->result() as $row) {
           $data.='
           <h3 style="text-align:center;">'.$row->title.'</h3>
           <a class="btn" style="width:100%" href="'.base_url().'/images/'.$row->document.'"><i class="fa fa-download"></i> Download</a><br><br>';
        }
      
        return $data;
    }


    function getevents() {
        $query = $this->db->query("select * from events where deleted='f' order by id DESC limit 3");
        $data="";
        foreach ($query->result() as $row) {
            $timestamp=strtotime($row->date);
            $formattedDate=date('M d, Y',$timestamp);
           $data.="<div class='col-lg-4 col-md-6 col-sm-12'>
           <div class='event'>
               <figure>
                   <img src='".base_url()."images/$row->pic' alt='event one'>
               </figure>
               <div class='event-data light-bg col-lg-12'>
                   <p>$row->location</p>
                   <h4><a href='index.php/home/openeventdetail/$row->id'>$row->title</a></h4>
                   <ul>
                       <li><img src='".base_url()."assets/images/calendar.svg' alt='calendar'>$formattedDate</li>
                       <li><img src='".base_url()."assets/images/clock.svg' alt='clock'>$row->time</li>
                   </ul>
                   <a class='theme-btn' href='".base_url()."index.php/home/openeventdetail/$row->id'>Anticipate!</a>
               </div>
           </div>
       </div>";
        }
      
        return $data;
    }
    function getallevents() {
        $query = $this->db->query("select * from events where deleted='f' order by id DESC");
        $data="";
        foreach ($query->result() as $row) {
            $timestamp=strtotime($row->date);
            $formattedDate=date('M d, Y',$timestamp);
           $data.="<div class='col-lg-4 col-md-6 col-sm-12'>
           <div class='event'>
               <figure>
                   <img src='".base_url()."images/$row->pic' alt='event one'>
               </figure>
               <div class='event-data light-bg col-lg-12'>
                   <p>$row->location</p>
                   <h4><a href='index.php/home/openeventdetail/$row->id'>$row->title</a></h4>
                   <ul>
                       <li><img src='".base_url()."assets/images/calendar.svg' alt='calendar'>$formattedDate</li>
                       <li><img src='".base_url()."assets/images/clock.svg' alt='clock'>$row->time</li>
                   </ul>
                   <a class='theme-btn' href='".base_url()."index.php/home/openeventdetail/$row->id'>Anticipate!</a>
               </div>
           </div>
       </div>";
        }
      
        return $data;
    }
    function getleaders(){
        $query=$this->db->query("select * from leaders where deleted='f'");
        $data="";
        foreach($query->result() as $row){
            $data.='<div class="col-lg-4 col-md-6 col-sm-12"><div class="flip-card">
            <div class="flip-card-inner">
              <div class="flip-card-front">
              <img src="'.base_url().'images/'.$row->photo.'" style="height:300px;width:300px;">
              </div>
              <div class="flip-card-back">
                <h1 class="text-white">'.$row->name.'</h1> 
                <p class="text-white">'.$row->position.'</p> 
                <p class="text-white">'.$row->about.'</p>
              </div>
            </div>
          </div><br><br>
          </div>';
        }
        return $data;
    }

    function getparishes() {
        $color_query=$this->db->get("about");
        foreach($color_query->result() as $row){
            $color=$row->maj_color;
        }
        
        $query = $this->db->query("select * from quicklinks where deleted='f'");
        $data="";
        foreach ($query->result() as $row) {
           $data.="<div class='col-lg-3 col-md-6 col-sm-12'>
           <li style='text-align:center;'>
           <h4 style='color:$color;'><b>$row->parish</b></h4>
               <p class='text-white'>$row->address</p>
           <p class='text-white'><span>Phone: </span>$row->phone</p>
           <p class='text-white'>$row->pic</p>
           </li>			
       </div><br><br>";
            }
      
        return $data;
    }
    function getcareers() {
        $query = $this->db->query("select * from careers where deleted='f'");
        $data="";
        foreach ($query->result() as $row) {
           $data.='<div class="col-lg-4 col-md-6 col-sm-12">
           <br><br>
               <div class="card">
                   <h1>'.$row->title.'</h1>
                   <br>
                   <p class=""><img src=" '.base_url().'images/location.svg" alt="Sddress">'.$row->location.'</p>
                   <p></p>
                   <br>
                   <p class="description"><a href='.base_url().'index.php/home/careerpage/'.$row->id.'>See Description</a></p>
               </div>
           </div>';
            }
      
        return $data;
    }
    function getcareer($id) {
        $query = $this->db->query("select * from careers where id=$id");
        $db_content = array();
        foreach ($query->result() as $row) {
            $db_content["title"] = $row->title;
            $db_content["location"] = $row->location;
            $db_content["description"] = $row->description;
        }



        return $db_content;
    }




    function getdonateitems()
    {
        $qq = $this->db->get("donate");
        if ($qq->num_rows() > 0) {
            $row = $qq->row();
            $record["photo"] = $row->photo;
            $record["heading"] = $row->heading;
            $record["information"] = $row->information;
            $record["button"] = $row->button_info;
           
        } else {
            $record["photo"] = "";
            $record["heading"] = "";
            $record["information"] = "";
            $record["button_info"] = "";
           
        }
        return $record;
    }
    function uploademail($val) {
        if ($this->db->insert("newsletter", $val)) {
            return 'Email Subscription Successful';
        } else {
            return 'Error Subscribing, Try Again';
        }
    }
    function getupcomingevent(){
    
    
    }
    function insertmessage($message) {
        if ($this->db->insert("messages", $message)) {
            return '<p>
                  Thank You For Contacting Us '.$message["name"].', We will get back to you as soon as possible...
                </p>';
        } else {
            return '<p>Error Contacting Us,Please try again ...
                </p>';
        }
    }
    function getcategory($id) {
        $query = $this->db->query("select title from form where id=$id");
        $db_content = array();
        foreach ($query->result() as $row) {
            $title= $row->title;
          
        }



        return $title;
    }

    function insertrequest($request) {
        if ($this->db->insert("requests", $request)) {
            return 'alert("Your Request Has been sent succssfully. We will get back to you as soon as possible")';
        } else {
            return 'alert("Error Sending Request, Try Again")';
        }
    }


}

?>
