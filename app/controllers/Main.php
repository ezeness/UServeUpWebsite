<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends MY_Shop_Controller
{

    function __construct() {
        parent::__construct();
        $this->load->library('ion_auth');
        $this->load->library('form_validation');
        $this->load->helper('Shop_helper');
    }

    function index() {
        
        $id = $this->session->userdata('UserId');
        /////////////////////////////////Discover Products////////////////////////////////////////
        $discoverurl = 'product?latitude='.$this->latitude.'&longitude='.$this->longitude.'&limit=&page=1&search=&categories=&redius=&store=&post_type=&hashforyou=0&utagcategory='.$this->utagUpCCategory->Id.'&filter_type=&showpage=discover&IsBanner=0&userId='.$id.'&includechainproduct=0&hasLocationSwitch=1&hashTagId=&similarpostId=&packageId=&bannertype=discover';
        $discoverProducts = $this->curlGetRequest($discoverurl);
        $product_json_decoded_value = json_decode($discoverProducts);
        $products = $product_json_decoded_value->Products;
        $navBar = $product_json_decoded_value->PostTypes;
        foreach ($products as $key => $value) {
            $this->data['datas'][$key] = json_decode(json_encode($value->Details), true);
        }
        foreach ($navBar as $key => $value) {
            $this->data['navbar'][$key] = json_decode(json_encode($value), true);
        }
        //////////////////////////////Store Products//////////////////////////////////////
        $storeproducturl = 'product?latitude='.$this->latitude.'&longitude='.$this->longitude.'&limit=&page=1&search=&categories=&redius=&store=&post_type=&hashforyou=0&utagcategory='.$this->utagUpCCategory->Id.'&filter_type=&showpage=store&IsBanner=0&userId='.$id.'&includechainproduct=0&hasLocationSwitch=1&hashTagId=&similarpostId=&packageId=&bannertype=discover';
        $storeproduct_response = $this->curlGetRequest($storeproducturl);
        $storeproduct_json_decoded_value = json_decode($storeproduct_response);
        $storeproducts = $storeproduct_json_decoded_value->Products;
        foreach ($storeproducts as $key => $value) {
            $this->data['shop_up'][$key] = json_decode(json_encode($value->Details), true);
        }

        

        //////////////////////////////////Categories////////////////////////////////
        $categoryURL = 'category/packages/?packageId=&page=1&utagupcategory='.$this->utagUpCCategory->Id.'&post_type=&showall=1&userId=&showpage=store&specialcategoryId=';
        $category_response = $this->curlGetRequest($categoryURL);
        $catagory_json_decoded_value = json_decode($category_response);
        $catagories = $catagory_json_decoded_value->Categories;
        foreach ($catagories as $key => $value) {
            $this->data['catagories'][$key] = json_decode(json_encode($value), true);
            $this->data['subCats']= $this->getsubcat($this->data['catagories'][$key]['Id']);
        }

        //////////////////////////////////hashtags////////////////////////////////
        $hashtagURL = 'product/hashtag';
        $hashtag_response = $this->curlGetRequest($hashtagURL);
        $hashtag_json_decoded_value = json_decode($hashtag_response);
        $hashtag = $hashtag_json_decoded_value->HashTag;
        foreach ($hashtag as $key => $value) {
            $this->data['hashtags'][$key] = json_decode(json_encode($value), true);
        }


        ////////////////////////////Timeline ////////////////////////////////////

        $timelineURL = 'product?latitude='.$this->latitude.'&longitude='.$this->longitude.'&limit=10&page=&search=&categories=&redius=&store=&post_type=&hashforyou=0&utagcategory='.$this->utagUpCCategory->Id.'&filter_type=&showpage=home&IsBanner=0&userId='.$id.'&includechainproduct=1&hasLocationSwitch=0&hashTagId=&specialcategoryId=&similarpostId=&packageId=&bannertype=null&filter=&mostpopular=&LanguageCode=en&timezone=Asia%2FCalcutta';
        $Timeline_response = $this->curlGetRequest($timelineURL);
        $Timeline_json_decoded_value = json_decode($Timeline_response);
        $Timeline = '';
        if(!empty($Timeline_json_decoded_value->Products)){
        $Timeline = $Timeline_json_decoded_value->Products[0];
            }
        if($Timeline){
            $this->data['Timeline'] = true;
        }else{
            $this->data['Timeline'] = false;

        }

        ///////////////////////////////////DiscoverSorting API/////////////////////////////////////
        $DiscoverSortingURL = 'product/sortings?pagetype=discover';
        $DiscoverSorting_response = $this->curlGetRequest($DiscoverSortingURL);
        $DiscoverSorting_json_decoded_value = json_decode($DiscoverSorting_response);
        $DiscoverSorting = $DiscoverSorting_json_decoded_value->Sortings;
        foreach ($DiscoverSorting as $key => $value) {
            $this->data['DiscoverSorting'][$key] = json_decode(json_encode($value), true);
        }

        $StoreSortingURL = 'product/sortings?pagetype=store';
        $StoreSorting_response = $this->curlGetRequest($StoreSortingURL);
        $StoreSorting_json_decoded_value = json_decode($StoreSorting_response);
        $StoreSorting = $StoreSorting_json_decoded_value->Sortings;
        foreach ($StoreSorting as $key => $value) {
            $this->data['StoreSorting'][$key] = json_decode(json_encode($value), true);
        }
        $this->data['filter'] = '';
        $this->data['page_title'] = '';
        $this->data['page_desc'] = ''; 
        $this->page_construct('index', $this->data);
    }


    public function home()
    {
        $id = $this->session->userdata('UserId');
        $postTypes =  $this->input->get("nav");
        $productURL ='product?latitude='.$this->latitude.'&longitude='.$this->longitude.'&limit=&page=1&search=&categories=&redius=&store=&post_type='.$postTypes.'&hashforyou=0&utagcategory='.$this->utagUpCCategory->Id.'&filter_type=&showpage=home&IsBanner=0&userId='.$id.'&includechainproduct=0&hasLocationSwitch=1&hashTagId=&similarpostId=&packageId=&bannertype=discover';
       
       /////////////////API CALLING ///////////
        $product_response = $this->curlGetRequest($productURL);
        $product_json_decoded_value = json_decode($product_response);
        $products = $product_json_decoded_value->Products;
        $navBar = $product_json_decoded_value->PostTypes;
        foreach ($products as $key => $value) {
            $this->data['datas'][$key] = json_decode(json_encode($value->Details), true);
            $time =  json_decode(json_encode($value->Details->CreatedDate), true);
        }
        foreach ($navBar as $key => $value) {
            $this->data['navbar'][$key] = json_decode(json_encode($value), true);
        }
        ////////////////////////Stories//////////////////////////////
        $storiesURL = 'product/productstory?latitude='.$this->latitude.'&longitude='.$this->longitude.'&limit=18&page=1&search=&categories=&redius=&store=&post_type=&hashforyou=0&utagcategory='.$this->utagUpCCategory->Id.'&filter_type=&showpage=discover&IsBanner=0&userId='.$id.'&includechainproduct=0&hasLocationSwitch=1&hashTagId=IsStory=1';
        $getstoriesResponce = $stories_response->getBody();
        $stories_json_decoded_value = json_decode($getstoriesResponce);
        $stories = $stories_json_decoded_value->Story;
        $mystories = $stories_json_decoded_value->MyStory;
        if($stories){
            foreach ($stories as $key => $value) {
                $this->data['stories'][$key] = json_decode(json_encode($value), true);
            }
         }else{
            $this->data['stories'] = array();
         }
         if($mystories){
            foreach ($mystories->Products as $key => $value) {
                $this->data['mystories'][$key] = json_decode(json_encode($value->Details), true);
            }
        }else{
            $this->data['mystories'] = array();

        }
        $array['filter'] = '';
        $this->page_construct('pages/home', $this->data);
    }
    public function privacypolicy()
    {
        $id = $this->session->userdata('UserId');
        $this->data['page_title'] = 'Privacy Policy';
        $this->page_construct('pages/privacypolicy', $this->data);
    }
    public function twentyseven()
    {
        $id = $this->session->userdata('UserId');
        $postTypes =  $this->input->get("nav");
        $productURL = 'store/twentyfour_store/'.$id.'?latitude='.$this->latitude.'&longitude='.$this->longitude.'&Is24Service=0&limit=18&page=1';
         /////////////////API CALLING ///////////
         $product_response = $this->curlGetRequest($productURL);
         $product_json_decoded_value = json_decode($product_response);
        $products = $product_json_decoded_value->TwentyFourStores;
        foreach ($products as $key => $value) {
            $this->data['allstories'][$key] = json_decode(json_encode($value), true);
        }
        ////////////////////////////////////Store API Calling/////////////////////////////////////////////
        $twentyfourURL = 'store/twentyfour_store/'.$id.'?latitude='.$this->latitude.'&longitude='.$this->longitude.'&Is24Service=1&limit=18&page=1';
        $twentyfour_response = $this->curlGetRequest($twentyfourURL);
        $twentyfour_json_decoded_value = json_decode($twentyfour_response);
        $twentyfour = $twentyfour_json_decoded_value->TwentyFourStores;
        foreach ($twentyfour as $key => $value) {
            $this->data['twentyfour'][$key] = json_decode(json_encode($value), true);
        }
        $this->data['page_title'] = 'Twentry Four Seven';
        $this->page_construct('pages/twentyseven', $this->data);

    }
    public function writeup()
    {
        $id = $this->session->userdata('UserId');
        $postTypes =  $this->input->get("nav");
        $writeupURL = 'product/writeup?limit=&page=1&showall=&writeupType=comment%2Creview&userId='.$id.'&postType=&categories=&hashTagId=&profileId=&searchtxt=&utagupcategory='.$this->utagUpCCategory->Id.'&latitude='.$this->latitude.'&longitude='.$this->longitude.'&LanguageCode=en';
         /////////////////API CALLING ///////////
        $getwriteupResponce = $this->curlGetRequest($writeupURL);
        $writeup_json_decoded_value = json_decode($getwriteupResponce);
        $writeup = $writeup_json_decoded_value->Writeups;
        $navBar = $writeup_json_decoded_value->PostTypes;
        foreach ($writeup as $key => $value) {
            $this->data['writeups'][$key] = json_decode(json_encode($value), true);
        }
        foreach ($navBar as $key => $value) {
            $this->data['navbar'][$key] = json_decode(json_encode($value), true);
        }
        $categoryURL ='category/commentpackages/?packageId=&page=1&utagupcategory='.$this->utagUpCCategory->Id.'&post_type=&showall=1&userId='.$id.'&showpage=discover&specialcategoryId=&LanguageCode=en';
        $getCategoryResponce2 = $this->curlGetRequest($categoryURL);
        $catagory_json_decoded_value = json_decode($getCategoryResponce2);
        $catagories = $catagory_json_decoded_value->Categories;
        foreach ($catagories as $key => $value) {
            $this->data['catagories'][$key] = json_decode(json_encode($value), true);
            $this->data['subCats']= $this->getsubcat($this->data['catagories'][$key]['Id']);
        }
        $this->data['filter'] = '';
        $this->data['page_title'] = 'Write Up';
        $this->page_construct('pages/writeup', $this->data);
    }
    public function search(){
        $search = $this->input->post('search');
        $searchUrl = 'user/search?searchtxt='.$search;
         /////////////////API CALLING ///////////
        $getsearchUrlResponce = $this->curlGetRequest($searchUrl);
        $search_json_decoded_value = json_decode($getsearchUrlResponce);
        $StoreSeach = $search_json_decoded_value->StoreSeach;    
        $Users = $search_json_decoded_value->Users;    
        $ProductsPostUp = $search_json_decoded_value->ProductsPostUp;    
        $ProductsShopUp = $search_json_decoded_value->ProductsShopUp;    
        $ProductsBookUp = $search_json_decoded_value->ProductsBookUp;    
        $ProductsCallUp = $search_json_decoded_value->ProductsCallUp;    
        if(!empty($StoreSeach)){
            foreach ($StoreSeach as $key => $value) {
                $this->data['StoreSeach'][$key] = json_decode(json_encode($value), true);
            }
        }

        if(!empty($Users)){
            foreach ($Users as $key => $value) {
                $this->data['Users'][$key] = json_decode(json_encode($value), true);
            }
        }

        if(!empty($ProductsPostUp)){
            foreach ($ProductsPostUp as $key => $value) {
                $this->data['ProductsPostUp'][$key] = json_decode(json_encode($value->Details), true);
            }
        }

        if(!empty($ProductsShopUp)){
            foreach ($ProductsShopUp as $key => $value) {
                $this->data['ProductsShopUp'][$key] = json_decode(json_encode($value->Details), true);
            }
        }

        if(!empty($ProductsBookUp)){
            foreach ($ProductsBookUp as $key => $value) {
                $this->data['ProductsBookUp'][$key] = json_decode(json_encode($value->Details), true);
            }
        }

        if(!empty($ProductsCallUp)){
            foreach ($ProductsCallUp as $key => $value) {
                $this->data['ProductsCallUp'][$key] = json_decode(json_encode($value->Details), true);
            }
        }

        $hashtagUrl = 'product/searchhashtag?hashtag='.$search;
         /////////////////API CALLING ///////////
        $gethashtagUrlResponce = $this->curlGetRequest($hashtagUrl);
        $hashtag_json_decoded_value = json_decode($gethashtagUrlResponce);
        $hashtag = $hashtag_json_decoded_value->HashTag;    
        if(!empty($hashtag)){
            foreach ($hashtag as $key => $value) {
                $this->data['hashtag'][$key] = json_decode(json_encode($value), true);
            }
        }
        $this->data['filter'] = '';
        $this->data['page_title'] = 'Search Results';
        $this->page_construct('pages/search', $this->data);
    }


    public function nearbystores()
    {
        $id = $this->session->userdata('UserId');
        $postTypes =  $this->input->get("nav");
        $AllStoreUrl = 'store/twentyfour_store/'.$id.'?latitude='.$this->latitude.'&longitude='.$this->longitude.'&Is24Service=0&limit=18&page=1';
         /////////////////API CALLING ///////////
        $getAllStoreResponce = $this->curlGetRequest($AllStoreUrl);
        $AllStore_json_decoded_value = json_decode($getAllStoreResponce);
        $AllStores = $AllStore_json_decoded_value->TwentyFourStores;    
        if(!empty($AllStores)){
            foreach ($AllStores as $key => $value) {
                $this->data['AllStores'][$key] = json_decode(json_encode($value), true);
            }
        }
        $NearAllStoreUrl = 'store/twentyfour_store/'.$id.'?latitude='.$this->latitude.'&longitude='.$this->longitude.'&Is24Service=1&limit=18&page=1';
        /////////////////API CALLING ///////////
       $getNearAllStoreResponce = $this->curlGetRequest($NearAllStoreUrl);
       $NearAllStore_json_decoded_value = json_decode($getNearAllStoreResponce);
       $NearAllStores = $NearAllStore_json_decoded_value->TwentyFourStores;    
       if(!empty($NearAllStores)){
           foreach ($NearAllStores as $key => $value) {
               $this->data['NearAllStores'][$key] = json_decode(json_encode($value), true);
           }
       }
       $AllStoreUrl = 'store/twentyfour_store/'.$id.'?latitude='.$this->latitude.'&longitude='.$this->longitude.'&Is24Service=0&limit=18&page=1';
       /////////////////API CALLING ///////////
      $getAllStoreResponce = $this->curlGetRequest($AllStoreUrl);
      $AllStore_json_decoded_value = json_decode($getAllStoreResponce);
      $AllStores = $AllStore_json_decoded_value->TwentyFourStores;    
      if(!empty($AllStores)){
          foreach ($AllStores as $key => $value) {
              $this->data['AllStores'][$key] = json_decode(json_encode($value), true);
          }
      }
        $this->data['filter'] = '';
        $this->data['page_title'] = 'Near By Stores';
        $this->page_construct('pages/nearbystores', $this->data);
    }
    public function wall()
    {
        $id = $this->session->userdata('UserId');
        $postTypes =  $this->input->get("nav");
        $array['page_name'] = '';
        $writeupURL ='product/writeup?limit=&page=1&showall=&writeupType=hiring%2Cseeking&userId='.$id.'&postType=&categories=&hashTagId=&profileId=&searchtxt=&utagupcategory='.$this->utagUpCCategory->Id.'&latitude='.$this->latitude.'&longitude='.$this->longitude.'&LanguageCode=en&timezone=Asia%2FKolkata';
        $getwriteupResponce = $this->curlGetRequest($writeupURL);
        $writeup_json_decoded_value = json_decode($getwriteupResponce);
        $writeup = $writeup_json_decoded_value->Writeups;
        foreach ($writeup as $key => $value) {
            $this->data['wall'][$key] = json_decode(json_encode($value), true);
        }

        $hiringURL = 'product/writeup?limit=&page=1&showall=&writeupType=hiring&userId='.$id.'&postType=&categories=&hashTagId=&profileId=&searchtxt=&utagupcategory='.$this->utagUpCCategory->Id.'&latitude='.$this->latitude.'&longitude='.$this->longitude.'&LanguageCode=en&timezone=Asia%2FKolkata';
        $gethiringResponce = $this->curlGetRequest($hiringURL);
        $hiring_json_decoded_value = json_decode($gethiringResponce);
        $hiring = $hiring_json_decoded_value->Writeups;
        foreach ($hiring as $key => $value) {
            $this->data['hiring'][$key] = json_decode(json_encode($value), true);
        }
        $seekingURL = 'product/writeup?limit=&page=1&showall=&writeupType=seeking&userId='.$id.'&postType=&categories=&hashTagId=&profileId=&searchtxt=&utagupcategory='.$this->utagUpCCategory->Id.'&latitude='.$this->latitude.'&longitude=72.84398651123047&LanguageCode=en&timezone=Asia%2FKolkata';
        $getseekingResponce = $this->curlGetRequest($seekingURL);
        $seeking_json_decoded_value = json_decode($getseekingResponce);
        $seeking = $seeking_json_decoded_value->Writeups;
        foreach ($seeking as $key => $value) {
            $this->data['seeking'][$key] = json_decode(json_encode($value), true);
        }
        $this->data['filter'] = '';
        $this->data['page_title'] = 'Wall';
        $this->page_construct('pages/wall', $this->data);

    }
    public function getProductsbyCtaegory($main_parent = '' , $parent_id = ''){
        if($parent_id == $main_parent){
            $main_parent = '';
        }

        $id = $this->session->userdata('UserId');
        $array['navbar'] = NULL;
        $array['datas'] = NULL;
        $sortings =  $this->input->get("sortings");
        $postTypes =  $this->input->get("nav");
        $isSpecial =  $this->input->get("isSpecial");
        if(!empty($isSpecial)){
            $isSpecial= $main_parent;
            $main_parent = '';
        }
        if(empty($postTypes)){
            // $postTypes = 'callup,bookup,shopup';
        }
        $page_name =  $this->input->get("page_name");
        if($postTypes == 'postup'){
            $page_name = 'discover';
        }
        $array['PostId'] = '';
        $productURL ='product?latitude='.$this->latitude.'&longitude='.$this->longitude.'&limit=18&page=1&search=&categories='.$main_parent.'&redius=&store=&post_type='.$postTypes.'&hashforyou=0&utagcategory='.$this->utagUpCCategory->Id.'&filter_type=&showpage='.$page_name.'&IsBanner=0&userId='.$id.'&includechainproduct=0&hasLocationSwitch=1&hashTagId=&similarpostId=&packageId='.$parent_id.'&bannertype=store&mostpopular=&LanguageCode=en&timezone=&sorting='.$sortings.'&specialcategoryId='.$isSpecial;
        $getProductResponce = $this->curlGetRequest($productURL);
        $product_json_decoded_value = json_decode($getProductResponce);

        $products = $product_json_decoded_value->Products;
            foreach ($products as $key => $value) {
                $array['datas'][$key] = json_decode(json_encode($value->Details), true);
            }
         if($parent_id && $main_parent){
            $navbarURL = 'product?latitude='.$this->latitude.'&longitude='.$this->longitude.'&limit=18&page=1&search=&categories='.$main_parent.'&redius=&store=&post_type='.$postTypes.'&hashforyou=0&utagcategory='.$this->utagUpCCategory->Id.'&filter_type=&showpage='.$page_name.'&IsBanner=0&userId='.$id.'&includechainproduct=0&hasLocationSwitch=1&hashTagId=&similarpostId=&packageId='.$parent_id.'&bannertype=store&mostpopular=&LanguageCode=en&timezone=&sorting='.$sortings.'&specialcategoryId='.$isSpecial;
        } else {
            $navbarURL = 'product?latitude='.$this->latitude.'&longitude='.$this->longitude.'&limit=18&page=1&search=&categories='.$main_parent.'&redius=&store=&post_type='.$postTypes.'&hashforyou=0&utagcategory='.$this->utagUpCCategory->Id.'&filter_type=&showpage='.$page_name.'&IsBanner=0&userId='.$id.'&includechainproduct=0&hasLocationSwitch=1&hashTagId=&similarpostId=&packageId='.$parent_id.'&bannertype=store&mostpopular=&LanguageCode=en&timezone=&sorting='.$sortings.'&specialcategoryId='.$isSpecial;
        }
        $getNavbarResponce = $this->curlGetRequest($navbarURL);
        $nav_json_decoded_value = json_decode($getNavbarResponce);
        $navBar = $nav_json_decoded_value->PostTypes;
        foreach ($navBar as $key => $value) {
            $array['navbar'][$key] = json_decode(json_encode($value), true);
            }
      
        echo json_encode( $array);

    }

    public function getProductsbyHashtags($hashtag = ''){
        $id = $this->session->userdata('UserId');
        $array['datas'] = NULL;
        $productURL ='product/hashtagposts/'.$hashtag.'?latitude='.$this->latitude.'&longitude='.$this->longitude.'&limit=10&page=1&languagecode=en';
        $getProductResponce = $this->curlGetRequest($productURL);
        $product_json_decoded_value = json_decode($getProductResponce);
        $products = $product_json_decoded_value->Products;
        if(!empty($products)){
            foreach ($products as $key => $value) {
                $array['datas'][$key] = json_decode(json_encode($value->Details), true);
            }
        }
        echo json_encode( $array);

    }
    public function getCategories($subcat = '', $nav = ''){
        if($subcat == $nav){
            $nav = '';
        }
        $array['subcats'] = NULL;
        $isSpecial =  $this->input->get("isSpecial");
        if(!empty($isSpecial)){
            $isSpecial= $nav;
            $nav= '';
        }
        $page_name =  $this->input->get("page_name");
        $categoryURL= 'category/packages/'.$nav.'?packageId='.$subcat.'&page=1&utagupcategory='.$this->utagUpCCategory->Id.'&post_type='.$_GET['nav'].'&showall=1&userId=&showpage='.$page_name.'&specialcategoryId='.$isSpecial;
        $getCategoryResponce2 = $this->curlGetRequest($categoryURL);
        $catagory_json_decoded_value = json_decode($getCategoryResponce2);
        $catagories = $catagory_json_decoded_value->Categories;
        foreach ($catagories as $key => $value) {
            $array['subcats'][$key] = json_decode(json_encode($value), true);
        }
        // header("application/json");
       echo json_encode ($array);
    }
    public function getWriteupCategories($subcat = '', $nav = ''){
        if($subcat == $nav){
            $nav = '';
        }
        $id = $this->session->userdata('UserId');
        $isSpecial =  $this->input->get("isSpecial");
        $array['subcats'] = NULL;
        $page_name =  $this->input->get("page_name");
        $categoryURL = 'category/commentpackages/'.$nav.'?packageId='.$subcat.'&page=1&utagupcategory='.$this->utagUpCCategory->Id.'&post_type='.$_GET['nav'].'&showall=1&userId='.$id.'&showpage='.$page_name.'&specialcategoryId=&LanguageCode=en';
        $getCategoryResponce2 = $this->curlGetRequest($categoryURL);
        $catagory_json_decoded_value = json_decode($getCategoryResponce2);
        $catagories = $catagory_json_decoded_value->Categories;
        foreach ($catagories as $key => $value) {
            $array['subcats'][$key] = json_decode(json_encode($value), true);
        }
       
       echo json_encode ($array);
    }
    

    public function getSideCategories($subcat = '', $nav = ''){
        if($subcat == $nav){
            $nav = '';
        }
        $array['subcats'] = NULL;
        $isSpecial =  $this->input->get("isSpecial");
        $page_name =  $this->input->get("page_name");
        $categoryURL = 'category/packages/'.$nav.'?packageId='.$subcat.'&page=1&utagupcategory='.$this->utagUpCCategory->Id.'&post_type='.$_GET['nav'].'&showall=1&userId=&showpage='.$page_name.'&specialcategoryId=';
        $getCategoryResponce2 = $this->curlGetRequest($categoryURL);
        $catagory_json_decoded_value = json_decode($getCategoryResponce2);
        $catagories = $catagory_json_decoded_value->Categories;
        foreach ($catagories as $key => $value) {
            $array['subcats'][$key] = json_decode(json_encode($value), true);
        }
       
       echo json_encode ($array);
    }
    

    public function getsubcat($parent_id = null)
    {
        $array = array();
        $isSpecial =  $this->input->get("isSpecial");
        $categoryURL = 'category/packages/?packageId='.$parent_id.'&page=1&utagupcategory='.$this->utagUpCCategory->Id.'&post_type=&showall=1&userId=&showpage=discover&specialcategoryId=';
        $getCategoryResponce2 = $this->curlGetRequest($categoryURL);
        $catagory_json_decoded_value = json_decode($getCategoryResponce2);
        $catagories = $catagory_json_decoded_value->Categories;
        foreach ($catagories as $key => $value) {
            $array['subcats'][$key] = json_decode(json_encode($value), true);
            $subcats = $this->getsubcat($array['subcats'][$key]['Id']);
            $array['sub'] = json_decode(json_encode($subcats), true);
        }
        return $array;
    }
    public function getsubcat2($parent_id = null)
    {
        $categoryURL = 'category/packages/?packageId='.$parent_id.'&page=1&utagupcategory='.$this->utagUpCCategory->Id.'&post_type=&showall=1&userId=&showpage=discover&specialcategoryId=';
        $getCategoryResponce2 = $this->curlGetRequest($categoryURL);
        $catagory_json_decoded_value = json_decode($getCategoryResponce2);
        $catagories = $catagory_json_decoded_value->Categories;
        foreach ($catagories as $key => $value) {
            $array['subcats'][$key] = json_decode(json_encode($value), true);
            $subcats = $this->getsubcat($array['subcats'][$key]['Id']);
            // $array['sub'] = json_decode(json_encode($subcats), true);
        }
        //header("application/json");
        echo json_encode( $array);
    }
    public function getsubcatsub($parent_id = null , $p_id = null)
    {
        $categoryURL = 'category/packages/'.$parent_id.'?packageId='.$p_id.'&page=1&utagupcategory='.$this->utagUpCCategory->Id.'&post_type=&showall=1&userId=&showpage=discover&specialcategoryId=';
        $getCategoryResponce2 = $this->curlGetRequest($categoryURL);
        $catagory_json_decoded_value = json_decode($getCategoryResponce2);
        $catagories = $catagory_json_decoded_value->Categories;
        foreach ($catagories as $key => $value) {
            $array['subcats'][$key] = json_decode(json_encode($value), true);
            $subcats = $this->getsubcat($array['subcats'][$key]['Id']);
        }
        //header("application/json");
        echo json_encode( $array);
    }

    function language($lang) {
        $folder = 'app/language/';
        $languagefiles = scandir($folder);
        if (in_array($lang, $languagefiles)) {
            set_cookie('shop_language', $lang, 31536000);
        }
        redirect($_SERVER["HTTP_REFERER"]);
    }

    function currency($currency) {
        set_cookie('shop_currency', $currency, 31536000);
        redirect($_SERVER["HTTP_REFERER"]);
    }

    function cookie($val) {
        set_cookie('shop_use_cookie', $val, 31536000);
        redirect($_SERVER["HTTP_REFERER"]);
    }

}
