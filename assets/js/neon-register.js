/**
 *	Neon Register Script
 *
 *	Developed by Arlind Nushi - www.laborator.co
 */

var neonRegister = neonRegister || {};

;(function($, window, undefined)
{
	"use strict";
	
	$(document).ready(function()
	{
		neonRegister.$container = $("#form_register");
		neonRegister.$steps = neonRegister.$container.find(".form-steps");
		neonRegister.$steps_list = neonRegister.$steps.find(".step");
		neonRegister.step = 'step-1'; // current step
		
		
		neonRegister.$container.validate({
			rules: {
				fname: {
					required: true
				},
				
				email: {
					required: true,
					email: true
				},
				
				mname: {
					required: true	
				},
				
				lname: {
					required: true
				},

				gender: {
					required: true
				},

				age: {
					required: true
				},

				municipality: {
					required: true
				},

				verification_code: {
					required: true
				},

				password: {
					required: true
				},
				
			},
			
			messages: {
				
				email: {
					email: 'Invalid E-mail.'
				}	
			},
			
			highlight: function(element){
				$(element).closest('.input-group').addClass('validate-has-error');
			},
			
			
			unhighlight: function(element)
			{
				$(element).closest('.input-group').removeClass('validate-has-error');
			},
			
			submitHandler: function(ev)
			{
				$(".login-page").addClass('logging-in');
				
					// Send data to the server

					setTimeout(function(){

						var random_pct = 25 + Math.round(Math.random() * 30);
					
						// The form data are subbmitted, we can forward the progress to 70%
						neonRegister.setPercentage(40 + random_pct);

						$.ajax({
							url: baseUrlAction() + '?btn=register_process',
							type: 'POST',
							dataType: 'json',
							data: {
								fname: 		$("#fname").val(),
								mname: 		$("#mname").val(),
								lname: 	$("#lname").val(),
								gender: 	$("#gender").val(),
								age: 		$("#age").val(),
								municipality:	$("#municipality").val(),
								verification_code:  $("#verification_code").val(),
								email: 		$("#email").val(),
								password: 	$("#password").val()

							},
							error: function(ts){
								alert(console.log(ts.responseText));
							},
							success: function(data){
							/*	
								// From response you can fetch the data object retured
								var name = response.submitted_data.name,
									phone = response.submitted_data.phone,
									birthdate = response.submitted_data.birthdate,
									username = response.submitted_data.username,
									email = response.submitted_data.email,
									password = response.submitted_data.password;
								
								
								// Form is fully completed, we update the percentage
								neonRegister.setPercentage(100);
								
								
								// We will give some time for the animation to finish, then execute the following procedures	
								setTimeout(function()
								{
									// Hide the description title
									$(".login-page .login-header .description").slideUp();
									
									// Hide the register form (steps)
									neonRegister.$steps.slideUp('normal', function()
									{
										// Remove loging-in state
										$(".login-page").removeClass('logging-in');
										
										// Now we show the success message
										$(".form-register-success").slideDown('normal');
										
										// You can use the data returned from response variable
									});
									
								}, 1000);
								*/
			

								setTimeout(function(){

									if(parseFloat(data.status)==1){

										neonRegister.setPercentage(100, function(){

											$(".login-page .login-header .description").slideUp();

												neonRegister.$steps.slideUp('normal', function(){

													$(".login-page").removeClass('logging-in');
													$(".form-register-success").slideDown('normal');

												});
										});

									}else{

										alert(data.status);

										setTimeout(function(){
			                            	window.location.href = data.redirect_page ;
			                     		}, 1000)
										
									}

								}, 1500);

							}

						});
						
// 						setTimeout(function(){
// 							neonRegister.setPercentage(100, function(){

//  								$(".login-page .login-header .description").slideUp();

//  								neonRegister.$steps.slideUp('normal', function(){

// 	 								$(".login-page").removeClass('logging-in');
// 									$(".form-register-success").slideDown('normal');

// 								});
//  							});
						
// 						},1500);

					}, 650);

			}
		});
	
		// Steps Handler
		neonRegister.$steps.find('[data-step]').on('click', function(ev)
		{
			ev.preventDefault();
			
			var $current_step = neonRegister.$steps_list.filter('.current'),
				next_step = $(this).data('step'),
				validator = neonRegister.$container.data('validator'),
				errors = 0;
			
			neonRegister.$container.valid();
			errors = validator.numberOfInvalids();
			
			if(errors)
			{
				validator.focusInvalid();
			}
			else
			{
				var $next_step = neonRegister.$steps_list.filter('#' + next_step),
					$other_steps = neonRegister.$steps_list.not( $next_step ),
					
					current_step_height = $current_step.data('height'),
					next_step_height = $next_step.data('height');
				
				TweenMax.set(neonRegister.$steps, {css: {height: current_step_height}});
				TweenMax.to(neonRegister.$steps, 0.6, {css: {height: next_step_height}});
				
				TweenMax.to($current_step, .3, {css: {autoAlpha: 0}, onComplete: function()
				{
					$current_step.attr('style', '').removeClass('current');
					
					var $form_elements = $next_step.find('.form-group');
					
					TweenMax.set($form_elements, {css: {autoAlpha: 0}});
					$next_step.addClass('current');
					
					$form_elements.each(function(i, el)
					{
						var $form_element = $(el);
						
						TweenMax.to($form_element, .2, {css: {autoAlpha: 1}, delay: i * .09});
					});
					
					setTimeout(function()
					{
						$form_elements.add($next_step).add($next_step).attr('style', '');
						$form_elements.first().find('input').focus();
						
					}, 1000 * (.5 + ($form_elements.length - 1) * .09));
				}});
			}
		});
		
		neonRegister.$steps_list.each(function(i, el)
		{
			var $this = $(el),
				is_current = $this.hasClass('current'),
				margin = 20;
			
			if(is_current)
			{
				$this.data('height', $this.outerHeight() + margin);
			}
			else
			{
				$this.addClass('current').data('height', $this.outerHeight() + margin).removeClass('current');
			}
		});
		
		
		// Login Form Setup
		neonRegister.$body = $(".login-page");
		neonRegister.$login_progressbar_indicator = $(".login-progressbar-indicator h3");
		neonRegister.$login_progressbar = neonRegister.$body.find(".login-progressbar div");
		
		neonRegister.$login_progressbar_indicator.html('0%');
		
		if(neonRegister.$body.hasClass('login-form-fall'))
		{
			var focus_set = false;
			
			setTimeout(function(){ 
				neonRegister.$body.addClass('login-form-fall-init')
				
				setTimeout(function()
				{
					if( !focus_set)
					{
						neonRegister.$container.find('input:first').focus();
						focus_set = true;
					}
					
				}, 550);
				
			}, 0);
		}
		else
		{
			neonRegister.$container.find('input:first').focus();
		}
		
		
		// Functions
		$.extend(neonRegister, {
			setPercentage: function(pct, callback)
			{
				pct = parseInt(pct / 100 * 100, 10) + '%';
				
				// Normal Login
				neonRegister.$login_progressbar_indicator.html(pct);
				neonRegister.$login_progressbar.width(pct);
				
				var o = {
					pct: parseInt(neonRegister.$login_progressbar.width() / neonRegister.$login_progressbar.parent().width() * 100, 10)
				};
				
				TweenMax.to(o, .7, {
					pct: parseInt(pct, 10),
					roundProps: ["pct"],
					ease: Sine.easeOut,
					onUpdate: function()
					{
						neonRegister.$login_progressbar_indicator.html(o.pct + '%');
					},
					onComplete: callback
				});
			}
		});
	});
	
})(jQuery, window);


function baseUrlAction(){
     return location.protocol + "//" + location.host + "/mobile_crime_reporting_and_mapping_system/ADMIN/inc/ajax/ajax_controller.php";
 }
