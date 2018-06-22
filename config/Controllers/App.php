<?php 
	class App extends Database
	{
		public $MailHost = 'smtp.ipage.com';
        public $MailPort = 587;//80, 3535, 25, 465, 587
        public $MailSMTPAuth = true;
        //public $MailSMTPSecure = 'tls';
        public $MailUsername = 'sms@orionic.tech';
        public $MailPassword = 'sms@Oriondope$1000';


		public function show($text = "")
		{
			if ((string)$text != "") {
				echo $text;
			}else{
				echo "N/A";
			}
		}
		
		public static function CreateView($viewName)
		{
			require_once 'resources/views/'.$viewName.'.php';
		}

		public static function ViewPartial($partialName,$tree)
		{
			include 'resources/partials/'.$tree.'/'.$partialName.'.php';
		}

		public static function asset($assetName, $type)
		{
			echo  'assets/'.$type.'/'.$assetName;
		}
	}
?>