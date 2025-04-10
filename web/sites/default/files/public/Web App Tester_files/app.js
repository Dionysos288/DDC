// JavaScript Document
$(document).ready(function() {
	$('#orientation button.landscape').click(function() {
		$('#orientation button').removeClass('selected');
		$(this).addClass('selected');
		$('#chrome').removeClass('portrait');
		$('#chrome').addClass('landscape');
	});
	
	$('#orientation button.portrait').click(function() {
		$('#orientation button').removeClass('selected');
		$(this).addClass('selected');
		$('#chrome').removeClass('landscape');
		$('#chrome').addClass('portrait');
	});
	
	$('#device_type').delegate('button.ipad', 'click', function() {
	  $('#device_type button').removeClass('selected');
	  $(this).addClass('selected');
	  $('#chrome').removeClass('iphone');
		$('#chrome').addClass('ipad');
	});
	
	$('#device_type').delegate('button.iphone', 'click', function() {
	  $('#device_type button').removeClass('selected');
	  $(this).addClass('selected');
	  $('#chrome').removeClass('ipad');
		$('#chrome').addClass('iphone');
	});
	
	$('#address-bar').delegate('#update-url-form','submit',function() {
		var url = $('#url').val();
		$('#browser').attr('src', url);
		
		return false;
	});
	
	function resize_url_bar() {
	  var menu_width = $('#menu').width();
  	$('#address-bar input[type=text]').width(menu_width - 510);  
	}
	
	resize_url_bar();
	
	$(window).resize(function() {
	  resize_url_bar();
	});
	
	if ($.browser.mozilla && $.browser.version >= "1.8" ) $("#address-bar .go_url").css({ top: '2px', left: '-4px'});
});