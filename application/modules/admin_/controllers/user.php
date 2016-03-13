<?php
//REQUIRE
require_once APPPATH . 'modules/admin/controllers/base_admin_controller.php';
require_once APPPATH . "modules/admin/controllers/inputs/user_inputs.php";

if (!defined('BASEPATH')) exit('No direct script access allowed');
class User extends Base_Admin_Controller
{

    private $data;
    private $class_view;
    private $params;

    /**
     * CONSTRUCT
     *
     */
    function __construct() {

        parent::__construct();

        //CHECK LOGGED IN
        $this->check_logged_in();

        $this->data = $this->get_data();

        $this->params = array();

        //GET VIEW
        $this->class_view = $this->router->fetch_class() . "/" . $this->router->fetch_method();

        //GET PARAMS
        $this->params = $this->request_params(new User_inputs);

        $this->load_model();
        
        //ADD PARAMS TO VIEW
        $this->data['params'] = $this->params;
    }


    /**
     * INDEX ACTION
     *
     */
    public function index() {
        //PERMISSION
        $this->page_has_permission('user', VIEW);
        
        //SELECT
        $select = array( );
        //FILTER
        $filters = array();
        //ORDER
        $orders = array('user_id' => 'asc');
        //PAGINATION
        $page = (int)$this->params['page'];
        $range = (int)$this->params['range'];
        $from = ($page - 1) * $range;
        
        //DATA TO VIEW
        $this->data['list'] = $this->user_admin_model->list_all_by_paging( $select, $filters, $orders, $from, $range, $keyword = $this->params['keyword'] );
        $this->data['list_length'] = $this->user_admin_model->get_length( $filters );
        
        $this->template->build('user/index', $this->data);
    }

    /**
     * ADD ACTION
     *
     */
    public function add() {
        //PERMISSION
        $this->page_has_permission('user', ADD);
        
        if (isset($_POST['add'])) {
            $data = array();
            $data['username'] = $this->input->post('username');
            $data['password'] = $this->input->post('password');
            $data['password'] = md5($data['password'] . ENCRYPTION_KEY);
            $data['fullname'] = $this->input->post('fullname');
            $data['email'] = $this->input->post('email');
            $data['gender'] = $this->input->post('gender');
            $data['phone'] = $this->input->post('phone');
            $data['address'] = $this->input->post('address');
            $data['group_id'] = (int)$this->input->post('group_id');
            $data['user_builtin'] = 1;
            $data['active'] = 0;
            $this->user_admin_model->insert($data);
            
            //NOTICE
            $this->session->set_flashdata('notice', array('status' => 'success', 'message' => $this->lang->line('txt_insertsuccess')));
            
            //BACK TO INDEX
            redirect( url_add_params($this->params, '/admin/user') );
        } else {
            $this->data['list_group'] = $this->group_admin_model->list_all(array('group_id', 'group_name'));
            $this->template->build('user/add', $this->data);
        }
    }

    /**
     * EDIT ACTION
     *
     */
    public function edit() {
        //PERMISSION
        $this->page_has_permission('user', EDIT);
    
        $user_id = $this->input->get('userid');

        if (isset($_POST['update'])) {
            $data = array();
            $data['username'] = $this->input->post('username');
            $data['fullname'] = $this->input->post('fullname');
            $data['email'] = $this->input->post('email');
            $data['gender'] = $this->input->post('gender');
            $data['phone'] = $this->input->post('phone');
            $data['address'] = $this->input->post('address');
            $data['group_id'] = (int)$this->input->post('group_id');
            $data['user_builtin'] = 1;
            $data['active'] = (int)$this->input->post('active');
            $this->user_admin_model->update($user_id, $data);
            
            //NOTICE
            $this->session->set_flashdata('notice', array('status' => 'success', 'message' => $this->lang->line('txt_updateinfor') ));
            
            //BACK TO INDEX    
            redirect( url_add_params($this->params, '/admin/user') );
        } else {
            $this->data['list'] = $this->user_admin_model->get_by_id($user_id);
            $this->data['list_group'] = $this->group_admin_model->list_all(array('group_id', 'group_name'));
            $this->template->build('user/edit', $this->data);
        }
    }

    
    /**
     * UPDATE
     * 
     */
    public function update() {
        //PERMISSION
        $this->page_has_permission('user', EDIT);
        
        $type = $this->input->post('type');
        if ( $type == 'delete' ) {
            $ids = $this->input->post('ids');
            if( count($ids) > 0 ) {
                foreach($ids as $id) {
                    $this->remove($id);
                }
            }
        }
        
        //NOTICE
        $this->session->set_flashdata( 'notice', array('status'=>'success', 'message' => $this->lang->line('txt_updateinfor') ) );
        
        //BACK TO INDEX
        redirect( url_add_params($this->params, '/admin/user') );
    }
    
    
    
    /**
     * DELETE
     * 
     */
    public function delete() {
        //PERMISSION
        $this->page_has_permission('user', DELETE);
        
        $id = (int)$this->input->get('userid');
        $this->remove($id);
        
        //NOTICE
        $this->session->set_flashdata( 'notice', array('status'=>'success', 'message' => $this->lang->line('txt_deletesuccess') ) );
        
        //BACK TO INDEX
        redirect( url_add_params($this->params, '/admin/user') );
    }
    
    
    
    /**
     * REMOVE BY ID 
     * 
     */
    private function remove($id) {
        //DELETE DATA
        $this->user_admin_model->delete( $id );
    }


    /**
     * CHANGE PASSWORD
     *
     * kiểm tra người dùng nhập password cũ có đúng ko : ( kiểm tra = cách select với userid tương ưng + old_password nếu có trả ra kết quả nếu không có trả về null )
     *  + đúng->update password mới vào db
     *  + sai-> trở về trang password , bật lỗi lên ( thông báo password cũ nhập chưa đúng)
     *
     */
    public function password() {
        //PERMISSION
        $this->page_has_permission('user', EDIT);
        
        $user_id = $this->input->get('userid');
        
        if (isset($_POST['change'])) {
            $old_password = $this->input->post('old_password');
            $old_password = md5($old_password . ENCRYPTION_KEY);
            $new_password = $this->input->post('new_password');
            $new_password = md5($new_password . ENCRYPTION_KEY);
            $rs = $this->user_admin_model->validate($old_password, $user_id);

            if (empty($rs)) {
                
                //NOTICE
                $this->session->set_flashdata('notice', array('status' => 'error', 'message' => $this->lang->line('txt_invalidoldpass')));
                
                //BACK TO INDEX
                redirect('/admin/user/password?userid=' . $user_id);
            } else {
                $data = array();
                $data['password'] = $new_password;
                $this->user_admin_model->update($user_id, $data);
                
                //NOTICE
                $this->session->set_flashdata('notice', array('status' => 'success', 'message' => $this->lang->line('txt_updatepasssucces')));
                
                //BACK TO INDEX
                redirect( url_add_params($this->params, '/admin/user') );
            }
        } else {
            $this->template->build('user/password', $this->data);
        }
    }


    /**
     * UPDATE ACTIVE
     *
     */
    public function active() {
        //PERMISSION
        $this->page_has_permission('user', EDIT);
        
        //GET DATA
        $status = (int)$this->input->get('status');
        $id = (int)$this->input->get('id');

        //UPDATE DATA
        $args = array('active' => $status);
        $result = $this->user_admin_model->update($id, $args);

        //RESPONSE
        echo json_encode(array('STATUS' => $result));
    }
    
    
    private function load_model() {
        $this->load->Model("user_admin_model");
        $this->load->Model("group_admin_model");
    }
}