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
        $discoverurl = 'product?latitude=25.18532943725586&longitude=55.262935638427734&limit=&page=1&search=&categories=&redius=&store=&post_type=&hashforyou=0&utagcategory='.$this->utagUpCCategory->Id.'&filter_type=&showpage=discover&IsBanner=0&userId='.$id.'&includechainproduct=0&hasLocationSwitch=1&hashTagId=&similarpostId=&packageId=&bannertype=discover';
        $discoverProducts = $this->curlGetRequest($discoverurl);
        $product_json_decoded_value = json_decode($discoverProducts);
        $products = $product_json_decoded_value->Products;
        $navBar = $product_json_decoded_value->PostTypes;
        foreach ($products as $key => $value) {
            $this->data['datas'][$key] = json_decode(json_encode($value->Details), true);
        }
        //////////////////////////////Store Products//////////////////////////////////////
        $storeproducturl = 'product?latitude=25.18532943725586&longitude=55.262935638427734&limit=&page=1&search=&categories=&redius=&store=&post_type=&hashforyou=0&utagcategory='.$this->utagUpCCategory->Id.'&filter_type=&showpage=store&IsBanner=0&userId='.$id.'&includechainproduct=0&hasLocationSwitch=1&hashTagId=&similarpostId=&packageId=&bannertype=discover';
        $storeproduct_response = $this->curlGetRequest($storeproducturl);
        $storeproduct_json_decoded_value = json_decode($storeproduct_response);
        $storeproducts = $storeproduct_json_decoded_value->Products;
        foreach ($storeproducts as $key => $value) {
            $this->data['shop_up'][$key] = json_decode(json_encode($value->Details), true);
        }
        foreach ($navBar as $key => $value) {
            $this->data['navbar'][$key] = json_decode(json_encode($value), true);
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

        $timelineURL = 'product?latitude=37.421722412109375&longitude=-122.08419036865234&limit=10&page=&search=&categories=&redius=&store=&post_type=&hashforyou=0&utagcategory='.$this->utagUpCCategory->Id.'&filter_type=&showpage=home&IsBanner=0&userId='.$id.'&includechainproduct=1&hasLocationSwitch=0&hashTagId=&specialcategoryId=&similarpostId=&packageId=&bannertype=null&filter=&mostpopular=&LanguageCode=en&timezone=Asia%2FCalcutta';
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
        $productURL ="product?latitude=25.18532943725586&longitude=55.262935638427734&limit=&page=1&search=&categories=&redius=&store=&post_type='.$postTypes.'&hashforyou=0&utagcategory='.$this->utagUpCCategory->Id.'&filter_type=&showpage=home&IsBanner=0&userId='.$id.'&includechainproduct=0&hasLocationSwitch=1&hashTagId=&similarpostId=&packageId=&bannertype=discover";
       
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
        $storiesURL = 'product/productstory?latitude=37.421722412109375&longitude=-122.08419036865234&limit=18&page=1&search=&categories=&redius=&store=&post_type=&hashforyou=0&utagcategory='.$this->utagUpCCategory->Id.'&filter_type=&showpage=discover&IsBanner=0&userId='.$id.'&includechainproduct=0&hasLocationSwitch=1&hashTagId=IsStory=1';
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
        $array['filter'] = '';
        $this->page_construct('pages/privacypolicy', $this->data);
    }
    public function twentyseven()
    {
        $id = $this->session->userdata('UserId');
        $postTypes =  $this->input->get("nav");
        $productURL = 'store/twentyfour_store/'.$id.'?latitude=21.698959350585938&longitude=71.5198745727539&Is24Service=0&limit=18&page=1';
         /////////////////API CALLING ///////////
         $product_response = $this->curlGetRequest($productURL);
         $product_json_decoded_value = json_decode($product_response);
        $products = $product_json_decoded_value->TwentyFourStores;
        foreach ($products as $key => $value) {
            $this->data['allstories'][$key] = json_decode(json_encode($value), true);
        }
        ////////////////////////////////////Store API Calling/////////////////////////////////////////////
        $twentyfourURL = 'store/twentyfour_store/'.$id.'?latitude=21.698959350585938&longitude=71.5198745727539&Is24Service=1&limit=18&page=1';
        $twentyfour_response = $this->curlGetRequest($twentyfourURL);
        $twentyfour_json_decoded_value = json_decode($twentyfour_response);
        $twentyfour = $twentyfour_json_decoded_value->TwentyFourStores;
        foreach ($twentyfour as $key => $value) {
            $this->data['twentyfour'][$key] = json_decode(json_encode($value), true);
        }
        $this->page_construct('pages/twentyseven', $this->data);

    }
    public function writeup()
    {
        $id = $this->session->userdata('UserId');
        $postTypes =  $this->input->get("nav");
        $writeupURL = 'product/writeup?limit=&page=1&showall=&writeupType=comment%2Creview&userId='.$id.'&postType=&categories=&hashTagId=&profileId=&searchtxt=&utagupcategory='.$this->utagUpCCategory->Id.'&latitude=21.216766357421875&longitude=72.8458251953125&LanguageCode=en';
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
        $this->data['page_title'] = 'Write Up';
        $this->page_construct('pages/search', $this->data);
    }
    public function nearbystores()
    {
        $id = $this->session->userdata('UserId');
        $postTypes =  $this->input->get("nav");
        $AllStoreUrl = 'store/twentyfour_store/'.$id.'?latitude=21.69953155517578&longitude=71.51920318603516&Is24Service=0&limit=18&page=1';
         /////////////////API CALLING ///////////
        $getAllStoreResponce = $this->curlGetRequest($AllStoreUrl);
        $AllStore_json_decoded_value = json_decode($getAllStoreResponce);
        $AllStores = $AllStore_json_decoded_value->TwentyFourStores;    
        if(!empty($AllStores)){
            foreach ($AllStores as $key => $value) {
                $this->data['AllStores'][$key] = json_decode(json_encode($value), true);
            }
        }
        $NearAllStoreUrl = 'store/twentyfour_store/'.$id.'?latitude=21.69953155517578&longitude=71.51920318603516&Is24Service=1&limit=18&page=1';
        /////////////////API CALLING ///////////
       $getNearAllStoreResponce = $this->curlGetRequest($NearAllStoreUrl);
       $NearAllStore_json_decoded_value = json_decode($getNearAllStoreResponce);
       $NearAllStores = $NearAllStore_json_decoded_value->TwentyFourStores;    
       if(!empty($NearAllStores)){
           foreach ($NearAllStores as $key => $value) {
               $this->data['NearAllStores'][$key] = json_decode(json_encode($value), true);
           }
       }
       $AllStoreUrl = 'store/twentyfour_store/'.$id.'?latitude=21.69953155517578&longitude=71.51920318603516&Is24Service=0&limit=18&page=1';
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
        $writeupURL ='product/writeup?limit=&page=1&showall=&writeupType=hiring%2Cseeking&userId='.$id.'&postType=&categories=&hashTagId=&profileId=&searchtxt=&utagupcategory='.$this->utagUpCCategory->Id.'&latitude=21.21677017211914&longitude=72.84398651123047&LanguageCode=en&timezone=Asia%2FKolkata';
        $getwriteupResponce = $this->curlGetRequest($writeupURL);
        $writeup_json_decoded_value = json_decode($getwriteupResponce);
        $writeup = $writeup_json_decoded_value->Writeups;
        foreach ($writeup as $key => $value) {
            $this->data['wall'][$key] = json_decode(json_encode($value), true);
        }

        $hiringURL = 'product/writeup?limit=&page=1&showall=&writeupType=hiring&userId='.$id.'&postType=&categories=&hashTagId=&profileId=&searchtxt=&utagupcategory='.$this->utagUpCCategory->Id.'&latitude=21.21677017211914&longitude=72.84398651123047&LanguageCode=en&timezone=Asia%2FKolkata';
        $gethiringResponce = $this->curlGetRequest($hiringURL);
        $hiring_json_decoded_value = json_decode($gethiringResponce);
        $hiring = $hiring_json_decoded_value->Writeups;
        foreach ($hiring as $key => $value) {
            $this->data['hiring'][$key] = json_decode(json_encode($value), true);
        }
        $seekingURL = 'product/writeup?limit=&page=1&showall=&writeupType=seeking&userId='.$id.'&postType=&categories=&hashTagId=&profileId=&searchtxt=&utagupcategory='.$this->utagUpCCategory->Id.'&latitude=21.21677017211914&longitude=72.84398651123047&LanguageCode=en&timezone=Asia%2FKolkata';
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
        $hashtag_id =  $this->input->get("hashtag_id");
        if(!empty($isSpecial)){
            $isSpecial= $main_parent;
            $main_parent = '';
        }
        if(empty($postTypes)){
            $postTypes = 'callup,bookup,shopup';
        }
        $page_name =  $this->input->get("page_name");
        if($postTypes == 'postup'){
            $page_name = 'discover';
        }
        $array['PostId'] = '';
        $productURL ='product?latitude=25.18532943725586&longitude=55.262935638427734&limit=18&page=1&search=&categories='.$main_parent.'&redius=&store=&post_type='.$postTypes.'&hashforyou=0&utagcategory='.$this->utagUpCCategory->Id.'&filter_type=&showpage='.$page_name.'&IsBanner=0&userId='.$id.'&includechainproduct=0&hasLocationSwitch=1&hashTagId='.$hashtag_id.'&similarpostId=&packageId='.$parent_id.'&bannertype=store&mostpopular=&LanguageCode=en&timezone=&sorting='.$sortings.'&specialcategoryId='.$isSpecial;
        $getProductResponce = $this->curlGetRequest($productURL);
        $product_json_decoded_value = json_decode($getProductResponce);
        $products = $product_json_decoded_value->Products;
            foreach ($products as $key => $value) {
                $array['datas'][$key] = json_decode(json_encode($value->Details), true);
            }
         if($parent_id && $main_parent){
            $navbarURL = 'product?latitude=25.18532943725586&longitude=55.262935638427734&limit=18&page=1&search=&categories='.$main_parent.'&redius=&store=&post_type='.$postTypes.'&hashforyou=0&utagcategory='.$this->utagUpCCategory->Id.'&filter_type=&showpage='.$page_name.'&IsBanner=0&userId='.$id.'&includechainproduct=0&hasLocationSwitch=1&hashTagId=&similarpostId=&packageId='.$parent_id.'&bannertype=store&mostpopular=&LanguageCode=en&timezone=&sorting='.$sortings.'&specialcategoryId='.$isSpecial;
        } else {
            $navbarURL = 'product?latitude=25.18532943725586&longitude=55.262935638427734&limit=18&page=1&search=&categories='.$main_parent.'&redius=&store=&post_type='.$postTypes.'&hashforyou=0&utagcategory='.$this->utagUpCCategory->Id.'&filter_type=&showpage='.$page_name.'&IsBanner=0&userId='.$id.'&includechainproduct=0&hasLocationSwitch=1&hashTagId=&similarpostId=&packageId='.$parent_id.'&bannertype=store&mostpopular=&LanguageCode=en&timezone=&sorting='.$sortings.'&specialcategoryId='.$isSpecial;
        }
        $getNavbarResponce = $this->curlGetRequest($navbarURL);
        $nav_json_decoded_value = json_decode($getNavbarResponce);
        $navBar = $nav_json_decoded_value->PostTypes;
        foreach ($navBar as $key => $value) {
            $array['navbar'][$key] = json_decode(json_encode($value), true);
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


    function profile($act = NULL) {
        if (!$this->loggedIn) { redirect('/'); }
        if (!SHOP || $this->Staff) { redirect('admin/users/profile/'.$this->session->userdata('user_id')); }
        $user = $this->ion_auth->user()->row();
        if ($act == 'user') {

            $this->form_validation->set_rules('first_name', lang("first_name"), 'required');
            $this->form_validation->set_rules('last_name', lang("last_name"), 'required');
            $this->form_validation->set_rules('phone', lang("phone"), 'required');
            $this->form_validation->set_rules('email', lang("email"), 'required|valid_email');
            $this->form_validation->set_rules('company', lang("company"), 'trim');
            $this->form_validation->set_rules('vat_no', lang("vat_no"), 'trim');
            $this->form_validation->set_rules('address', lang("billing_address"), 'required');
            $this->form_validation->set_rules('city', lang("city"), 'required');
            $this->form_validation->set_rules('state', lang("state"), 'required');
            $this->form_validation->set_rules('postal_code', lang("postal_code"), 'required');
            $this->form_validation->set_rules('country', lang("country"), 'required');
            if ($user->email != $this->input->post('email')) {
                $this->form_validation->set_rules('email', lang("email"), 'trim|is_unique[users.email]');
            }

            if ($this->form_validation->run() === TRUE) {

                $bdata = [
                    'name' => $this->input->post('first_name').' '.$this->input->post('last_name'),
                    'phone' => $this->input->post('phone'),
                    'email' => $this->input->post('email'),
                    'company' => $this->input->post('company'),
                    'vat_no' => $this->input->post('vat_no'),
                    'address' => $this->input->post('address'),
                    'city' => $this->input->post('city'),
                    'state' => $this->input->post('state'),
                    'postal_code' => $this->input->post('postal_code'),
                    'country' => $this->input->post('country'),
                ];

                $udata = [
                    'first_name' => $this->input->post('first_name'),
                    'last_name' => $this->input->post('last_name'),
                    'company' => $this->input->post('company'),
                    'phone' => $this->input->post('phone'),
                    'email' => $this->input->post('email'),
                ];

                if ($this->ion_auth->update($user->id, $udata) && $this->shop_model->updateCompany($user->company_id, $bdata)) {
                    $this->session->set_flashdata('message', lang('user_updated'));
                    $this->session->set_flashdata('message', lang('billing_data_updated'));
                    redirect("profile");
                }

            } else {
                $this->session->set_flashdata('error', validation_errors());
                redirect($_SERVER["HTTP_REFERER"]);
            }

        } elseif ($act == 'password') {

            $this->form_validation->set_rules('old_password', lang('old_password'), 'required');
            $this->form_validation->set_rules('new_password', lang('new_password'), 'required|min_length[8]|max_length[25]');
            $this->form_validation->set_rules('new_password_confirm', lang('confirm_password'), 'required|matches[new_password]');

            if ($this->form_validation->run() == false) {
                $this->session->set_flashdata('error', validation_errors());
                redirect('profile');
            } else {
                if (DEMO) {
                    $this->session->set_flashdata('warning', lang('disabled_in_demo'));
                    redirect($_SERVER["HTTP_REFERER"]);
                }

                $identity = $this->session->userdata($this->config->item('identity', 'ion_auth'));
                $change = $this->ion_auth->change_password($identity, $this->input->post('old_password'), $this->input->post('new_password'));

                if ($change) {
                    $this->session->set_flashdata('message', $this->ion_auth->messages());
                    $this->logout('m');
                } else {
                    $this->session->set_flashdata('error', $this->ion_auth->errors());
                    redirect('profile');
                }
            }

        }

        $this->data['featured_products'] = $this->shop_model->getFeaturedProducts();
        $this->data['customer'] = $this->site->getCompanyByID($this->session->userdata('company_id'));
        $this->data['user'] = $this->site->getUser();
        $this->data['page_title'] = lang('profile');
        $this->data['page_desc'] = $this->shop_settings->description;
        $this->page_construct('user/profile', $this->data);
    }

    function login($m = NULL) {
        if (!SHOP || $this->Settings->mmode) { redirect('admin/login'); }
        if ($this->loggedIn) {
            $this->session->set_flashdata('error', $this->session->flashdata('error'));
            redirect('/');
        }

        if ($this->Settings->captcha) {
            $this->form_validation->set_rules('captcha', lang('captcha'), 'required|callback_captcha_check');
        }

        if ($this->form_validation->run('auth/login') == true) {

            $remember = (bool)$this->input->post('remember_me');

            if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember)) {
                if ($this->Settings->mmode) {
                    if (!$this->ion_auth->in_group('owner')) {
                        $this->session->set_flashdata('error', lang('site_is_offline_plz_try_later'));
                        redirect('logout');
                    }
                }

                $this->session->set_flashdata('message', $this->ion_auth->messages());
                $referrer = ($this->session->userdata('requested_page') && $this->session->userdata('requested_page') != 'admin') ? $this->session->userdata('requested_page') : '/';
                redirect($referrer);
            } else {
                $this->session->set_flashdata('error', $this->ion_auth->errors());
                redirect('login');
            }

        } else {

            $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
            $this->data['message'] = $m ? lang('password_changed') : $this->session->flashdata('message');
            $this->data['page_title'] = lang('login');
            $this->data['page_desc'] = $this->shop_settings->description;
            $this->page_construct('user/login', $this->data);

        }
    }

    function logout($m = NULL) {
        if (!SHOP) { redirect('admin/logout'); }
        $logout = $this->ion_auth->logout();
        $referrer = (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : '/');
        $this->session->set_flashdata('message', $this->ion_auth->messages());
        redirect($m ? 'login/m' : $referrer);
    }

    function register() {

        $this->form_validation->set_rules('first_name', lang("first_name"), 'required');
        $this->form_validation->set_rules('last_name', lang("last_name"), 'required');
        $this->form_validation->set_rules('phone', lang("phone"), 'required');
        $this->form_validation->set_rules('company', lang("company"), 'required');
        $this->form_validation->set_rules('email', lang("email_address"), 'required|is_unique[users.email]');
        $this->form_validation->set_rules('username', lang("username"), 'required|is_unique[users.username]');
        $this->form_validation->set_rules('password', lang('password'), 'required|min_length[8]|max_length[20]|matches[password_confirm]');
        $this->form_validation->set_rules('password_confirm', lang('confirm_password'), 'required');

        if ($this->form_validation->run('') == true) {

            $email = strtolower($this->input->post('email'));
            $username = strtolower($this->input->post('username'));
            $password = $this->input->post('password');

            $customer_group = $this->shop_model->getCustomerGroup($this->Settings->customer_group);
            $price_group = $this->shop_model->getPriceGroup($this->Settings->price_group);

            $company_data = [
                'company' => $this->input->post('company') ? $this->input->post('company') : '-',
                'name' => $this->input->post('first_name').' '.$this->input->post('last_name'),
                'email' => $this->input->post('email'),
                'phone' => $this->input->post('phone'),
                'group_id' => 3,
                'group_name' => 'customer',
                'customer_group_id' => (!empty($customer_group)) ? $customer_group->id : NULL,
                'customer_group_name' => (!empty($customer_group)) ? $customer_group->name : NULL,
                'price_group_id' => (!empty($price_group)) ? $price_group->id : NULL,
                'price_group_name' => (!empty($price_group)) ? $price_group->name : NULL,
            ];

            $company_id = $this->shop_model->addCustomer($company_data);

            $additional_data = [
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'phone' => $this->input->post('phone'),
                'company' => $this->input->post('company'),
                'gender' => 'male',
                'company_id' => $company_id,
                'group_id' => 3
            ];
            $this->load->library('ion_auth');
        }

        if ($this->form_validation->run() == true && $this->ion_auth->register($username, $password, $email, $additional_data)) {
            $this->session->set_flashdata('message', lang("account_created"));
            redirect('login');
        } else {
            $this->session->set_flashdata('error', validation_errors());
            redirect('login#register');
        }
    }

    function activate($id, $code) {
        if (!SHOP) { redirect('admin/auth/activate/'.$id.'/'.$code); }
        if ($code) {
            if ($activation = $this->ion_auth->activate($id, $code)) {
                $this->session->set_flashdata('message', $this->ion_auth->messages());
                redirect("login");
            }
        } else {
            $this->session->set_flashdata('error', $this->ion_auth->errors());
            redirect("login");
        }
    }

    function forgot_password() {
        if (!SHOP) { redirect('admin/auth/forgot_password'); }
        $this->form_validation->set_rules('email', lang('email_address'), 'required|valid_email');

        if ($this->form_validation->run() == false) {
            $this->sma->send_json(validation_errors());
        } else {

            $identity = $this->ion_auth->where('email', strtolower($this->input->post('email')))->users()->row();
            if (empty($identity)) {
                $this->sma->send_json(lang('forgot_password_email_not_found'));
            }

            $forgotten = $this->ion_auth->forgotten_password($identity->email);
            if ($forgotten) {
                $this->sma->send_json(['status' => 'success', 'message' => $this->ion_auth->messages()]);
            } else {
                $this->sma->send_json(['status' => 'error', 'message' => $this->ion_auth->errors()]);
            }
        }
    }

    function reset_password($code = NULL) {
        if (!SHOP) { redirect('admin/auth/reset_password/'.$code); }
        if (!$code) {
            $this->session->set_flashdata('error', lang('page_not_found'));
            redirect('/');
        }

        $user = $this->ion_auth->forgotten_password_check($code);

        if ($user) {

            $this->form_validation->set_rules('new', lang('password'), 'required|min_length[8]|max_length[25]|matches[new_confirm]');
            $this->form_validation->set_rules('new_confirm', lang('confirm_password'), 'required');

            if ($this->form_validation->run() == false) {

                $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
                $this->data['message'] = $this->session->flashdata('message');
                $this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
                $this->data['new_password'] = [
                    'name' => 'new',
                    'id' => 'new',
                    'type' => 'password',
                    'class' => 'form-control',
                    'required' => 'required',
                    'pattern' => '(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}',
                    'data-fv-regexp-message' => lang('pasword_hint'),
                    'placeholder' => lang('new_password')
                ];
                $this->data['new_password_confirm'] = [
                    'name' => 'new_confirm',
                    'id' => 'new_confirm',
                    'type' => 'password',
                    'class' => 'form-control',
                    'required' => 'required',
                    'data-fv-identical' => 'true',
                    'data-fv-identical-field' => 'new',
                    'data-fv-identical-message' => lang('pw_not_same'),
                    'placeholder' => lang('confirm_password')
                ];
                $this->data['user_id'] = [
                    'name' => 'user_id',
                    'id' => 'user_id',
                    'type' => 'hidden',
                    'value' => $user->id,
                ];
                $this->data['code'] = $code;
                $this->data['identity_label'] = $user->email;
                $this->data['page_title'] = lang('reset_password');
                $this->data['page_desc'] = '';
                $this->page_construct('user/reset_password', $this->data);

            } else {
                // do we have a valid request?
                if ($user->id != $this->input->post('user_id')) {

                    $this->ion_auth->clear_forgotten_password_code($code);
                    redirect('notify/csrf');

                } else {
                    // finally change the password
                    $identity = $user->email;

                    $change = $this->ion_auth->reset_password($identity, $this->input->post('new'));
                    if ($change) {
                        //if the password was successfully changed
                        $this->session->set_flashdata('message', $this->ion_auth->messages());
                        redirect('login');
                    } else {
                        $this->session->set_flashdata('error', $this->ion_auth->errors());
                        redirect('reset_password/' . $code);
                    }
                }
            }
        } else {
            //if the code is invalid then send them back to the forgot password page
            $this->session->set_flashdata('error', $this->ion_auth->errors());
            redirect('/');
        }
    }

    function captcha_check($cap) {
        $expiration = time() - 300; // 5 minutes limit
        $this->db->delete('captcha', ['captcha_time <' => $expiration]);

        $this->db->select('COUNT(*) AS count')
        ->where('word', $cap)
        ->where('ip_address', $this->input->ip_address())
        ->where('captcha_time >', $expiration);

        if ($this->db->count_all_results('captcha')) {
            return true;
        } else {
            $this->form_validation->set_message('captcha_check', lang('captcha_wrong'));
            return FALSE;
        }
    }

    function hide($id = NULL) {
        $this->session->set_userdata('hidden' . $id, 1);
        echo true;
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
