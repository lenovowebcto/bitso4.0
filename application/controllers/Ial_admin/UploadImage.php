<?php
class UploadImage extends CI_Controller {
	function __construct() {
		parent::__construct ();
		Auth::execute_auth ();
	}
	function index() {
		$data ['tips'] = "";
		$this->load->view ( 'ial/admin/uploadimage/uploadimage', $data );
	}
	function toaddimage() {
		$upload_file = $_FILES ['image'] ['tmp_name'];
		$upload_file_name = $_FILES ['image'] ['name'];
		$del = delete_files ( 'uploads/dashboard/' );
		if ($del) {
			$result = move_uploaded_file ( $_FILES ['image'] ['tmp_name'], "uploads/dashboard/image." . end(explode('.', $_FILES['image']['name'])));
			if ($result) {
				$data ['tips'] = "alert('Upload Succeeded!')";
			} else {
				$data ['tips'] = "alert('Upload Failed')";
			}
		} else {
			$data ['tips'] = "alert('Upload Failed')";
		}
		// $result = move_uploaded_file($_FILES['image']['tmp_name'] , "uploads/dashboard/image." . end(explode('.', $_FILES['image']['name'])));
		
		$this->load->view ( 'ial/admin/uploadimage/uploadimage', $data );
	}
}
