</body>
<script src="<?php echo base_url();?>js/prototype.lite.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>js/moo.fx.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>js/moo.fx.pack.js" type="text/javascript"></script>

<script type="text/javascript">
	var contents = document.getElementsByClassName('content');
	var toggles = document.getElementsByClassName('type');

	var myAccordion = new fx.Accordion(
		toggles, contents, {opacity: true, duration: 400}
	);
	myAccordion.showThisHideOpen(contents[0]);
</script>
<script src="<?php echo base_url();?>js/jquery-1.7.1.min.js" type="text/javascript"></script>
<script type="text/javascript">
	$(function(){
		$("#main").css({'width':$(window).width()-185,'height':$(window).height()-70});
	});
	$(window).resize(function(){
		$("#main").css({'width':$(window).width()-185,'height':$(window).height()-70});
	});
</script>
</html>