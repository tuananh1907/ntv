$(document).ready(function() { 

	  //**************menu*****************
    ddsmoothmenu.init({
        mainmenuid: "smoothmenu1", //menu DIV id
        orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
        classname: 'ddsmoothmenu', //class added to menu's outer DIV
        //customtheme: ["#1c5a80", "#18374a"],
        contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
    })
    
    //Datepicker
    $(".datepicker").datetimepicker();
    
    //Tabs
    // Tabs
	$('.tabs').tabs();
    
    //portlet
    $(".portlet-header .ui-icon").click(function() {
		$(this).toggleClass("ui-icon-circle-arrow-n");
		$(this).parents(".portlet:first").find(".portlet-content").slideToggle();
	});
    
	//userinfo
	jQuery('.userinfo').click(function(){
		if(!jQuery(this).hasClass('userinfodrop')) {
			var t = jQuery(this);
			jQuery('.userdrop').width(t.width() + 30);	//make this width the same with the user info wrapper
			jQuery('.userdrop').slideDown('fast');
			t.addClass('userinfodrop');					//add class to change color and background
			
		} else {
			jQuery(this).removeClass('userinfodrop');
			jQuery('.userdrop').hide();
		}
		return false;
	});
    $("#gotopage").click(function(){ 
        if(!jQuery(this).hasClass('showpage')) {
			var t = jQuery(this);
			jQuery('.showgotopage').slideDown('fast');
			t.addClass('showpage');					//add class to change color and background
			
		} else {
			jQuery(this).removeClass('showpage');
			jQuery('.showgotopage').hide();
		}
		return false;
    });
	jQuery(document).click(function(event) {
		var ud = jQuery('.userdrop');
		var gp = jQuery('.showgotopage');
		
		//hide user drop menu when clicked outside of this element
		if(!jQuery(event.target).is('.userdrop') && ud.is(':visible')) {
			ud.hide();
			jQuery('.userinfo').removeClass('userinfodrop');
		}
		
		//hide gotopage box when clicked outside of this element
		if(!jQuery(event.target).is('.showgotopage') && !jQuery(event.target).is('.txtgotopage') && gp.is(':visible')) {
			gp.hide();
            jQuery('#gotopage').removeClass('showpage');
		}
	});
    // Check / uncheck all checkboxes
	$('.check_all').click(function() {
		$(this).parents('table.aGrid').find('input:checkbox').attr('checked', $(this).is(':checked'));   
	});
    
    // Tooltip 

	$(function() {
		$('.tooltip').tooltip({
			track: true,
			delay: 0,
			showURL: false,
			showBody: " - ",
			fade: 250
			});
		});
    
    //Set Footer
    setfooter();
    $(window).resize(function(){
        setfooter();
    });
    
     $(".dropdown img.flag").addClass("flagvisibility");

        $(".dropdown dt a").click(function() {
            $(".dropdown dd ul").toggle();
        });
                    
        $(".dropdown dd ul li a").click(function() {
            var text = $(this).html();
            $(".dropdown dt a span").html(text);
            $(".dropdown dd ul").hide();
            $("#result").html("Selected value is: " + getSelectedValue("sample"));
        });
                    
        function getSelectedValue(id) {
            return $("#" + id).find("dt a span.value").html();
        }

        $(document).bind('click', function(e) {
            var $clicked = $(e.target);
            if (! $clicked.parents().hasClass("dropdown"))
                $(".dropdown dd ul").hide();
        });
        $("#flagSwitcher").click(function() {
            $(".dropdown img.flag").toggleClass("flagvisibility");
        });
        
        //?n h?t n?i dung c?a tab
        $(".divTab .tabcontent").hide();
        //Duy?t h?t các ph?n t? divTabs, thêm class active cho tag a d?u tiên
        $('.divTab').each(function (index) {
            $(this).find('.atab:first').addClass('first active');
            $(this).find('.tabcontent:first').show();
        });
        //Tab click
        $(".divTab .atab").click(function () {
            $(this).parent().parent().find('.atab').removeClass("active"); //B? active
            $(this).addClass("active"); //Set active cho tab v?a click
            $(this).parent().parent().find('.tabcontent').hide(); //?n h?t n?i dung c?a tab
            var activeTab = $(this).attr("title"); //Active n?i dung tab nào có class = title c?a a
            $(this).parent().parent().find('.' + activeTab).show();
            //$(this).parent().parent().find('.' + activeTab).find('input').focus().select();
            return false;
        });
});

function setfooter()
{
     $("#footer").removeClass('pos-footer');
    var docH=$(window).height();
    var h=$("#header").height() + $("#page-wrapper").height()+$("#footer").height();
    if(docH > h )
        $("#footer").addClass('pos-footer');
       
}

