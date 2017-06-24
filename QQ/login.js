// 创建一个ajax引擎
function getXmlHttpObject()
{
	var xmlHttpRequest;
	// 不同浏览器 获取xmlhttprequest不同
	if(window.ActiveXObject)  // IE
	{
		// alert("IE");
		xmlHttpRequest = new ActiveXObject('Microsoft.XMLHTTP');
	}
	else  // 其他
	{
		// alert("其他");
		xmlHttpRequest = new XMLHttpRequest();
	}

	return xmlHttpRequest;
}

function $(id)
{
	return document.getElementById(id);
}