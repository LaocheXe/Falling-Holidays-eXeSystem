<?php

// Generated e107 Plugin Admin Area 

require_once('../../class2.php');
if (!getperms('P')) 
{
	header('location:'.e_BASE.'index.php');
	exit;
}

// Added Language URL - eXe
include_lan(e_PLUGIN.'fallingholidays/languages/'.e_LANGUAGE.'.php');

class fallingholidays_adminArea extends e_admin_dispatcher
{

	protected $modes = array(	
	
		'main'	=> array(
			'controller' 	=> 'fallingholidays_ui',
			'path' 			=> null,
			'ui' 			=> 'fallingholidays_form_ui',
			'uipath' 		=> null
		),
		

	);	
	
	
	protected $adminMenu = array(
			
		'main/prefs' 		=> array('caption'=> LAN_PREFS, 'perm' => 'P'),	

		// 'main/custom'		=> array('caption'=> 'Custom Page', 'perm' => 'P')
	);

	protected $adminMenuAliases = array(
		'main/edit'	=> 'main/list'				
	);	
	
	protected $menuTitle = LAN_PLUGIN_FHS_NAME;
}




				
class fallingholidays_ui extends e_admin_ui
{
			
		protected $pluginTitle		= LAN_PLUGIN_FHS_NAME;
		protected $pluginName		= 'fallingholidays';
	//	protected $eventName		= 'FallingHolidays-'; // remove comment to enable event triggers in admin. 		
		protected $table			= '';
		protected $pid				= '';
		protected $perPage			= 10; 
		protected $batchDelete		= true;
	//	protected $batchCopy		= true;		
	//	protected $sortField		= 'somefield_order';
	//	protected $orderStep		= 10;
	//	protected $tabs				= array('Tabl 1','Tab 2'); // Use 'tab'=>0  OR 'tab'=>1 in the $fields below to enable. 
		
	//	protected $listQry      	= "SELECT * FROM `#tableName` WHERE field != '' "; // Example Custom Query. LEFT JOINS allowed. Should be without any Order or Limit.
	
		protected $listOrder		= ' DESC';
	
		protected $fields 		= NULL;		
		
		protected $fieldpref = array();
		

		protected $preftabs        = array(LAN_FHS_GENERAL, LAN_FHS_LIGHTS, LAN_FHS_SNOW );
		protected $prefs = array(
			'XMasLights'		=> array('title'=> LAN_FHS_XMAS_ACTIVTION, 'tab'=>0, 'type'=>'boolean', 'data' => 'str', 'help'=> LAN_FHS_XMAS_ACTIVTION_H),
			'LightsSize'		=> array('title'      => LAN_FHS_LSIZE, 'tab'=>1, 'type'=>'dropdown',  
                              'writeParms'  =>array('optArray'=>array(
                                              'pico'=> LAN_FHS_LS_NORMAL,
                                              'tiny'=> LAN_FHS_LS_TINY,
                                              'small'=> LAN_FHS_LS_SMALL,
                                              'medium'=> LAN_FHS_LS_MEDIUM,                                              
                                              'large'=> LAN_FHS_LS_LARGE)
                                              ),
                              'data' => 'str', 'help'=> LAN_FHS_LSIZE_H),
      'LightsTop'		  => array('title'=> LAN_FHS_PADDING, 'tab'=>1, 'type'=>'text', 'data' => 'str', 'help'=> LAN_FHS_PADDING_H),
	  'Snow3DActive'		=> array('title'=> LAN_FHS_SNOW_ACTIVTION, 'tab'=>0, 'type'=>'boolean', 'data' => 'str', 'help'=> LAN_FHS_SNOW_ACTIVTION_H),
		); 

	
		public function init()
		{
			// Set drop-down values (if any). 
	
		}

		
		// ------- Customize Create --------
		
		public function beforeCreate($new_data)
		{
			return $new_data;
		}
	
		public function afterCreate($new_data, $old_data, $id)
		{
			// do something
		}

		public function onCreateError($new_data, $old_data)
		{
			// do something		
		}		
		
		
		// ------- Customize Update --------
		
		public function beforeUpdate($new_data, $old_data, $id)
		{
			return $new_data;
		}

		public function afterUpdate($new_data, $old_data, $id)
		{
			// do something	
		}
		
		public function onUpdateError($new_data, $old_data, $id)
		{
			// do something		
		}		
		
			
	/*	
		// optional - a custom page.  
		public function customPage()
		{
			$text = 'Hello World!';
			return $text;
			
		}
	*/
			
}
				


class fallingholidays_form_ui extends e_admin_form_ui
{

}		
		
		
new fallingholidays_adminArea();

require_once(e_ADMIN."auth.php");
e107::getAdminUI()->runPage();

require_once(e_ADMIN."footer.php");
exit;

?>
