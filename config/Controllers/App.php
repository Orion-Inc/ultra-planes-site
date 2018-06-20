<?php 
	class App extends Database
	{
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