<script src="js/libs/jquery.formalize.js"></script>
<script src="js/libs/webshim/polyfiller.js"></script>
<script>
//thank you based polyfill
if(!Modernizr.input.placeholder || !Modernizr.input.autofocus || !Modernizr.inputtypes.email ){
	$.webshims.polyfill('forms');
}
</script>
<!-- end scripts-->


<!--[if lt IE 7 ]>
	<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.2/CFInstall.min.js"></script>
	<script>window.attachEvent("onload",function(){CFInstall.check({mode:"overlay"})})</script>
<![endif]-->
