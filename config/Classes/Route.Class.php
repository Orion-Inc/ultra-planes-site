<?php 
	/**
	* 
	*/
	class Route 
	{
		public static $auth = array(
			'admin-login','login', 
			'register', 
			'activate', 
			'forgot-password', 
			'recover'
		);
		public static $customer_dashboard = array(
			'dashboard', 
			'notifications', 
			'shipment-calculator', 
			'items',
			'request-shipment', 
			'expected-packages', 
			'track-package',
			'history', 
			'addresses', 
			'account-settings', 
			'FAQs', 
			'terms-conditions', 
			'contact-us'
		);
		public static $administrator_dashboard = array(
			'dashboard', 
			'notifications', 
			'shipment-calculator',
			'expected-packages-log', 
			'history',
			'account-settings',
			'new-order',
			'new-user',
			'manage-users',
			'roles-permissions'
		);
		public static $validRoutes = array();

		public static function set($route, $function)
		{
			self::$validRoutes[] = $route;
			//print_r(self::$validRoutes);
			
			if (explode('/', $_GET['url'])[0] == $route) {
				$function->__invoke();
			}
		}

		public static function title($route)
		{
			$title = '';
			self::$validRoutes[] = $route;
				//print_r(self::$validRoutes);

			if (explode('/', $_GET['url'])[0] == $route) {
				$page = explode('-', $route);
				foreach ($page as $text) {
					$array[] = ucwords($text);
				}
				$title = implode(' ', $array);

				return $title;
			}

			return $title;
		}
	}

?>