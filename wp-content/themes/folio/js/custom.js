function hello() {
    console.log('im custom.js');
}

function reply_validation(){
    var author = $('.author').val();
    var email = $('.email').val();
    var content = $('.write-comment').val();
    
    if (author == '') {
        return false;
    }
    
    if (email == '') {
        return false;
    }
    
    if (content == '') {
        return false;
    }
    
    return true;
}

$('.replyform').submit(function(){
    //Check validation
    if (!reply_validation()) {
        return;
    }
    
    var object_id = $('#object_id').val();
    var comment_parent_id = $('#comment_parent_id').val();
    var author = $('.author').val();
    var email = $('.email').val();
    var content = $('.write-comment').val();
    
    $.ajax({
        type:"post",
        url:comment_reply_ajax.ajax_url,
        data:{object_id:object_id, comment_parent_id:comment_parent_id,
            author:author, email:email, content:content},
        success:function(code){
                if (code != '-1') {
                    alert('comment ID : ' + code);
                } else {
                    alert('Error : Cannot send reply.');
                }
            }
        });
});

function comment_reply_child(comment_id){
    $('#comment_parent_id').val(comment_id);
    $('html, body').animate({
        scrollTop: $("#replyzone").offset().top
    }, 500);
}