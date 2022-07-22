<!DOCTYPE html>
<html class="wp-toolbar"
      lang="en-US">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Jessups Manager &lsaquo; International Law Students Association &#8212; WordPress</title>
    <link rel='stylesheet' id='ilsas-admin-style-css'  href='https://staging-jessup.ilsa.org/wp-content/plugins/ilsas/assets/admins/css/app.css?ver=1658384978' media='all' />
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
</head>
<body class="wp-admin wp-core-ui no-js role-administrator ilsa_page_ilsas-jessups auto-fold admin-bar branch-5-7 version-5-7-2 admin-color-fresh locale-en-us no-customize-support no-svg">
    <div id="wpbody" role="main">
        <div id="wpbody-content">
            <div class='update-nag notice notice-warning inline'>
                <a href="https://wordpress.org/support/wordpress-version/version-6-0-1/">WordPress 6.0.1</a> is available!
                <a href="https://staging-jessup.ilsa.org/wp-admin/update-core.php" aria-label="Please update WordPress now">Please update now</a>.
            </div>
            <div class="error wppb-serial-notification" >
                <p>Your <strong>Profile Builder</strong> license has expired. <br/>Please
                    <a href='https://www.cozmoslabs.com/account/?utm_source=PB&utm_medium=dashboard&utm_campaign=PB-Renewal' target='_blank'>Renew Your Licence</a> to continue receiving access to product downloads, automatic updates and support.
                    <a href='https://www.cozmoslabs.com/account/?utm_source=PB&utm_medium=dashboard&utm_campaign=PB-Renewal' target='_blank' class='button-primary'>Renew now </a>
                    <a href='/wp-admin/admin.php?page=ilsas-jessups&#038;view=detail&#038;edit_user=3122&#038;wppb_expired_dismiss_notification=0' class='wppb-dismiss-notification'>Dismiss</a>
                </p>
            </div>

            <?php
                $userId = $_GET['get_id'];
                global $wpdb;
                $table_name = $wpdb->prefix. 'users';
                $userInfo = $wpdb->get_results("SELECT ID,user_login,user_email,user_registered,user_url,user_pass from $table_name where ID=$userId");
                echo $userInfo[0]->ID;

                if(isset($_POST['upd'])) {
                    global $wpdb;
                    $table_name=$wpdb->prefix.'users';
                    $id=$_POST['ID'];
                    $nm=$_POST['user_login'];
                    $ad=$_POST['user_email'];
                    $d=$_POST['user_registered'];
                    $m=$_POST['user_url'];
                    $p=$_POST['user_pass'];
                    $wpdb->update(
                        $table_name,
                        array(
                            'user_login'=>$nm,
                            'user_email'=>$ad,
                            'user_registered'=>$d,
                            'user_url'=>$m,
                            'user_pass' =>$p
                        ),
                        array(
                            'ID'=>$id
                        )
                    );
                    $url=admin_url('admin.php?page=list-settings');
                    header("http://localhost/project-wordpress/wordpress/wp-admin/admin.php?page=list-settings");
                }
            ?>
            <div class="wrap">
                <h2>Jessup Detail</h2>
                <div class="content-wrap content-jessup-detail">
                    <div class="col-2">
                        <h2>User detail</h2>
                        <div class="content-user-detail">
                            <form action="" enctype="multipart/form-data" method="post" id="wppb-edit-user-team-profile" class="wppb-user-forms wppb-edit-user wppb-user-role-administrator">
                                <ul>
                                    <li class="wppb-form-field wppb-heading" id="wppb-form-element-145">
                                        <h4 class="extra_field_heading">Team Contact Information</h4>
                                        <span class="wppb-description-delimiter">Please include the contact information for the individual who will serve as the primary contact for your team throughout the Jessup Competition. We recommended that the Team Contact be a team member, advisor, or someone else closely connected to the team</span></li><li class="wppb-form-field wppb-select" id="wppb-form-element-146">
                                        <label for="team_title">ID<span class="wppb-required" title="This field is required">*</span></label>
                                        <input class="text-input default_field_firstname " name="ID" maxlength="70" value="<?php echo $userInfo[0]->ID ?? '' ?>" type="text"  id="first_name"  required  />
                                    </li>
                                    <li class="wppb-form-field wppb-default-first-name" id="wppb-form-element-3">
                                        <label for="first_name">User Name<span class="wppb-required"  title="This field is required">*</span></label>
                                        <input class="text-input default_field_firstname " name="user_login" maxlength="70" value="<?php echo $userInfo[0]->user_login ?? '';?>" type="text" id="first_name"  required  />
                                    </li>
                                    <li class="wppb-form-field wppb-default-last-name" id="wppb-form-element-4">
                                        <label for="last_name">User Email<span class="wppb-required" title="This field is required">*</span></label>
                                        <input class="text-input default_field_lastname " name="user_email" maxlength="70" value="<?php echo $userInfo[0]->user_email?>" type="text" id="last_name" required />
                                    </li>
                                    <li class="wppb-form-field wppb-default-e-mail" id="wppb-form-element-8">
                                        <label for="date">Date Created<span class="wppb-required" title="This field is required">*</span></label>
                                        <input class="text-input default_field_email " name="user_registered" maxlength="70" type="text" value="<?php echo $userInfo[0]->user_registered?>" id="email" required  />
                                    </li>
                                    <li class="wppb-form-field wppb-email-confirmation" id="wppb-form-element-63">
                                        <label for="wppb_email_confirmation">Url<span class="wppb-required" title="This field is required">*</span></label>
                                        <input class="extra_field_email_confirmation" name="user_url" value="<?php echo $userInfo[0]->user_url?>" type="text" id="wppb_email_confirmation" required />
                                    </li>
<!--                                    <li class="wppb-form-field wppb-number" id="wppb-form-element-147">-->
<!--                                        <label for="phone_country_area2">Phone (Include country and area code)<span class="wppb-required" title="This field is required">*</span></label>-->
<!--                                        <input class="extra_field_number " name="phone_country_area2" maxlength="70" step="any" type="number" min="" max="" id="phone_country_area2" required />-->
<!--                                    </li>-->
                                    <li class="wppb-form-field wppb-default-password" id="wppb-form-element-15">
                                        <label for="passw1">Password<span class="wppb-required" title="This field is required">*</span></label>
                                        <input class="text-input " name="user_pass" maxlength="70" type="password" id="passw1" value="<?php echo $userInfo[0]->user_pass ?? ''; ?>" autocomplete="off" />
                                        <span class="wppb-description-delimiter">Type your password. Minimum length of 11 characters. <br>The password must have a minimum strength of Strong</span>
                                        <span id="pass-strength-result">Strength indicator</span>
                                        <input type="hidden" value="" name="wppb_password_strength" id="wppb_password_strength"/>
                                    </li>
                                    <li class="wppb-form-field wppb-default-repeat-password" id="wppb-form-element-16">
                                    <input name="upd" type="submit" id="edit_profile" class="submit button" value="Update">
                            </form>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="payment">
                            <h2>Payment detail</h2>
                            <div class="content-payment">
                                <label for="">Status</label>
                                <i class="loader"></i>
                                <select class="change-payment" data-user-id="3122">
                                    <option value="paid" selected>Paid</option><option value="unpaid">Unpaid</option>					</select>
                                <a title="View Receipt" href="https://staging-jessup.ilsa.org/wp-admin/admin.php?page=ilsas-jessups&view=detail&id=3122&download_pdf=aWxzYV8zMTIy" class="button view-payment">View Receipt</a>
                            </div>
                            <h3>Team Members</h3>
                            <table class="wp-list-table widefat fixed striped">
                                <thead>
                                    <tr>
                                        <th class="text-center" width="30px">#</th>
                                        <th class="text-center">Title</th>
                                        <th class="text-center">First Name</th>
                                        <th class="text-center">Last Name</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center" style="width: 45px;">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="6">
                                            <a href="admin.php?page=add-settings" class="add-new-team-member">+ Add new Team
                                                Member
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script type='text/javascript'>
                /* <![CDATA[ */
                var _zxcvbnSettings = {"src":"https://staging-jessup.ilsa.org/wp-includes/js/zxcvbn.min.js"};
                /* ]]> */
            </script>
            <script type='text/javascript' src='https://staging-jessup.ilsa.org/wp-includes/js/zxcvbn-async.min.js?ver=1.0'></script>
            <script type='text/javascript' src='https://staging-jessup.ilsa.org/wp-admin/js/password-strength-meter.min.js'></script>
            <link rel="stylesheet" type="text/css" media="all" href="https://staging-jessup.ilsa.org/wp-content/plugins/profile-builder-pro/assets/css/style-front-end.css?ver=3.3.9" />

</body>
</html>
