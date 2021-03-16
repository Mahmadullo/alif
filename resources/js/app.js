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
    $('#form-create-contact').hide();
    $('#form-create-phone').hide();
    $('#form-create-email').hide();
    $('#form-create-contact').show();
});

$(document).on('click', '#create-email', function () {
    $('#form-create-contact').hide();
    $('#form-create-phone').hide();
    $('#form-create-email').show();
});


$(document).on('click', '#create-phone', function () {
    $('#form-create-contact').hide();
    $('#form-create-email').hide();
    $('#form-create-phone').show();
});

$(document).on('click', '.update-contact', function () {
    $('#form-create-contact').hide();
    $('#form-create-email').hide();
    $('#form-create-phone').hide();    
    $('#form-edit-contact').show();
});

$(document).on('click', '#push-create', function () {
    let id = $(this).attr('id'),
	    name = $('#name-of-contact').val();

    $.ajax({
        url: '/contact/create',
        type: 'POST',
        headers: Core.headers,
        data: { id, name }
    }).done(data => {
        location.reload();
    }).error(err => console.log(err));
});

$(document).on('click', '#push-create-phone', function () {
    let id = $(this).attr('id'),
        contact_id = $('#select').val(),
	    content = $('#phone-of-contact').val();

    $.ajax({
        url: '/phone/create',
        type: 'POST',
        headers: Core.headers,
        data: { id, contact_id, content }
    }).done(data => {
        $('#form-create-phone').hide();
        $('.card-body').prepend('<div class="alert alert-success">Successfully created!</div>');
    }).error(err => console.log(err));
});

$(document).on('click', '#push-create-email', function () {
    let id = $(this).attr('id'),
        contact_id = $('#select').val(),
	    content = $('#email-of-contact').val();

    $.ajax({
        url: '/email/create',
        type: 'POST',
        headers: Core.headers,
        data: { id, contact_id, content }
    }).done(data => {
        $('#form-create-email').hide();
        $('.card-body').prepend('<div class="alert alert-success">Successfully created!</div>');
    }).error(err => console.log(err));
});


$(document).on('click', '.delete-email', function () {
    let id = $(this).data('id');

    $.ajax({
        url: '/email/delete/' + id,
        type: 'DELETE',
        headers: Core.headers,
    }).done(data => {
        $('#email-address-' + data).remove();
    }).error(err => console.log(err));
});

$(document).on('click', '.delete-phone', function () {
    let id = $(this).data('id');

    $.ajax({
        url: '/phone/delete/' + id,
        type: 'DELETE',
        headers: Core.headers,
    }).done(data => {
        $('#phone-number-' + data).remove();
    }).error(err => console.log(err));
});

$(document).on('click', '.delete-contact', function () {
    let id = $(this).attr('id');

    $.ajax({
        url: '/contact/delete/' + id,
        type: 'DELETE',
        headers: Core.headers,
    }).done(data => {
        $('#contact-' + data).remove();
    }).error(err => console.log(err));
});

$(document).on('click', '#push-update', function () {
    let id = $(this).data('id'),
        name = $('#name-of-the-contact').val();

    $.ajax({
        url: '/contact/update',
        type: 'POST',
        headers: Core.headers,
        data: { id, name }
    }).done(data => {
        window.location.replace('/');
    })    
});