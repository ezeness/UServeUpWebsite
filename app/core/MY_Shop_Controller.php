<?php defined('BASEPATH') or exit('No direct script access allowed');

class MY_Shop_Controller extends CI_Controller
{
    public function __construct()
    {
   
        parent::__construct();
        $this->Settings =''; 
            $this->theme = 'default/shop/views/';
            $this->data['assets'] = base_url() . 'themes/default/shop/assets/';
            $this->loggedIn = $this->sma->logged_in();
            $this->data['loggedIn'] = $this->loggedIn;
            $searchText = $this->getUtagCat() ? $this->getUtagCat()->UtagUpCatName : 'ushipup';
            $this->utagUpCCategory = $this->utagUpCCategory($searchText);
            $this->utagUpCCategory =$this->utagUpCCategory->UTagupcategories[0];
            $this->Userdetails = $this->session->userdata('userdata');
            $new_arr[]= unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$_SERVER['REMOTE_ADDR']));
            $this->longitude = $this->Userdetails ? $this->Userdetails->Address->Longitude : $new_arr[0]['geoplugin_longitude'];
            $this->latitude = $this->Userdetails ? $this->Userdetails->Address->Latitude : $new_arr[0]['geoplugin_latitude'];
            $this->APIUrl = 'https://utagup.com/dev/index.php/api/';
            $this->data['utagUpCCategory'] = $this->utagUpCCategory;
            $this->data['loggedInUser'] = $this->Userdetails;
            $this->data['allUtagUpCats'] = $this->utagUpCCategory();
            // $new_arr[]= unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$_SERVER['REMOTE_ADDR']));
            // echo "Latitude:".$new_arr[0]['geoplugin_latitude']." and Longitude:".$new_arr[0]['geoplugin_longitude']
    }

    public function page_construct($page, $data = array())
    {       
            $data['message'] = isset($data['message']) ? $data['message'] : $this->session->flashdata('message');
            $data['error'] = isset($data['error']) ? $data['error'] : $this->session->flashdata('error');
            $data['warning'] = isset($data['warning']) ? $data['warning'] : $this->session->flashdata('warning');
            $data['reminder'] = isset($data['reminder']) ? $data['reminder'] : $this->session->flashdata('reminder');
            $data['notice'] = isset($data['notice']) ? $data['notice'] : $this->session->flashdata('notice');
            $data['ip_address'] = $this->input->ip_address();
            $data['page_desc'] = isset($data['page_desc']) && !empty($data['page_desc']) ? $data['page_desc'] : 'Default description';
            $this->load->view($this->theme . 'header', $data);
            $this->load->view($this->theme . $page, $data);
            $this->load->view($this->theme . 'footer');
    }

    public function curlGetRequest($url)
    {

        /* Endpoint */
        $url = 'https://utagup.com/dev/index.php/api/'.$url;
        /* eCurl */
        $curl = curl_init($url);
                 
        /* Define content type */
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Content-Type:application/json',
            'X-API-KEY: whostagging-UZGqUgKGiVmZEtvcQSvBeEaZF'
        ));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);
        /* close curl */
        curl_close($curl);
        return $result;
        
    }

    public function utagUpCCategory($searchText = '')
    {
        // $localutagUpCCategory = '<script>document.write(localStorage.getItem("UtagUpCat"));</script>';
        $url = 'category/utagcategories?searchtxt='.$searchText;
        $utagUpCCategory = $this->curlGetRequest($url);
        $utagUpCCategory = json_decode($utagUpCCategory);
        return $utagUpCCategory;
    }

    public function curlPostRequest($url , $data , $datatype ='' , $message = '')
    {

        /* Endpoint */
        $url = 'https://utagup.com/dev/index.php/api/'.$url;
        /* eCurl */
        $curl = curl_init($url);
                 
        /* Define content type */
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Content-Type:application/json',
            'X-API-KEY: whostagging-UZGqUgKGiVmZEtvcQSvBeEaZF'
        ));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);
        /* close curl */
        curl_close($curl);
        return $result;
        
    }
     public function getUtagCat()
     {
       $q=  $this->db->select('*')
        ->from('sma_utagupcat')
        ->where('id' , 1)
        ->get()->row();
        return $q; 
     }

    
}
