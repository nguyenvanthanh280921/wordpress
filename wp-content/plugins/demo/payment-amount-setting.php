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
    .content {
        margin: 50px 0;
    }
    .inside-content{
        margin: 20px 0;
    }

</style>
<?php
if (isset($_POST['save-setting'])){
    $setting = $_POST('payment_amount');
    if (!empty(get_option('payment_amount'))){
        update_option('payment_amount', $setting);
    }else{
        add_option('payment_amount', $setting);
    }
}
$paypalpro = get_option('payment_amount');
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
                <a href="admin.php?page=demo_setting" class="nav-tab nav-tab-active">General Settings</a>
                <a href="./admin.php?page=demo_setting&tab=payment_setting" class="nav-tab nav-tab-active">Payment Amount</a>
            </h3>
        </div>
        <form action="" method="post">
            <div class="post-box-container column-1 normal">
                <div class="postbox">
                    <h2 class="hndle ui-sortable-handle"><span>Site Setting</span></h2>
                    <div class="inside">
                        <h4>Paypal Payment Pro Account</h4>
                        <div class="inside-content">
                            <label>Admin Paypal Acount</label>
                            <input  mame="payment_amount[paypal]" style="width: 50%" type="text" value="<?php echo !empty($paypalpro['paypal']) ? $paypalpro['paypal'] : ''?>" />
                        </div>
                        <div class="inside-content">
                            <label>API Username</label>
                            <input style="width: 50%" type="text" name="payment_amount[username]" value="<?php echo !empty($paypalpro['username']) ? $paypalpro['username'] : '' ?>"/>
                            <div
                        </div>
                        <div class="inside-content">
                            <label>API Password</label>
                            <input type="password" style="width: 50%;" name="payment_amount[password]" value="<?php echo !empty($paypalpro['password']) ? $paypalpro['password'] : ''?>" />
                        </div>
                        <div class="inside-content">
                            <label>API Signature</label>
                            <input type="password" style="width: 50%;" name="payment_amount[signature]" value="<?php echo !empty($paypalpro['signature']) ? $paypalpro['signature'] : '' ?>">
                        </div>
                        <div class="inside-content">
                            <label>Mode</label>
                            <select>
                                <option>sanbox</option>
                                <option>Live</option>
                            </select>
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