jQuery(document).ready(function(){
     jQuery(document).on("click", ".jlk", function(e){
          e.preventDefault();
          var task = jQuery(this).attr("data-task");
          var post_id = jQuery(this).attr("data-post_id");
          var nonce = jQuery(this).attr("data-nonce");
          
          jQuery(".status-" + post_id).html("&nbsp;&nbsp;").addClass("loading-img");
          
          jQuery.ajax({
               type : "post",
               dataType : "json",
               async: false,
               url : wtilp.ajax_url,
               data : {action: "wti_like_post_process_vote", task : task, post_id : post_id, nonce: nonce},
               success: function(response) {
                    jQuery(".lc-" + post_id).html(response.like);
                    jQuery(".unlc-" + post_id).html(response.unlike);
                    jQuery(".status-" + post_id).removeClass("loading-img").empty().html(response.msg);
                    
                    if(response.error == 0){
                         var own_count = parseInt(response.own_count);
                         if(own_count > 0){
                              jQuery(".unlike-" + post_id).removeClass('unlbg-' + wtilp.style + '-active').addClass('unlbg-' + wtilp.style);
                              jQuery(".like-" + post_id).addClass('lbg-' + wtilp.style + '-active');
                         } else if(own_count < 0){
                              jQuery(".like-" + post_id).removeClass('lbg-' + wtilp.style + '-active').addClass('lbg-' + wtilp.style);
                              jQuery(".unlike-" + post_id).addClass('unlbg-' + wtilp.style + '-active');
                         } else {
                              jQuery(".like-" + post_id).removeClass('lbg-' + wtilp.style + '-active').addClass('lbg-' + wtilp.style);
                              jQuery(".unlike-" + post_id).removeClass('unlbg-' + wtilp.style + '-active').addClass('unlbg-' + wtilp.style);
                         }
                         
                         // Populate users who like this
                         if(jQuery(".wti-likes-" + post_id).length > 0){
                              jQuery(".wti-likes-" + post_id).html(response.users);
                         }
                         
                         // Redirect if set
                         if(wtilp.redirect_url != ""){
                              window.location = wtilp.redirect_url;
                         }
                    }
               }
          });
     });
     
     // Other users tooltip
     jQuery("span.wti-others-like").on("mouseover", function(){
          jQuery(this).children("span").show();
     });
     
     jQuery("span.wti-others-like").on("mouseout", function(){
          jQuery(this).children("span").hide();
     });
     
     // Clear vote functionality
     jQuery(document).on("click", ".clear-vote", function(e){
          e.preventDefault();
          var user_id = jQuery(this).attr("data-user-id");
          var post_id = jQuery(this).attr("data-post-id");
          var nonce = jQuery(this).attr("data-nonce");
          var clear_text = jQuery(this).text();
          
          jQuery.ajax({
               type : "post",
               dataType : "json",
               async: false,
               url : wtilp.ajax_url,
               data : {action: "wti_like_post_clear_vote", user_id : user_id, post_id : post_id, nonce: nonce},
               success: function(response) {
                    if(response.error == 0){
                         // Show the success message
                         jQuery(".clear-" + post_id).html(response.msg);
                    } else {
                         alert(response.msg);
                    }
               }
          });
     });
});