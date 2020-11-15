<ul class="nav navbar-nav" id="alert_noti_sec">
    <li class="dropdown">
    	<a href="#" class="dropdown-toggle" data-toggle="dropdown">
    		<i class="fas fa-bell" style="font-size: 16px;"></i>
    		<span class="count" style="display: none;"></span>
    	</a>
    	<ul class="dropdown-menu dropdown-menu-right"></ul>
    </li>
</ul>

<script>
$(document).ready(function(){

    // updating the view with notifications using ajax
    function load_unseen_notification(view = '') {
    	$.ajax({
            url:"alerts.php",
            method:"POST",
            data:{view: view, 'sec': 'fetch_alerts'},
            dataType:"json",
            success:function(data) {
                if (view != 'yes') {
    				$('.dropdown-menu').html(data.notification);
                }
                
       			if(data.unseen_notification > 0) {
       				$('.count').show();
    				$('.count').html(data.unseen_notification);
       			}
      		}
    	});
    }
    
    load_unseen_notification();

    $('.dropdown').on('shown.bs.dropdown', function () {
    	$('.count').html('');
    	$('.count').hide();
    	load_unseen_notification('yes');
    })
    
    setInterval(function() {
       load_unseen_notification();;
    }, 100000);

});
</script>