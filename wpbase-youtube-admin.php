<<<<<<< HEAD
<?php

function wpbyOptions() {
    
    $data = array();
    
    if(isset($_POST['submit'])) {
        update_option('wpby_apikey',$_POST['wpby_apikey']);
    } 
    
    $data['wpby_apikey'] = get_option('wpby_apikey');
    
    
    echo wpbyView('admin-options',$data);
}

function wpbySettings() {    
    
    register_setting('wpbase-youtube','wpby_apikey');
    register_setting('wpbase-youtube','wpby_download');
    
}
function wpbyOptionsMenu() {
    add_options_page("WPBase Youtube", "WPBase Youtube",1,'wpbase-youtube','wpbyOptions');                        
=======
<?php

function wpbyOptions() {
    
    $data = array();
    
    if(isset($_POST['submit'])) {
        update_option('wpby_apikey',$_POST['wpby_apikey']);
    } 
    
    $data['wpby_apikey'] = get_option('wpby_apikey');
    
    
    echo wpbyView('admin-options',$data);
}

function wpbySettings() {    
    
    register_setting('wpbase-youtube','wpby_apikey');
    register_setting('wpbase-youtube','wpby_download');
    
}
function wpbyOptionsMenu() {
    add_options_page("WPBase Youtube", "WPBase Youtube",1,'wpbase-youtube','wpbyOptions');                        
>>>>>>> origin/master
}