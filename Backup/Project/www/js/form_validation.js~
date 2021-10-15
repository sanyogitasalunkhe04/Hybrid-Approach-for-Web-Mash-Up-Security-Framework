$(document).ready(function(){
	 $.validator.addMethod(
	     "DateFormat",
	     function(value, element) {
	     return value.match(/^\d\d?\/\d\d?\/\d\d\d\d$/);
	     },
	      "Please enter a date in the format dd/mm/yyyy"//removed ;
	  );
	// category form validation
	$("#frm_add_category").validate({
		rules: {
			category_name: "required",
			category_order: {
				required: true,
				number: true
			}
		},
		messages: {
			category_name: "Please enter the category name.",
			category_order: {
				required: "Please enter the category order.",
				number: "Please enter the numbers only."
			}
		}
	});

	// Login form validation
	$("#frm_login").validate({
		rules: {
			username: {
				required: true,
				email: true
			},
			password: {
				required: true,
				minlength: 5
			}
		},
		messages: {
			username: {
				required: "Please enter a username.",
				email: "Your username must be valid email address"
			},
			password: {
				required: "Please enter a password.",
				minlength: "Your password must be at least 5 characters."
			}
		}
	});

	// Password reset form validation
	$("#frm_reset").validate({
		rules: {
			old_password: {
				required: true,
				minlength: 5
			},
			new_password: {
				required: true,
				minlength: 5
			},
			confirm_password: {
				required: true,
				minlength: 5,
				equalTo: "#new_password"
			}
		},
		messages: {
			old_password: {
				required: "Please provide a old password.",
				minlength: "Your password must be at least 5 characters."
			},
			new_password: {
				required: "Please provide a new password.",
				minlength: "Your password must be at least 5 characters."
			},
			confirm_password: {
				required: "Please provide a confirm password.",
				minlength: "Your password must be at least 5 characters.",
				equalTo: "Please enter the same password as above."
			}
			
		}
	});

	
	// Product form validation
	$("#frm_add_product").validate({
		rules: {
			product_code: "required",
			product_name: "required",
			packing: "required",
			product_photo: "required",
			category: "required"
		},
		messages: {
			product_code: "Please enter the product code.",
			product_name: "Please enter the product name.",
			packing: "Please enter packing details.",
			product_photo: "Please upload product photo.",
			category: "Please select the category."
		}
	});

	

	

	

	// User form validation
	$("#frm_add_user").validate({
		rules: {
			user_name: "required",
			username_email: {
				required: true,
				email: true
			},
			user_contact: {
				required: true,
				number: true
			},
			address: "required"
		},
		messages: {
			user_name: "Please enter the name.",
			username_email: {
				required: "Please enter the email.",
				email: "Please enter valid email."
			},
			user_contact: {
				required: "Please enter contact number.",
				number: "Please enter numbers only."
			},
			address: "Please enter address."
		}
	});
	
	
	
	$("#frm_user").validate({
		rules: {
				name: "required",
				uemail: {
					required: true,
					email: true
				},
				txt_password: "required",
				gender: "required",
				contact: "required",
				is_active: "required"
			},

		messages: {
			name: "Please enter the user name.",
		
			uemail: {
				required: "Please enter the email.",
				email: "Please enter valid email."
			},
			txt_password: "Please enter the password.",
			
			gender: "Please select the gender.",
			
			contact: "Please enter contact address."

		}
	});
	
	
	$("#frm_student").validate({
		rules: {
				name: "required",
				email: "required",
				gender: "required",
				contact: "required",
				is_active: "required"
			},

		messages: {
			name: "Please enter the user name.",
		
			email: "Please enter the email description.",
			
			gender: "Please select the gender.",
			
			contact: "Please enter contact address."

		}
	});
});
