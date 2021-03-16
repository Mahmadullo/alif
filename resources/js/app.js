require('./bootstrap');

var Core = {
    headers: {
        "Accept": "application/json",
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
    }    
}

$(document).on('click', '#create-contact', function () {
    $('#table-list-contacts').hide();
    $(this).hide();
    $('#form-create-contact').show();
});

$(document).on('click', '#push-create', function () {
    let id = $(this).attr('id'),
	content = $('#name-of-contact').val();

    $.ajax({
	url: '/contact/create',
	type: 'POST',
	headers: Core.headers,
	data: { id, content }
    }).done(data => {
	// window.location.reload
    }).error(err => console.log(err));
});

$(document).on('click', '.delete-contact', function () {
    let id = $(this).attr('id');

    $.ajax({
        url: '/contact/delete/' + id,
        type: 'DELETE',
        headers: Core.headers,
    }).done(data => {
        $('#contact-' + data.id).remove();
    }).error(err => console.log(err));
});
