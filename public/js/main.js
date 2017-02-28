
var svyglobal = (function(){
		return {
			'post': (function(){
				return ({
					generatePost: function(postData){
						var data = postData;
						var readMore = $('<div class="more_text" />');
						readMore.attr('data-more-id', data.id);
						readMore.text('Continue Reading');
						var post = '<div class="post box" data-post-id="'+data.id+'">';
						post += '	<div class="entry">';
						post += '		<div class="post_title_placement post_title words">';
						post += 			data.title;
						post += '		</div>';
						post += '		<span class="post_date_placement post_date">';
						post += 			data.created_at;
						post += 		'</span>';
						post += '		<div class="entry_text words">';
						post += '			<div class="blog_input_content blog_post_truncated post_content-'+data.id+'">';		
						post += 				data.content;
						post += '			</div>';
						post += '		</div>';
						post += '	</div>';
						post += '</div>';
						post += '	<div class="more_text" data-more-id="'+data.id+'">Continue Reading</div>';
						post += '</div>';

						return post;
					}, // end generatePost

					getPosts: function() {
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
							console.log(result);
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
				})
			})(),

			'init': function(){
				$(document).ready(function(){

					// get post to display on document ready
					svyglobal.post.getPosts();

					$('body').on('click', '.more_text', function(){
						var moreID = $(this).data('more-id'),
							origDiv = $(this).siblings('.post').find('.post_content-'+moreID),
							readMoreText = 'Continue Reading';

						if($(this).hasClass("read_less")) {
							$(this).text(readMoreText).removeClass("read_less");
							$(origDiv).removeClass("blog_post_full").addClass("blog_post_truncated");
						} else {
							$(origDiv).removeClass("blog_post_truncated").addClass("blog_post_full");
							$(this).addClass("read_less").text("Less");
						}
					}); // read more click

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

				}); // document ready					

			}, // end 'init' function

		}
})();

svyglobal.init();
