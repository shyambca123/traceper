<?php
function getContent($callbackURL, $updateUserListInterval, $apiKey, $language) {
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<title></title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta name="keywords"  content="" />
		<meta name="description" content="open source GPS tracking system" />
		<link rel="stylesheet" type="text/css" href="style.css" />
		
     <script type="text/javascript" src="http://www.google.com/jsapi?key=<?php echo $apiKey; ?>">
   </script>
    
      <script type="text/javascript" charset="utf-8">
   
        google.load("maps", "2.x");
   
   //     google.load("jquery", "1.3.1");
		
//		google.load("jqueryui", "1.7.1");
   
      </script>
      	  
	  <link type="text/css" href="js/jquery/plugins/colorbox/colorbox.css" rel="stylesheet" media="screen"/>

	<script type="text/javascript" src="js/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery/plugins/colorbox/jquery.colorbox-min.js"></script>
	<script type="text/javascript" src="js/TrackerOperator.js"></script>
	<script type="text/javascript" src="js/LanguageOperator.js"></script>		
	<script type="text/javascript" src="js/bindings.js"></script>	
	<script type="text/javascript">		
		var langOp = new LanguageOperator(); 
		langOp.load("<?php echo $language ?>"); 	
				
		$(document).ready( function(){			
			setLanguage(langOp);	
			
			var map;
			try 
			{
				if (GBrowserIsCompatible()) 
				{
   					map = new GMap2(document.getElementById("map"));
   					map.setCenter(new GLatLng(39.504041,35.024414), 4);
					map.setUIToDefault();					
					map.setMapType(G_HYBRID_MAP);	
	   	
   					var trackerOp = new TrackerOperator('<?php echo $callbackURL; ?>', map, <?php echo $updateUserListInterval; ?>, langOp);			
					trackerOp.getUserList(1); 	
   				}
			}
   			catch (e) {
				
			}   
			
			bindElements(langOp, trackerOp);
		});	
	</script>	
	
	</head>
	<body  onunload="GUnload();" >
	
	<div id='wrap'>										
				<div id='sideBar'>	
					<div id='content'>						
	 						<div id='logo'></div>	 						
							<div id='lists'>							
								<div class='title'></div>	
								<div id='searchArea'>						
									<input type='text' id='searchBox' /><img src='images/search.png' id='searchButton'  />
								</div>
								<div id="users">																
								</div>
								<div id='search'>
									<a href='#returnToUserList'></a>	
									<div id='results'></div>								
								</div>		
								<div id='footer'>							
									<a href='#auLink'></a>								
								</div>					
							</div>
							
					</div>																															
				</div>
				<div id='map'>MAP</div>	
				<div id='loading'></div>			
										
	</div>
	<div style="display:none;">	
	<div id='aboutus'></div>	
	</div>
	</body>
</html>
<?php
}
?>