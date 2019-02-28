<?php if ( ! defined('BASEPATH')) exit('Direct access allowed');

class LanguageSwitcher extends CI_Controller
{
   public function __construct() {
       parent::__construct();
   }
   function SwitchLang($language = "") {
       $language = ($language != "") ? $language : "english";
       $this->session->set_userdata('site_lang', $language);
       redirect(current_url());
   }
}