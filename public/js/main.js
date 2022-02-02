/*****admin logo and favicon upload jquery******/
/*logo upload js*/
$(document).ready(function(){
	function readURL(input) {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();
	        reader.onload = function(e) {
	            $('#logoPreview').css('background-image', 'url('+e.target.result +')');
	            $('#logoPreview').hide();
	            $('#logoPreview').fadeIn(650);
	        }
	        reader.readAsDataURL(input.files[0]);
	    }
	}
	$("#logoUpload").change(function() {
	    readURL(this);
	});
});

//// blog video
$(document).ready(function(){
	function readURL(input) {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();
	        reader.onload = function(e) {
				$('#logoPreview_video').html('<video autoplay muted loop ><source src="'+e.target.result +'" type="video/mp4"></source></video>' );
	            $('#logoPreview_video').hide();
	            $('#logoPreview_video').fadeIn(650);
	        }
	        reader.readAsDataURL(input.files[0]);
	    }
	}
	$("#logoUpload_video").change(function() {
	    readURL(this);
	});
});
/*fav upload js*/
$(document).ready(function(){
	function readURL(input) {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();
	        reader.onload = function(e) {
	            $('#favPreview').css('background-image', 'url('+e.target.result +')');
	            $('#favPreview').hide();
	            $('#favPreview').fadeIn(650);
	        }
	        reader.readAsDataURL(input.files[0]);
	    }
	}
	$("#favUpload").change(function() {
	    readURL(this);
	});
});

/******admin menu js start******/
// $(document).ready(function(){
//   $('.admin_bar ul li').each(function() {
//     $(this).find('.sub_items').parents('li').prepend("<a class='nav-arrow'></a>");
//   });
// });
$(document).ready(function(){
	$('.nav-dropdown').on('click', function() {
		$(this).parent().toggleClass('active').siblings().removeClass('active');
	});
});

/******End******/

$(document).ready(function(){
	$('.tabs li a').click(function(){
		var id = $(this).attr("data-id");
		$('.tab_content').removeClass('active');
		$('.tabs li').removeClass('active');
		$(id).addClass('active');
		$(this).parent('li').addClass('active');
	});

	$('.open_side_menu').click(function(){
		$('.panel_sidebar').addClass('active');
	});

	$('.panel_sidebar').on('click', function(){
		$(this).removeClass('active');
	});

	// $('.admin_bar').click(function(e){
	// 	e.preventDefualt();
	// });

	// $('.multiple-select').select2();

});


// Taxes Overrides page js
$(document).ready(function() {
	$(".edit-tax-dropdown").hide();
    $(".edit-tax button").click(function() { 
       $(".edit-tax-dropdown").toggle();
	});
	$(".more-actions-dp .filter-dropdown").hide();
    $(".more-actions-dp button").click(function() { 
       $(".more-actions-dp .filter-dropdown").toggle();
	});
});

// multiple select option with checkboxes js
var expanded = false;

function showCheckboxes() {
  var checkboxes = document.getElementById("checkboxes");
  if (!expanded) {
    checkboxes.style.display = "block";
    expanded = true;
  } else {
    checkboxes.style.display = "none";
    expanded = false;
  }
}




