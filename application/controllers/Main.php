<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	function __construct()
    {
        // Construct the parent class
		parent::__construct();
		$this->load->model('user_model');
		// $this->load->view("lib");
	}

	function role(){
		if(isset($this->session->userdata['logged_in'])){
			redirect('role');
		}else{
			redirect('index');
		}
	}
	
	function index(){
		$data = ['tire'=>'active', 'lubricator' => '', 'garage' => ''];
		
		$this->load->view('users/layout/head', $data);
		if(isset($this->session->userdata['logged_in'])){
			$isUser = $this->session->userdata['logged_in']['isUser'];
			if(!$isUser){
				$this->load->view("users/layout/header");
			}else{
				$data['name'] = $this->session->userdata['logged_in']['name'];
				$this->load->view("users/layout/header_user", $data);
			}
		}else{
			$this->load->view("users/layout/header");
        }
		$this->load->view('users/layout/menu');
		$this->load->view('users/layout/banner');
		$this->load->view('users/main-search/tire/content');
		$this->load->view('users/layout/news');
		$this->load->view('users/layout/footer');
		$this->load->view('users/layout/foot');
		$this->load->view('users/main-search/tire/script');
		$this->load->view('users/layout/end');
	}
	
	function make($folder){
		$dir = 'public/image/'.$folder;
        mkdir($dir);
	}

	function line(){
		send_line_message('test');
	}

	public function forgotPassword()
    {
        $data = ['tire'=>'', 'lubricator' => '', 'garage' => ''];
		load_user_view("users/forgetpassword/content", "users/forgetpassword/script", $data);
	}
	
	function resetPasswordUser()
    {
        $status = '';
        
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('login_email','Email','trim|required|valid_email');
                
        if($this->form_validation->run() == FALSE)
        {
            $this->forgotPassword();
        }
        else 
        {
            $email = strtolower($this->security->xss_clean($this->input->post('login_email')));
            
            if($this->user_model->checkEmailExist($email))
            {
                $encoded_email = urlencode($email);
                
                $this->load->helper('string');
                $data['email'] = $email;
                $data['activation_id'] = random_string('alnum',15);
                $data['createdDtm'] = date('Y-m-d H:i:s');
                $data['agent'] = getBrowserAgent();
                $data['client_ip'] = $this->input->ip_address();
                
                $save = $this->user_model->resetPasswordUser($data);                
                
                if($save)
                {
                    $data1['reset_link'] = base_url() . "resetPasswordConfirmUser/" . $data['activation_id'] . "/" . $encoded_email;
                    $userInfo = $this->user_model->getCustomerInfoByEmail($email);

                    if(!empty($userInfo)){
                        $data1["name"] = $userInfo->username;
                        $data1["email"] = $userInfo->email;
                        $data1["message"] = "Reset Your Password";
                    }

                    $sendStatus = resetPasswordEmail($data1);

                    if($sendStatus){
                        $status = "send";
                        setFlashData($status, "Reset password link sent successfully, please check mails.");
                    } else {
                        $status = "notsend";
                        setFlashData($status, "Email has been failed, try again.");
                    }
                }
                else
                {
                    $status = 'unable';
                    setFlashData($status, "It seems an error while sending your details, try again.");
                }
            }
            else
            {
                $status = 'invalid';
                setFlashData($status, "This email is not registered with us.");
            }
            redirect('/forgotPassword');
        }
    }

	function resetPasswordConfirmUser($activation_id, $email)
    {
        // Get email and activation code from URL values at index 3-4
        $email = urldecode($email);
        
        // Check activation id in database
        $is_correct = $this->user_model->checkActivationDetails($email, $activation_id);

        $data = ['tire'=>'', 'lubricator' => '', 'garage' => ''];
        
        $data['email'] = $email;
        $data['activation_code'] = $activation_id;
        
        if ($is_correct == 1)
        {
			load_user_view("users/newpassword/content", "users/newpassword/script", $data);
        }
        else
        {
            redirect('/login');
        }
    }

    function createPasswordUser()
    {
        $status = '';
        $message = '';
        $email = strtolower($this->input->post("email"));
        $activation_id = $this->input->post("activation_code");
        
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('password','Password','required|max_length[20]');
        $this->form_validation->set_rules('cpassword','Confirm Password','trim|required|matches[password]|max_length[20]');
        
        if($this->form_validation->run() == FALSE)
        {
            $this->resetPasswordConfirmUser($activation_id, urlencode($email));
        }
        else
        {
            $password = $this->input->post('password');
            $cpassword = $this->input->post('cpassword');
            
            // Check activation id in database
            $is_correct = $this->user_model->checkActivationDetails($email, $activation_id);
            
            if($is_correct == 1)
            {                
                $this->user_model->createPasswordUser($email, $password);
                
                $status = 'success';
                $message = 'Password reset successfully';
            }
            else
            {
                $status = 'error';
                $message = 'Password reset failed';
            }
            
            setFlashData($status, $message);

            redirect("/login");
        }
    }
}