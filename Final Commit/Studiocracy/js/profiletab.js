$(document).ready(function() {
    $("#tabs").tab({
		active:function(event, ui) {
			alert(ui.tab-content);
			$("#tabs").tabs({event:"click"});
			}}
	jQuery('.tabs .tab-links a .tab-content').on('click', function(i)  {
       var currentAttrValue = jQuery(this).attr('href');
		
		
        // Show/Hide Tabs
        jQuery('.tabs ' + currentAttrValue).show().siblings().hide();
 
        // Change/remove current tab to active
        jQuery(this).parent('li').addClass('active').siblings().removeClass('active');
 
        i.preventDefault();
    })
});