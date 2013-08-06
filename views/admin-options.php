<div class="wrap">
    <?php screen_icon(); ?>
    <h2><?php _e('WPBase Youtube Settings','wpbase'); ?></h2>	
    <p>Some common settings for WPBase Youtube , in most cases these are not required to be changed.</p>
    <form method="post" action="">
        <table class="form-table">
            <tr>
                <th scope="row">
                    <label for="wpby_apikey"><?php _e('Youtube API Key','wpbase'); ?></label>
                </th>
                <td>
                    <input type="text" name="wpby_apikey" id="wpby_apikey" value="<?php echo $wpby_apikey; ?>" class="regular-text">                  
                    <p class="description">
                        Youtube API key incase your site become very popular, and youtube asks for API key. Not needed in most cases.
                    </p>
                </td>
            </tr>
        </table>                
        <?php submit_button(); ?>
    </form>
</div>