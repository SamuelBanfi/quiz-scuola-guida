<?php
	class View{
		function __construct(){
			//echo "This is the view<br />";
		}

		public function render($name, $noInclude = false){
			if($noInclude == true){
				require 'application/views/' . $name . '.php';
			}else{
				require 'application/views/templates/header.php';
				require 'application/views/' . $name . '.php';
				require 'application/views/templates/footer.php';
			}
			
		}
	}
?>