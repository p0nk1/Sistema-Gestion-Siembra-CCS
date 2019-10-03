/*
 * jCargoo progressbar
 *
 * http://jcargoo.org
 *
 * Copyright (c) 2006 - 2008 Youssef ELALAOUI
 */
 
 function initialize(divId) {
	thedivId = document.getElementById(divId);
	var percentage = thedivId.innerHTML;
	thedivId.style.backgroundColor="#87ABD8";
	brim(divId,0,parseInt(percentage.substr(0, percentage.length-1)));
}

function setWidth(o, start) {
	o.style.width = start+"%";
	
}

function brim(Id,start,percentage) {
	if (document.getElementById) {
		o = document.getElementById(Id);
		if (start <= percentage) {
			setWidth(o, start);
			start += 1;
			document.getElementById('percentage'+Id).innerHTML = (start -1) + "%";
			window.setTimeout("brim('"+Id+"',"+start+","+percentage+")", 10);
		}
	}
}
