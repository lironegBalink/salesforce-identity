<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FIX, curated coffee components</title>

    <link href="reset.css" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,600" type="text/css" rel="stylesheet">
    <link href="main.css" rel="stylesheet">
	
    <meta name="salesforce-community" content="https://<?php echo getenv('SALESFORCE_COMMUNITY_URL');?>">
    <meta name="salesforce-client-id" content="<?php echo getenv('SALESFORCE_CLIENT_ID');?>">
    <meta name="salesforce-redirect-uri" content="https://<?php echo getenv('SALESFORCE_HEROKUAPP_URL');?>/_callback.php">
    <meta name="salesforce-mode" content="<?php echo getenv('SALESFORCE_MODE');?>">
    <meta name="salesforce-namespace" content="<?php echo getenv('SALESFORCE_NAMESPACE');?>">
    <meta name="salesforce-target" content="#sign-in-link">
    <meta name="salesforce-save-access-token" content="true">
    <meta name="salesforce-forgot-password-enabled" content="<?php echo getenv('SALESFORCE_FORGOT_PASSWORD_ENABLED');?>">
    <meta name="salesforce-self-register-enabled" content="<?php echo getenv('SALESFORCE_SELF_REGISTER_ENABLED');?>">
    <meta name="salesforce-login-handler" content="onLogin">
    <meta name="salesforce-logout-handler" content="onLogout">
	<link href="https://<?php echo getenv('SALESFORCE_COMMUNITY_URL');?>/servlet/servlet.loginwidgetcontroller?type=css" rel="stylesheet" type="text/css" />
    <script src="https://<?php echo getenv('SALESFORCE_COMMUNITY_URL');?>/servlet/servlet.loginwidgetcontroller?type=javascript_widget" async defer></script>

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <script>
	    //Wait for jquery to load before executing code
	   	$(window).load(async () => {
	    	console.log('HERE')
	        var getUrlParameter = function getUrlParameter(sParam) {
	            var sPageURL = decodeURIComponent(window.location.href);
	            var hash = sPageURL.substring(sPageURL.indexOf("#")+1);
	            var sURLVariables = hash.split('&');
	            var sParameterName, i;
	            for (i = 0; i < sURLVariables.length; i++) {
	                sParameterName = sURLVariables[i].split('=');
	                if (sParameterName[0] === sParam) {
	                    return sParameterName[1] === undefined ? true : sParameterName[1];
	                }
	            }
	        };
	        var access_token = getUrlParameter('access_token');
	                    console.log(access_token)
	        if(access_token) {
	            var url = `${'https://balink-poc-developer-edition.eu8.force.com/services/oauth2/userinfo'}`;
	        	var headers = { 
	        		method: 'GET',
	        		crossOrigin: true,
	        		headers: { 
	        			'Accept': 'application/json', 
	        			'Content-Type': 'application/json', 
	        			'Authorization': 'Bearer ' + access_token,
	        			"Access-Control-Allow-Origin" : "*"
	        		}
	        	};
	            var response = await fetch( `${url}`, headers );
	            var body = await response.json();
	            console.log(body)
	            var paragraph = document.getElementById("user");
	            var text = document.createTextNode('Hi, ' + body.name + '! Your Salesforce ID is: ' + body.user_id );
	            paragraph.appendChild(text);
	        }
	    });
    </script>

  </head>
  
  <body>
  	<div id="sign-in-link" style="position: absolute; top: 20px;right: 20px;"></div>
  	<a href="https://balink-poc-developer-edition.eu8.force.com/CommunitiesSelfReg" style="position: absolute; top: 30px;right: 125px;">Sign up</a>
  	<a href="https://login.salesforce.com/services/auth/sso/00D0N000001bziHUAQ/Line?community=https://balink-poc-developer-edition.eu8.force.com&amp;startURL=%2Fservices%2Foauth2%2Fauthorize%3Fresponse_type%3Dtoken%26client_id%3D3MVG9TSaZ8P6zP1r474LN9_pGmC6bFgzqocTGcnL7BskII.BOIgqTdg..1GQTIa4qm_EuMgpx6Br.hqrgvk9.%26redirect_uri%3Dhttps%3A%2F%2Fembedded-login-demo.herokuapp.com%2F%26state%3Dhttps%3A%2F%2Fembedded-login-demo.herokuapp.com%2F" style="position: absolute; top: 60px;right: 20px;"><img src="https://c.eu8.content.force.com/servlet/servlet.ImageServer?id=0150N000006rkbC&oid=00D0N000001bziH" style="margin:0;resize:none;position:relative;zoom:1;display:block;height:29px;width:28px;top:7px;left:-3px;border-radius: 5px;" class=""></a>
  	<a href="https://login.salesforce.com/services/auth/sso/00D0N000001bziHUAQ/Facebook?community=https://balink-poc-developer-edition.eu8.force.com&amp;startURL=%2Fservices%2Foauth2%2Fauthorize%3Fresponse_type%3Dtoken%26client_id%3D3MVG9TSaZ8P6zP1r474LN9_pGmC6bFgzqocTGcnL7BskII.BOIgqTdg..1GQTIa4qm_EuMgpx6Br.hqrgvk9.%26redirect_uri%3Dhttps%3A%2F%2Fembedded-login-demo.herokuapp.com%2F%26state%3Dhttps%3A%2F%2Fembedded-login-demo.herokuapp.com%2F" style="position: absolute; top: 60px;right: 20px;"><img src="https://c.eu8.content.force.com/servlet/servlet.ImageServer?id=0150N000006rkek&oid=00D0N000001bziH" style="margin:0;resize:none;position:relative;zoom:1;display:block;height:29px;width:28px;top:7px;left:-43px;border-radius: 5px;" class=""></a>
  	<a href="https://login.salesforce.com/services/auth/sso/00D0N000001bziHUAQ/WeChat?community=https://balink-poc-developer-edition.eu8.force.com&amp;startURL=%2Fservices%2Foauth2%2Fauthorize%3Fresponse_type%3Dtoken%26client_id%3D3MVG9TSaZ8P6zP1r474LN9_pGmC6bFgzqocTGcnL7BskII.BOIgqTdg..1GQTIa4qm_EuMgpx6Br.hqrgvk9.%26redirect_uri%3Dhttps%3A%2F%2Fembedded-login-demo.herokuapp.com%2F%26state%3Dhttps%3A%2F%2Fembedded-login-demo.herokuapp.com%2F" style="position: absolute; top: 60px;right: 20px;"><img src="https://c.eu8.content.force.com/servlet/servlet.ImageServer?id=0150N000006rkeu&oid=00D0N000001bziH" style="margin:0;resize:none;position:relative;zoom:1;display:block;height:29px;width:28px;top:7px;left:-80px;border-radius: 5px;" class=""></a>
    <header>
      <div class="masthead-elements-row-1">
        <div class="element-left"></div>
        <div class="element-middle">
          <br>
          <span class="logo-text">Louis Vuitton</span>
          <br>
          <span id="user" class="logo-text"></span>
        </div>
        <div class="element-right">
        </div>
      </div>
    </header>
   
    <footer>

      <div class="trailer-logo">
      </div>

      <div class="trailer-links">
        <ul class="internal-links">
          <li><a href="https://heroku.github.io/fix">About</a></li>
          <li><a href="https://heroku.github.io/fix">Support</a></li>
          <li><a href="https://heroku.github.io/fix">Contact Us</a></li>
        </ul>
        <ul class="social-links">
          <li><a href="#">
            <img class="social-logo" src="images/social/twitter.png" alt="">
            <span class="social-verb">Follow on</span>
            <span class="social-name">Twitter</span></a></li>
          <li><a href="#">
            <img class="social-logo" src="images/social/facebook.png" alt="">
            <span class="social-verb">Like Us on</span>
            <span class="social-name">Facebook</span></a></li>
          <li><a href="#">
            <img class="social-logo" src="images/social/instagram.png" alt="">
            <span class="social-verb">Follow on</span>
            <span class="social-name">Instagram</span></a></li>
        </ul>
      </div>

    </footer>
	

	
	<script>


	function onLogin(identity) {
		
		var targetDiv = document.querySelector(SFIDWidget.config.target);	
		
		var avatar = document.createElement('a'); 
	 	avatar.href = "javascript:showIdentityOverlay();";
		
		
		var img = document.createElement('img'); 
	 	img.src = identity.photos.thumbnail; 
		img.className = "sfid-avatar";
	
		var username = document.createElement('span'); 
		username.innerHTML = identity.username;
		username.className = "sfid-avatar-name";
	
		var iddiv = document.createElement('div'); 
	 	iddiv.id = "sfid-identity";
		
		avatar.appendChild(img);
		avatar.appendChild(username);
		iddiv.appendChild(avatar);		
	
		targetDiv.innerHTML = '';
		targetDiv.appendChild(iddiv);	
		
		var aero = document.getElementById("aero_link");
		aero.href = "/datasheets/AeroPress-Instr-English-Rev.-D2.pdf";
		aero.innerHTML = 'Datasheet';

		var reactor = document.getElementById("reactor_link");
		reactor.href = "/datasheets/Reactor_StovInst_EURO_EN.pdf";
		reactor.innerHTML = 'Datasheet';

		var chemex = document.getElementById("chemex_link");
		chemex.href = "/datasheets/2014_ChemexBrewGuide.pdf";
		chemex.innerHTML = 'Datasheet';
		
	}
	
	
	function showIdentityOverlay() {

		var lightbox = document.createElement('div'); 
	 	lightbox.className = "sfid-lightbox";
	 	lightbox.id = "sfid-login-overlay";
		lightbox.setAttribute("onClick", "SFIDWidget.cancel();");
		
		var wrapper = document.createElement('div'); 
	 	wrapper.id = "identity-wrapper";
		wrapper.onclick = function(event) {
		    event = event || window.event // cross-browser event
    
		    if (event.stopPropagation) {
		        // W3C standard variant
		        event.stopPropagation()
		    } else {
		        // IE variant
		        event.cancelBubble = true
		    }
		}
		
		var content = document.createElement('div'); 
	 	content.id = "sfid-content";

		var community = document.createElement('a');
		var commURL = document.querySelector('meta[name="salesforce-community"]').content;
		community.href = commURL;
		community.innerHTML = "Go to the Community";
		community.setAttribute("style", "float:left");
		content.appendChild(community);


		var logout = document.createElement('a'); 
	 	logout.href = "javascript:SFIDWidget.logout();SFIDWidget.cancel();";
		logout.innerHTML = "logout";
		logout.setAttribute("style", "float:right");
		content.appendChild(logout);
		
		var t = document.createElement('div'); 
	 	t.id = "sfid-token";
		t.className = "sfid-mb24";
		
		var p = document.createElement('pre'); 
	 	p.innerHTML = JSON.stringify(SFIDWidget.openid_response, undefined, 2);
		t.appendChild(p);
		
		content.appendChild(t);

		
		wrapper.appendChild(content);
		lightbox.appendChild(wrapper);
		
		document.body.appendChild(lightbox);	
		
	}
	
	
	function onLogout() {
		SFIDWidget.init();
		
		var aero = document.getElementById("aero_link");
		aero.href = "#";
		aero.innerHTML = 'Login for more info';

		var reactor = document.getElementById("reactor_link");
		reactor.href = "#";
		reactor.innerHTML = 'Login for more info';

		var chemex = document.getElementById("chemex_link");
		chemex.href = "#";
		chemex.innerHTML = 'Login for more info';

	}


	</script>
	
  </body>
</html>