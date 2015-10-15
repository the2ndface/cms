/**
 * 
 */
window.onload = function (){
	var level = document.getElementById('level');
	var options = document.getElementsByTagName('option');
	if(level){
		for(i=0;i<options.length;i++){
			if(options[i].value == level.value){
				options[i].setAttribute('selected','selected');
			}
		}
	}
	var title = document.getElementById('title');
	var ol = document.getElementsByTagName('ol');
	var a = ol[0].getElementsByTagName('a');
	
	for(i=0;i<a.length;i++){
		a[i].className = null;
		if(title.innerHTML == a[i].innerHTML){
			a[i].className = 'selected';
		}
	}
	
};
//添加管理员表单验证
function checkAddForm(){
	var fm = document.add;
	if(fm.admin_user.value == '' || fm.admin_user.value.length < 2 ||fm.admin_user.value.length >20){
		alert('警告：用户名不能为空，必须为2~20位');
		fm.admin_user.focus();
		return false;
	}
	if(fm.admin_pass.value.length < 6){
		alert('警告：密码不能小于6位');
		fm.admin_pass.focus();
		return false;
	}
	if(fm.admin_pass.value != fm.admin_notpass.value){
		alert('警告：两次密码输入必须相同！');
		fm.admin_notpass.focus();
		return false;
	}
	return true;
}

//修改管理员表单验证
function checkUpdateForm() {
	var fm = document.update;
	if (fm.admin_pass.value != '') {
		if (fm.admin_pass.value.length < 6) {
			alert('警告：密码修改不得小于六位！');
			fm.admin_pass.focus();
			return false;
		}
	}
	return true;
}