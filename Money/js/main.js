var openid;
var url1 = "get_openid.php";
requestByGET(url1,function(res){
	openid = res;
});

var username = document.getElementById("username");
var phone = document.getElementById("phone");
var login = document.getElementById("login");

login.onclick = function(){
	if (checkUsername(user_name) == false || checkPhone(_phone) == false) {
		return;
	}
	var url2 = "http://genhao3.applinzi.com/Money/save_userInfo.php?openid="+openid+"&name="+user_name+"&phone="+tel_phone;
	requestByGET(url2);
	window.location.href = "weixin2.html";
}

//用来判断用户和手机号是否符合规范

function checkUsername(username){
	if (username.length<5 || username.length>16) {
		alert("用户名应该在5-16位之间");
		return false;
	} else{
		var regStr = /^[a-zA-Z][a-zA-Z0-9_]+$/;
		var reg = new RegExp(regStr);
		//object.test(string)对指定的字符串执行一个正则表达式搜索，并返回一个 Boolean 值指示是否找到匹配的模式。
		if (reg.test(username)) {
			return true;
		} else{
			alert("用户名不规范，应包括数字、字母、下划线、以字母开头。");
			return false;
		}
	}
}

function checkPhone(phone){
	var regStr = /^1[3578][0-9]{9}$/;
	var reg = new RegExp(regStr);
	if (reg.test(phone)) {
		return true;
	} else{
		alert("手机号不正确，请输入正确的手机号");
		return false;
	}
}