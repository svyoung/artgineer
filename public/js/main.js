
var svyglobal = (function(){
		return {
			'post': (function(){
				return ({
					generatePost: function(postData){
						var data = postData;
						var readMore = $('<div class="more_text" />');
						readMore.attr('data-more-id', data.id);
						readMore.text('Continue Reading');
						var post = '<div class="post box col-md-3" data-post-id="'+data.id+'">';
						post += '	<div class="entry">';
						post += '		<div class="post_title_placement post_title words">';
						post += 			data.title;
						post += '		</div>';
						post += '		<span class="post_date_placement post_date">';
						post += 			data.created_at;
						post += 		'</span>';
						post += '		<div class="entry_text words">';
						post += '			<div class="blog_input_content post_content-'+data.id+'">';		
						post += 				data.content;
						post += '			</div>';
						post += '		</div>';
						post += '	</div>';
						post += '</div>';
						// post += '	<div class="more_text" data-more-id="'+data.id+'">Continue Reading</div>';
						post += '</div>';

						return post;
					}, // end generatePost

					getPosts: function() {
						$('.main').html('');
						$.get('/get_posts', function(data){
							var posts = data;

							$.each(posts, function(i, item) {
								var entry = svyglobal.post.generatePost(item);
								$('.main').append(entry);
							})

						});
					}, 

					searchPosts: function(val) {
						$.get('/searchposts', {value: val}, function(result) {
							// console.log(result);
							var posts = result;
							
							$.each(posts, function(i, item) {
								var entry = svyglobal.post.generatePost(item);
								$('.main').hide().fadeIn(700, function() {
									$(this).append(entry);
								});
							})
						});
					},

					clearPosts: function() {
						$('.main').html('');
					}

				})
			})(),

			'fn': (function(){
				return ({
					showModal: function(url, selector) {
						var modalOptions = {
							show: true
						};
						$.get(url, function(data) {
							$('body').append(data);
							$(selector).modal(modalOptions).on('hidden.bs.modal', function () {
                                    $(selector).remove();
                                });
						});
						
					},
                    showMobileMenu: function(e) {
                        console.log('open mobile menu!');
                        if ($(window).width() < 768) {
                            console.log('under 768');
                            $(e)
                                .siblings('.navcontent')
                                .toggle(200);
                            $('.container, #header-text').toggleClass('blurIt');
                        }
                    },
					getCompany: function(comp) {
						$('.company-menu ul li').removeClass('active');
						$('.company-details').hide();
						$('[data-comp-menu="'+comp+'"]').addClass('active');
						$('[data-company="'+comp+'"]').hide().fadeIn(500);
					}
				})
			})(),

			'init': function(){
				$(document).ready(function(){

					$.get('/resume', function(result) {
						// console.log(result);
						$('#resume, #projects').html(result);
						$('.company-menu ul li:first-child').addClass('active');
						$('.company-details:first-child').hide().fadeIn(500);
					});

                    var c, currentScrollTop = 0,
                        header = $('header');
				    // switch between desktop and mobile menus on window resize
                    $(window).resize(function() {
                        if ($(window).width() >= 768 && !$('.navcontent').is(':visible')) {
                            $('.navcontent').show();
                        } else if ($(window).width() < 768 && $('.navcontent').is(':visible')) {
                            $('.navcontent').hide();
                            $('.container, #header-text').removeClass('blurIt');
                        }
                    }).resize();

                    $(window).scroll(function(){
                        var a = $(window).scrollTop();
                        var b = header.height();

                        currentScrollTop = a;

                        if (c < currentScrollTop && a > b + b) {
                            header.addClass("scrollUp");
                        } else if (c > currentScrollTop && !(a <= b)) {
                            header.removeClass("scrollUp");
                        }
                        c = currentScrollTop;

                        var sections = $('section');
						sections.each(function(i, obj) {
							var el = $(obj),
								elPos = $(obj).offset().top,
								elHeight = $(obj).height();
							if(a >= elPos - 400 && a < elPos + elHeight) {
								el.addClass('active');
							} else if (a > elPos + elHeight || a < elPos){
								el.removeClass('active');
							}


							console.log( 'scroll element: ' + $(obj).attr('id')  + ' elPos ' + elPos + ' scroll: ' + a);
						});
                        // console.log('section ' + sections + ' scroll position: ' + a);
                    });

                    setTimeout(function() {
                        $('#introduction-load').remove();
                    }, 3000);

                    // $('.intro-young').delay(500).addClass('fadeIn');

					// get post to display on document ready
					// svyglobal.post.getPosts();

					var timeout;
					$('.searchpost').on("change keyup", function(){
						svyglobal.post.clearPosts();
						var val = $(this).val();
						clearTimeout(timeout);
						timeout = setTimeout(function(){
							// console.log(val);
							svyglobal.post.searchPosts(val);
						}, 500);					
					});


					$('.main').on('mouseenter', '.post', function( event ) {
						$(this).find('.entry').css({
							'background' : '#b2b2b2', 
							'cursor' : 'pointer'
						});
					}).on('mouseleave', '.post', function( event ) {
					    $(this).find('.entry').css({
					    	'background' : '#e7e7e7'
					    }).find(".edit-pencil").remove();
					}).on("click", '.post', function() {
						var postID = $(this).data("post-id");
						svyglobal.fn.showModal("/post/"+postID, "#fullpost");
					});	// end hover over post for full blog on modal display


				})
                    .on("click", function(e) {
                        var $mobile_menu = $('.navcontent'), $target = $(e.target);
                        if($(window).width() < 768 && $mobile_menu.is(":visible") && !$target.closest('.navcontent').length && $target.attr('class') !== 'hamburger-menu') {
                            // hide the search results
                            $mobile_menu.hide();
                            $('.container, #header-text').removeClass('blurIt');
                        }
                    }); // document ready

			}, // end 'init' function

		}
})();

svyglobal.init();

