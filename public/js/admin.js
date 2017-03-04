jQuery.fn.extend({
	exists: function() {
		if($(this).length == 0) {
			return false;
		}
		return true;
	}
});


var svy = (function() {
		return {

			'post': (function(){
				return ({
					addNewPost: function(data){
						var postData = data; 
						

						$.post('/addnewpost', data, function(result) {							
							if(result != false) {
								var entry = svyglobal.post.generatePost(result);
								$(entry).prependTo('.main').hide().slideDown(800);
								svy.notify.success("Success", "Successfully added new post!");
							} else {
								$('#newPost').modal('hide');
								$('.popover').remove();
								svy.notify.failed("Submission Failed", "There was a problem attempting to add a new post. Please try again later.");
							}							
						});
						
					}, // end add new post

					updatePost: function(postID) {
						var data = {
							id: postID,
							title: $('.blog_input').val(),
							content: $('.modal-post-content').summernote('code')
						};

						$.post('/updatepost', data, function(result){
							if(result != false) {
								var map = {id: postID, title: result[0].title, content: result[0].content};
								svyglobal.post.getPosts();
								svy.post.undoEdit(map);
								svy.notify.success("Submission Success", "Succesfully updated post!");					
							} else {
								svy.post.undoEdit(data);
								svy.notify.failed("Update Failure", "There was a problem attempting to update post. Please try again later.");
							}

						});

					}, // end update post

					deletePost: function(postID) {
						var postID = postID;
						
						// do database delete here
						$.post('/deletepost', {'id': postID}, function(result) {
							if(result!=false) {
								$("#fullpost").modal('hide');
								$('[data-post-id='+postID+']').slideUp(1000, function(){
									$(this).remove();
								})
								svy.notify.success("Submission Success", "Succesfully deleted post!");
							} else {
								var map = svy.post.grabPostContent(postID);
								svy.post.undoEdit(map);
								svy.notify.failed("Delete Failure", "There was a problem attempting to delete post. Please try again later.");
							}
							// console.log(result);
						});

					}, // end delete post


					postEdit: function(postID) {
						var mainPost = mainPost,
							postID = postID,
							postTitle = $('.modal-title').text().trim(),
							postTitleInput = $("<input />"),
							postForSN = $(".modal-post-content"),
							// readMore = $('[data-more-id='+postID+']'),
							inputDiv = $('<div class="post_buttons"/>'),
							submitButton = $('<span />'),
							cancelButton = $('<span />'),
							deleteText = $('<span />');
						$('.edit_pencil').remove();

						postForSN.summernote({
							height: 300,
							minHeight: 200
						});

						if(!$('.blog_input').exists() && !$('.post_buttons').exists()) {
							postTitleInput.val(postTitle).addClass("blog_input").attr('name', 'title');
							submitButton.text("Submit").addClass('post_submit btn btn-primary');
							cancelButton.text("Cancel").addClass('post_cancel btn btn-default');
							deleteText.text("DELETE POST").addClass("delete_post");

							inputDiv.append(submitButton).append(cancelButton).append(deleteText);
							postForSN.parent().append(inputDiv);
							$(".modal-title").html(postTitleInput);
						}

						submitButton.click(function(){
							svy.post.updatePost(postID);
						});						

						cancelButton.click(function(){
							var map = svy.post.grabPostContent(postID);
							svy.post.undoEdit(map);
						});

						deleteText.click(function(){
							svy.post.deletePost(postID)
						});

					}, // end launching post edit

					undoEdit: function(postData){
						var mainPost = $('[data-post-id='+postData.id+']'),
							blogContent = $('.modal-post-content');

						$(".modal-title").html(postData.title);			
						blogContent.summernote('destroy');
						blogContent.html(postData.content);							
						blogContent.siblings(".post_buttons").remove();
						$('.modal-body').hide().fadeIn(1000);	
						// TODO
						// hide modal
					},

					grabPostContent(postID) {
						var data = {
							id: postID,
							title: $('.blog_input').val(),
							content: $('.modal-post-content').html()
						};
						return data;
					},

					
				})
			})(),

			'notify': (function(){
				return ({
					general: function(title, msg) {
						return svy.notify.notifyBox({
							notifyTitle: title,
							notifyMsg: msg,
							notifyType: 'general'
						});
					}, // end general notify

					success: function(title, msg){
						return svy.notify.notifyBox({
							notifyTitle: title,
							notifyMsg: msg,
							notifyType: 'success'
						});
					}, // end success notify

					failed: function(title, msg) {
						return svy.notify.notifyBox({
							notifyTitle: title,
							notifyMsg: msg,
							notifyType: 'failed'
						})
					}, // end failed notify

					notifyBox: function(data){
						var $noticeBox = $('<div />').attr('id', 'notice_box'),
							$noticeHeader = $('<div />'),
							$noticeIcon = $('<em />'),
							$noticeMessage = $('<span />');

						$noticeHeader.addClass('notice_title');
						$noticeIcon.addClass('notice_icon');

						var notifyType = data.notifyType,
							notifyMsg = data.notifyMsg;

						if(notifyType == 'general') {
							$noticeHeader.addClass('general');
							$noticeIcon.addClass('fa fa-sticky-note').css('color', '#eed500');
						} else if(notifyType == 'success') {
							$noticeHeader.addClass('success');
							$noticeIcon.addClass('fa fa-check').css('color', '#78bc2c');
						} else if(notifyType == 'failed') {
							$noticeHeader.addClass('failed');
							$noticeIcon.addClass('fa fa-remove').css('color', '#e04c4c');
						}

						$noticeHeader.text(data.notifyTitle);

						$noticeBox.append($noticeHeader)
								.append($noticeIcon.add($noticeMessage.addClass('notice_message').text(notifyMsg)));

						$noticeBox.hide().appendTo("body").fadeIn(1000, function() {
							$(this).delay(3000).fadeOut(1000, function(){
								$(this).remove();
							});
						});
					} // end notifyBox
				})
			})(),

			'init': function(){
				$(document).ready(function(){
					$.ajaxSetup({
		                headers: {
		                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		                }
		            });

					// adding an absolute button to add new post on the top right corner of the page
					var addNewPostButton = $("<span />");
					addNewPostButton.text("+");
					addNewPostButton.addClass("add_new_post");
					addNewPostButton.attr("onclick", 'svyglobal.fn.showModal("/new", "#newPost")');
					$('body').append(addNewPostButton);
					// end adding new post button

					// hover over post for editing activation
					// $('.main').on('mouseenter', '.post', function( event ) {
				 //    	if(!$(this).hasClass('editmode')) {
					// 		$(this).css({
					// 			'background' : '#b2b2b2', 
					// 			'cursor' : 'pointer'
					// 		});
					// 		$(this).append('<i class="fa fa-pencil edit-pencil"></i>');
					// 	}
					// }).on('mouseleave', '.post', function( event ) {
					//     $(this).css({
					//     	'background' : '#e7e7e7'
					//     }).find(".edit-pencil").remove();
					// }).on("click", '.post', function() {
					// 	var postID = $(this).data("post-id");
					// 	$(this).addClass("editmode");
					// 	$(this).find(".edit-pencil").remove();
					// 	svy.post.postEdit($(this), postID);
					// });	// end hover over post for editing activation

				});						

			}, // end 'init' function


		}

})();
svy.init();