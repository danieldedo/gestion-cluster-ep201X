

$(document).ready(function () {

    $('.supprimer').on('click', function() {
        let clusterId = $(this).data('id');
        console.log(clusterId)
        $('#confirmDelete').attr('href', "/clusters/__id__/delete".replace('__id__', clusterId))
    });
});