var contentURL, name = "";

chrome.windows.getCurrent(null, function(tab) {
	
	var maxWidth = window.screen.availWidth;
	var maxHeight = window.screen.availHeight;
	var updateInfo = {
    	width: 1280,
    	height: 768
	};
	chrome.windows.update(tab.id, updateInfo);
});

chrome.tabs.getSelected(null, function(tab) {
	contentURL = tab.url;
	document.getElementById('url').value = tab.url;
	
	name = contentURL.split('?')[0].split('#')[0];
    if(name){
        name = name
            .replace(/^https?:\/\//, '')
            .replace(/[^A-z0-9]+/g, '-')
            .replace(/-+/g, '-')
            .replace(/^[_\-]+/, '')
            .replace(/[_\-]+$/, '');
        name = '-' + name;
    } else {
        name = '';
    }
    name = 'michael-stevens' + name + '.png';
	//document.write(name);
});

chrome.tabs.captureVisibleTab(null, { "format":'png', "quality":100 }, function(dataURI){
	var canvas = document.createElement('canvas');
	var image = new Image();
	var screenshot = '';
		screenshot.canvas = canvas;
		screenshot.ctx = canvas.getContext('2d');
		
		if(typeof dataURI !== "undefined"){	
			image.onload = function() {
				screenshot.ctx.drawImage(image, 0, 0, 1280, 768);
            	callback(true);
			}
			image.src = dataURI;
			document.getElementById('image').value = dataURI;
			document.body.appendChild(image);	
		}
		
	setTimeout(function(){
		// The URL to POST our data to
		var postUrl = 'http://localhost:8888/core/forms/sites';
		var url = encodeURIComponent(document.getElementById('url').value);
		var img = encodeURIComponent(document.getElementById('image').value);
		var params = 'url='+url+'&image='+img;
		    params = params.replace(/%20/g, '+');

		// Set up an asynchronous AJAX POST request
		var xhr = new XMLHttpRequest();
			xhr.open('POST', postUrl, true);
			xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
			xhr.onreadystatechange = function() { 
		        if (xhr.readyState == 4) {
		            if (xhr.status == 200) {
						document.write('Saved!');
		            } else {
						document.write('Error saving: ' + xhr.statusText);
		            }
		        }
		    };

			// Send the request and set status
			xhr.send(params);
	},3000);
});




