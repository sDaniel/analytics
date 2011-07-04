<?php 

	



?>
<script type="text/javascript" id="analytics_ajax_result">

	$('#analytics_ajax_result').ajaxSuccess(function(event, XMLHttpRequest, ajaxOptions){
		if(ajaxOptions.url != "<?php echo $vars["url"]; ?>pg/analytics/ajax_success"){
			
			$.get("<?php echo $vars["url"]; ?>pg/analytics/ajax_success", function(data){
				if(data){
					$('#analytics_ajax_result').append(data);
				}
			});
		}
	});

</script>