<?php

class Loadpagemodel extends CI_Model {


    function getexhortation($id) {
        $query = $this->db->query("select * from exhortations where id=$id");
        $db_content = array();
        foreach ($query->result() as $row) {
            $timestamp=strtotime($row->date);
            $formattedDate=date('M d, Y', $timestamp);
            $db_content["title"] = $row->title;
            $db_content["author"] = $row->author;
            $db_content["date"] = $formattedDate;
            $db_content["summary"] = $row->summary;
            $db_content["info"] = $row->info;
            $db_content["photo"] = $row->photo;
        }
        return $db_content;
    }

    function getevent($id) {
        $query = $this->db->query("select * from events where id=$id");
        $db_content = array();
        foreach ($query->result() as $row) {
            $timestamp=strtotime($row->date);
            $formattedDate=date('M d, Y',$timestamp);
            $db_content["title"] = $row->title;
            $db_content["info"] = $row->info;
            $db_content["date"] = $formattedDate;
            $db_content["speaker"] = $row->speaker;
            $db_content["location"] = $row->location;
            $db_content["time"] = $row->time;
            $db_content["role"] = $row->role;
            $db_content["pic"] = $row->pic;
        }
        return $db_content;
    }
    function getvideo($id) {
        $query = $this->db->query("select * from videos where id=$id");
        $db_content = array();
        foreach ($query->result() as $row) {
            $db_content["topic"] = $row->topic;
            $db_content["speaker"] = $row->speaker;
            $db_content["summary"] = $row->summary;
            $db_content["date"] = $row->date;
            $db_content["pic"] = $row->pic;
            $db_content["date"] = $row->date;
            $db_content["link"] = $row->link;
        }
        return $db_content;
    }
   
    function pagination_next($id){
        $query=$this->db->query("select id from videos where deleted='f'");
        $ids=array();
        foreach($query->result() as $row){
            array_push($ids,$row->id);
        }
        $count=count($ids);
        if(in_array($id,$ids)){
            for($x=0;$x<=$count;$x++){
                if($id==$ids[$x]){
                    $x=$x+1;
                    break;
                }else{
                    continue;
                }

            }
        }else{
            $next="";
        }
        $next="";

        if($x>=$count){
            $next="";

        }else{
            $nextid=$ids[$x];
            $query1=$this->db->query("select * from videos where id='$nextid' and deleted='f' limit 1");
            if($query1->num_rows()>0){
            foreach($query1->result() as $row){
                $next.="<li class='d-flex align-items-center next'><a href='".base_url()."index.php/home/openvideodetail/$row->id' class='next'>$row->topic</a><span class='theme-bg-clr flex-all rounded-circle'><a class='flex-all' href='JavaScript:void(0)'><svg version='1.1' id='rightarrow' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px' viewBox='0 0 490.667 490.667' style='enable-background:new 0 0 490.667 490.667;' xml:space='preserve'> <g> <g> <path d='M466.201,237.781L231.534,3.115C229.55,1.131,226.841,0,224.003,0h-192c-4.309,0-8.213,2.603-9.856,6.592 s-0.725,8.555,2.304,11.627l227.136,227.115L24.451,472.448c-3.051,3.051-3.968,7.637-2.304,11.627 c1.664,3.989,5.547,6.592,9.856,6.592h192c2.837,0,5.547-1.131,7.552-3.115l234.667-234.667 C470.382,248.704,470.382,241.963,466.201,237.781z'/> </g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </svg></a></span></li>";
            }
        }else{
            $next.="";
        }
        }
        
       
        return $next;


    }
    
    function pagination_prev($id){
        $query=$this->db->query("select id from videos where deleted='f'");
        $ids=array();
        foreach($query->result() as $row){
            array_push($ids,$row->id);
        }
        $count=count($ids);
        $count=$count-1;
        //$length=count($ids);
        if(in_array($id,$ids)){
            for($x=$count;$x<=$count;$x--){
                if($id==$ids[$x]){
                    $x=$x-1;
                    break;
                }else{
                    continue;
                }

            }
        }else{
            $next="";
        }
        $next="";
        //$count++;

        if($x<0||$x>=$count){
            $next="";

        }else{
            $nextid=$ids[$x];
            $query1=$this->db->query("select * from videos where id='$nextid' and deleted='f' limit 1");
            if($query1->num_rows()>0){
            foreach($query1->result() as $row){
                $next.="<li class='d-flex align-items-center prev'><span class='theme-bg-clr flex-all rounded-circle'><a class='flex-all' href='JavaScript:void(0)'><svg version='1.1' id='leftarrow' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px' viewBox='0 0 556.424 556.424' style='enable-background:new 0 0 556.424 556.424;' xml:space='preserve'> <g> <g> <path d='M508.094,13.5C511.82,6.043,508.087,0,499.749,0c0,0-205.77,0-205.773,0c-19.045,0.006-44.079,38.363-56.512,52.262 C215.594,76.711,50.874,259.809,49.681,262.196c-3.727,7.458-3.727,19.544,0,27.001l222.456,253.726 c3.727,7.458,13.507,13.501,21.843,13.501h205.77c8.335,0,12.071-6.043,8.345-13.501L285.638,289.197 c-3.728-7.457-3.728-19.544,0-27.001L508.094,13.5z'/> </g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </svg></a></span><a href='".base_url()."index.php/home/openvideodetail/$row->id'>$row->topic</a></li>";
            }
        }else{
            $next.="";
        }
        }
        
       
        return $next;


    }

    function getmemories() {
        $query = $this->db->query("select * from gallery where deleted='f' order by id DESC");
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
        $query = $this->db->query("select * from exhortations where deleted='f' order by id DESC");
        $data="";
        foreach ($query->result() as $row) {
            $timestamp=strtotime($row->date);
            $formattedDate=date('M d, Y', $timestamp);
           $data.="<div class='col-lg-4 col-md-6 col-sm-12'>
           <div class='blog-meta aos-init aos-animate' data-aos='fade-up' data-aos-duration='700'>
         <figure>
                   <img class='img-fluid' src='".base_url()."images/$row->photo' alt='Blog image'>              
                   </figure>
                    <ul>
                   <li class='date'>$formattedDate</li>
                   <li>$row->author</li>

               </ul>
               <a href='".base_url()."index.php/home/openexhortation/$row->id' class='font-bold'>$row->title</a>
               <p>$row->summary</p>
           </div>
       </div>";
        }
      
        return $data;
    }

    function getrecentexhortations() {
        $query = $this->db->query("select * from exhortations where deleted='f' order by id DESC limit 3");
        $data="";
        foreach ($query->result() as $row) {
            $timestamp=strtotime($row->date);
            $formattedDate=date('M d, Y',$timestamp);
           $data.="<li class='d-flex align-items-center'>
           <img class='rounded-circle' src='".base_url()."images/$row->photo' alt='$row->title'>
           <div>
               <p class='post-date theme-bg-clr text-white font-bold d-inline-flex text-uppercase'>$formattedDate</p>
          <a href='".base_url()."index.php/home/openexhortation/$row->id' class='d-flex font-bold'>$row->title</a>
     </div>
       </li>";
        }
      
        return $data;
    }

    function getvideos() {
        $query = $this->db->query("select * from videos where deleted='f' order by id DESC");
        $data="";
        foreach ($query->result() as $row) {
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
                   <li><b>$row->date</b></li>
               </ul>
               <h3><a href='".base_url()."index.php/home/openvideodetail/$row->id'><b>$row->topic</b></a></h3>
               <p>$row->summary</p>
           </div>
       </div>";
        }      
        return $data;
    }


    function getpage() {
        $query = $this->db->query("select * from custompage where id=5");
        $db_content = array();
        foreach ($query->result() as $row) {
            $db_content["topic"] = $row->topic;
            $db_content["speaker"] = $row->speaker;
            $db_content["summary"] = $row->summary;
            $db_content["date"] = $row->date;
            $db_content["pic"] = $row->pic;
            $db_content["date"] = $row->date;
        }
        return $db_content;
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
                $data.='<li>
                <figure>
                    <img class="img-fluid w-100" style="height:200px;" src="'.base_url().'images/'.$row->banner.'" alt="Popular Blog Img One">
                </figure>
                <a class="font-bold" href="'.base_url().'index.php/home/page/'.$row->identifier.'">'.$row->name.'</a>
                <ul class="blog-meta d-flex">
                </ul>
            </li>';
             }

        }
        return $data;
    }


    
}

?>
