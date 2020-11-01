$(document).ready(function() {

	//Button for profile post
	$('#submit_profile_post').click(function(){
<<<<<<< HEAD
		
=======

>>>>>>> fbcda40734f02b11627c70577c33a6d9cd28d2ac
		$.ajax({
			type: "POST",
			url: "includes/handlers/ajax_submit_profile_post.php",
			data: $('form.profile_post').serialize(),
			success: function(msg) {
<<<<<<< HEAD
				$("#post_form").modal('hide');
=======
				$('#post_form').modal('hide');
>>>>>>> fbcda40734f02b11627c70577c33a6d9cd28d2ac
				location.reload();
			},
			error: function() {
				alert('Failure');
			}
		});
<<<<<<< HEAD

	});


});


function getUsers(value, user) {
=======
	});
});


function getUser(value, user) {
>>>>>>> fbcda40734f02b11627c70577c33a6d9cd28d2ac
	$.post("includes/handlers/ajax_friend_search.php", {query:value, userLoggedIn:user}, function(data) {
		$(".results").html(data);
	});
}