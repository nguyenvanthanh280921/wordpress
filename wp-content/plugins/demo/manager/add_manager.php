<?php
if (!class_exists('WP_List_Table')) {
    require_once(ABSPATH . 'wp-admin/includes/class-wp-list-table.php');
}
global $wpdb;
$table_name = $wpdb->prefix . 'users';
if (isset($_POST['add'])) {
    $username = $_POST['user_login'] ?? '';
    $nice_name = $_POST['user_nicename'] ?? '';
    $user_email = $_POST['user_email'] ?? '';
    $user_registered = $_POST['user_registered'] ?? '';
    $user_url = $_POST['user_url'] ?? '';
    $user_password = $_POST['user_pass'] ?? '';
//        $sql = $wpdb->query("INSERT INTO $table_name(user_login,user_nicename,user_email,user_registered,user_url,user_pass)
//                                VALUES($username','$nice_name','$user_email','$user_registered','$user_url','$user_password')");
    //        echo "<script>location.replace(admin.php?page=example-wp-list_table.php)</script>";
    $sql = $wpdb->insert(
        $table_name,
        array(
            'user_login' => $username,
            'user_nicename' => $nice_name,
            'user_email' => $user_email,
            'user_registered' => $user_registered,
            'user_url' => $user_url,
            'user_pass' => $user_password
        )
    );
    if ($sql == true) {
        echo '<script>alert("Add User Successful")</script>';
    } else {
        echo '<script>alert("No Successful")</script>';
    }
}
add_action('admin_menu','add_user_data');
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
        <h1 id="add-new-user">Add New Users</h1>
        <div id="ajax-response"></div>
        <p>Create a brand new you and add them to this site.</p>
        <form action="" method="POST" name="createuser" id="createuser" class="validate" novalidate="novalidate">
            <input name="action" type="hidden" value="createuser"/>
            <input type="hidden" id="_wpnonce_create-user" name="_wpnonce_create-user" value="4a7caf2807" />
            <input type="hidden" name="_wp_http_referer"/>
            <table class="form-table" role="presentation">
                <tr class="form-field form-required">
                    <th scope="row">
                        <label for="user_login">User Name <span class="description">(required)</span></label>
                    </th>
                    <td><input name="user_login" type="text" id="name" value="" aria-required="true" autocapitalize="none" autocorrect="off" autocomplete="off" maxlength="60"  /></td>
                </tr>
                <tr class="form-field form-required">
                    <th scope="row">
                        <label for="user_nicename">Nice Name <span class="description">(required)</span></label>
                    </th>
                    <td><input name="user_nicename" type="text" id="nicenaem" value="" aria-required="true" autocapitalize="none" autocorrect="off" autocomplete="off" maxlength="60"  /></td>
                </tr>
                <tr class="form-field form-required">
                    <th scope="row">
                        <label for="user_email">User Email <span class="description">(required)</span></label>
                    </th>
                    <td><input name="user_email" type="text" id="email" value="" aria-required="true" autocapitalize="none" autocorrect="off" autocomplete="off" maxlength="60"  /></td>
                </tr>
                <tr class="form-field form-required">
                    <th scope="row">
                        <label for="user_registered">Date Created <span class="description">(required)</span></label>
                    </th>
                    <td><input name="user_registered" type="date" id="date" value="" aria-required="true" autocapitalize="none" autocorrect="off" autocomplete="off" maxlength="60"  /></td>
                </tr>
                <tr class="form-field form-required">
                    <th scope="row">
                        <label for="user_url">URL <span class="description">(required)</span></label>
                    </th>
                    <td><input name="user_url" type="text" id="url" value="" aria-required="true" autocapitalize="none" autocorrect="off" autocomplete="off" maxlength="60"  /></td>
                </tr>
                <tr class="form-field form-required user-pass1-wrap">
                    <th scope="row">
                        <label for="pass1">User Password<span class="description">(required)</span></label>
                    </th>
                    <td>
                        <input class="hidden" value=""/>
                        <div class="wp-pwd">
                            <span class="password-input-wrapper">
                                <input type="password" name="user_pass" id="pass1" class="regular-text" autocomplete="new-password" data-reveal="1" data-pw="ZqjWfyq9eKQf*ri9NIfcxoe5" aria-describedby="pass-strength-result" />
                            </span>
<!--                            <button type="button" class="button wp-hide-pw hide-if-no-js" data-toggle="0" aria-label="Hide password">-->
<!--                                <span class="dashicons dashicons-hidden" aria-hidden="true"></span>-->
<!--                                <span class="text">Hide</span>-->
<!--                            </button>-->
                            <div style="display:none" id="pass-strength-result" aria-live="polite"></div>
                        </div>
                    </td>
                </tr>
            </table>
            <p class="submit"><input type="submit" name="add" id="createusersub" class="button button-primary" value="Add New User"></p>
        </form>
    </div>
</div>

