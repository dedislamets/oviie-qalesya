<!-- <ul class="sidebar-nav">
    <li class="">
        <a class="" href="#sidebar-product" data-toggle="collapse" data-parent="#sidebar" aria-expanded="true">
            <i class="sidebar-icon typography-icon"></i>
            <span class="icon">Master</span>
            <i class="toggle fa fa-angle-down"></i>
        </a>
        <ul id="sidebar-product" class="collapse" style="">
            <li class="" style="margin:0">
                <a href="<?= base_url() ?>barang">
                    <i class="sidebar-icon typography-icon"></i>
                    <span class="icon">Barang</span>
                </a>
            </li>
            <li class="">
                <a href="<?= base_url() ?>users">
                    <i class="sidebar-icon account-icon"></i>
                    <span class="icon">User</span>
                </a>
            </li>
            <li class="">
                <a href="<?= base_url() ?>members">
                    <i class="sidebar-icon ui-elements"></i>
                    <span class="icon">Members</span>
                </a>
            </li>
        </ul>
    </li>
    
</ul> -->
<? 
// print("<pre>".print_r(menu(),true)."</pre>");exit();

foreach (menu() as $key => $value) { 

        echo '<h5 class="sidebar-nav-title">'. $key .'</h5>';
        foreach ($value as $key_parent => $value_parent) { 
            echo '  <ul class="sidebar-nav">';
            if(count($value_parent['child']) > 0){
                if($value_parent['data'][0]['aktif'] > 0){
                    echo '<li class="">
                            <a class="" href="#sidebar-product" data-toggle="collapse" data-parent="#sidebar" aria-expanded="true">
                                <i class="sidebar-icon '. $value_parent['data'][0]['icon'] .'"></i>
                                <span class="icon">'. $key_parent .'</span>
                                <i class="toggle fa fa-angle-down"></i>
                            </a>';

                            echo '  <ul id="sidebar-product" class="collapse" style="">';
                            foreach ($value_parent['child'] as $key_child => $value_child) { 

                                echo '  
                                        <li class="" style="margin:0">
                                            <a href="'. base_url(). $value_child['link'] .'">
                                                <span class="icon">'. $value_child['menu'] .'</span>
                                            </a>
                                        </li>';
                                            
                            }
                            echo '  </ul>';

                    echo '</li>';
                }
            }else{
                if($value_parent['data'][0]['aktif'] > 0){
                    echo '  
                            <li class="">
                                <a href="'. ($value_parent['data'][0]['link'] == "/" ? base_url() : base_url() . $value_parent['data'][0]['link']) .'">
                                    <i class="sidebar-icon '. $value_parent['data'][0]['icon'] .'"></i>
                                    <span class="icon">'. $key_parent .'</span>
                                </a>
                            </li>';
                }
                
            }
        }
        echo '</ul>';
 } ?>

    