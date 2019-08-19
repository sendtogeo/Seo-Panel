<ul class="nav navbar-nav" id="alert_noti_sec">
    <li class="dropdown">
    	<a href="#" class="dropdown-toggle" data-toggle="dropdown">
    		<i class="fas fa-bell" style="font-size: 16px;"></i>
    		<span class="count" style="display: none;"></span>
    	</a>
    	<ul class="dropdown-menu dropdown-menu-right" style="margin-top: 8px;padding: 0px"></ul>
    </li>
</ul>

<script>
$(document).ready(function(){

    // updating the view with notifications using ajax
    function load_unseen_notification(view = '') {
    	$.ajax({
            url:"alerts.php",
            method:"POST",
            data:{view:view, 'sec': 'fetch_alerts'},
            dataType:"json",
            success:function(data) {
    			$('.dropdown-menu').html(data.notification);
    
       			if(data.unseen_notification > 0) {
       				$('.count').show();
    				$('.count').html(data.unseen_notification);
       			}
      		}
    	});
    }
    
    load_unseen_notification();
    
    // load new notifications
    $(document).on('click', '.dropdown-toggle', function() {
    	//$('.count').html('');
    	//$('.count').hide();
    	//load_unseen_notification('yes');
    });
    
    /*setInterval(function() {
     load_unseen_notification();;
    }, 5000);*/

});
</script>

<style>
#alert_noti_sec{margin-left: 4px;}
#alert_noti_sec A.dropdown-toggle::before, #alert_noti_sec A.dropdown-toggle::after {
    border: none;
    content: none;
}
#alert_noti_sec A{color: white;}
#alert_noti_sec .dropdown-menu{min-width: 22rem;}
#alert_noti_sec .dropdown-menu-right { right: -16px;}
#alert_noti_sec .dropdown-menu A{color: black;}
#alert_noti_sec .dropdown-menu li{
	padding: 10px; line-height: 14px; margin: 0px; border-top: none; border-left: none; border-right: none; 
	background-color: #edf2fa;
}

#alert_noti_sec .count {
  font-size: 10px;
  border-radius: 10px;
  background-color: #d9534f;
  padding: 4px;
  top: -4px;
  left: auto;
  right: -6px;
  position: absolute;
}
</style>