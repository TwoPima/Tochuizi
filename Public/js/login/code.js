//手机验证码
var iTime = 59;
function get_mobile_code()
{
	$.post(Host+"https://sms.yunpian.com/v2/sms/single_send.json", {mobile:jQuery.trim($('#mobile').val())}, function(msg) {
		if(msg == 'success')
		{
			RemainTime();
		}
  	});
};

function RemainTime()
{
	var iSecond,sSecond="",sTime="";
	if (iTime >= 0)
	{
		iSecond = parseInt(iTime%60);
		if (iSecond >= 0)
		{
			sSecond = iSecond + "秒";
		}
		sTime="<span style='color:darkorange'>" + sSecond + "</font>";
		if(iTime==0)
		{
			clearTimeout(Account);
			sTime='<button type="button" class="btn btn-default" id="getCodeBtn" code="">免费获取校验码</button>';
			document.getElementById('divCode').innerHTML= sTime;
			iTime = 59;
		}
		else
		{
			Account = setTimeout("RemainTime()",1000);
			iTime=iTime-1;
			document.getElementById('divCode').innerHTML= "<button type='button' class='btn btn-default'>请等待"+sTime+"</button>";
		}
	}
	else
	{
		sTime='<font size="1">没有倒计时</font>';
	}
	   
}