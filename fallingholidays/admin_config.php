<?php

// Generated e107 Plugin Admin Area 

require_once('../../class2.php');
if (!getperms('P')) 
{
	header('location:'.e_BASE.'index.php');
	exit;
}

// Added Language File - eXe
e107::lan('fallingholidays', true, true);

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
		

		protected $preftabs        = array(LAN_FHS_GENERAL, LAN_FHS_LIGHTS, LAN_FHS_ST_SSTORM, LAN_FHS_FMCSF, LAN_FHS_FMNYFW );
		protected $prefs = array(
		'XMasLights'		=> array('title'=> LAN_FHS_XMAS_ACTIVTION, 'tab'=>0, 'type'=>'boolean', 'data' => 'str', 'help'=> LAN_FHS_XMAS_ACTIVTION_H),
		'xmasLightsType'	=> array('title'=> LAN_FHS_LIGHT_TYPE, 'tab'=>0, 'type'=>'dropdown', 'writeParms' =>array('optArray'=>array(
											  'breakable'=> LAN_FHS_XL_BREAK,
											  'normal'=> LAN_FHS_XL_NORMAL)
											  ),'data' => 'str', 'help'=> LAN_FHS_XL_H),
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
                                              'snowstorm'=> LAN_FHS_ST_SSTORM,
											  'cssnow'=> LAN_FHS_ST_CSSNOW,
											  'fmcsnowfall'=> LAN_FHS_ST_FMCSNOWFALL)
                                              ),'data' => 'str', 'help'=> LAN_FHS_ST_H),
	  'FireWorksActive'		=> array('title'=> LAN_FHS_FIREWORKS_ACTIVTION, 'tab'=>0, 'type'=>'boolean', 'data' => 'str', 'help'=> LAN_FHS_FIREWORKS_ACTIVTION_H),    
	  'fireworksType'		=> array('title'=> LAN_FHS_FIREWORKS_TYPE, 'tab'=>0, 'type'=>'dropdown', 'writeParms'  =>array('optArray'=>array(
											  'fmnyfireworks'=> LAN_FHS_FWT_FMNYFIREWORKS)
                                              ),'data' => 'str', 'help'=> LAN_FHS_FWT_H),
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
	  'fmcsfCount'		=> array('title'=> LAN_FHS_FMCSF_COUNT, 'tab'=>3, 'type'=>'number', 'data' => 'str', 'help'=> LAN_FHS_FMCSF_COUNT_H),
	  'fmcsfColor'		=> array('title'=> LAN_FHS_FMCSF_COLOR, 'tab'=>3, 'type'=>'text', 'data' => 'str', 'help'=> LAN_FHS_FMCSF_COLOR_H),
	  'fmnyfwParticleCount'		=> array('title'=> LAN_FHS_FMNYFW_PCOUNT, 'tab'=>4, 'type'=>'number', 'data' => 'str', 'help'=> LAN_FHS_FMNYFW_PCOUNT_H),
	  'fmnyfwGravity'		=> array('title'=> LAN_FHS_FMNYFW_GRAVITY, 'tab'=>4, 'type'=>'text', 'data' => 'str', 'help'=> LAN_FHS_FMNYFW_GRAVITY_H),
	  'fmnyfwSpeedMin'		=> array('title'=> LAN_FHS_FMNYFW_SPEEDMIN, 'tab'=>4, 'type'=>'number', 'data' => 'str', 'help'=> LAN_FHS_FMNYFW_SPEEDMIN_H),
	  'fmnyfwSpeedMax'		=> array('title'=> LAN_FHS_FMNYFW_SPEEDMAX, 'tab'=>4, 'type'=>'number', 'data' => 'str', 'help'=> LAN_FHS_FMNYFW_SPEEDMAX_H),
	  'fmnyfwRadiusMin'		=> array('title'=> LAN_FHS_FMNYFW_RADIUSMIN, 'tab'=>4, 'type'=>'number', 'data' => 'str', 'help'=> LAN_FHS_FMNYFW_RADIUSMIN_H),
	  'fmnyfwRadiusMax'		=> array('title'=> LAN_FHS_FMNYFW_RADIUSMAX, 'tab'=>4, 'type'=>'number', 'data' => 'str', 'help'=> LAN_FHS_FMNYFW_RADIUSMAX_H),
	  'fmnyfwInterval'		=> array('title'=> LAN_FHS_FMNYFW_INTERVAL, 'tab'=>4, 'type'=>'number', 'data' => 'str', 'help'=> LAN_FHS_FMNYFW_INTERVAL_H),
	  'fmnyfwColor1'		=> array('title'=> LAN_FHS_FMNYFW_COLOR.' 1', 'tab'=>4, 'type'=>'text', 'data' => 'str', 'help'=> LAN_FHS_FMNYFW_COLOR_H),
	  'fmnyfwColor2'		=> array('title'=> LAN_FHS_FMNYFW_COLOR.' 2', 'tab'=>4, 'type'=>'text', 'data' => 'str', 'help'=> LAN_FHS_FMNYFW_COLOR_H),
	  'fmnyfwColor3'		=> array('title'=> LAN_FHS_FMNYFW_COLOR.' 3', 'tab'=>4, 'type'=>'text', 'data' => 'str', 'help'=> LAN_FHS_FMNYFW_COLOR_H),
	  'fmnyfwColor4'		=> array('title'=> LAN_FHS_FMNYFW_COLOR.' 4', 'tab'=>4, 'type'=>'text', 'data' => 'str', 'help'=> LAN_FHS_FMNYFW_COLOR_H),
	  'fmnyfwColor5'		=> array('title'=> LAN_FHS_FMNYFW_COLOR.' 5', 'tab'=>4, 'type'=>'text', 'data' => 'str', 'help'=> LAN_FHS_FMNYFW_COLOR_H),
	  'fmnyfwColor6'		=> array('title'=> LAN_FHS_FMNYFW_COLOR.' 6', 'tab'=>4, 'type'=>'text', 'data' => 'str', 'help'=> LAN_FHS_FMNYFW_COLOR_H),
		); 
	
		public function init()
		{
			// Set drop-down values (if any). 
	
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
		
		// left-panel help menu area. 
		public function renderHelp()
		{
			$caption = LAN_HELP;
			$text = 'Make sure you add the menus to the site so the lights, and snow display correctly';

			return array('caption'=>$caption,'text'=> $text);

		}
			
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
