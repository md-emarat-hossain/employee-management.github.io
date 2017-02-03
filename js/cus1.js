$(document).ready(function()
{
$('#emp_p').show();
$('#emp_ap').hide();
$('#pr').hide();
$('#emp').click(function()
{
	$('#emp_ap').hide();
	$('#emp_p').show();
	$('#pr').hide();
});
$('#ap').click(function()
{
	$('#emp_p').hide();
	$('#emp_ap').show();
	
	$('#pr').hide();
});

$('#sp').click(function()
{
	$('#emp_ap').hide();
	$('#emp_p').hide();
	$('#pr').show();
});

});