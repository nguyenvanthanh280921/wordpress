<style>
    .postbox{
        padding: 5px 10px;
        margin: 15px 0px;
    }
    .postbox label{
        font-weight: bold;
        min-width: 200px;
        display: inline-block
    }
    .row{
        margin: 15px 0;
    }
    .row textarea{
        width: 100%;
        height: 50px ;
        margin:10px 0;
    }

</style>
<?php
    $page = $_GET['page'];
    if(isset($_POST['save-setting'])){
        $setting = $_POST['demo_setting'];
        if(!empty(get_option('demo_setting'))){
            update_option('demo_setting', $setting);
        }else{
            add_option('demo_setting', $setting);
        }

    }
    $options = get_option('demo_setting');
?>
<div id="wpbody-content">
    <div class='update-nag notice notice-warning inline'>
        <a href="https://wordpress.org/support/wordpress-version/version-6-0-1/">WordPress 6.0.1</a>
        is available!
        <a href="https://staging-jessup.ilsa.org/wp-admin/update-core.php" aria-label="Please update WordPress now">Please update now</a>.
    </div>
    <div class="error wppb-serial-notification" >
        <p>Your <strong>Profile Builder</strong> license has expired. <br/>Please
            <a href='https://www.cozmoslabs.com/account/?utm_source=PB&utm_medium=dashboard&utm_campaign=PB-Renewal' target='_blank'>Renew Your Licence</a>
            to continue receiving access to product downloads, automatic updates and support.
            <a href='https://www.cozmoslabs.com/account/?utm_source=PB&utm_medium=dashboard&utm_campaign=PB-Renewal' target='_blank' class='button-primary'>Renew now </a>
            <a href='/wp-admin/admin.php?page=ilsas-settings&#038;wppb_expired_dismiss_notification=0' class='wppb-dismiss-notification'>Dismiss</a>
        </p>
    </div>
<div class="wrap">
    <h1>Demo Settings</h1>
    <div id="poststuff">
        <h3 class="nav-tab-wrapper">
            <a href="" class="nav-tab nav-tab-active">General Settings</a>
            <a href="./admin.php?page=demo_setting&tab=payment_setting" class="nav-tab nav-tab-active">Payment Amount</a>
        </h3>
    </div>
    <form action="" method="post">
        <div class="post-box-container column-1 normal">
            <div class="postbox">
                <h2 class="hndle ui-sortable-handle"><span>Site Setting</span></h2>
                <div class="inside">
                    <div class="inside-content">
                        <div class="row">
                            <lable>Test Mode</lable>
                            <?php echo !empty($options['test_mode']) ? $options['test_mode'] : ''?>
                            <select name="demo_setting[test_mode]">
                                <option value="sandbox" <?php if ($options['test_mode'] == 'sandbox') echo 'selected'; ?>>Sandbox</option>
                                <option value="live" <?php if ($options['test_mode'] == 'live') echo 'selected'; ?>>Live</option>
                            </select>
                        </div>
                        <div class="row">
                            <label>Domain For Testing 1</label>
                            <input style="width: 70%" type="text" name="demo_setting[test_mode1]" value="<?php echo !empty($options['test_mode1']) ? $options['test_mode1'] : '' ?>" />
                        </div>
                        <div class="row">
                            <label>Domain For Testing 2</label>
                            <input style="width: 70%" type="text" name="demo_setting[test_mode2]" value="<?php echo !empty($options['test_mode2']) ? $options['test_mode2'] : '' ?>" />
                        </div>
                        <div class="row">
                            <label>Domain For Testing 3</label>
                            <input style="width: 70%" type="text" name="demo_setting[test_mode3]" value="<?php echo !empty($options['test_mode3']) ? $options['test_mode3'] : '' ?>" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="postbox">
                <h2>Payment Deadline</h2>
                <div class="inside">
                    <div class="inside-content">
                        <div class="row">
                            <label>The payment deadline</label>
                            <input type="date" name="demo_setting[date]" value="<?php echo !empty($options['date']) ? $options['date'] : '' ?>" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="post-box-container column-2 side">
            <div class="inside">
                <input type="submit" name="save-setting" value="Save Changes" class="button button-primary button-large mustache-save" />
            </div>
        </div>
    </form>
</div>