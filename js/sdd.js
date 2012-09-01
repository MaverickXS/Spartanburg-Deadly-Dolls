$(document).ready(function(){
	try {
		jQuery('.alert-success').delay(10000).slideUp(500);
	} catch (err){
		//alert(err.message);
	}
});