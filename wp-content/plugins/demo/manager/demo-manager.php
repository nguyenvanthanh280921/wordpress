<?php
    if (!class_exists('WP_List_Table')){
        require_once(ABSPATH . 'wp-admin/includes/class-wp-list-table.php');
    }

    class List_manager extends WP_List_Table
    {
        private $users_data;

        private function get_users_data($data = ""){
            global $wpdb;
            $table_name = $wpdb->prefix . 'users';
            $data = $wpdb->get_results("SELECT ID, user_login,user_email,user_nicename,user_url,user_registered FROM $table_name",ARRAY_A);
            return $data;
        }
        public function get_columns()
        {
            $columns = array(
                'cb' => '<input type="checkbox" />',
                'ID' => 'ID',
                'user_login' => 'User Name',
                'user_email' => 'User Email',
                'user_registered' => 'Date Created',
                'user_url' => 'Url'
            );
            return $columns;
        }
        public function column_default($item, $column_name)
        {
            switch ($column_name){
                case 'ID':
                case 'user_login':
                    return '<a href="'.admin_url('admin.php').'?page=detail-settings&view=detail-manager&get_id='.$item['ID'].'">'.$item[$column_name].'</a>';
                case 'user_email':
                case 'user_registered':
                case 'user_url':
                    return $item[$column_name];
                default:
                    return print_r($item, true);
            }
        }
        public function column_cb($item)
        {
            return sprintf(
                '<input type="checkbox" name="user[]" value="%s" />',
                $item['ID']
            );
        }
        public function prepare_items()
        {
            $this->users_data = $this->get_users_data();
            $columns = $this->get_columns();
            $hidden = array();
            $sortable = array();
            $this->_column_headers = array($columns,$hidden,$sortable);
            $per_page = 5;
            $current_page = $this->get_pagenum();
            $total_items = count($this->users_data);

            $this->users_data = array_slice($this->users_data, (($current_page - 1) * $per_page), $per_page);
            $this->set_pagination_args(array(
                'total_items' => $total_items, // total number of items
                'per_page'    => $per_page // items to show on a page
            ));

//            usort($this->users_data, array(&$this, 'usort_reorder'));
            $this->items = $this->users_data;
        }
        protected function extra_tablenav( $which ) {
            echo '<div class="alignleft actions">';
            echo '<button style=" margin-right: 5px; float:left;background: #d63638;color: #fff;border: 1px #d63638 solid; " type="button" class="button">Delete User</button>';
            if ( 'top' === $which && !is_singular() ) {
                ob_start();
                echo '<select name="status">';
                echo '<option value="">Select Status</option>';
                echo '</select>';

                echo '<select name="country">';
                echo '<option value="">Select Country</option>';
                echo '</select>';
                $output = ob_get_clean();
                if ( ! empty( $output ) ) {
                    echo $output;
                    submit_button( __( 'Filter' ), '', 'filter_action', false, array( 'id' => 'user-query-submit' ) );
                }
            }
            echo '</div>';
        }
    }
    $empTable = new List_manager();
    $empTable->prepare_items();
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
        <h1>List Demo Manager</h1>
        <form method="GET" id="jessup-list-form" action="">
            <input type="hidden" name="page" value="<?php echo esc_attr($_REQUEST['page']) ?>">
            <div class="dropdown">
                <button type="button" class="button" onclick="">Export</button>
            </div>
            <?php
            $empTable->search_box('Search', 'search');
            $empTable->display();
            ?>
        </form>
        <div class="loader"></div>
    </div>
</div>

