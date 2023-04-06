var text_max = 500;
var checklist = [];
//var url = 'http://205.147.98.190/ebox';

function redirectUrlAllCase(methodName)
{
	window.location = baseURL + 'dashboard/'+methodName;
}
function fccReset()
{
	window.location = baseURL + '/dashboard/fccDetails';
}
function userApp()
{
	window.location = baseURL + '/dashboard/counsellorsDetails';
}
function smReset()
{
	return false;
}
$(function(){
	$('.reload-captcha').click(function(event){
	
             event.preventDefault();
             $.ajax({
                 url:baseURL+'home/refreshCaptcha',
				 dataType: "html",
                 success:function(data){
				 //alert(data);
                     $('#captid').attr('src',data);
                 }
             });            
          });
	$('.noenter').keydown(function (e) {
	if (e.shiftKey || e.ctrlKey || e.altKey) 
	{
		e.preventDefault();
	} 
	e.preventDefault();
	});
	
	$('.text-red').css("color", "red");
	
	$(".officer_type").hide();
	$('#field_officer_type').removeAttr('required');
	$("#coun_type").change(function() 
	{
        if($("#coun_type").val() == 2)
		{
			$(".officer_type").show();
			$('#field_officer_type').attr('required', 'required');
		}
		else
		{
			$(".officer_type").hide();
			$('#field_officer_type').removeAttr('required');
		}
    });
	$('#fcc_phone').on('blur', function() {
		var val = $('#fcc_phone').val();
		var len = val.length;
		if(len < 10)
		{
			alert("Please Enter 10 Digit Mobile Number Only.");
			var val = $('#fcc_phone').val('');
		}
	}); 
	$('#mobile_no_of_main_functionries').on('blur', function() {
		var val = $('#mobile_no_of_main_functionries').val();
		var len = val.length;
		if(len < 10)
		{
			alert("Please Enter 10 Digit Mobile Number Only.");
			var val = $('#mobile_no_of_main_functionries').val('');
		}
	});
	
	$('.onlynumber').keydown(function (e) {
		if (e.shiftKey || e.ctrlKey || e.altKey) 
		{
			e.preventDefault();
		} 
		else 
		{
			var key = e.keyCode;
			if (!((key == 9) || (key == 8) || (key == 46) || (key >= 35 && key <= 40) || (key >= 48 && key <= 57) || (key >= 96 && key <= 105))) 
			{
				e.preventDefault();
			}
		}
	});
	$('.noenter').keydown(function (e) {
		if (e.shiftKey || e.ctrlKey || e.altKey) 
		{
			e.preventDefault();
		} 
		e.preventDefault();
	});
});
function valueReset()
{
	var htm = "<option value=''>Select</option>";
	$("#district").html(htm);
}

