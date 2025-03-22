<div class="dropdown category-dropdown">
                                <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static" title="Browse Categories">
                                    Browse Categories
                                </a>

                                <div class="dropdown-menu">
                                    <nav class="side-nav">
                                        <ul class="menu-vertical sf-arrows">
                                        <?php 
                                    if(!$mainCategoriesDisplay){
                                        echo "";
                                    }else{
                                        foreach($mainCategoriesDisplay->result() as $category){
                                            echo "
                                             <li><a href='".base_url()."index.php/home/searchlist/$category->id'>$category->cat_name</a></li>
    
                                            ";
                                        }
                                    }
                                   ?>
                                           
                                        </ul><!-- End .menu-vertical -->
                                    </nav><!-- End .side-nav -->
                                </div><!-- End .dropdown-menu -->
                            </div>