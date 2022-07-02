<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Shop_Controller
{

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        // $this->load->library('ion_auth');
        $this->load->helper('Shop_helper');
    }
    public function checkUserlogin(Type $var = null)
    {
        if($this->session->userdata('UserId') == ''){
           return 0 ;
        }else{
            return 1;
        }
    }
    public function validatecode()
    {
       
        $array = [];
        $code =  $this->input->get("code");
        $codeURL ='user/checkinvitationCode/'.$code;
        $code_response = $this->curlGetRequest($codeURL);
        $code_json_decoded_value = json_decode($code_response);
        $code = $code_json_decoded_value;
        echo json_encode( $code);
    }
    public function emailValidate($email = '')
    {
        $email =  $this->input->get("email");
        $password =  $this->input->get("password");
        $emailURL = 'user/userexists?userdata='.$email;
        $email_response = $this->curlGetRequest($emailURL);
        $email_json_decoded_value = json_decode($email_response);
        $loginURL = '';
        if($email && $password){
            $loginURL = 'user/login?UserName='.$email.'&Password='.$password;
        }
        $login_response = $this->curlGetRequest($loginURL);
        $Login_json_decoded_value = json_decode($login_response);
        echo json_encode( $email_json_decoded_value);
    }
    public function login($email = '')
    {
        $array = [];
        $email =  $this->input->post("email");
        $password =  $this->input->post("password");

        $url = $this->APIUrl.'user/login';
        $ch = curl_init($url);

        $data = json_encode(['UserName'=>$email, 'Password'=>$password]);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type:application/json',
            'X-API-KEY: whostagging-UZGqUgKGiVmZEtvcQSvBeEaZF'
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        $result = json_decode($result);
        curl_close($ch);
        if($result->Status == 1){
            $this->session->set_userdata('userdata',$result->User);
            $this->session->set_userdata('identity',$result->User->Id);
            $this->session->set_userdata('UserAccountTypeColor',$result->User->UserAccountTypeColor);
            $this->session->set_userdata('user_id',$result->User->Id);
            $this->session->set_flashdata('message', 'Login Successfull!');

            return redirect()->route('/');
        }else{
            $this->session->set_flashdata('error', $result->ErrorMessege);
            redirect('login');
        }

    }

    public function signup()
    {

        $addresstypesURL = 'address/addresstypes';
        $addresstypesURL_response = $this->curlGetRequest($addresstypesURL);
        $addresstypes_json_decoded_value = json_decode($addresstypesURL_response);
        $this->data['AddressTypes'] = $addresstypes_json_decoded_value->AddressTypes;
        $countryURL = 'address/countries/';
        $getCountryResponce2 = $this->curlGetRequest($countryURL);
        $country_json_decoded_value = json_decode($getCountryResponce2);
        $this->data['Countries'] = $country_json_decoded_value->Countries;
        $this->data['filter'] = '';
        $this->data['page_title'] ='Sign In / Sign Up';
        $this->page_construct('pages/signup', $this->data);
    }

    public function edit_profile()
    {
        if (!$this->loggedIn) { 
            $this->session->set_flashdata('error', 'You are not Login!');
            redirect('/'); 
        }
        $id = $this->session->userdata('user_id');
        $userURL = 'user/user_details/'.$id.'?latitude='.$this->latitude.'&longitude='.$this->longitude.'&posttype=shopup%2Cbookup%2Ccallup&categories=&userId='.$id.'&includechainproduct=1&showpage=discover&hasLocationSwitch=1&PlayListId=&packageId=&utagcategory='.$this->utagUpCCategory->Id.'&filter=';
        $getuserResponce2 = $this->curlGetRequest($userURL);
        $user_json_decoded_value = json_decode($getuserResponce2);
        if(isset($user_json_decoded_value)){
        $products = $user_json_decoded_value->Products;
        $navBar = $user_json_decoded_value->PostTypes;
        foreach ($products as $key => $value) {
            $this->data['datas'][$key] = json_decode(json_encode($value->Details), true);
            }
        }
        $this->data['user_details'] = $user_json_decoded_value;
        $this->data['filter'] = '';
        $this->data['page_title'] ='Edit Profile';
        $this->page_construct('pages/edit_profile', $this->data);
    }

    public function add_address()
    {
        if (!$this->loggedIn) { 
            $this->session->set_flashdata('error', 'You are not Login!');
            redirect('/'); 
        }
        $addresstypesURL = 'address/addresstypes';
        $addresstypesURL_response = $this->curlGetRequest($addresstypesURL);
        $addresstypes_json_decoded_value = json_decode($addresstypesURL_response);
        $this->data['AddressTypes'] = $addresstypes_json_decoded_value->AddressTypes;
        $countryURL = 'address/countries/';
        $getCountryResponce2 = $this->curlGetRequest($countryURL);
        $country_json_decoded_value = json_decode($getCountryResponce2);
        $this->data['Countries'] = $country_json_decoded_value->Countries;
        $id = $this->session->userdata('user_id');
        $this->data['filter'] = '';
        $this->data['page_title'] ='Add Address';
        $this->page_construct('pages/add_address', $this->data);
    }

    public function addresses()
    {
        if (!$this->loggedIn) { 
            $this->session->set_flashdata('error', 'You are not Login!');
            redirect('/'); 
        }
        $id = $this->session->userdata('user_id');
        $addressURL = 'address/'.$id;
        $addressURL_response = $this->curlGetRequest($addressURL);
        $address_json_decoded_value = json_decode($addressURL_response);
        $this->data['Addresses'] = $address_json_decoded_value->Addresses;
        $countryURL = 'address/countries/';
        $getCountryResponce2 = $this->curlGetRequest($countryURL);
        $country_json_decoded_value = json_decode($getCountryResponce2);
        $this->data['Countries'] = $country_json_decoded_value->Countries;
       
        $this->data['filter'] = '';
        $this->data['page_title'] ='List Addresses';
        $this->page_construct('pages/addresses', $this->data);
    }

    
    public function invitation()
    {
        if (!$this->loggedIn) { 
            $this->session->set_flashdata('error', 'You are not Login!');
            redirect('/'); 
        }
        $user = $this->session->userdata('userdata');
        ///////////////////////////////Standard///////////////////////////////
        $standardtypesURL = 'user/invitationcodes/'.$user->Id.'?inv_type=standard';
        $standardtypesURL_response = $this->curlGetRequest($standardtypesURL);
        $standardtypes_json_decoded_value = json_decode($standardtypesURL_response);
        $this->data['standardInvites'] = $standardtypes_json_decoded_value;
        //////////////////////////////Special ////////////////////////////////
        $specialtypesURL = 'user/invitationcodes/'.$user->Id.'?inv_type=special';
        $specialtypesURL_response = $this->curlGetRequest($specialtypesURL);
        $specialtypes_json_decoded_value = json_decode($specialtypesURL_response);
        $this->data['specialInvites'] = $specialtypes_json_decoded_value;

        $this->data['InvitationType'] = $user->InvitationType;
        $this->data['IsAdmin'] = $user->IsAdmin;
        $this->data['filter'] = '';
        $this->data['page_title'] ='Invitation';
        $this->page_construct('pages/invitation', $this->data);
    }

    
    
    public function invite_type()
    {
        if (!$this->loggedIn) { redirect('/'); }
        $this->data['invite_type'] = $this->input->get('invite');
        $user = $this->session->userdata('userdata');
        ///////////////////////////////Standard///////////////////////////////
        $invite_typeURL = 'user/invitationcodes/'.$user->Id.'?inv_type='.$this->data['invite_type'];
        $invite_typeURL_response = $this->curlGetRequest($invite_typeURL);
        $invite_type_json_decoded_value = json_decode($invite_typeURL_response);
        $this->data['Invites'] = $invite_type_json_decoded_value;
        $this->data['InvitationType'] = $user->InvitationType;
        $this->data['IsAdmin'] = $user->IsAdmin;
        $this->data['filter'] = '';
        $this->data['page_title'] ='Invitation';
        $this->page_construct('pages/invitetypes', $this->data);
    }

    public function sendInvitationCode()
    {
        if (!$this->loggedIn) { redirect('/'); }
        $array = [];
        $person_name =  $this->input->post("person_name");
        $email =  $this->input->post("email");
        $InvitationType =  $this->input->post("InvitationType");
        $phone_no =  $this->input->post("full_number");
        $totalinvites =  $this->input->post("totalinvites") ;
        $single_multipleinvite_type =  $this->input->post("single_multipleinvite_type");
            $url = $this->APIUrl.'user/invitationCode/'.$this->session->userdata('user_id');
            $ch = curl_init($url);
            $data = json_encode([
                "InvitationType"=> $InvitationType,
                "PersonName"=> $person_name,
                "PersonEmail"=> $email,
                "PersonPhone"=> $phone_no,
                "TotalInvitation" =>$totalinvites,
                "UTagupCategoryId" => $this->utagUpCCategory->Id,
                "SingleInvite" => $single_multipleinvite_type ? "1" : "0",
                "Username"=> $person_name,
        ]);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type:application/json',
                'X-API-KEY: whostagging-UZGqUgKGiVmZEtvcQSvBeEaZF'
            ));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($ch);
            $result = json_decode($result);
            if($result->Status == 1){
                $this->session->set_flashdata('message', 'Invitation Code Send Successfully!');
                $this->session->set_userdata('invitationresult',$result);
                $this->session->set_userdata('invitationdata',json_decode($data));
                redirect('invite_sent');
                //  $this->invite_sent($result , json_decode($data));
            }else{
                $this->session->set_flashdata('error', $result->ErrorMessege);
                redirect('invitation');
            }
    }
    public function invite_sent()
    {
        if (!$this->loggedIn) { redirect('/'); }
        $result = $this->session->userdata('invitationresult');
        $data = $this->session->userdata('invitationdata');
        $this->data['invitation_code'] = $result->Invitationcode;
        $this->data['invitation_type'] = $data->InvitationType;
        $this->data['user_data'] = $data;
        $this->data['result'] = $result;
        $this->data['filter'] = '';
        $this->data['page_title'] ='Invite Sent';
        $this->page_construct('pages/invite_sent', $this->data);
    }
    public function cancelInvite()
    {
        if (!$this->loggedIn) { redirect('/'); }
        $array = [];
        $InvitationId =  $this->input->get("InvitationId");
        $InvitationType =  $this->input->get("InvitationType");
            $url = $this->APIUrl.'user/disableinvitecode';
            $ch = curl_init($url);
            $data = json_encode([
                "InvitationId"=> $InvitationId,
                "Status"=>"0",
        ]);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type:application/json',
                'X-API-KEY: whostagging-UZGqUgKGiVmZEtvcQSvBeEaZF'
            ));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($ch);
            $result = json_decode($result);
            if($result->Status == 1){
                echo json_encode( $result);
                // redirect('invitation_list?invite='.$InvitationType);
                //  $this->invite_sent($result , json_decode($data));
            }else{
                echo json_encode( $result);
                // redirect('invitation_list?invite='.$InvitationType);
            }
    }
    public function invitation_list()
    {
        if (!$this->loggedIn) { redirect('/'); }
        $user = $this->session->userdata('userdata');
        $this->data['invite_type'] = $this->input->get('invite');
        $invitation_listURL = 'user/invitationcodes/'.$user->Id.'?inv_type='.$this->data['invite_type'];
        $invitation_listURL_response = $this->curlGetRequest($invitation_listURL);
        $invitation_list_json_decoded_value = json_decode($invitation_listURL_response);
        $this->data['invitation_codes'] = $invitation_list_json_decoded_value->InvitationCodes;
        $this->data['InvitationType'] = $user->InvitationType;
        $this->data['Invites'] = $invitation_list_json_decoded_value;
        $this->data['IsAdmin'] = $user->IsAdmin;
        $this->data['filter'] = '';
        $this->data['page_title'] ='Invite List';
        $this->page_construct('pages/invitation_list', $this->data);
    }
    public function logout(){
        $this->session->sess_destroy();
        $this->session->set_flashdata('message', 'Logout SuccessFull!');
        return redirect()->route('/');

    }
    public function checkEmail()
    {
        $array = [];
        $code =  $this->input->get("code");
        $email =  $this->input->get("email_address");
        // if($email){
            $url = $this->APIUrl.'user/register';
            $ch = curl_init($url);
            $data = json_encode([
                'UserName'=>$email,
                'InvitationCode'=>$code,
                'CreatedDate'=> date("Y-m-d H:i:s"),
                'ModifiedDate'=>date("Y-m-d H:i:s"),
                'utagcategory'=>$this->utagUpCCategory->Id
        ]);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type:application/json',
                'X-API-KEY: whostagging-UZGqUgKGiVmZEtvcQSvBeEaZF'
            ));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($ch);
            $result = json_decode($result);
            if($result->Status == 0){
                echo json_encode(array('type'=>'1', 'data'=>$result->ErrorMessege));
            }else{
                // $url = $this->APIUrl.'api/user/sendcode';
                // $ch = curl_init($url);
                // $data = json_encode(['UserName'=>$email]);

                // curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                // curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                //     'Content-Type:application/json',
                //     'X-API-KEY: whostagging-UZGqUgKGiVmZEtvcQSvBeEaZF'
                // ));
                // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                // $result = curl_exec($ch);
                // $result = json_decode($result);
                echo json_encode( $result);
            }
        // }
        // else{
        //     echo json_encode( array('type'=>'1', 'data'=>'Email Not Found'));
        //     // $this->session->setFlashdata('error', 'No Email Found!');
        // }

    }
    public function verifyUser()
    {
        $array = [];
        $email =  $this->input->get("email_address");
        $invitation_code =  $this->input->get("invitation_code");
        $verification_code = $this->input->get("verification_code");
        $url = $this->APIUrl.'user/verifyuser';
        $ch = curl_init($url);
        $data = json_encode(['UserName'=>$email , 'Code'=> $verification_code , 'InvitationCode'=> $invitation_code, 'VerifyDate'=>date("Y-m-d H:i:s")]);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type:application/json',
            'X-API-KEY: whostagging-UZGqUgKGiVmZEtvcQSvBeEaZF'
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        $result = json_decode($result);
        echo json_encode( $result);
    }
    public function addpassword()
    {
        $array = [];
        $url = $this->APIUrl.'user/addpassword';
        $ch = curl_init($url);
        $data = json_encode([
        'UserId'=>$this->input->get("user_id") ,
        'Password'=> $this->input->get("password") ,
        'CPassword'=> $this->input->get("confirmpassword") ]);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type:application/json',
            'X-API-KEY: whostagging-UZGqUgKGiVmZEtvcQSvBeEaZF'
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        $result = json_decode($result);
        echo json_encode( $result);
    }

    public function checkUserProfile($email = '')
    {
        $username =  $this->input->get("user_name");
        $profileURL = 'user/checkuserprofile/'.$username;
        $getProfileResponce = $this->curlGetRequest($profileURL);
        $profile_json_decoded_value = json_decode($getProfileResponce);
            if($profile_json_decoded_value->IsValid == 1){
                // if($this->input->get("gender") == 'Company'){
                //     $data = json_encode([
                //         'FirstName'=>$this->input->get("company_name") ,
                //         'Gender'=> $this->input->get("gender"),
                //         'DOB'=> date("Y-m-d", strtotime( $this->input->get("company_date"))),
                //         'Category'=> "",
                //         'Bio'=> "",
                //         'Website'=> "",
                //         'UserrefId' =>$this->input->get("user_id"),
                //     ]);
                // }else{
                    $data = json_encode([
                        'Fullname'=>$this->input->get("first_name") ,
                        'Gender'=> $this->input->get("gender"),
                        'DOB'=> date("Y-m-d", strtotime( $this->input->get("dob"))),
                        'Category'=> "",
                        'Bio'=> "",
                        'Website'=> "",
                        'UserrefId' =>$this->input->get("user_id"),
                    ]);
                // }
                $url = $this->APIUrl.'user/profile';
                $ch = curl_init($url);

                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Content-Type:application/json',
                    'X-API-KEY: whostagging-UZGqUgKGiVmZEtvcQSvBeEaZF'
                ));
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $result = curl_exec($ch);
                $result = json_decode($result);
                echo json_encode( $result);
            }else{
                echo json_encode($profile_json_decoded_value);
            }
    }

    public function states()
    {
        $countrycode =  $this->input->get("country_id");
        $array = [];
        $codeURL = 'address/states/'.$countrycode;
        $getCodeResponce2 = $this->curlGetRequest($codeURL);
        $code_json_decoded_value = json_decode($getCodeResponce2);
        $code = $code_json_decoded_value;
        echo json_encode( $code);
    }

    
    public function addAdress()
    {

                $data = json_encode([
                    'UserId'=>$this->input->post("user_id_foraddress") ,
                    'AddressRef'=> "",
                    'AddressType'=> $this->input->post("appartment_title"),
                    'Name'=> "",
                    'AddressRef'=> "",
                    'FirstName' =>$this->input->post("first_name"),
                    'LastName' =>$this->input->post("last_name"),
                    'AddressSubType' =>$this->input->post("address_type"),
                    'Street' =>$this->input->post("street"),
                    'Building' =>$this->input->post("building"),
                    'Floor' =>$this->input->post("floor"),
                    'Apartment' =>$this->input->post("appartment"),
                    'Latitude' =>$this->input->post("latitude"),
                    'Longitude' =>$this->input->post("longitude"),
                    'Address1' =>$this->input->post("formatted_address"),
                    'Country' =>$this->input->post("country"),
                    'City' =>$this->input->post("city"),
                    'Address2' =>$this->input->post("additiona_direction"),
                    'Landmark' =>"",
                    'ZipCode' =>"",
                    'Phone'=> $this->input->post("country_code").''.$this->input->post("phone_no"),
                    'IsActive' =>"1",
                    'IsDefault' =>"1",
                    'UTagUpCategoryId' =>$this->utagUpCCategory->Id,
                    'CreatedDate' => date("Y-m-d H:i:s"),
                    'ModifiedDate' => date("Y-m-d H:i:s"),
                    'State' =>$this->input->post("state")
                ]);
                $url = $this->APIUrl.'address';
                $ch = curl_init($url);

                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Content-Type:application/json',
                    'X-API-KEY: whostagging-UZGqUgKGiVmZEtvcQSvBeEaZF'
                ));
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $result = curl_exec($ch);
                $result = json_decode($result);
                if($result->Status == 1){
                    $this->session->set_flashdata('message', $result->ErrorMessege);
                    redirect("addresses");
                }else{
                    $this->session->set_flashdata('error', $result->ErrorMessege);
                    redirect("/");

                }
    }
    public function defaultAddress($id = '',$isDefault = '')
    {   
                $data = json_encode([
                    'IsDefault' =>$isDefault,
                    "AddressId"=> $id,
                ]);
                $url = $this->APIUrl.'address/defaultaddress';
                $ch = curl_init($url);

                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Content-Type:application/json',
                    'X-API-KEY: whostagging-UZGqUgKGiVmZEtvcQSvBeEaZF'
                ));
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $result = curl_exec($ch);
                $result = json_decode($result);
                if($result->Status == 1){
                    $this->session->set_flashdata('message', 'Address Updated Successfully!');
                    redirect("addresses");
                }else{
                    $this->session->set_flashdata('error', $result->ErrorMessege);
                    redirect("/");

                }
    }
    public function deleteAddress($id)
    {
            
            $url = $this->APIUrl.'address/address_details/'.$id;
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type:application/json',
                'X-API-KEY: whostagging-UZGqUgKGiVmZEtvcQSvBeEaZF'
            ));
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($ch);
            $result = json_decode($result);
            if($result->Status == 1){
                $this->session->set_flashdata('message', $result->ErrorMessege);
                redirect("addresses");
            }else{
                $this->session->set_flashdata('error', $result->ErrorMessege);
                redirect("/");

            } 
    }

    public function getShopUpProductsbyUser($id = null)
    {
        $id = $this->session->userdata('UserId');
        $userURL = 'user/user_details/'.$id.'?latitude='.$this->latitude.'&longitude='.$this->longitude.'&posttype=shopup%2Cbookup%2Ccallup&categories=&userId=238&includechainproduct=1&showpage=store&hasLocationSwitch=1&PlayListId=&packageId=&utagcategory='.$this->utagUpCCategory->Id.'&filter=';
        $getuserResponce2 = $this->curlGetRequest($userURL);
        $user_json_decoded_value = json_decode($getuserResponce2);
        $products = $user_json_decoded_value->Products;
        foreach ($products as $key => $value) {
            $array['shopup'][$key] = json_decode(json_encode($value->Details), true);
        }

        echo json_encode ($array);
    }

    public function getProductsbyCtaegory($main_parent = '' , $parent_id = ''){
        if($parent_id == $main_parent){
            $main_parent = '';
        }
        $array['navbar'] = NULL;
        $array['datas'] = NULL;
        $postTypes =  $this->input->get("nav");

        $page_name =  $this->input->get("page_name");
        $array['PostId'] = '';
        $productURL = 'product?latitude='.$this->latitude.'&longitude='.$this->longitude.'&limit=&page=1&search=&categories='.$main_parent.'&redius=&store=&post_type='.$postTypes.'&hashforyou=0&utagcategory='.$this->utagUpCCategory->Id.'&filter_type=&showpage='.$page_name.'&IsBanner=0&userId=238&includechainproduct=0&hasLocationSwitch=1&hashTagId=&similarpostId=&packageId='.$parent_id.'&bannertype=discover';
        $getProductResponce = $this->curlGetRequest($productURL);
        $product_json_decoded_value = json_decode($getProductResponce);
        $products = $product_json_decoded_value->Products;
            foreach ($products as $key => $value) {
                $array['datas'][$key] = json_decode(json_encode($value->Details), true);
            }
         if($parent_id && $main_parent){
            $navbarURL ='product?latitude='.$this->latitude.'&longitude='.$this->longitude.'&limit=&page=1&search=&categories='.$main_parent.'&redius=&store=&post_type='.$postTypes.'&hashforyou=0&utagcategory='.$this->utagUpCCategory->Id.'&filter_type=&showpage='.$page_name.'&IsBanner=0&userId=238&includechainproduct=0&hasLocationSwitch=1&hashTagId=&similarpostId=&packageId='.$parent_id.'&bannertype=discover';
        } else {
            $navbarURL = 'product?latitude='.$this->latitude.'&longitude='.$this->longitude.'&limit=&page=1&search=&categories=&redius=&store=&post_type='.$postTypes.'&hashforyou=0&utagcategory='.$this->utagUpCCategory->Id.'&filter_type=&showpage='.$page_name.'&IsBanner=0&userId=238&includechainproduct=0&hasLocationSwitch=1&hashTagId=&similarpostId=&packageId=&bannertype=discover';
        }
        $getNavbarResponce = $this->curlGetRequest($navbarURL);
        $nav_json_decoded_value = json_decode($getNavbarResponce);
        $navBar = $nav_json_decoded_value->PostTypes;
        foreach ($navBar as $key => $value) {
            $array['navbar'][$key] = json_decode(json_encode($value), true);
            }
        echo json_encode( $array);

    }
    public function profile($id = '')
    {
        if (!$this->loggedIn ) 
           {
            $this->session->set_flashdata('error', 'Login to view this page!');
               redirect('signup'); 
               
            }
        $this->data['PostId'] = '';
        $this->data['page_name'] = '';
        $userURL = 'user/user_details/'.$id.'?latitude='.$this->latitude.'&longitude='.$this->longitude.'&posttype=shopup%2Cbookup%2Ccallup&categories=&userId='.$id.'&includechainproduct=1&showpage=discover&hasLocationSwitch=1&PlayListId=&packageId=&utagcategory='.$this->utagUpCCategory->Id.'&filter=';
        $getuserResponce2 = $this->curlGetRequest($userURL);
        $user_json_decoded_value = json_decode($getuserResponce2);
        $products = $user_json_decoded_value->Products;
        $navBar = $user_json_decoded_value->PostTypes;
        foreach ($products as $key => $value) {
            $this->data['datas'][$key] = json_decode(json_encode($value->Details), true);
        }
        $this->data['user_details'] = $user_json_decoded_value;
        //////////////////////////Navbar/////////////////////////////////////
        foreach ($navBar as $key => $value) {
            $this->data['navbar'][$key] = json_decode(json_encode($value), true);
        }

        ///////////////////////Shop Up Products//////////////////////////
        $storeURL = 'user/user_details/'.$id.'?latitude='.$this->latitude.'&longitude='.$this->longitude.'&posttype=shopup%2Cbookup%2Ccallup&categories=&userId=238&includechainproduct=1&showpage=store&hasLocationSwitch=1&PlayListId=&packageId=&utagcategory='.$this->utagUpCCategory->Id.'&filter=';
        $getstoreResponce2 = $this->curlGetRequest($storeURL);
        $store_json_decoded_value = json_decode($getstoreResponce2);
        $store = $store_json_decoded_value->Products;
        foreach ($store as $key => $value) {
            // $array['shop_up'][$key] = json_decode(json_encode($value->Details), true);
        }
        $storeproductURL = 'product?latitude='.$this->latitude.'&longitude='.$this->longitude.'&limit=18&page=1&search=&categories=&redius=&store=&post_type=&hashforyou=0&utagcategory='.$this->utagUpCCategory->Id.'&filter_type=&showpage=home&IsBanner=0&userId='.$id.'&includechainproduct=0&hasLocationSwitch=1&hashTagId=&similarpostId=&packageId=&bannertype=home&mostpopular=&LanguageCode=en&timezone=&sorting=';
        $getstoreProductResponce = $this->curlGetRequest($storeproductURL);
        $storeproduct_json_decoded_value = json_decode($getstoreProductResponce);
        $storeproducts = $storeproduct_json_decoded_value->Products;
        foreach ($storeproducts as $key => $value) {
            $this->data['shop_up'][$key] = json_decode(json_encode($value->Details), true);
        }
        $categoryURL = 'category/packages/?packageId=&page=1&utagupcategory='.$this->utagUpCCategory->Id.'&post_type=&showall=1&userId='.$id.'&showpage=store&specialcategoryId=';
        $getCategoryResponce2 = $this->curlGetRequest($categoryURL);
        $catagory_json_decoded_value = json_decode($getCategoryResponce2);
        $catagories = $catagory_json_decoded_value->Categories;
        foreach ($catagories as $key => $value) {
            $this->data['catagories'][$key] = json_decode(json_encode($value), true);
           }
           $this->data['user_details'] = $user_json_decoded_value;
            /////////////////////////Get Highlights///////////////////////////

        $highlightsURL = 'highlight/'.$id.'?limit=10&page=1&type=';
        $gethighlightsResponce2 = $this->curlGetRequest($highlightsURL);
        $highlights_json_decoded_value = json_decode($gethighlightsResponce2);
        $highlights = $highlights_json_decoded_value->Highlight;
        if($highlights){
        foreach ($highlights as $key => $value) {
            $this->data['highlights'][$key] = json_decode(json_encode($value), true);
            }
        }

        /////////////////////////////Get Play Lists//////////////////////////

        $playlistURL ='highlight/getplaylist/'.$id.'?limit=10&page=1&type=';
        $getplaylistResponce2 = $this->curlGetRequest($playlistURL);
        $playlist_json_decoded_value = json_decode($getplaylistResponce2);
        $playlist = $playlist_json_decoded_value->PlayList;
        if($playlist){
        foreach ($playlist as $key => $value) {
            $this->data['playlist'][$key] = json_decode(json_encode($value), true);
            }
        }

        ////////////////////Categories//////////////////
        // $category_response = $client->request('GET', $this->APIUrl.'api/category/packages/?packageId=&page=1&utagupcategory=2&post_type=&showall=1&userId=&showpage=discover&specialcategoryId='
        // , [
        //     'headers' => [
        //         'Accept'     => 'application/json',
        //         'X-API-KEY'      => 'whostagging-UZGqUgKGiVmZEtvcQSvBeEaZF',
        //     ],
        // ]);
        // $getCategoryResponce2 = $category_response->getBody();
        // $catagory_json_decoded_value = json_decode($getCategoryResponce2);
        // $catagories = $catagory_json_decoded_value->Categories;
        // foreach ($catagories as $key => $value) {
        //     $array['catagories'][$key] = json_decode(json_encode($value), true);
        // }
        $this->data['filter'] ='';
        $this->data['page_title'] ='Product Details';
        $this->page_construct('pages/profile', $this->data);
    }

    public function getProductsbyUserCtaegory($main_parent = '' , $parent_id = ''){
        if($parent_id == $main_parent){
            $main_parent = '';
        }
        $user_id = $this->input->get('user_id');
        $array['navbar'] = NULL;
        $array['datas'] = NULL;
        $postTypes =  $this->input->get("nav");
        if(empty($postTypes)){
            $postTypes = 'callup,bookup,shopup';
        }
        $page_name =  $this->input->get("page_name");
        $array['PostId'] = '';
        $productURL = 'product?latitude='.$this->latitude.'&longitude='.$this->longitude.'&limit=&page=1&search=&categories='.$main_parent.'&redius=&store=&post_type='.$postTypes.'&hashforyou=0&utagcategory='.$this->utagUpCCategory->Id.'&filter_type=&showpage='.$page_name.'&IsBanner=0&userId='.$user_id.'&includechainproduct=0&hasLocationSwitch=1&hashTagId=&similarpostId=&packageId='.$parent_id.'&bannertype=discover';
        $getProductResponce = $this->curlGetRequest($productURL);
        $product_json_decoded_value = json_decode($getProductResponce);
        $products = $product_json_decoded_value->Products;
            foreach ($products as $key => $value) {
                $array['datas'][$key] = json_decode(json_encode($value->Details), true);
            }
         if($parent_id && $main_parent){
            $navbarURL= 'product?latitude='.$this->latitude.'&longitude='.$this->longitude.'&limit=&page=1&search=&categories='.$main_parent.'&redius=&store=&post_type='.$postTypes.'&hashforyou=0&utagcategory='.$this->utagUpCCategory->Id.'&filter_type=&showpage='.$page_name.'&IsBanner=0&userId='.$user_id.'&includechainproduct=0&hasLocationSwitch=1&hashTagId=&similarpostId=&packageId='.$parent_id.'&bannertype=discover';
        } else {
            $navbarURL = 'product?latitude='.$this->latitude.'&longitude='.$this->longitude.'&limit=&page=1&search=&categories=&redius=&store=&post_type='.$postTypes.'&hashforyou=0&utagcategory='.$this->utagUpCCategory->Id.'&filter_type=&showpage='.$page_name.'&IsBanner=0&userId='.$user_id.'&includechainproduct=0&hasLocationSwitch=1&hashTagId=&similarpostId=&packageId=&bannertype=discover';
        }
        $getNavbarResponce = $this->curlGetRequest($navbarURL);
        $nav_json_decoded_value = json_decode($getNavbarResponce);
        $navBar = $nav_json_decoded_value->PostTypes;
        foreach ($navBar as $key => $value) {
            $array['navbar'][$key] = json_decode(json_encode($value), true);
            }

        echo json_encode( $array);

    }

    public function getWriteupbyUserCtaegory($main_parent = '' , $parent_id = ''){
        if($parent_id == $main_parent){
            $main_parent = '';
        }
        $id = $this->session->userdata('UserId');
        $array['navbar'] = NULL;
        $array['datas'] = NULL;
        $postTypes =  $this->input->get("nav");
        $array['PostId'] = '';
        $productURL = 'product/writeup?limit=&page=1&showall=&writeupType=comment%2Creview&userId='.$id.'&postType='.$postTypes.'&categories='.$main_parent.'&hashTagId=&profileId=&searchtxt=&utagupcategory='.$this->utagUpCCategory->Id.'&latitude='.$this->latitude.'&longitude='.$this->longitude.'&LanguageCode=en';
        $getProductResponce = $this->curlGetRequest($productURL);
        $product_json_decoded_value = json_decode($getProductResponce);
        $products = $product_json_decoded_value->Writeups;
        foreach ($products as $key => $value) {
            $array['datas'][$key] = json_decode(json_encode($value), true);
        }
        $navBar = $product_json_decoded_value->PostTypes;
        foreach ($navBar as $key => $value) {
            $array['navbar'][$key] = json_decode(json_encode($value), true);
            }

        echo json_encode( $array);

    }

    public function getWallPostsbyFilter($main_parent = '' , $parent_id = ''){
        if($parent_id == $main_parent){
            $main_parent = '';
        }
        $id = $this->session->userdata('UserId');
        $array['navbar'] = NULL;
        $array['datas'] = NULL;
        $postTypes =  $this->input->get("nav");
        $array['PostId'] = '';
        $productURL = 'product/writeup?limit=&page=1&showall=&writeupType='.$wallType.'&userId='.$id.'&postType='.$postTypes.'&categories='.$main_parent.'&hashTagId=&profileId=&searchtxt=&utagupcategory='.$this->utagUpCCategory->Id.'&latitude='.$this->latitude.'&longitude='.$this->longitude.'&LanguageCode=en&timezone=Asia%2FKolkata';
        $getProductResponce = $this->curlGetRequest($productURL);
        $product_json_decoded_value = json_decode($getProductResponce);
        $products = $product_json_decoded_value->Writeups;
        foreach ($products as $key => $value) {
            $array['datas'][$key] = json_decode(json_encode($value), true);
        }
        echo json_encode( $array);

    }
    public function discover_people()
    {

        $id = $this->session->userdata('user_id');
         /////////////////API CALLING ///////////
         $discoverUrl = 'user/getdiscoverpeople/'.$id.'?limit=10&page=1&offset=&search=&latitude='.$this->latitude.'&longitude='.$this->longitude.'';
         $getdiscoverUrlResponce = $this->curlGetRequest($discoverUrl);
         $discover_json_decoded_value = json_decode($getdiscoverUrlResponce);
         $discover = $discover_json_decoded_value->Users; 
         if(!empty($discover)){
             foreach ($discover as $key => $value) {
                 $this->data['Profiles'][$key] = json_decode(json_encode($value), true);
             }
         }
        $this->data['filter'] = '';
        $this->data['page_title'] = 'Discover People';
        $this->page_construct('pages/discover_people', $this->data);
    }

    public function unfollow($id)
    {
        $url = $this->APIUrl.'user/unfollow';
        $ch = curl_init($url);

        $data = json_encode(['UserId'=>$this->session->userdata('user_id'), 'FollowerId'=>$id]);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type:application/json',
            'X-API-KEY: whostagging-UZGqUgKGiVmZEtvcQSvBeEaZF'
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        $result = json_decode($result);
        curl_close($ch);
        if($result->Status == 1){
            $this->session->set_flashdata('message', $result->ErrorMessege);

            return redirect()->route('discover_people');
        }else{
            $this->session->set_flashdata('error', $result->ErrorMessege);
            redirect('discover_people');
        }
    }
    public function addhighlights()
    {
        $array = [];
        $id = $this->session->userdata('UserId');
        $cover_image =  $this->input->post("cover_image");
        $ImageBase64 = $this->input->post('ImageBase64');
        $hightlight_title =  $this->input->post("hightlight_title");
        $hightlight_subtitle =  $this->input->post("hightlight_subtitle");
        $add_post_from =  $$this->input->post("add_post_from");
        $post_id =  $this->input->post("post_ids[]");
        $List = implode(', ', $post_id);
        $hightlight_title =  $this->input->post("hightlight_title");
        if(!empty($cover_image)){
           $image =  $this->uploadImages($ImageBase64 , 'highlight' , $cover_image);
           $image = json_decode($image);
        }
        $url = $this->APIUrl.'highlight/highlight';
        $ch = curl_init($url);

        $data = json_encode([
            'UserId'=> $id,
            'HId'=>'',
            'Title'=>$hightlight_title,
            'SubTitle'=>$hightlight_subtitle,
            'CoverImage'=>$image[0]->imagename,
            'Type'=>$add_post_from,
            'HighlightId'=>$List,
            'CreatedDate' => date('Y-m-d H:i:s'),
        ]);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type:application/json',
            'X-API-KEY: whostagging-UZGqUgKGiVmZEtvcQSvBeEaZF'
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        $result = json_decode($result);

        curl_close($ch);
        if($result->Status == 1){
            $this->session->setFlashdata('success', $result->ErrorMessege);
            return redirect()->route('/');
        }else{
            $this->session->setFlashdata('error', $result->ErrorMessege);
            return redirect()->route('signup');
        }

    }
    public function setUtagCat()
    {
        $this->db->update('sma_utagupcat' , array('UtagUpCatId'=>$this->input->get('UtagUpCatId') , 'UtagUpCatName'=>$this->input->get('UtagUpCatName')) , array('id'=>1));
        echo json_encode(array("success"=>1));
    }
    public function addPlaylist()
    {
        $array = [];
        $id = $this->session->userdata('UserId');
        $cover_image =  $this->input->post("playlistcover_image");
        $ImageBase64 = $this->input->post('PlaylistImageBase64');
        $playlist_title =  $this->input->post("playlist_title");
        $playlist_subtitle =  $this->input->post("playlist_subtitle");
        $add_post_from =  $this->input->post("add_post_from");
        $post_id =  $this->input->post("playlistpost_ids[]");
        $List = implode(', ', $post_id);
        $playlist_title =  $this->input->post("playlist_title");
        if(!empty($cover_image)){
           $image =  $this->uploadImages($ImageBase64 , 'playlist' , $cover_image);
           $image = json_decode($image);
        }
        $url = $this->APIUrl.'highlight/playlist';
        $ch = curl_init($url);

        $data = json_encode([
            'UserId'=> $id,
            'PId'=>'',
            'Title'=>$playlist_title,
            'SubTitle'=>$playlist_subtitle,
            'CoverImage'=>$image[0]->imagename,
            'Type'=>$add_post_from,
            'PlayListId'=>$List,
            'CreatedDate' => date('Y-m-d H:i:s'),
        ]);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type:application/json',
            'X-API-KEY: whostagging-UZGqUgKGiVmZEtvcQSvBeEaZF'
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        $result = json_decode($result);

        curl_close($ch);
        if($result->Status == 1){
            $this->session->setFlashdata('success', $result->ErrorMessege);
            return redirect()->route('/');
        }else{
            $this->session->setFlashdata('error', $result->ErrorMessege);
            return redirect()->route('signup');
        }

    }

    public function uploadImages($image , $path = "product" , $imagename)
    {
        $array = [];
        $url = $this->APIUrl.'product/image';
        $ch = curl_init($url);
        $data = json_encode(array([
            'image'=>$image,
            'cropimg'=>'',
            'path'=>$path ,
            'imagename'=>$imagename]));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type:application/json',
            'X-API-KEY: whostagging-UZGqUgKGiVmZEtvcQSvBeEaZF'
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        $result = json_decode($result);
        curl_close($ch);
        if($result->Status == 1){
            return json_encode( $result);
        }else{
            return json_encode( $result);
        }

    }

}
