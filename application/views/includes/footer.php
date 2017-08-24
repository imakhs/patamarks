<footer>
    <p style="text-align: center;">&copy; PataMarks 2016</p>
</footer>

</div>

<script src="<?php echo base_url(); ?>resource/js/jquery-1.12.4.min.js"></script>
<script src="<?php echo base_url(); ?>resource/ui-1.12.1/jquery-ui.js"></script>
<script src="<?php echo base_url(); ?>resource/bootstrap-3.3.7/js/bootstrap.min.js"></script>
<script src="http://localhost/patamarks/node_modules/noty/js/noty/packaged/jquery.noty.packaged.min.js"></script>
<script>
	noty({ text: 'My first notification using noty', type: 'information'});
	  
</script>
<script>
    $(function() {
        $( "#period" ).datepicker({
        	autoSize:true,
        	changeYear : true,
        	changeMonth : false,
        	dateFormat:"yy-mm",
        	showMonthAfterYear : true,
        	constrainInput : true,
        	duration: "slow",
            numberOfMonths:[1,1],
            showAnim: "slide",
            showOtherMonths:true,
            selectOtherMonths: true,
            stepMonths : 4
        });
    });
</script>
</body>
</html>
