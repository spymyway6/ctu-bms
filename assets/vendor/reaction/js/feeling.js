$(document).ready(function(){

  $(document).on("click",".feeling",function(){
	var data_feeling = $(this).attr("data-feeling");
	var postId = $(this).attr('data-postId');
	var postType = $(this).attr('data-postType');
	var likeType = $(this).attr('data-likeType');
	var userId = $(this).attr('data-userId');
	var reaction = $(this).attr('data-reaction');
	$.ajax({
		type: 'POST',
		url: base_url + 'post/like_this/'+postId+'/'+postType+'/'+likeType+'/'+userId+'/'+reaction,
		success: (res)=>{
			if(res!=0){
				if(postType==1){
					$('#like-section'+postId).html(res);
				}else{
					$('#like-data'+postId).html(res);
				}
			}else{
				swal('Oops!', 'A problem occured. Please try again', 'warning');
			}
		}
   });
  });
});
