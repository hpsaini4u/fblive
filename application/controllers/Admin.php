<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	
	public function __construct()
    {
        parent::__construct();
		$this->load->library('session');
		
		if(!empty($this->session->userdata('user_id'))){
		
		 $email_id=$this->session->userdata('email_id');
		 $user_id=$this->session->userdata('id');
		 $private_web_address=$this->session->userdata('private_web_address');	
			
		//print_r($user_id);die;	

		}
		else
		{
			redirect('/');
		}
		
		$this->load->model("m_admin");
		$this->load->model("m_products");
		$this->load->model("m_customer");
		$this->load->model("m_setup");
		$this->load->model("m_sell");
		$this->load->model("m_ecommerce");
		
    }
	
	public function index()
	{
		$this->load->view('admin/include/header');
		$this->load->view('admin/dashboard');
		$this->load->view('admin/include/footer');
	}
	
	/*********** Sell Section Start *************/
	
	public function sell()
	{	
	 $data=$this->m_sell->product_list();
	 $data1=$this->m_sell->get_val_openclose();	

		//echo "<pre>";print_r($data);die;
		
	 $cartlist =$this->m_sell->cart_list();
	 $subtotal = '';
	 $adminCurrencyCode = $this->m_sell->adminCurrencyCode();
	 $messageBox = $this->m_setup->messageBoxDetailById();
	$this->load->view('admin/include/header');
	 $this->load->view('admin/sell/sell',['data'=>$data,'opnClose'=>$data1,'cartlist' => $cartlist,'subtotal' =>$subtotal,'CurrencyCode' =>$adminCurrencyCode,'messageBox' =>$messageBox]);
	 $this->load->view('admin/include/footer');
	 
		
	
	}
	
	public function cartDiv()
	{	
	 $cartlist =$this->m_sell->cart_list();
	 $subtotal = '';
	 $adminCurrencyCode = $this->m_sell->adminCurrencyCode();
		
	 $this->load->view('admin/sell/cartDiv',['cartlist' => $cartlist,'subtotal' =>$subtotal,'CurrencyCode' =>$adminCurrencyCode]);
	 
	}
	
	public function checkout()
	{	
	 $data=$this->m_sell->product_list();	
	 $cartlist =$this->m_sell->cart_list();
		//print_r($cartlist);die;
		if(!empty($cartlist))
		{	
	 		$cartCustomerDetails =$this->m_sell->get_cart_customer_by_id($cartlist[0]['customer_id']);
		}	
	 $cartCountlist =$this->m_sell->cart_count_list();	
	 $subtotal = '';
	 $adminCurrencyCode = $this->m_sell->adminCurrencyCode();
		
	 $this->load->view('admin/include/header');
		if(!empty($cartlist))
		{
	 $this->load->view('admin/sell/checkout',['data'=>$data,'cartlist' => $cartlist,'subtotal' =>$subtotal,'CurrencyCode' =>$adminCurrencyCode,'cartCountlist' => $cartCountlist,'cartCustomerDetails' => $cartCustomerDetails]);
		}
		else
		{
		$this->load->view('admin/sell/checkout',['data'=>$data,'cartlist' => $cartlist,'subtotal' =>$subtotal,'CurrencyCode' =>$adminCurrencyCode,'cartCountlist' => $cartCountlist]);	
		}
		
	 $this->load->view('admin/include/footer');
	}
	
	public function saleshistory()
	{	
	 $orderlist =$this->m_sell->order_list();
	 foreach($orderlist as $ct){
        $cat_id = $ct['id'];
   		 }

	 //$orderlist['orderListDetails'] = $this->m_sell->order_list_details($cat_id);
	 //echo "<pre>";print_r($orderlist);die;
	 $subtotal = '';
	 $adminCurrencyCode = $this->m_sell->adminCurrencyCode();
		
	 $this->load->view('admin/include/header');
	 $this->load->view('admin/sell/salehistory',['orderlist' =>$orderlist,'subtotal' =>$subtotal,'CurrencyCode' =>$adminCurrencyCode]);
	 $this->load->view('admin/include/footer');
	}
	
	public function close()
	{	
	 $data=$this->m_sell->openclose();	
	 $adminCurrencyCode = $this->m_sell->adminCurrencyCode();	
	 $this->load->view('admin/include/header');
	 $this->load->view('admin/sell/open_close',['data'=>$data,'CurrencyCode' =>$adminCurrencyCode]);
	 $this->load->view('admin/include/footer');
	}
	public function open()
	{	
	 //$data=$this->m_sell->openclose();	
	 //$adminCurrencyCode = $this->m_sell->adminCurrencyCode();
	 $data=$this->m_sell->openclose();	
	 $this->load->view('admin/include/header');
	 $this->load->view('admin/sell/register');
	 $this->load->view('admin/include/footer');
	}
	public function openclose()
	{	
	$data=$this->m_sell->get_val_openclose();	

	 if($data['opening_float_amount']==''){
		 redirect("admin/open/".$data['id']);
		 
	 }else{
		 redirect('admin/close'); 
		 
	 }
	}
	
	
	public function cashmanagement()
	{	
	 $data=$this->m_sell->cash_list();	
	 $adminCurrencyCode = $this->m_sell->adminCurrencyCode();
		
	 $this->load->view('admin/include/header');
	 $this->load->view('admin/sell/cash_management',['data'=>$data,'CurrencyCode' =>$adminCurrencyCode]);
	 $this->load->view('admin/include/footer');
	}
	
	public function status()
	{	
	 /*$data=$this->m_sell->product_list();	
	 $cartlist =$this->m_sell->cart_list();
	 $subtotal = '';
	 $adminCurrencyCode = $this->m_sell->adminCurrencyCode();
		,['data'=>$data,'cartlist' => $cartlist,'subtotal' =>$subtotal,'CurrencyCode' =>$adminCurrencyCode]*/
	 $this->load->view('admin/include/header');
	 $this->load->view('admin/sell/status');
	 $this->load->view('admin/include/footer');
	}
	
	
	/*********** Sell Section End *************/
	
	/*********** Product Section Start *************/
	
	public function products()
	{
	 $productList=$this->m_products->product_list();	
	 $messageBox = $this->m_setup->messageBoxDetailById();
	 //echo "<pre>";print_r($brandList);die;
		
	 $this->load->view('admin/include/header');			
	 $this->load->view('admin/products/products',['productList'=>$productList,'messageBox'=>$messageBox]);
	 $this->load->view('admin/include/footer');
		
	}
	
	public function addproduct()
	{
	
	//echo "<pre>";print_r($brandList);die;
	$productList['category']=$this->m_products->category_list();		
	$productList['type']=$this->m_products->type_list();	
	$productList['tags']=$this->m_products->tag_list();	
	$productList['brand']=$this->m_products->brand_list();	
	$productList['supplier']=$this->m_products->supplier_list();		
		
		
	 $this->load->view('admin/include/header');			
	 $this->load->view('admin/products/addproduct',['productList'=>$productList]);
	 $this->load->view('admin/include/footer');
		
	}
	
	public function editproduct()
	{
	 $uid = base64_decode($_GET['uid']);
	 //echo $uid; die;
	$data = $this->m_products->getProductByID($uid);
	$data['category']=$this->m_products->category_list();		
	$data['type']=$this->m_products->type_list();	
	$data['tags']=$this->m_products->tag_list();	
	$data['brand']=$this->m_products->brand_list();	
	$data['supplier']=$this->m_products->supplier_list();		
		
		
	 $this->load->view('admin/include/header');			
	 $this->load->view('admin/products/editproduct',['data'=>$data]);
	 $this->load->view('admin/include/footer');
		
	}
	
	
	public function suppliers()
	{
     $supplierList=$this->m_products->supplier_list();	
	 $messageBox = $this->m_setup->messageBoxDetailById();
	 //echo "<pre>";print_r($brandList);die;	
		
	 $this->load->view('admin/include/header');			
	 $this->load->view('admin/products/suppliers',['supplierList'=>$supplierList,'messageBox'=>$messageBox]);
	 $this->load->view('admin/include/footer');
		
	}
	
	public function addsupplier()
	{
	 $countryList=$this->m_products->countries_list();		
	 //print_r($countryList);die;	
		
	 $this->load->view('admin/include/header');			
	 $this->load->view('admin/products/addsupplier',['countryList'=>$countryList]);
	 $this->load->view('admin/include/footer');
		
	}
	
	public function editsupplier()
	{
	 $uid = base64_decode($_GET['uid']);
	 //echo $uid; die;
	 $editResult = $this->m_products->getSupplierByID($uid);
	 $editResult['countryList']=$this->m_products->countries_list();		
	 //print_r($countryList);die;	
	 //echo "<pre>";print_r($editResult);die;
		
	 $this->load->view('admin/include/header');			
	 $this->load->view('admin/products/editsupplier',['editResult'=>$editResult]);
	 $this->load->view('admin/include/footer');
		
	}
	
	public function producttags()
	{
		$tagList=$this->m_products->tag_list();	
		$messageBox = $this->m_setup->messageBoxDetailById();	
	 //echo "<pre>";print_r($brandList);die;	
		
	 $this->load->view('admin/include/header');			
	 $this->load->view('admin/products/tags',['tagList'=>$tagList,'messageBox'=>$messageBox]);
	 $this->load->view('admin/include/footer');
		
	}
	
	public function addproducttags()
	{	
	 
	 $this->load->view('admin/include/header');			
	 $this->load->view('admin/products/addtags');
	 $this->load->view('admin/include/footer');
		
	}
	
	public function editproducttags()
	{	
	 $uid = base64_decode($_GET['uid']);
	 //echo $uid; die;
	 $editResult = $this->m_products->getTagByID($uid);
	 //echo "<pre>";print_r($editResult);die;	
	 $this->load->view('admin/include/header');			
	 $this->load->view('admin/products/edittags',['editResult'=>$editResult]);
	 $this->load->view('admin/include/footer');
		
	}
	
	public function brand()
	{
	 $brandList=$this->m_products->brand_list();	
	 $messageBox = $this->m_setup->messageBoxDetailById();	
	 //echo "<pre>";print_r($brandList);die;
	
	 $this->load->view('admin/include/header');			
	 $this->load->view('admin/products/brand',['brand'=>$brandList,'messageBox'=>$messageBox]);
	 $this->load->view('admin/include/footer');
	}
	
	public function addbrand()
	{
	 $this->load->view('admin/include/header');			
	 $this->load->view('admin/products/addbrand');
	 $this->load->view('admin/include/footer');
		
	}
	
	public function editbrand()
	{
	 $uid = base64_decode($_GET['uid']);
	 //echo $uid; die;
	 $editResult = $this->m_products->getBrandByID($uid);
	 //echo "<pre>";print_r($editResult);die;	
		
	 $this->load->view('admin/include/header');			
	 $this->load->view('admin/products/editbrand',['editResult'=>$editResult]);
	 $this->load->view('admin/include/footer');
		
	}
		
	public function producttype()
	{
	 $typeList=$this->m_products->type_list();	
	 $messageBox = $this->m_setup->messageBoxDetailById();	
		
	 //echo "<pre>";print_r($brandList);die;
	 $this->load->view('admin/include/header');			
	 $this->load->view('admin/products/product_type',['typeList'=>$typeList,'messageBox'=>$messageBox]);
	 $this->load->view('admin/include/footer');
	}
	
	public function addproducttype()
	{
	 $this->load->view('admin/include/header');			
	 $this->load->view('admin/products/addproduct_type');
	 $this->load->view('admin/include/footer');
		
	}
	
	public function editproducttype()
	{
	$uid = base64_decode($_GET['uid']);
	 //echo $uid; die;
	 $editResult = $this->m_products->getTypeByID($uid);
	 //echo "<pre>";print_r($editResult);die;	
		
	 $this->load->view('admin/include/header');			
	 $this->load->view('admin/products/editproduct_type',['editResult'=>$editResult]);
	 $this->load->view('admin/include/footer');
		
	}
	
	
	public function pricebooks()
	{
	 $pricebookList=$this->m_products->pricebook_list();	
		
	 $this->load->view('admin/include/header');			
	 $this->load->view('admin/products/pricebook',['pricebookList'=>$pricebookList]);
	 $this->load->view('admin/include/footer');
		
	}
	
	public function addpricebook()
	{
	 $customerList['customergroup']=$this->m_products->customergroup_list();	
	 $customerList['outlet']=$this->m_products->outlet_list();	
		
	 $this->load->view('admin/include/header');			
	 $this->load->view('admin/products/addpricebook',['customerList'=>$customerList]);
	 $this->load->view('admin/include/footer');
		
	}
	
	public function editPriceBook()
	{
	$uid = base64_decode($_GET['uid']);
	 
	 $editResult = $this->m_products->getPriceByID($uid);
	 $editResult['customergroup']=$this->m_products->customergroup_list();	
	 $editResult['outlet']=$this->m_products->outlet_list();
	 //echo "<pre>";print_r($editResult);die;	
		
	 $this->load->view('admin/include/header');			
	 $this->load->view('admin/products/editpricebook',['editResult'=>$editResult]);
	 $this->load->view('admin/include/footer');
		
	}
	
	/*********** Product Section End *************/
	
	
	/*********** Customer Section Start *************/
	
	public function customers()
	{
	 $data['groupList']=$this->m_customer->group_list();	
	 $data['customersList']=$this->m_customer->customer_list();	
	 $data['countryList']=$this->m_customer->countries_list();	
	 $messageBox = $this->m_setup->messageBoxDetailById();	
		
	 //echo "<pre>";print_r($brandList);die; 
	 $this->load->view('admin/include/header');			
	 $this->load->view('admin/customers/customers',['data'=>$data, 'messageBox'=>$messageBox]);
	 $this->load->view('admin/include/footer');
	}
	
	public function addcustomer()
	{
	 $data['groupList']=$this->m_customer->group_list();		
	 $data['countryList']=$this->m_customer->countries_list();		
		
	 $this->load->view('admin/include/header');			
	 $this->load->view('admin/customers/addcustomer',['data'=>$data]);
	 $this->load->view('admin/include/footer');
		
	}
	
	public function editcustomer()
	{
	 $uid = base64_decode($_GET['uid']);
	 $editResult = $this->m_customer->getCustomerByID($uid);
	 $editResult['groupList']=$this->m_customer->group_list();	
	 $editResult['countryList']=$this->m_customer->countries_list();
	 //echo "<pre>";print_r($editResult);die;	
		
	 $this->load->view('admin/include/header');			
	 $this->load->view('admin/customers/editcustomer',['editResult'=>$editResult]);
	 $this->load->view('admin/include/footer');
		
	}
	
	public function groups()
	{
	 $data['groupList']=$this->m_customer->group_list();
	 $messageBox = $this->m_setup->messageBoxDetailById();		
		
	 $this->load->view('admin/include/header');			
	 $this->load->view('admin/customers/groups',['data'=>$data, 'messageBox'=>$messageBox]);
	 $this->load->view('admin/include/footer');
	}
	
	public function addgroup()
	{
	 $this->load->view('admin/include/header');			
	 $this->load->view('admin/customers/addgroup');
	 $this->load->view('admin/include/footer');
		
	}
	
	public function editgroup()
	{
	 $uid = base64_decode($_GET['uid']);
	 $editResult = $this->m_customer->getGroupByID($uid);
	 //echo "<pre>";print_r($editResult);die;	
		
	 $this->load->view('admin/include/header');			
	 $this->load->view('admin/customers/editgroup',['editResult'=>$editResult]);
	 $this->load->view('admin/include/footer');
		
	}
	
	/*********** Customer Section End *************/
	
	/*********** Ecommerce Section Start *************/
	
	public function edashboard()
	{
	 //$data=$this->m_setup->generalDetailById();	
	 //$data['countryList']=$this->m_setup->countries_list();
	 //$data['timezoneList']=$this->m_setup->time_zone_list();	
	 //$data['salestaxList']=$this->m_setup->sales_tax_list();	
		
	 //echo "<pre>";print_r($data['timezoneList']);die;	
		
	 $this->load->view('admin/include/header');			
	 $this->load->view('admin/ecommerce/edashboard');
	 $this->load->view('admin/include/footer');
	}
	
	public function collections()
	{
	 $data = $this->m_ecommerce->getCategoryList();	
	 $cat = $this->m_ecommerce->getallCategory();
	// $data['subCategory'] = $this->m_ecommerce->getSubCategoryList();	
	$tree = $this->buildTree($cat);
	$this->load->view('admin/include/header');			
	 $this->load->view('admin/ecommerce/collections',['data' =>$data,'tree' =>$tree]);
	 $this->load->view('admin/include/footer');
	}
	public function buildTree(array $elements, $parentId = 0) {
   $branch = array();

   foreach ($elements as $element) {
       if ($element['parent_id'] == $parentId) {
           $children = $this->buildTree($elements, $element['id']);
           if ($children) {
               $element['children'] = $children;
           }
           $branch[] = $element;
       }
   }
  
   return $branch;
}
	 //$data['countryList']=$this->m_setup->countries_list();
	 //$data['timezoneList']=$this->m_setup->time_zone_list();	
	 //$data['salestaxList']=$this->m_setup->sales_tax_list();	
		
	 //echo "<pre>";print_r($data['timezoneList']);die;	
		
	
	
	public function addcollection($id=null)
	{
	if($id==null){
			 $data = $this->m_ecommerce->getCategoryList();	
	}else{
			 $data = $this->m_ecommerce->getCategoryList_by_id($id);
			 
	}
	 //$data['subCategory'] = $this->m_ecommerce->getSubCategoryList();	
	 //$data['countryList']=$this->m_setup->countries_list();
	 //$data['timezoneList']=$this->m_setup->time_zone_list();	
	 //$data['salestaxList']=$this->m_setup->sales_tax_list();	
		
	 //echo "<pre>";print_r($data['timezoneList']);die;	
		
	 $this->load->view('admin/include/header');			
	 $this->load->view('admin/ecommerce/addcollection',['data' =>$data]);
	 $this->load->view('admin/include/footer');
	}
	
	
	public function editcollection()
	{
		$this->load->model("M_ecommerce");
		$this->load->model("M_products");
	 $uid = base64_decode($_GET['uid']);
	 //echo $uid; die;
	$data = $this->M_ecommerce->getCollectionList_id($uid);
	$data['category']=$this->M_products->category_list();		
	//$data['type']=$this->M_products->type_list();	
	//$data['tags']=$this->M_products->tag_list();	
	//$data['brand']=$this->M_products->brand_list();	
	//$data['supplier']=$this->m_products->supplier_list();		
		
		
	 $this->load->view('admin/include/header');			
	 $this->load->view('admin/ecommerce/editcollection',['data'=>$data]);
	 $this->load->view('admin/include/footer');
	}
	
	public function eproducts($id=null)
	{
		 
	
		if($id==null){
			
			 $data=$this->m_products->product_list();
			 $data['total']=$this->m_products->product_list_total();	
		     $data['enable']=$this->m_products->product_list_enabled();	
	         $data['disable']=$this->m_products->product_list_disabled();	
	         $data['currency'] = $this->m_sell->adminCurrencyCode();

	}else{
		$id = base64_decode($_GET['uid']);
			 $data=$this->m_products->product_list_by_id($id);
			 /* echo '<pre>';
		print_r($data);
		echo '<pre>';
		die;  */
			$data['total']=$this->m_products->product_list_total_by_id($id);	
			 $data['enable']=$this->m_products->product_list_enabled_by_id($id);	
			 $data['disable']=$this->m_products->product_list_disabled_by_id($id);	
			$data['currency'] = $this->m_sell->adminCurrencyCode();
			//echo "<pre>";print_r($data['timezoneList']);die;	
			 
	}
	
		
	 $this->load->view('admin/include/header');			
	 $this->load->view('admin/ecommerce/eproducts',['data' =>$data]);
	 $this->load->view('admin/include/footer');
	}
	
	public function eorder()
	{
	 //$data=$this->m_setup->generalDetailById();	
	 //$data['countryList']=$this->m_setup->countries_list();
	 //$data['timezoneList']=$this->m_setup->time_zone_list();	
	 //$data['salestaxList']=$this->m_setup->sales_tax_list();	
		
	 //echo "<pre>";print_r($data['timezoneList']);die;	
		
	 $this->load->view('admin/include/header');			
	 $this->load->view('admin/ecommerce/eorder');
	 $this->load->view('admin/include/footer');
	}
	
	public function esetting()
	{
	 $data=$this->m_setup->generalDetailById();	
	 $data['countryList']=$this->m_setup->countries_list();
	 //$data['timezoneList']=$this->m_setup->time_zone_list();	
	 //$data['salestaxList']=$this->m_setup->sales_tax_list();	
		
	 //echo "<pre>";print_r($data['timezoneList']);die;	
		
	 $this->load->view('admin/include/header');			
	 $this->load->view('admin/ecommerce/esetting',['data' =>$data]);
	 $this->load->view('admin/include/footer');
	}
	
	public function addtax()
	{
	 //$data=$this->m_setup->generalDetailById();	
	 $data['countryList']=$this->m_setup->countries_list();
	 //$data['timezoneList']=$this->m_setup->time_zone_list();	
	 //$data['salestaxList']=$this->m_setup->sales_tax_list();	
		
	 //echo "<pre>";print_r($data['timezoneList']);die;	
		
	 $this->load->view('admin/include/header');			
	 $this->load->view('admin/ecommerce/addtax',['data' =>$data]);
	 $this->load->view('admin/include/footer');
	}
	
	public function managetax()
	{
		
		$segments = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
		$id  = $segments[3];
		//print_r($_REQUEST);
		//die;
		
	 //$data=$this->m_setup->generalDetailById();	
	 $data['country']=$this->m_ecommerce->getcountriesbyId($id);
	 //$data['timezoneList']=$this->m_setup->time_zone_list();	
	 $data['salestaxList']=$this->m_setup->sales_tax_list();	
		
	 //echo "<pre>";print_r($data['timezoneList']);die;	
		
	 $this->load->view('admin/include/header');			
	 $this->load->view('admin/ecommerce/managetax',['data' =>$data]);
	 $this->load->view('admin/include/footer');
	}
	
	/*********** Ecommerce Section End *************/
	
	/*********** Setup Section Start *************/
	
	public function general()
	{
	 $data=$this->m_setup->generalDetailById();	
	 $data['countryList']=$this->m_setup->countries_list();
	 $data['timezoneList']=$this->m_setup->time_zone_list();	
	 $data['salestaxList']=$this->m_setup->sales_tax_list();	
		
	 //echo "<pre>";print_r($data['timezoneList']);die;	
		
	 $this->load->view('admin/include/header');			
	 $this->load->view('admin/setup/general',['data'=>$data]);
	 $this->load->view('admin/include/footer');
	}
	
	public function account()
	{
		
	 $this->load->view('admin/include/header');			
	 $this->load->view('admin/setup/account');
	 $this->load->view('admin/include/footer');
	}
	
	public function addreciepttemplate()
	{
	 //$uid = base64_decode($_GET['uid']);
	 //$editResult = $this->m_customer->getGroupByID($uid);
	 //echo "<pre>";print_r($editResult);die;	,['editResult'=>$editResult]
		
	 $this->load->view('admin/include/header');			
	 $this->load->view('admin/setup/addreciepttemplate');
	 $this->load->view('admin/include/footer');
		
	}
	
	public function editreciepttemplate()
	{
	 $uid = base64_decode($_GET['uid']);
	 $data = $this->m_setup->getreciepttemplateByID($uid);
	 //echo "<pre>";print_r($editResult);die;	
		
	 $this->load->view('admin/include/header');			
	 $this->load->view('admin/setup/editreciepttemplate',['data'=>$data]);
	 $this->load->view('admin/include/footer');
		
	}
	
	public function outlet()
	{
	 $data = $this->m_setup->default_outlet_list();
	 $receipt_template = $this->m_setup->receipt_list();
	 
	 $this->load->view('admin/include/header');			
	 $this->load->view('admin/setup/outlet',['data'=>$data,'receipt_template'=>$receipt_template]);
	 $this->load->view('admin/include/footer');
	}
	
	public function outlets()
	{
	 $uid = base64_decode($_GET['uid']);
	 $editResult = $this->m_setup->getOutletByID($uid);
	 //$data = $this->m_setup->default_outlet_list();
	 
	 $this->load->view('admin/include/header');			
	 $this->load->view('admin/setup/outlet_details',['editResult'=>$editResult]);
	 $this->load->view('admin/include/footer');
	}
	
	public function addoutlet()
	{
	 //$uid = base64_decode($_GET['uid']);
	 //$editResult = $this->m_customer->getGroupByID($uid);
	 //echo "<pre>";print_r($editResult);die;	,['editResult'=>$editResult]
	 $data['countryList']=$this->m_customer->countries_list();	
	 $data['tax_list'] = $this->m_setup->sales_tax_list();	
	 $data['timezoneList']=$this->m_setup->time_zone_list();
		
	 $this->load->view('admin/include/header');			
	 $this->load->view('admin/setup/addoutlet',['data'=>$data]);
	 $this->load->view('admin/include/footer');
		
	}
	
	public function editoutlet()
	{
		
	 $uid = base64_decode($_GET['uid']);
	 $editResult = $this->m_setup->getOutletByID($uid);
	 $editResult['countryList']=$this->m_customer->countries_list();	
	 $editResult['tax_list'] = $this->m_setup->sales_tax_list();
	 $editResult['timezoneList']=$this->m_setup->time_zone_list();
	 //echo "<pre>";print_r($editResult);die;	
		
	 $this->load->view('admin/include/header');			
	 $this->load->view('admin/setup/editoutlet',['editResult'=>$editResult]);
	 $this->load->view('admin/include/footer');
		
	}
	
	public function addregister()
	{
	 //$uid = base64_decode($_GET['uid']);
	 //$editResult = $this->m_customer->getGroupByID($uid);
	 //echo "<pre>";print_r($editResult);die;	,['editResult'=>$editResult]
		
	 $this->load->view('admin/include/header');			
	 $this->load->view('admin/setup/addregister');
	 $this->load->view('admin/include/footer');
		
	}
	
	public function editregister()
	{
	 //$uid = base64_decode($_GET['uid']);
	 //$editResult = $this->m_customer->getGroupByID($uid);
	 //echo "<pre>";print_r($editResult);die;	,['editResult'=>$editResult]
		
	 $this->load->view('admin/include/header');			
	 $this->load->view('admin/setup/editregister');
	 $this->load->view('admin/include/footer');
		
	}
	
	public function paymenttype()
	{
	 $data=$this->m_setup->paymenttype_list();	
	 $messageBox = $this->m_setup->messageBoxDetailById();
	 	
	 $this->load->view('admin/include/header');			
	 $this->load->view('admin/setup/paymenttype',['data'=>$data,'messageBox'=>$messageBox]);
	 $this->load->view('admin/include/footer');
	}
	
	public function addpaymenttype()
	{
	 $this->load->view('admin/include/header');			
	 $this->load->view('admin/setup/addpaymenttype');
	 $this->load->view('admin/include/footer');
	}
	
	public function editpaymenttype()
	{
	 $uid = base64_decode($_GET['uid']);
	 $data=$this->m_setup->paymenttypeById($uid);	
		
	 $this->load->view('admin/include/header');			
	 $this->load->view('admin/setup/editpaymenttype',['data'=>$data]);
	 $this->load->view('admin/include/footer');
	}
	
	public function salestax()
	{
	 $data['tax_list'] = $this->m_setup->sales_tax_list();
	 $data['default_outlet'] = $this->m_setup->default_outlet_list();
	 $messageBox = $this->m_setup->messageBoxDetailById();	
		
	 $this->load->view('admin/include/header');			
	 $this->load->view('admin/setup/salestax',['data'=>$data,'messageBox'=>$messageBox]);
	 $this->load->view('admin/include/footer');
	}
	
	public function addsalestax()
	{
	 $this->load->view('admin/include/header');			
	 $this->load->view('admin/setup/addsalestax');
	 $this->load->view('admin/include/footer');
	}
	
	public function editsalestax()
	{
	 $uid = base64_decode($_GET['uid']);
	 $data = $this->m_setup->salestaxById($uid);	
		
	 $this->load->view('admin/include/header');			
	 $this->load->view('admin/setup/editsalestax',['data'=>$data]);
	 $this->load->view('admin/include/footer');
	}
	
	public function loyalty()
	{
	 //$data=$this->m_setup->generalDetailById();	
	 //$data['countryList']=$this->m_customer->countries_list();
		
	 $this->load->view('admin/include/header');			
	 $this->load->view('admin/setup/loyalty');
	 $this->load->view('admin/include/footer');
	}
	
	public function useradd()
	{
	 //$data=$this->m_setup->generalDetailById();	
	 //$data['countryList']=$this->m_customer->countries_list();
		
	 $this->load->view('admin/include/header');			
	 $this->load->view('admin/setup/useradd');
	 $this->load->view('admin/include/footer');
	}
	
	public function user_permission()
	{
	 //$data=$this->m_setup->generalDetailById();	
	 //$data['countryList']=$this->m_customer->countries_list();
		
	 $this->load->view('admin/include/header');			
	 $this->load->view('admin/setup/user_permission');
	 $this->load->view('admin/include/footer');
	}
	
	public function users()
	{
	 $userdata=$this->m_setup->user_list();	
	 $data['roleList']=$this->m_setup->role_list();
		
	 $this->load->view('admin/include/header');			
	 $this->load->view('admin/setup/users',['data'=>$data,'userdata'=>$userdata]);
	 $this->load->view('admin/include/footer');
	}
	
	
	public function giftcard()
	{
	 //$data=$this->m_setup->generalDetailById();	
	 //$data['countryList']=$this->m_customer->countries_list();
		
	 $this->load->view('admin/include/header');			
	 $this->load->view('admin/setup/giftcard');
	 $this->load->view('admin/include/footer');
	}
	
	public function messagebox()
	{
	 $data=$this->m_setup->messageBoxDetailById();	
	 //$data['countryList']=$this->m_customer->countries_list();
		
	 $this->load->view('admin/include/header');			
	 $this->load->view('admin/setup/messagebox',['data'=>$data]);
	 $this->load->view('admin/include/footer');
	}
	
	
	/*********** Setup Section End *************/
	
	
	
	
	public function logout()
	{
		  
        $this->session->unset_userdata('user_id');
       
        $this->session->sess_destroy();
		redirect("/");
	}
}
