
<div class="wrap">
    <?php screen_icon(); ?>
    <h2><?php _e('WPBase Youtube Settings','wpby'); ?></h2>	
    
    <?php
    if (isset($_POST['wpby_apikey'])) { ?>
        <div id="message" class="updated">
            <p>
            Settings Updated.
            </p>
        </div>
    <?php } ?>
    
    
    <p>Some common settings for WPBase Youtube , in most cases these are not required to be changed.</p>
    <p style="color: #b94a48">
        To use please add [wpbase-youtube] shorttag in a page called videos , whose slug is also videos . Due to dynamic urls , it is fixed for videos page for now.    
    </p>
    
    <form method="post" action="">
        <table class="form-table">
            <tr>
                <th scope="row">
                    <label for="wpby_apikey"><?php _e('Youtube API Key','wpby'); ?></label>
                </th>
                <td>
                    <input type="text" name="wpby_apikey" id="wpby_apikey" value="<?php echo $wpby_apikey; ?>" class="regular-text">                  
                    <p class="description">
                        Youtube API key incase your site become very popular, and youtube asks for API key. Not needed in most cases.
                    </p>
                </td>
            </tr>
            
            <tr>
                
                 <th scope="row">
                    <label for="wpby_download"><?php _e('Download Options','wpby'); ?></label>
                </th>
                
                <td>
                    <?php 
                    $options=  array(0=>'Allow Download',1=>'Allow for Registered',2=>'No Download');
                    ?>
                    
                    <select name="wpby_download" id="wpby_download" >                  
                        <?php foreach ($options as $var=>$val) { ?>
                        <option value="<?php echo $var;?>" <?php echo ($var==$wpby_download)?'selected':''; ?> ><?php echo $val;?></option>
                        <?php } ?>                        
                    </select>
                    <p class="description">
                        Allow download for all users or registered users only ( requires vidfetch ) . 
                    </p>
                </td>
                
            </tr>
        </table>                
        <?php submit_button(); ?>
    </form>
</div>