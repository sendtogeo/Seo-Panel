var menuList = new Array();
var buttonList = new Array();
var scriptList = new Array();

/* Ajax post request */
function scriptDoLoadPost(scriptUrl, scriptForm, scriptPos, scriptArgs, noLoading) {
	if(!scriptArgs){ var scriptArgs = ''; }
	scriptArgs = $(scriptForm).serialize() + scriptArgs;
	myAjax = new Ajax.Updater(scriptPos, scriptUrl, {
		method : 'post',
		parameters : scriptArgs,
		evalScripts : true,
		onLoading: function(request){ showLoadingIcon(scriptPos, noLoading); },
		insertion : Insertion.Append
	});
}

/* Ajax get request */
function scriptDoLoad(scriptUrl, scriptPos, scriptArgs, noLoading) {
	myAjax = new Ajax.Updater(scriptPos, scriptUrl, {
		method : 'get',
		parameters : scriptArgs,
		evalScripts : true,
		onLoading : function(request){ showLoadingIcon(scriptPos, noLoading); },
		insertion : Insertion.Append
	});
}

function createCookie(name,value,days) {
	if (days) {
		var date = new Date();
		date.setTime(date.getTime()+(days*24*60*60*1000));
		var expires = "; expires="+date.toGMTString();
	}
	else var expires = "";
	document.cookie = name+"="+value+expires+"; path=/";
}

function readCookie(name) {
	var nameEQ = name + "=";
	var ca = document.cookie.split(';');
	for(var i=0;i < ca.length;i++) {
		var c = ca[i];
		while (c.charAt(0)==' ') c = c.substring(1,c.length);
		if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
	}
	return null;
}

function eraseCookie(name) {
	createCookie(name,"",-1);
}

/* site map request */
function sitemapDoLoadPost(scriptUrl, scriptForm, scriptPos, scriptArgs, noLoading) {
	
	hideDiv('proceed');
	showDiv('message');
	if(!scriptArgs){ var scriptArgs = ''; }
	scriptArgs = $(scriptForm).serialize() + scriptArgs;
	myAjax = new Ajax.Updater(scriptPos, scriptUrl, {
		method : 'post',
		parameters : scriptArgs,
		evalScripts : true,
		onLoading: function(request){ showLoadingIcon(scriptPos, noLoading); }
	});	
}

/* Onloading image icon function */
function showLoadingIcon(scriptPos,noLoading){
	loading = 0;
  	contentDiv = "";
	switch (scriptPos){		
		
		case "content":
			contentDiv = '<div id="loading_content"></div>';
			loading = 1;
			break;
		
		case "subcontent":
			contentDiv = '<div id="loading_subcontent"></div>';
			loading = 1;
			break;
		
		case "ContentFrame":
			contentDiv = '<div id="loading_content_frame"></div>';
			loading = 1;
			break;
		
		case "subcontmed":
			contentDiv = '<div id="loading_subcontmed"></div>';
			loading = 1;
			break;
			
		case "newsalert":
			contentDiv = '<div id="loading_longthin"></div>';
			loading = 1;
			break;
		
		default :
			contentDiv = '<div id="loading_rankarea"></div>';
			loading = 1;
			break;
	}
	
	if((loading == 1) && (noLoading != 1)){
		document.getElementById(scriptPos).innerHTML = contentDiv;
	}
}

function confirmLoad(scriptUrl, scriptPos, scriptArgs) {

	if (chkObject('wantproceed')) {
		wantproceed = "Do you really want to proceed?";
	}
	
	var agree = confirm(wantproceed);
	if (agree)
		return scriptDoLoad(scriptUrl, scriptPos, scriptArgs);
	else
		return false;
}

function confirmSubmit(scriptUrl, scriptForm, scriptPos, scriptArgs) {

	if(!scriptArgs){ var scriptArgs = ''; }
	if (chkObject('wantproceed')) {
		wantproceed = "Do you really want to proceed?";
	}
	var agree = confirm(wantproceed);
	if (agree)
		return scriptDoLoadPost(scriptUrl, scriptForm, scriptPos, scriptArgs);
	else
		return false;
}

function doAction(scriptUrl, scriptPos, scriptArgs, actionDiv) {
	actVal = document.getElementById(actionDiv).value;
	scriptArgs += "&sec=" + actVal;
	switch (actVal) {
		case "select":		
			break;
		
		case "checkstatus":
		case "edit":
		case "reports":
		case "viewreports":
		case "pagedetails":
			scriptDoLoad(scriptUrl, scriptPos, scriptArgs);
			break;
	
		default:
			/* check whether the system is demo or not */
			if(spdemo){
				if((actVal == 'delete') || (actVal == 'Activate') || (actVal == 'Inactivate') || (actVal == 'recheckreport') 
					|| (actVal == 'showrunproject') || (actVal == 'checkscore') || (actVal == 'deletepage') || (actVal == 'upgrade') || (actVal == 'reinstall') ){
					alertDemoMsg();
				}
			}
			confirmLoad(scriptUrl, scriptPos, scriptArgs);
			break;
	}
}

function doLoad(argVal, scriptUrl, scriptPos, scriptArgs) {
	actVal = document.getElementById(argVal).value;
	scriptArgs += "&"+ argVal +"=" + actVal;
	scriptDoLoad(scriptUrl, scriptPos, scriptArgs);
}

function doLoadUrl(argVal, scriptUrl) {
	actVal = document.getElementById(argVal).value;
	window.location = scriptUrl += "&"+ argVal +"=" + actVal;
}

/* func to show hide menu */
function showMenu(button, scriptPos){
	
	for (var i=0; i<menuList.length; i++) {
		if(menuList[i] == scriptPos){
			var but = document.getElementById(button).src;
		    if(but.match("more") == "more"){
		        but = but.replace(/more/,"hide");
		        document.getElementById(scriptPos).style.display = '';
		        document.getElementById(button).src = but;
		        
		        // load default script
		        if(typeof(scriptList[i]) != "undefined") {
		        	scriptDoLoad(scriptList[i], 'content')
		        }
		    }else{
		        but = but.replace(/hide/,"more");
		        document.getElementById(scriptPos).style.display = 'none';
		        document.getElementById(button).src = but;		        	
		    }			
		}else{
			var butClose = document.getElementById(buttonList[i]).src;
			if(butClose.match("hide") == "hide"){
				butClose = butClose.replace(/hide/,"more");
				document.getElementById(menuList[i]).style.display = 'none';
				document.getElementById(buttonList[i]).src = butClose;
			}
		}	
	}    
}

function updateArea(scriptPos, content) {
	document.getElementById(scriptPos).innerHTML += content;
}

function chkObject(theVal) {
    if (document.getElementById(theVal) != null) {
        return true;
    } else {
        return false;
    }
}

function checkSubmitInfo(scriptUrl, scriptForm, scriptPos, catCol) {

	if(chkObject('captcha')){
		value = document.getElementById('captcha').value;
		if (value==null||value==""){
			alert('Please enter the code shown');
			return false;
		}
	}
	
	var obj = document.getElementsByName(catCol).item(0);
	value = obj.value;
	if (value==null||value==""||value==0){
		alert('Please select a category');
		return false;
	}
	
	scriptDoLoadPost(scriptUrl, scriptForm, scriptPos);
}

function loadJsCssFile(filename, filetype){
	if (filetype=="js"){ //if filename is a external JavaScript file
		var fileref=document.createElement('script')
		fileref.setAttribute("type","text/javascript")
		fileref.setAttribute("src", filename)
	}else if (filetype=="css"){ //if filename is an external CSS file
		var fileref=document.createElement("link")
		fileref.setAttribute("rel", "stylesheet")
		fileref.setAttribute("type", "text/css")
		fileref.setAttribute("href", filename)
	}
	if (typeof fileref!="undefined")
		document.getElementsByTagName("head")[0].appendChild(fileref)
}

function hideDiv(scriptPos){
	document.getElementById(scriptPos).style.display = 'none';
}

function showDiv(scriptPos){
	document.getElementById(scriptPos).style.display = '';
}

function crawlMetaData(url,scriptPos) {
	weburl = document.getElementById('weburl').value;
	if(weburl==null||weburl==""||weburl==0){
		alert('Website url is empty!');
	}else{
		url = url + "&url=" + escape(weburl);
		scriptDoLoad(url, scriptPos);
	}
}

function hideNewsBox(scriptPos, cookieVar, cookieVal) {
	hideDiv(scriptPos);
	createCookie(cookieVar, cookieVal, 1);
}

function alertDemoMsg(){
    if(spdemo){
    	alert('Some features are disabled in the demo system due to security threats. Please download and install seo panel to enjoy full features.');
    	exit;
    }
}

function checkDirectoryFilter(checkId, scriptUrl, scriptPos){
	var noFilter = 0;
	if(document.getElementById(checkId).checked){
		noFilter = 1;
	}
	
	scriptUrl = scriptUrl + "&" + checkId + "=" + noFilter;
	scriptDoLoad(scriptUrl, scriptPos);
}

function checkList(checkId) {
	checkall = document.getElementById(checkId).checked;
	for (i = 0; i < document.listform.elements.length; i++){
		if(document.listform.elements[i].type=="checkbox") {
			document.listform.elements[i].checked = checkall ? true : false;
		}
	}
}

function selectAllOptions(selectBoxId, selectAll) {
	
	selectBox = document.getElementById(selectBoxId);
	for (var i = 0; i < selectBox.options.length; i++) { 
		selectBox.options[i].selected = selectAll; 
	}
}