function get_questions(){
		var req = new XMLHttpRequest();
		/*
		line 2
		activates object(XMLHttpREquest) which establishes continous 
		asynchronous connection to the database
		*/
		req.onreadystatechange = function() {//checks the readiness of the connection
			if(req.readyState == 4 && req.status == 200){
				//do something here
				/*line 9,
				checks whether the request is completed, if set to 4, it is completed and if 
				status is 200, means the page that we've specified has been found
				*/
			}
		}
		req.open('GET', 'url.extension', true);
		/*
		line 13,
		this open() function specifies the http method you are
		 using and url path that you want to access and sets it to true
		*/
		dest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		/*line 19,
		this line is responsible for sending http request headers neccessary for any
		established connection
		*/
		req.send(); //sends the request
	}
	setInterval(function(){get_questions()}, 1000);