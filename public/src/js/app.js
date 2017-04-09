var postId = 0;
var postBodyElement = null;

$('.edit').on('click', function(event) {
    event.preventDefault();
    
    postBodyElement = event.target.parentNode.parentNode.childNodes[1]; 
    var postBody = postBodyElement.textContent;
    postId = event.target.parentNode.parentNode.dataset['postid'];
    
    $('#post-body').val(postBody);
    $('#edit-modal').modal();
});

$('#edit-save').on('click', function() {
   $.ajax({
           method: 'POST',
           url: url,
           data: { 
               body: $('#post-body').val(), 
               postId: postId,
               _token: token
           }
       })
       .done(function(res) {
           $(postBodyElement).text(res['new_body']);
           $('#edit-modal').modal('hide');
       });
});

$('.like').on('click', function() {
    event.preventDefault();
    var isLike = event.target.previousElementSibling == null;
    postId = event.target.parentNode.parentNode.dataset['postid'];
    $.ajax({
        method: 'POST',
        url: urlLike,
        data:{isLike: isLike, postId: postId, _token: token}
    }).done(function(){
        
    });
});