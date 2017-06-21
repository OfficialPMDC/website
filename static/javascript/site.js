
$('#project-info').click(function() {
    $('#projectInfoModal').modal();
});

$('#project-repo').click(function() {
    $('#projectRepoModal').modal();
});

var values = $(this).serialize();

$('#submit-project').click(function() {
    $.ajax({
        url: 'index.php?page=api&action=submit-project',
        type: 'post', 
        data: values
    });
});
