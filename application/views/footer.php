    </body>

		<?php
		if(isset($js)) {
			//Javascript loader
			foreach($js as $load)
			{
				echo '<script src="/js/'.$load.'.js" type="text/javascript"></script>';
			}
		}
		
		?>
</html>