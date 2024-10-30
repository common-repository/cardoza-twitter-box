<?php
function cardoza_twitter_box_options_page() {
    if (isset($_POST['frm_submit'])) {
        if (!empty($_POST['frm_title']))
            update_option('cardoza_tb_title', $_POST['frm_title']);
        if (!empty($_POST['frm_username']))
            update_option('cardoza_tb_username', $_POST['frm_username']);
        if (!empty($_POST['frm_user_widget_id']))
            update_option('cardoza_tb_user_widget_id', $_POST['frm_user_widget_id']);
        if (!empty($_POST['frm_width']))
            update_option('cardoza_tb_width', $_POST['frm_width']);
        if (!empty($_POST['frm_height']))
            update_option('cardoza_tb_height', $_POST['frm_height']);
        if (!empty($_POST['frm_links_color']))
            update_option('cardoza_tb_links_color', $_POST['frm_links_color']);
        if (!empty($_POST['frm_theme']))
            update_option('cardoza_tb_theme', $_POST['frm_theme']);
        ?>
        <?php
    }
    $option_value = ctb_retrieve_options();
    ?>
    <div class="wrap">
        <div class="row">
            <div class="col-sm-12">
                <h2><?php _e("Tweets Box Options", 'twittertweetbox'); ?></h2>
            </div>
        </div>
        <?php if (isset($_POST['frm_submit'])) :?>
            <div class="row" style="margin-top: 15px;">
                <div class="col-sm-12">
                    <p class="alert alert-success"><strong><?php _e('Options saved.', 'twittertweetbox'); ?></strong></p>
                </div>
            </div>
        <?php endif;?>
        <div class="panel panel-success">
            <div class="panel-heading">
                <label><?php _e('General Settings', 'twittertweetbox');?></label>
            </div>
            <form method="post" action="">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <label><?php _e('Title', 'twittertweetbox');?> (<?php _e('Title of the twitter box', 'twittertweetbox');?>)</label>
                            <input class="form-control" type="text" name="frm_title" size="50" value="<?php echo $option_value['ctb_title']; ?>"/>
                        </div>
                    </div>
                    <div class="row" style="margin-top :15px;">
                        <div class="col-sm-12">
                            <label><?php _e('Username', 'twittertweetbox');?> (<?php _e('Username of your twitter account', 'twittertweetbox');?>)</label>
                            <input class="form-control" type="text" name="frm_username" size="50" value="<?php echo $option_value['ctb_username']; ?>"/>
                        </div>
                    </div>
                    <div class="row" style="margin-top :15px;">
                        <div class="col-sm-12">
                            <label><?php _e('Width', 'twittertweetbox');?></label>
                            <input class="form-control" type="text" name="frm_width" size="20" value="<?php echo $option_value['ctb_width']; ?>"/>
                        </div>
                    </div>
                    <div class="row" style="margin-top :15px;">
                        <div class="col-sm-12">
                            <label><?php _e('Height', 'twittertweetbox');?></label>
                            <input class="form-control" type="text" name="frm_height" size="20" value="<?php echo $option_value['ctb_height']; ?>"/>
                        </div>
                    </div>
                    <div class="row" style="margin-top :15px;">
                        <div class="col-sm-12">
                            <label><?php _e('Theme', 'twittertweetbox');?></label>
                            <select class="form-control" name="frm_theme">
                                <option value="default" <?php if ($option_value['ctb_theme'] == "default") echo "selected='selected'"; ?>>
                                    <?php _e('default', 'twittertweetbox');?>
                                </option>
                                <option value="dark" <?php if ($option_value['ctb_theme'] == "dark") echo "selected='selected'"; ?>>
                                    <?php _e('dark', 'twittertweetbox');?>
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 15px">
                        <div class="col-sm-12">
                            <input class="btn btn-success" type="submit" name="frm_submit" value="<?php _e('Update Options', 'twittertweetbox');?>" />
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php
}
?>