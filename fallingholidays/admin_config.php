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
		

		protected $preftabs        = array(LAN_FHS_GENERAL, LAN_FHS_LIGHTS, LAN_FHS_ST_SSTORM );
		protected $prefs = array(
		'XMasLights'		=> array('title'=> LAN_FHS_XMAS_ACTIVTION, 'tab'=>0, 'type'=>'boolean', 'data' => 'str', 'help'=> LAN_FHS_XMAS_ACTIVTION_H),
		'LightsSize'		=> array('title'=> LAN_FHS_LSIZE, 'tab'=>1, 'type'=>'dropdown', 'writeParms'  =>array('optArray'=>array(
                                              'pico'=> LAN_FHS_LS_NORMAL,
                                              'tiny'=> LAN_FHS_LS_TINY,
                                              'small'=> LAN_FHS_LS_SMALL,
                                              'medium'=> LAN_FHS_LS_MEDIUM,                                              
                                              'large'=> LAN_FHS_LS_LARGE)
                                              ),'data' => 'str', 'help'=> LAN_FHS_LSIZE_H),
    'LightsTop'		=> array('title'=> LAN_FHS_PADDING, 'tab'=>1, 'type'=>'text', 'data' => 'str', 'help'=> LAN_FHS_PADDING_H),
	  'SnowActive'		=> array('title'=> LAN_FHS_SNOW_ACTIVTION, 'tab'=>0, 'type'=>'boolean', 'data' => 'str', 'help'=> LAN_FHS_SNOW_ACTIVTION_H),    
	  'snowType'		=> array('title'=> LAN_FHS_SNOW_TYPE, 'tab'=>0, 'type'=>'dropdown', 'writeParms'  =>array('optArray'=>array(
                                              'snowthreed'=> LAN_FHS_ST_SNOW3D,
                                              'snowstorm'=> LAN_FHS_ST_SSTORM)
                                              ),'data' => 'str', 'help'=> LAN_FHS_ST_H),   
	  'snowAutoStart'		=> array('title'=> LAN_FHS_SAUTO_START, 'tab'=>2, 'type'=>'boolean', 'data' => 'str', 'help'=> LAN_FHS_SAUTO_START_H),
	  'snowAnimationInterval'		=> array('title'=> LAN_FHS_SANIMATION, 'tab'=>2, 'type'=>'number', 'data' => 'str', 'help'=> LAN_FHS_SANIMATION_H),
	  'snowFlakesMax'		=> array('title'=> LAN_FHS_SF_MAX, 'tab'=>2, 'type'=>'number', 'data' => 'str', 'help'=> LAN_FHS_SF_MAX_H),
	  'snowFlakesMaxActive'		=> array('title'=> LAN_FHS_SFM_ACTIVE, 'tab'=>2, 'type'=>'number', 'data' => 'str', 'help'=> LAN_FHS_SFM_ACTIVE_H),
	  'snowFollowMouse'		=> array('title'=> LAN_FHS_S_FM, 'tab'=>2, 'type'=>'boolean', 'data' => 'str', 'help'=> LAN_FHS_S_FM_H),
	  'snowFreezeOnBlur'		=> array('title'=> LAN_FHS_SFOB, 'tab'=>2, 'type'=>'boolean', 'data' => 'str', 'help'=> LAN_FHS_SFOB_H),
	  'snowColor'		=> array('title'=> LAN_FHS_SCOLOR, 'tab'=>2, 'type'=>'text', 'data' => 'str', 'help'=> LAN_FHS_SCOLOR_H),
      'snowCharacter'		=> array('title'=> LAN_FHS_SCHAR, 'tab'=>2, 'type'=>'text', 'data' => 'str', 'help'=> LAN_FHS_SCHAR_H),
	  'snowStick'		=> array('title'=> LAN_FHS_SSTICK, 'tab'=>2, 'type'=>'boolean', 'data' => 'str', 'help'=> LAN_FHS_SSTICK_H),
	  'snowMeltEffect'		=> array('title'=> LAN_FHS_SMELT, 'tab'=>2, 'type'=>'boolean', 'data' => 'str', 'help'=> LAN_FHS_SMELT_H),
	  'snowTwinkleEffect'		=> array('title'=> LAN_FHS_STWINK, 'tab'=>2, 'type'=>'boolean', 'data' => 'str', 'help'=> LAN_FHS_STWINK_H),
	  'snowPositionFixed'		=> array('title'=> LAN_FHS_SPOSFIX, 'tab'=>2, 'type'=>'boolean', 'data' => 'str', 'help'=> LAN_FHS_SPOSFIX_H),
	  'snowExcludeMobile'		=> array('title'=> LAN_FHS_SEMOBILE, 'tab'=>2, 'type'=>'boolean', 'data' => 'str', 'help'=> LAN_FHS_SEMOBILE_H),
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