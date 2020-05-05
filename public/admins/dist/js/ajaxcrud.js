/*-----------------------------------------------------------------------------------

  Template Name: Metro admin HTML5 Template.
  Template URI: #
  Description: Metro is a unique website template designed in HTML with a simple & beautiful look. There is an excellent solution for creating clean, wonderful and trending material design corporate, corporate any other purposes websites.
  Author: Offpacks
  Author URI: https://www.offpacks.com
  Version: 1.1

-----------------------------------------------------------------------------------*/

/*-------------------------------
[  Table of contents  ]
---------------------------------
  01. Site Info CRUD
  02. About CRUD
  03. Contact CRUD
  04. Category CRUD
  05. Color CRUD
  06. Size CRUD
  07. Tag CRUD
  08. Product CRUD
  09. Message CRUD
  10. Partner CRUD
  11. Country CRUD
  12. Brand CRUD
  13. Image CRUD
  14. Client CRUD
  15. Coupon CRUD
  16. Membership Type CRUD
  17. Slider CRUD
  18. Mail CRUD
  19. Order CRUD
  20. Banner CRUD
  21. Role CRUD
  22. Blog CRUD
  23. Auction CRUD



/*--------------------------------
[ End table content ]
-----------------------------------*/




// passes csrf token to every ajax htttp request
// =============
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});






/*-------------------------------------------
  01. Site Info CRUD
--------------------------------------------- */


// -- ajax Form Add Info--
$(document).on('click','.addInfo', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $('#create').modal('show');
    $('.form-horizontal').show();
    $('.modal-title').text('Add Info');
});
$("#addInfo").click(function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $.ajax({
        type: 'POST',
        url: 'siteinfos',
        data: {
            'facebook': $('input[name=facebook]').val(),
            'twitter': $('input[name=twitter]').val(),
            'linkedin': $('input[name=linkedin]').val(),
            'googleplus': $('input[name=googleplus]').val()
        },
        success: function(data){
            if ((data.errors)) {
                $('.error').removeClass('hidden');
                if (typeof data.errors.facebook === 'undefined') {
                    $('.facebook').addClass('hidden');
                }
                $('.facebook').text(data.errors.facebook);
                if (typeof data.errors.twitter === 'undefined') {
                    $('.twitter').addClass('hidden');
                }
                $('.twitter').text(data.errors.twitter);
                if (typeof data.errors.linkedin === 'undefined') {
                    $('.linkedin').addClass('hidden');
                }
                $('.linkedin').text(data.errors.linkedin);
                if (typeof data.errors.googleplus === 'undefined') {
                    $('.googleplus').addClass('hidden');
                }
                $('.googleplus').text(data.errors.googleplus);
            } else {
                $('.error').addClass('hidden');
                $('#example1').append("<tr id='info" + data.id + "'>"+
                    "<td>" + data.facebook + "</td>"+
                    "<td>" + data.twitter + "</td>"+
                    "<td>" + data.linkedin + "</td>"+
                    "<td>" + data.googleplus + "</td>"+
                    "<td><a class='show-info btn btn-info btn-sm' data-id='" + data.id + "' data-facebook='" + data.facebook + "' data-twitter='" + data.twitter + "' data-linkedin='" + data.linkedin + "' data-googleplus='" + data.googleplus + "'><i class='fa fa-eye'></i></a> <a class='edit-info btn btn-warning btn-sm' data-id='" + data.id + "' data-facebook='" + data.facebook + "' data-twitter='" + data.twitter + "' data-linkedin='" + data.linkedin + "' data-googleplus='" + data.googleplus + "'><i class='fa fa-edit'></i></a> <a class='delete-info btn btn-danger btn-sm' data-id='" + data.id + "'><i class='fa fa-trash'></i></a></td>"+
                    "</tr>");
            }
        },
    });
    $('#facebook').val('');
    $('#twitter').val('');
    $('#linkedin').val('');
    $('#googleplus').val('');
});


// function Edit Info
$(document).on('click', '.edit-info', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $('#footer_action_button').text(" Update Info");
    $('#footer_action_button').addClass('glyphicon-check');
    $('#footer_action_button').removeClass('glyphicon-trash');
    $('.actionBtn').addClass('btn-success');
    $('.actionBtn').removeClass('btn-danger');
    $('.actionBtn').removeClass('deleteInfo');
    $('.actionBtn').addClass('editInfo');
    $('.modal-title').text('Info Edit');
    $('.deleteContent').hide();
    $('.form-horizontal').show();
    $('#fid').val($(this).data('id'));
    $('#efacebook').val($(this).data('facebook'));
    $('#etwitter').val($(this).data('twitter'));
    $('#elinkedin').val($(this).data('linkedin'));
    $('#egoogleplus').val($(this).data('googleplus'));
    $('#myModal').modal('show');
});

$('.modal-footer').on('click', '.editInfo', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $.ajax({
        type: 'POST',
        url: 'siteinfos/' + $('#fid').val(),
        data: {
            '_method': $('input[name=_method1]').val(),
            'id': $("#fid").val(),
            'facebook': $('#efacebook').val(),
            'twitter': $('#etwitter').val(),
            'linkedin': $('#elinkedin').val(),
            'googleplus': $('#egoogleplus').val()
        },
        success: function(data) {
            $('#info' + data.id).replaceWith(" "+
                "<tr id='info" + data.id + "'>"+
                "<td>" + data.facebook + "</td>"+
                "<td>" + data.twitter + "</td>"+
                "<td>" + data.linkedin + "</td>"+
                "<td>" + data.googleplus + "</td>"+
                "<td><a class='show-info btn btn-info btn-sm' data-id='" + data.id + "' data-facebook='" + data.facebook + "' data-twitter='" + data.twitter + "' data-linkedin='" + data.linkedin + "' data-googleplus='" + data.googleplus + "'><i class='fa fa-eye'></i></a> <a class='edit-info btn btn-warning btn-sm' data-id='" + data.id + "' data-facebook='" + data.facebook + "' data-twitter='" + data.twitter + "' data-linkedin='" + data.linkedin + "' data-googleplus='" + data.googleplus + "'><i class='fa fa-edit'></i></a> <a class='delete-info btn btn-danger btn-sm' data-id='" + data.id + "'><i class='fa fa-trash'></i></a></td>"+
                "</tr>");
        }
    });
});


// form Delete function
$(document).on('click', '.delete-info', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $('#footer_action_button').text(" Delete");
    $('#footer_action_button').removeClass('glyphicon-check');
    $('.actionBtn').removeClass('edit-info');
    $('#footer_action_button').addClass('glyphicon-trash');
    $('.actionBtn').removeClass('btn-success');
    $('.actionBtn').addClass('btn-danger');
    $('.actionBtn').addClass('deleteInfo');
    $('.modal-title').text('Delete Info');
    $('.id').text($(this).data('id'));
    $('.deleteContent').show();
    $('.form-horizontal').hide();
    $('#myModal').modal('show');
});

$('.modal-footer').on('click', '.deleteInfo', function(e){
    // Stop browser from default behaviour
    e.preventDefault();

    $.ajax({
        type: 'POST',
        url: 'siteinfos/'+$('.id').text(),
        data: {
            '_token': $('input[name=_token]').val(),
            '_method': $('input[name=_method]').val(),
            'id': $('.id').text()
        },
        success: function(){
            $('#info' + $('.id').text()).remove();
        }
    });
});


// Show function
$(document).on('click', '.show-info', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $('#show').modal('show');
    $('#i').text($(this).data('id'));
    $('#fb').text($(this).data('facebook'));
    $('#tw').text($(this).data('twitter'));
    $('#lk').text($(this).data('linkedin'));
    $('#gp').text($(this).data('googleplus'));
    $('.modal-title').text('Show Info');
});






/*-------------------------------------------
02. About CRUD
--------------------------------------------- */


// -- ajax Form Add About--
$(document).on('click','.addAbout', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $('#create').modal('show');
    $('.form-horizontal').show();
    $('.modal-title').text('Add About');
});
$("#addAbout").click(function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    // update CKEDITOR element
    for (instance in CKEDITOR.instances) {
        CKEDITOR.instances[instance].updateElement();
    }

    // ajax post
    $.ajax({
        type: 'POST',
        url: 'abouts',
        data: $('#insertAbout').serialize(),
        success: function(data){
            if ((data.errors)) {
                $('.error').removeClass('hidden');
                if (typeof data.errors.description === 'undefined') {
                    $('.description').addClass('hidden');
                }
                $('.description').text(data.errors.description);
            } else {
                $('.error').addClass('hidden');
                $('#example1').append("<tr id='about" + data.id + "'>"+
                    "<td>" + data.description + "</td>"+
                    "<td><a class='show-about btn btn-info btn-sm' data-id='" + data.id + "' data-description='" + data.description + "'><i class='fa fa-eye'></i></a> <a class='edit-about btn btn-warning btn-sm' data-id='" + data.id + "' data-description='" + data.description + "'><i class='fa fa-edit'></i></a> <a class='delete-about btn btn-danger btn-sm' data-id='" + data.id + "'><i class='fa fa-trash'></i></a></td>"+
                    "</tr>");
            }
        },
    });
    $('#editor1').val('');
});


// function Edit About
$(document).on('click', '.edit-about', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $('#footer_action_button').text(" Update About");
    $('#footer_action_button').addClass('glyphicon-check');
    $('#footer_action_button').removeClass('glyphicon-trash');
    $('.actionBtn').addClass('btn-success');
    $('.actionBtn').removeClass('btn-danger');
    $('.actionBtn').removeClass('deleteAbout');
    $('.actionBtn').addClass('editAbout');
    $('.modal-title').text('About Edit');
    $('.deleteContent').hide();
    $('.form-horizontal').show();
    $('#fid').val($(this).data('id'));
    CKEDITOR.instances.editor.setData( $(this).data('description') );
    $('#myModal').modal('show');
});

$('.modal-footer').on('click', '.editAbout', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    // update CKEDITOR element
    for (instance in CKEDITOR.instances) {
        CKEDITOR.instances[instance].updateElement();
    }
    $.ajax({
        type: 'POST',
        url: 'abouts/' + $('#fid').val(),
        data: {
            '_token': $('input[name=_token]').val(),
            '_method': $('input[name=_method1]').val(),
            'description': $('#editor').val(),
            'id': $("#fid").val()
        },
        success: function(data) {
            $('#about' + data.id).replaceWith(" "+
                "<tr id='about" + data.id + "'>"+
                "<td>" + data.description + "</td>"+
                "<td><a class='show-info btn btn-info btn-sm' data-id='" + data.id + "' data-description='" + data.description + "'><i class='fa fa-eye'></i></a> <a class='edit-info btn btn-warning btn-sm' data-id='" + data.id + "' data-description='" + data.description + "'><i class='fa fa-edit'></i></a> <a class='delete-info btn btn-danger btn-sm' data-id='" + data.id + "'><i class='fa fa-trash'></i></a></td>"+
                "</tr>");
        }
    });
});


// Show function
$(document).on('click', '.show-about', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $('#show').modal('show');
    $('#i').text($(this).data('id'));
    $('#des').html($(this).data('description'));
    $('.modal-title').text('Show About');
});


// form Delete function
$(document).on('click', '.delete-about', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $('#footer_action_button').text(" Delete");
    $('#footer_action_button').removeClass('glyphicon-check');
    $('#footer_action_button').addClass('glyphicon-trash');
    $('.actionBtn').removeClass('btn-success');
    $('.actionBtn').addClass('btn-danger');
    $('.actionBtn').addClass('deleteAbout');
    $('.modal-title').text('Delete About');
    $('.id').text($(this).data('id'));
    $('.deleteContent').show();
    $('.form-horizontal').hide();
    $('#myModal').modal('show');
});

$('.modal-footer').on('click', '.deleteAbout', function(e){
    // Stop browser from default behaviour
    e.preventDefault();

    $.ajax({
        type: 'POST',
        url: 'abouts/'+$('.id').text(),
        data: {
            '_token': $('input[name=_token]').val(),
            '_method': $('input[name=_method]').val(),
            'id': $('.id').text()
        },
        success: function(data){
            $('#about' + $('.id').text()).remove();
        }
    });
});






/*-------------------------------------------
  03. Contact CRUD
--------------------------------------------- */


// -- ajax Form Add Contact--
$(document).on('click','.addContact', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $('#create').modal('show');
    $('.form-horizontal').show();
    $('.modal-title').text('Add Contact');
});
$("#addContact").click(function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $.ajax({
        type: 'POST',
        url: 'contacts',
        data: $('#contact-form').serialize(),
        success: function(data){
            if ((data.errors)) {
                $('.error').removeClass('hidden');
                if (typeof data.errors.address === 'undefined') {
                    $('.address').addClass('hidden');
                }
                $('.address').text(data.errors.address);
                if (typeof data.errors.phone1 === 'undefined') {
                    $('.phone1').addClass('hidden');
                }
                $('.phone1').text(data.errors.phone1);
                if (typeof data.errors.phone2 === 'undefined') {
                    $('.phone2').addClass('hidden');
                }
                $('.phone2').text(data.errors.phone2);
                if (typeof data.errors.email === 'undefined') {
                    $('.email').addClass('hidden');
                }
                $('.email').text(data.errors.email);
            } else {
                $('.error').addClass('hidden');
                $('#example1').append("<tr id='contact" + data.id + "'>"+
                    "<td>" + data.address + "</td>"+
                    "<td>" + data.phone1 + "</td>"+
                    "<td>" + data.phone2 + "</td>"+
                    "<td>" + data.email + "</td>"+
                    "<td><a class='show-contact btn btn-info btn-sm' data-id='" + data.id + "' data-address='" + data.address + "' data-phone1='" + data.phone1 + "' data-phone2='" + data.phone2 + "' data-email='" + data.email + "'><span class='fa fa-eye'></span></a> <a class='edit-contact btn btn-warning btn-sm' data-id='" + data.id + "' data-address='" + data.address + "' data-phone1='" + data.phone1 + "' data-phone2='" + data.phone2 + "' data-email='" + data.email + "'><span class='fa fa-edit'></span></a> <a class='delete-contact btn btn-danger btn-sm' data-id='" + data.id + "'><span class='fa fa-trash'></span></a></td>"+
                    "</tr>");
            }
        },
    });
    $('#contact-form input').val('');
});


// function Edit Contact
$(document).on('click', '.edit-contact', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $('#footer_action_button').text(" Update Contact");
    $('#footer_action_button').addClass('glyphicon-check');
    $('#footer_action_button').removeClass('glyphicon-trash');
    $('.actionBtn').addClass('btn-success');
    $('.actionBtn').removeClass('btn-danger');
    $('.actionBtn').removeClass('deleteContact');
    $('.actionBtn').addClass('editContact');
    $('.modal-title').text('Contact Edit');
    $('.deleteContent').hide();
    $('.form-horizontal').show();
    $('#fid').val($(this).data('id'));
    $('#eaddress').val($(this).data('address'));
    $('#ephone1').val($(this).data('phone1'));
    $('#ephone2').val($(this).data('phone2'));
    $('#eemail').val($(this).data('email'));
    $('#myModal').modal('show');
});

$('.modal-footer').on('click', '.editContact', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $.ajax({
        type: 'POST',
        url: 'contacts/' + $('#fid').val(),
        data: {
            '_token': $('input[name=_token]').val(),
            '_method': $('input[name=_method1]').val(),
            'id': $("#fid").val(),
            'address': $('#eaddress').val(),
            'phone1': $('#ephone1').val(),
            'phone2': $('#ephone2').val(),
            'email': $('#eemail').val()
        },
        success: function(data) {
            $('#contact' + data.id).replaceWith(" "+
                "<tr id='contact" + data.id + "'>"+
                "<td>" + data.address + "</td>"+
                "<td>" + data.phone1 + "</td>"+
                "<td>" + data.phone2 + "</td>"+
                "<td>" + data.email + "</td>"+
                "<td><a class='show-contact btn btn-info btn-sm' data-id='" + data.id + "' data-address='" + data.address + "' data-phone1='" + data.phone1 + "' data-phone2='" + data.phone2 + "' data-email='" + data.email + "'><span class='fa fa-eye'></span></a> <a class='edit-contact btn btn-warning btn-sm' data-id='" + data.id + "' data-address='" + data.address + "' data-phone1='" + data.phone1 + "' data-phone2='" + data.phone2 + "' data-email='" + data.email + "'><span class='fa fa-edit'></span></a> <a class='delete-contact btn btn-danger btn-sm' data-id='" + data.id + "'><span class='fa fa-trash'></span></a></td>"+
                "</tr>");
        }
    });
});


// form Delete function
$(document).on('click', '.delete-contact', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $('#footer_action_button').text(" Delete");
    $('#footer_action_button').removeClass('glyphicon-check');
    $('#footer_action_button').addClass('glyphicon-trash');
    $('.actionBtn').removeClass('btn-success');
    $('.actionBtn').addClass('btn-danger');
    $('.actionBtn').addClass('deleteContact');
    $('.modal-title').text('Delete Contact');
    $('.id').text($(this).data('id'));
    $('.deleteContent').show();
    $('.form-horizontal').hide();
    $('#myModal').modal('show');
});

$('.modal-footer').on('click', '.deleteContact', function(e){
    // Stop browser from default behaviour
    e.preventDefault();

    $.ajax({
        type: 'POST',
        url: 'contacts/'+$('.id').text(),
        data: {
            '_token': $('input[name=_token]').val(),
            '_method': $('input[name=_method]').val(),
            'id': $('.id').text()
        },
        success: function(){
            $('#contact' + $('.id').text()).remove();
        }
    });
});


// Show function
$(document).on('click', '.show-contact', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $('#show').modal('show');
    $('#i').text($(this).data('id'));
    $('#ad').text($(this).data('address'));
    $('#ph1').text($(this).data('phone1'));
    $('#ph2').text($(this).data('phone2'));
    $('#em').text($(this).data('email'));
    $('.modal-title').text('Show Contact');
});






/*-------------------------------------------
  04. Category CRUD
--------------------------------------------- */


// -- ajax Form Add Category--
$(document).on('click','.addCategory', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $('#create').modal('show');
    $('.form-horizontal').show();
    $('.modal-title').text('Add Category');
});
$("#category-add-form").submit(function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $.ajax({
        type: 'POST',
        url: $(this).attr('action'),
        data: new FormData(this),
        cache: false,
        contentType: false,
        processData: false,
        success: function(data){
            if ((data.errors)) {
                $('.error').removeClass('hidden');
                if (typeof data.errors.categoryName === 'undefined') {
                    $('.categoryName').addClass('hidden');
                }
                $('.categoryName').text(data.errors.categoryName);
                if (typeof data.errors.catImage === 'undefined') {
                    $('.catImage').addClass('hidden');
                }
                $('.catImage').text(data.errors.catImage);
                if (typeof data.errors.parent_id === 'undefined') {
                    $('.parent_id').addClass('hidden');
                }
                $('.parent_id').text(data.errors.parent_id);
            } else {
                $('.error').addClass('hidden');
                $('#example1').prepend("<tr id='category" + data.id + "'>"+
                    "<td>" + data.categoryName + "</td>"+
                    "<td><img src='storage/images/icons/menu/" + data.catImage + "' alt='N/A'></td>"+
                    "<td>" + data.parent_id + "</td>"+
                    "<td><a class='edit-category btn btn-warning btn-sm' data-id='" + data.id + "' data-categoryName='" + data.categoryName + "' data-catImage='" + data.catImage + "' data-parent_id='" + data.parent_id + "'><span class='fa fa-edit'></span></a> <a class='delete-category btn btn-danger btn-sm' data-id='" + data.id + "'><span class='fa fa-trash'></span></a></td>"+
                    "</tr>");
            }
        },
    });
    $(this).trigger('reset');
});


// function Edit Category
$(document).on('click', '.edit-category', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $('.modal-title').text('Category Edit');
    $('#fid').val($(this).data('id'));
    $('#categoryName').val($(this).data('categoryname'));
    // Get the parent_id
    var  parent_id = $(this).data('parent_id');
    // Loop over each select option
    $("#parent_id > option").each(function(){
        // Check for the matching category
        if ($(this).val() == parent_id){
            // Select the matched option
            $(this).prop("selected", true);
        }
    });

    $('#myModal').modal('show');
});

$('#category-edit-form').on('submit', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $.ajax({
        type: 'POST',
        url: 'categories/' + $('#fid').val(),
        data: new FormData(this),
        cache: false,
        contentType: false,
        processData: false,
        success: function(data) {
            if ((data.errors)) {
                $('.error').removeClass('hidden');
                if (typeof data.errors.categoryName === 'undefined') {
                    $('.categoryName').addClass('hidden');
                }
                $('.categoryName').text(data.errors.categoryName);
                if (typeof data.errors.catImage === 'undefined') {
                    $('.catImage').addClass('hidden');
                }
                $('.catImage').text(data.errors.catImage);
                if (typeof data.errors.parent_id === 'undefined') {
                    $('.parent_id').addClass('hidden');
                }
                $('.parent_id').text(data.errors.parent_id);
            } else {
                $('.error').addClass('hidden');
                $('#category' + data.id).replaceWith("<tr id='category" + data.id + "'>"+
                    "<td>" + data.categoryName + "</td>"+
                    "<td><img src='storage/images/icons/menu/" + data.catImage + "' alt='N/A'></td>"+
                    "<td>" + data.parent_id + "</td>"+
                    "<td><a class='edit-category btn btn-warning btn-sm' data-id='" + data.id + "' data-categoryName='" + data.categoryName + "' data-catImage='" + data.catImage + "' data-parent_id='" + data.parent_id + "'><span class='fa fa-edit'></span></a> <a class='delete-category btn btn-danger btn-sm' data-id='" + data.id + "'><span class='fa fa-trash'></span></a></td>"+
                    "</tr>");
            }
        }
    });
});

// form Delete function
$(document).on('click', '.delete-category', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $('#footer_action_button').text(" Delete");
    $('#footer_action_button').addClass('glyphicon-trash');
    $('.actionBtn').addClass('btn-danger');
    $('.actionBtn').addClass('deleteCategory');
    $('.modal-title').text('Delete Category');
    $('.id').text($(this).data('id'));
    $('#delete').modal('show');
});

$('.modal-footer').on('click', '.deleteCategory', function(e){
    // Stop browser from default behaviour
    e.preventDefault();

    $.ajax({
        type: 'POST',
        url: 'categories/'+$('.id').text(),
        data: {
            '_token': $('input[name=_token]').val(),
            '_method': 'DELETE',
            'id': $('.id').text()
        },
        success: function(){
            $('#category' + $('.id').text()).remove();
        }
    });
});






/*-------------------------------------------
05. Color CRUD
--------------------------------------------- */


// -- ajax Form Add Color--
$(document).on('click','.addColor', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $('#create').modal('show');
    $('.form-horizontal').show();
    $('.modal-title').text('Add Color');
});
$("#addColor").click(function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $.ajax({
        type: 'POST',
        url: 'colors',
        data: {
            '_token': $('input[name=_token]').val(),
            'color': $('input[name=colorName]').val()
        },
        success: function(data){
            if ((data.errors)) {
                $('.error').removeClass('hidden');
                if (typeof data.errors.color === 'undefined') {
                    $('.color').addClass('hidden');
                }
                $('.color').text(data.errors.color);
            } else {
                $('.error').addClass('hidden');
                $('#example1').append("<tr id='color" + data.id + "'>"+
                    "<td>" + data.color + "</td>"+
                    "<td><a class='edit-color btn btn-warning btn-sm' data-id='" + data.id + "' data-color='" + data.color + "'><span class='fa fa-edit'></span></a> <a class='delete-color btn btn-danger btn-sm' data-id='" + data.id + "'><span class='fa fa-trash'></span></a></td>"+
                    "</tr>");
            }
        },
    });
    $('#colorName').val('');
});


// function Edit Color
$(document).on('click', '.edit-color', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $('#footer_action_button').text(" Update Color");
    $('#footer_action_button').addClass('glyphicon-check');
    $('#footer_action_button').removeClass('glyphicon-trash');
    $('.actionBtn').addClass('btn-success');
    $('.actionBtn').removeClass('btn-danger');
    $('.actionBtn').removeClass('deleteColor');
    $('.actionBtn').addClass('editColor');
    $('.modal-title').text('Color Edit');
    $('.deleteContent').hide();
    $('.form-horizontal').show();
    $('#fid').val($(this).data('id'));
    $('#ecolorName').val($(this).data('color'));
    $('#myModal').modal('show');
});

$('.modal-footer').on('click', '.editColor', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $.ajax({
        type: 'POST',
        url: 'colors/' + $('#fid').val(),
        data: {
            '_token': $('input[name=_token]').val(),
            '_method': $('input[name=_method1]').val(),
            'id': $("#fid").val(),
            'color': $('#ecolorName').val()
        },
        success: function(data) {
            $('#color' + data.id).replaceWith(" "+
                "<tr id='color" + data.id + "'>"+
                "<td>" + data.color + "</td>"+
                "<td><a class='edit-color btn btn-warning btn-sm' data-id='" + data.id + "' data-color='" + data.color + "'><span class='fa fa-edit'></span></a> <a class='delete-color btn btn-danger btn-sm' data-id='" + data.id + "'><span class='fa fa-trash'></span></a></td>"+
                "</tr>");
        }
    });
});


// form Delete function
$(document).on('click', '.delete-color', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $('#footer_action_button').text(" Delete");
    $('#footer_action_button').removeClass('glyphicon-check');
    $('#footer_action_button').addClass('glyphicon-trash');
    $('.actionBtn').removeClass('btn-success');
    $('.actionBtn').addClass('btn-danger');
    $('.actionBtn').addClass('deleteColor');
    $('.modal-title').text('Delete Color');
    $('.id').text($(this).data('id'));
    $('.deleteContent').show();
    $('.form-horizontal').hide();
    $('#myModal').modal('show');
});

$('.modal-footer').on('click', '.deleteColor', function(e){
    // Stop browser from default behaviour
    e.preventDefault();

    $.ajax({
        type: 'POST',
        url: 'colors/'+$('.id').text(),
        data: {
            '_token': $('input[name=_token]').val(),
            '_method': $('input[name=_method]').val(),
            'id': $('.id').text()
        },
        success: function(data){
            $('#color' + $('.id').text()).remove();
        }
    });
});






/*-------------------------------------------
06. Size CRUD
--------------------------------------------- */


// -- ajax Form Add Size--
$(document).on('click','.addSize', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $('#create').modal('show');
    $('.form-horizontal').show();
    $('.modal-title').text('Add Size');
});
$("#addSize").click(function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $.ajax({
        type: 'POST',
        url: 'sizes',
        data: {
            '_token': $('input[name=_token]').val(),
            'size': $('input[name=sizeName]').val()
        },
        success: function(data){
            if ((data.errors)) {
                $('.error').removeClass('hidden');
                if (typeof data.errors.size === 'undefined') {
                    $('.size').addClass('hidden');
                }
                $('.size').text(data.errors.size);
            } else {
                $('.error').addClass('hidden');
                $('#example1').append("<tr id='size" + data.id + "'>"+
                    "<td>" + data.size + "</td>"+
                    "<td><a class='edit-size btn btn-warning btn-sm' data-id='" + data.id + "' data-size='" + data.size + "'><span class='fa fa-edit'></span></a> <a class='delete-size btn btn-danger btn-sm' data-id='" + data.id + "'><span class='fa fa-trash'></span></a></td>"+
                    "</tr>");
            }
        },
    });
    $('#sizeName').val('');
});


// function Edit Size
$(document).on('click', '.edit-size', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $('#footer_action_button').text(" Update Size");
    $('#footer_action_button').addClass('glyphicon-check');
    $('#footer_action_button').removeClass('glyphicon-trash');
    $('.actionBtn').addClass('btn-success');
    $('.actionBtn').removeClass('btn-danger');
    $('.actionBtn').removeClass('deleteSize');
    $('.actionBtn').addClass('editSize');
    $('.modal-title').text('Size Edit');
    $('.deleteContent').hide();
    $('.form-horizontal').show();
    $('#fid').val($(this).data('id'));
    $('#esizeName').val($(this).data('size'));
    $('#myModal').modal('show');
});

$('.modal-footer').on('click', '.editSize', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $.ajax({
        type: 'POST',
        url: 'sizes/' + $('#fid').val(),
        data: {
            '_token': $('input[name=_token]').val(),
            '_method': $('input[name=_method1]').val(),
            'id': $("#fid").val(),
            'size': $('#esizeName').val()
        },
        success: function(data) {
            $('#size' + data.id).replaceWith(" "+
                "<tr id='size" + data.id + "'>"+
                "<td>" + data.size + "</td>"+
                "<td><a class='edit-size btn btn-warning btn-sm' data-id='" + data.id + "' data-size='" + data.size + "'><span class='fa fa-edit'></span></a> <a class='delete-size btn btn-danger btn-sm' data-id='" + data.id + "'><span class='fa fa-trash'></span></a></td>"+
                "</tr>");
        }
    });
});


// form Delete function
$(document).on('click', '.delete-size', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $('#footer_action_button').text(" Delete");
    $('#footer_action_button').removeClass('glyphicon-check');
    $('#footer_action_button').addClass('glyphicon-trash');
    $('.actionBtn').removeClass('btn-success');
    $('.actionBtn').addClass('btn-danger');
    $('.actionBtn').addClass('deleteSize');
    $('.modal-title').text('Delete Size');
    $('.id').text($(this).data('id'));
    $('.deleteContent').show();
    $('.form-horizontal').hide();
    $('#myModal').modal('show');
});

$('.modal-footer').on('click', '.deleteSize', function(e){
    // Stop browser from default behaviour
    e.preventDefault();

    $.ajax({
        type: 'POST',
        url: 'sizes/'+$('.id').text(),
        data: {
            '_token': $('input[name=_token]').val(),
            '_method': $('input[name=_method]').val(),
            'id': $('.id').text()
        },
        success: function(data){
            $('#size' + $('.id').text()).remove();
        }
    });
});






/*-------------------------------------------
07. Tag CRUD
--------------------------------------------- */


// -- ajax Form Add Tag--
$(document).on('click','.addTag', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $('#create').modal('show');
    $('.form-horizontal').show();
    $('.modal-title').text('Add Tag');
});
$("#addTag").click(function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $.ajax({
        type: 'POST',
        url: 'tags',
        data: {
            '_token': $('input[name=_token]').val(),
            'tag': $('input[name=tagName]').val()
        },
        success: function(data){
            if ((data.errors)) {
                $('.error').removeClass('hidden');
                if (typeof data.errors.tag === 'undefined') {
                    $('.tag').addClass('hidden');
                }
                $('.tag').text(data.errors.tag);
            } else {
                $('.error').addClass('hidden');
                $('#example1').append("<tr id='tag" + data.id + "'>"+
                    "<td>" + data.tag + "</td>"+
                    "<td><a class='edit-tag btn btn-warning btn-sm' data-id='" + data.id + "' data-tag='" + data.tag + "'><span class='fa fa-edit'></span></a> <a class='delete-tag btn btn-danger btn-sm' data-id='" + data.id + "'><span class='fa fa-trash'></span></a></td>"+
                    "</tr>");
            }
        },
    });
    $('#tagName').val('');
});


// function Edit Tag
$(document).on('click', '.edit-tag', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $('#footer_action_button').text(" Update Tag");
    $('#footer_action_button').addClass('glyphicon-check');
    $('#footer_action_button').removeClass('glyphicon-trash');
    $('.actionBtn').addClass('btn-success');
    $('.actionBtn').removeClass('btn-danger');
    $('.actionBtn').removeClass('deleteTag');
    $('.actionBtn').addClass('editTag');
    $('.modal-title').text('Tag Edit');
    $('.deleteContent').hide();
    $('.form-horizontal').show();
    $('#fid').val($(this).data('id'));
    $('#etagName').val($(this).data('tag'));
    $('#myModal').modal('show');
});

$('.modal-footer').on('click', '.editTag', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $.ajax({
        type: 'POST',
        url: 'tags/' + $('#fid').val(),
        data: {
            '_token': $('input[name=_token]').val(),
            '_method': $('input[name=_method1]').val(),
            'id': $("#fid").val(),
            'tag': $('#etagName').val()
        },
        success: function(data) {
            $('#tag' + data.id).replaceWith(" "+
                "<tr id='tag" + data.id + "'>"+
                "<td>" + data.tag + "</td>"+
                "<td><a class='edit-tag btn btn-warning btn-sm' data-id='" + data.id + "' data-tag='" + data.tag + "'><span class='fa fa-edit'></span></a> <a class='delete-tag btn btn-danger btn-sm' data-id='" + data.id + "'><span class='fa fa-trash'></span></a></td>"+
                "</tr>");
        }
    });
});


// form Delete function
$(document).on('click', '.delete-tag', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $('#footer_action_button').text(" Delete");
    $('#footer_action_button').removeClass('glyphicon-check');
    $('#footer_action_button').addClass('glyphicon-trash');
    $('.actionBtn').removeClass('btn-success');
    $('.actionBtn').addClass('btn-danger');
    $('.actionBtn').addClass('deleteTag');
    $('.modal-title').text('Delete Tag');
    $('.id').text($(this).data('id'));
    $('.deleteContent').show();
    $('.form-horizontal').hide();
    $('#myModal').modal('show');
});

$('.modal-footer').on('click', '.deleteTag', function(e){
    // Stop browser from default behaviour
    e.preventDefault();

    $.ajax({
        type: 'POST',
        url: 'tags/'+$('.id').text(),
        data: {
            '_token': $('input[name=_token]').val(),
            '_method': $('input[name=_method]').val(),
            'id': $('.id').text()
        },
        success: function(){
            $('#tag' + $('.id').text()).remove();
        }
    });
});






/*-------------------------------------------
08. Product CRUD
--------------------------------------------- */


// -- ajax Form Add Product--
$(document).on('click','.addProduct', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();
    $('#create').modal('show');
    $('.form-horizontal').show();
    $('.modal-title').text('Add Product');
});

// Send ajax request Add Product
$("#product-form").submit(function(event) {
    // Stop browser from submitting the form
    event.preventDefault();

    // update CKEDITOR element
    for (instance in CKEDITOR.instances) {
        CKEDITOR.instances[instance].updateElement();
    }

    // Send ajax request
    $.ajax({
        type: 'POST',
        url: 'products',
        data: new FormData( this ),
        cache: false,
        contentType: false,
        processData: false,
        success: function(data){
            if ((data.errors)) {
                $('.error').removeClass('hidden');
                if (typeof data.errors.productName === 'undefined') {
                    $('.productName').addClass('hidden');
                }
                $('.productName').text(data.errors.productName);
                if (typeof data.errors.sku === 'undefined') {
                    $('.sku').addClass('hidden');
                }
                $('.sku').text(data.errors.sku);
                if (typeof data.errors.regularPrice === 'undefined') {
                    $('.regularPrice').addClass('hidden');
                }
                $('.regularPrice').text(data.errors.regularPrice);
                if (typeof data.errors.salePrice === 'undefined') {
                    $('.salePrice').addClass('hidden');
                }
                $('.salePrice').text(data.errors.salePrice);
                if (typeof data.errors.description === 'undefined') {
                    $('.description').addClass('hidden');
                }
                $('.description').text(data.errors.description);
                if (typeof data.errors.shortDescription === 'undefined') {
                    $('.shortDescription').addClass('hidden');
                }
                $('.shortDescription').text(data.errors.shortDescription);
                if (typeof data.errors.availability === 'undefined') {
                    $('.availability').addClass('hidden');
                }
                $('.availability').text(data.errors.availability);
                if (typeof data.errors.discount_type === 'undefined') {
                    $('.discount_type').addClass('hidden');
                }
                $('.discount_type').text(data.errors.discount_type);
                if (typeof data.errors.discount_value === 'undefined') {
                    $('.discount_value').addClass('hidden');
                }
                $('.discount_value').text(data.errors.discount_value);
                if (typeof data.errors.valid_until === 'undefined') {
                    $('.valid_until').addClass('hidden');
                }
                $('.valid_until').text(data.errors.valid_until);
                if (typeof data.errors.product_url === 'undefined') {
                    $('.product_url').addClass('hidden');
                }
                $('.product_url').text(data.errors.product_url);
                if (typeof data.errors.specification === 'undefined') {
                    $('.specification').addClass('hidden');
                }
                $('.specification').text(data.errors.specification);
                if (typeof data.errors.category_id === 'undefined') {
                    $('.category_id').addClass('hidden');
                }
                $('.category_id').text(data.errors.category_id);
                if (typeof data.errors.brand_id === 'undefined') {
                    $('.brand_id').addClass('hidden');
                }
                $('.brand_id').text(data.errors.brand_id);
                if (typeof data.errors.country_id === 'undefined') {
                    $('.country_id').addClass('hidden');
                }
                $('.country_id').text(data.errors.country_id);
                if (typeof data.errors.image === 'undefined') {
                    $('.image').addClass('hidden');
                }
                $('.image').text(data.errors.image);
            } else {
                $('.error').addClass('hidden');

                // Check product approval
                if (data.product.is_approved) {
                    var is_approved = 'Yes';
                }else {
                    var is_approved = 'No';
                }

                $('#example1').prepend("<tr id='product" + data.product.id + "'>"+
                    "<td>" + data.product.productName + "</td>"+
                    "<td><img src='storage/images/product/" + data.image.image + "' height='100px' width='100px'></td>"+
                    "<td>" + data.product.sku + "</td>"+
                    "<td>" + $('.category_id >option:selected').text() + "</td>"+
                    "<td>" + $('.brand_id >option:selected').text() + "</td>"+
                    "<td>৳ " + data.product.regularPrice + "</td>"+
                    "<td>৳ " + data.product.salePrice + "</td>"+
                    "<td>" + is_approved + "</td>"+
                    "<td><a class='show-product btn btn-info btn-sm' data-id='" + data.product.id + "'><span class='fa fa-eye'></span></a><a class='edit-product btn btn-warning btn-sm' data-id='" + data.product.id + "'><span class='fa fa-edit'></span></a> <a class='delete-product btn btn-danger btn-sm' data-id='" + data.product.id + "'><span class='fa fa-trash'></span></a></td>"+
                    "</tr>"
                );

                // Clear form data
                $('#product-form').trigger("reset");
                CKEDITOR.instances.editor.setData( '' );
                CKEDITOR.instances.editor1.setData( '' );
                CKEDITOR.instances.editor2.setData( '' );
            }
        },
    });
});


// -- ajax Form Edit Product--
$(document).on('click', '.edit-product', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    // Clear form data
    $('#updateProduct').trigger("reset");
    $('#image').html('');

    // Send ajax request
    $.ajax({
        type: 'GET',
        url: 'products/' + $(this).data('id') + '/edit',
        data: {
            'id': $(this).data('id')
        },
        success: function(data){
            $('#ID').val(data.product.id);
            $('#productName').val(data.product.productName);
            $('#sku').val(data.product.sku);
            $('#regularPrice').val(data.product.regularPrice);
            $('#salePrice').val(data.product.salePrice);
            $('#product_url').val(data.product.product_url);
            $('#discount_value').val(data.product.discount_value);

            // Set valid_until date time
            var valid_until = $('#evalid_until');
            valid_until.datepicker('setDate', new Date(data.product.valid_until));

            // Loop over each images
            $(data.images).each(function(index, value){
                if (index == 0){
                    // Show image to edit product form
                    $('#image').append('<div class="form-group" id="edit_image' + value.id + '">\n' +
                        '<label class="control-label col-sm-2" for="salePrice">Product Image :</label>\n' +
                        '<div class="col-sm-4">\n' +
                        '<img src="storage/images/product/' + value.image + '" style="height: 100px;width: 100px"/>\n' +
                        '</div>\n' +
                        '<label class="control-label col-sm-2" for="image">Update :</label>\n' +
                        '<div class="col-sm-4">\n' +
                        '<input type="file" class="form-control" name="image_update[' + value.id + ']">\n' +
                        '<p class="error image_update text-center alert alert-danger hidden"></p>\n' +
                        '</div>\n' +
                        '</div>'
                    );
                }else {
                    // Show image to edit product form
                    $('#image').append('<div class="form-group" id="edit_image' + value.id + '">\n' +
                        '<label class="control-label col-sm-2" for="salePrice">Product Image :</label>\n' +
                        '<div class="col-sm-4">\n' +
                        '<img src="storage/images/product/' + value.image + '" style="height: 100px;width: 100px"/>\n' +
                        '</div>\n' +
                        '<label class="control-label col-sm-2" for="image">Update/Delete :</label>\n' +
                        '<div class="col-sm-4">\n' +
                        '<input type="file" class="form-control" name="image_update[' + value.id + ']">\n' +
                        '<p class="error image_update text-center alert alert-danger hidden"></p>\n' +
                        "<a class='delete-image btn btn-danger btn-sm' data-id='" + value.id + "'><span class='fa fa-trash'></span></a>"+
                        '</div>\n' +
                        '</div>'
                    );
                }
            });

            // Get the category_id
            var  category_id = data.product.category_id;
            // Loop over each select option
            $("#category_id > option").each(function(){
                // Check for the matching category
                if ($(this).val() == category_id){
                    // Select the matched option
                    $(this).prop("selected", true);
                }
            });

            // Get the brand_id
            var  brand_id = data.product.brand_id;
            // Loop over each select option
            $("#brand_id > option").each(function(){
                // Check for the matching brand_id
                if ($(this).val() == brand_id){
                    // Select the matched option
                    $(this).prop("selected", true);
                }
            });

            // Get the country_id
            var  country_id = data.product.country_id;
            // Loop over each select option
            $("#country_id > option").each(function(){
                // Check for the matching country_id
                if ($(this).val() == country_id){
                    // Select the matched option
                    $(this).prop("selected", true);
                }
            });

            // Get the is_approved
            var  is_approved = data.product.is_approved;
            // Loop over each select option
            $("#is_approved > option").each(function(){
                // Check for the matching is_approved
                if ($(this).val() == is_approved){
                    // Select the matched option
                    $(this).prop("selected", true);
                }
            });

            // Get the availability
            var  availability = data.product.availability;
            // Loop over each select option
            $("#availability > option").each(function(){
                // Check for the matching availability
                if ($(this).val() == availability){
                    // Select the matched option
                    $(this).prop("selected", true);
                }
            });

            // Get the discount_type
            var  discount_type = data.product.discount_type;
            // Loop over each select option
            $("#discount_type > option").each(function(){
                // Check for the matching type
                if ($(this).val() == discount_type){
                    // Select the matched option
                    $(this).prop("selected", true);
                }
            });

            // Loop over each select option
            $(".color").each(function(){
                // Get the color
                var $this = $(this);
                // Loop over each color
                $(data.colors).each(function(index, value){
                    // Check for the matching type
                    if (value.id == $this.val()){
                        // Select the matched option
                        $this.prop("checked", true);
                    }
                });
            });

            // Loop over each select option
            $(".size").each(function(){
                // Get the size
                var $this = $(this);
                // Loop over each color
                $(data.sizes).each(function(index, value){
                    // Check for the matching type
                    if (value.id == $this.val()){
                        // Select the matched option
                        $this.prop("checked", true);
                    }
                });
            });

            // Loop over each select option
            $(".tag").each(function(){
                // Get the tag
                var $this = $(this);
                // Loop over each color
                $(data.tags).each(function(index, value){
                    // Check for the matching type
                    if (value.id == $this.val()){
                        // Select the matched option
                        $this.prop("checked", true);
                    }
                });
            });

            // Update CKEDITOR elements
            CKEDITOR.instances.uShortDescription.setData( data.product.shortDescription );
            CKEDITOR.instances.uDescription.setData( data.product.description );
            CKEDITOR.instances.uSpecification.setData( data.product.specification );
            $('.modal-title').text('Edit Product');
            $('.form-horizontal').show();
            $('#update').modal('show');
        }
    });
});


// Send ajax request update product
$('#updateProduct').submit(function(event) {
    // Stop browser form submitting the form
    event.preventDefault();

    // update CKEDITOR element
    for (instance in CKEDITOR.instances) {
        CKEDITOR.instances[instance].updateElement();
    }

    // Get the form data
    var formData = new FormData(this);

    // Add PUT method to form data
    formData.append('_method', 'PUT');

    // Send ajax request
    $.ajax({
        type: 'POST',
        url: 'products/' + $('#ID').val(),
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function(data) {
            if ((data.errors)) {
                $('.error').removeClass('hidden');
                if (typeof data.errors.productName === 'undefined') {
                    $('.eproductName').addClass('hidden');
                }
                $('.eproductName').text(data.errors.productName);
                if (typeof data.errors.sku === 'undefined') {
                    $('.esku').addClass('hidden');
                }
                $('.esku').text(data.errors.sku);
                if (typeof data.errors.regularPrice === 'undefined') {
                    $('.eregularPrice').addClass('hidden');
                }
                $('.eregularPrice').text(data.errors.regularPrice);
                if (typeof data.errors.salePrice === 'undefined') {
                    $('.esalePrice').addClass('hidden');
                }
                $('.esalePrice').text(data.errors.salePrice);
                if (typeof data.errors.image === 'undefined') {
                    $('.eimage').addClass('hidden');
                }
                $('.eimage').text(data.errors.image);
                if (typeof data.errors.description === 'undefined') {
                    $('.edescription').addClass('hidden');
                }
                $('.edescription').text(data.errors.description);
                if (typeof data.errors.shortDescription === 'undefined') {
                    $('.eshortDescription').addClass('hidden');
                }
                $('.eshortDescription').text(data.errors.shortDescription);
                if (typeof data.errors.availability === 'undefined') {
                    $('.eavailability').addClass('hidden');
                }
                $('.eavailability').text(data.errors.availability);
                if (typeof data.errors.discount_type === 'undefined') {
                    $('.ediscount_type').addClass('hidden');
                }
                $('.ediscount_type').text(data.errors.discount_type);
                if (typeof data.errors.discount_value === 'undefined') {
                    $('.ediscount_value').addClass('hidden');
                }
                $('.ediscount_value').text(data.errors.discount_value);
                if (typeof data.errors.valid_until === 'undefined') {
                    $('.evalid_until').addClass('hidden');
                }
                $('.evalid_until').text(data.errors.valid_until);
                if (typeof data.errors.product_url === 'undefined') {
                    $('.eproduct_url').addClass('hidden');
                }
                $('.eproduct_url').text(data.errors.product_url);
                if (typeof data.errors.specification === 'undefined') {
                    $('.especification').addClass('hidden');
                }
                $('.especification').text(data.errors.specification);
                if (typeof data.errors.category_id === 'undefined') {
                    $('.ecategory_id').addClass('hidden');
                }
                $('.ecategory_id').text(data.errors.category_id);
                if (typeof data.errors.brand_id === 'undefined') {
                    $('.ebrand_id').addClass('hidden');
                }
                $('.ebrand_id').text(data.errors.brand_id);
                if (typeof data.errors.country_id === 'undefined') {
                    $('.ecountry_id').addClass('hidden');
                }
                $('.ecountry_id').text(data.errors.country_id);
                if (typeof data.errors.image_update === 'undefined') {
                    $('.image_update').addClass('hidden');
                }
                $('.image_update').text(data.errors.image_update);
            } else {
                $('.error').addClass('hidden');

                // Check product approval
                if (data.product.is_approved) {
                    var is_approved = 'Yes';
                }else {
                    var is_approved = 'No';
                }

                $('#product' + data.product.id).replaceWith("<tr id='product" + data.product.id + "'>"+
                    "<td>" + data.product.productName + "</td>"+
                    "<td><img src='storage/images/product/" + data.image.image + "' height='100px' width='100px'></td>"+
                    "<td>" + data.product.sku + "</td>"+
                    "<td>" + $('#category_id >option:selected').text() + "</td>"+
                    "<td>" + $('#brand_id >option:selected').text() + "</td>"+
                    "<td>৳ " + data.product.regularPrice + "</td>"+
                    "<td>৳ " + data.product.salePrice + "</td>"+
                    "<td> " + is_approved + "</td>"+
                    "<td><a class='show-product btn btn-info btn-sm' data-id='" + data.product.id + "'><span class='fa fa-eye'></span></a><a class='edit-product btn btn-warning btn-sm' data-id='" + data.product.id + "'><span class='fa fa-edit'></span></a> <a class='delete-product btn btn-danger btn-sm' data-id='" + data.product.id + "'><span class='fa fa-trash'></span></a></td>"+
                    "</tr>"
                );

                // Show success message
                $('#message').modal('show');
                $('.modal-title').text('Success!');
                $('.error_message').text('Product updated successfully!');

                // Auto hide message after 3 seconds
                setTimeout(function() {
                    $('#message').modal('hide');
                }, 3000);
            }
        }
    });
});


// form Delete function
$(document).on('click', '.delete-product', function(e) {
    // Stop browser form default behaviour
    e.preventDefault();

    $('#footer_action_button').text(" Delete");
    $('#footer_action_button').removeClass('glyphicon-check');
    $('#footer_action_button').addClass('glyphicon-trash');
    $('.actionBtn').removeClass('btn-success');
    $('.actionBtn').addClass('btn-danger');
    $('.actionBtn').addClass('deleteProduct');
    $('.modal-title').text('Delete Product');
    $('.id').text($(this).data('id'));
    $('.deleteContent').show();
    $('#myModal').modal('show');
});

$('.modal-footer').on('click', '.deleteProduct', function(e){
    // Stop browser from default behaviour
    e.preventDefault();

    // Send ajax request
    $.ajax({
        type: 'POST',
        url: 'products/'+$('.id').text(),
        data: {
            '_token': $('input[name=_token]').val(),
            '_method': $('input[name=_method]').val(),
            'id': $('.id').text()
        },
        success: function(){
            $('#product' + $('.id').text()).remove();
        }
    });
});


// Show function
$(document).on('click', '.show-product', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    // Send ajax request
    $.ajax({
        type: 'GET',
        url: 'products/' + $(this).data('id'),
        data: {
            'id': $(this).data('id')
        },
        success: function(data){
            // Declare and initialize variables
            var colors, sizes, tags, availability, discount_type;
            colors = sizes = tags  = availability = discount_type = "";

            // Get color
            $.each(data.colors, function (index,value) {
                colors += value.color+", ";
            });

            // Get sizes
            $.each(data.sizes, function (index,value) {
                sizes += value.size+", ";
            });

            // Get tags
            $.each(data.tags, function (index,value) {
                tags += value.tag+", ";
            });

            // Get availability
            if (data.product.availability) {
                availability = 'Not available';
            }else {
                availability = 'Available';
            }

            // Check product approval
            if (data.product.is_approved) {
                var is_approved = 'Yes';
            }else {
                var is_approved = 'No';
            }

            // Get discount_type
            if (data.product.discount_type === 0) {
                discount_type = 'Best Deal';
            }else if(data.product.discount_type === 1) {
                discount_type = 'Hot Deal';
            }else if(data.product.discount_type === 2) {
                discount_type = 'Seasonal';
            }else if(data.product.discount_type === 3) {
                discount_type = 'Stock Clearance';
            }else if(data.product.discount_type === 4) {
                discount_type = 'Buy One Get One';
            }else {
                discount_type = 'EMI';
            }

            $('#show').modal('show');
            $('#i').val(data.product.id);
            $('#show_productName').val(data.product.productName);
            $('#show_category_id').val(data.product.category.categoryName);
            $('#img').attr('src', 'storage/images/product/' + data.image.image);
            $('#show_brand_id').val(data.product.brand.brandName);
            $('#show_discount_type').val(discount_type);
            $('#show_discount_value').val(data.product.discount_value);
            $('#show_valid_until').val(data.product.valid_until);
            $('#show_product_url').val(data.product.product_url);
            $('#show_sku').val(data.product.sku);
            $('#show_color').text(colors.slice(0, -2));
            $('#show_size').text(sizes.slice(0, -2));
            $('#show_tag').text(tags.slice(0, -2));
            $('#show_availability').val(availability);
            $('#show_country_id').val(data.product.country.name);
            $('#show_regularPrice').val(data.product.regularPrice);
            $('#show_salePrice').val(data.product.salePrice);
            $('#show_is_approved').val(is_approved);
            $('#show_short_description').html(data.product.shortDescription);
            $('#show_description').html(data.product.description);
            $('#show_specification').html(data.product.specification);
            $('.modal-title').text('Show Product');
        }
    });
});





/*-------------------------------------------
09. Message CRUD
--------------------------------------------- */

// form send message
$(document).on('click', '.email-message', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $('.modal-title').text('Quick Email');
    $('#to').val($(this).data('to'));
    $('#subject').val($(this).data('subject'));
    $('#create').modal('show');
});

// form Delete function
$(document).on('click', '.delete-message', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $('#footer_action_button').text(" Delete");
    $('#footer_action_button').removeClass('glyphicon-check');
    $('#footer_action_button').addClass('glyphicon-trash');
    $('.actionBtn').removeClass('btn-success');
    $('.actionBtn').addClass('btn-danger');
    $('.actionBtn').addClass('deleteMessage');
    $('.modal-title').text('Delete Message');
    $('.id').text($(this).data('id'));
    $('.deleteContent').show();
    $('.form-horizontal').hide();
    $('#myModal').modal('show');
});

$('.modal-footer').on('click', '.deleteMessage', function(e){
    // Stop browser from default behaviour
    e.preventDefault();

    $.ajax({
        type: 'POST',
        url: base_url + '/messages/' + $('.id').text(),
        data: {
            '_token': $('input[name=_token]').val(),
            '_method': $('input[name=_method]').val(),
            'id': $('.id').text()
        },
        success: function(){
            $(location).attr("href", base_url + '/messages');
        }
    });
});

// Bulk message form Delete function
$(document).on('click', '.delete-BulkMail', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $('.actionBtn').show();
    $('#footer_action_button').text(" Delete");
    $('#footer_action_button').addClass('glyphicon-trash');
    $('.actionBtn').addClass('btn-danger');
    $('.actionBtn').addClass('deleteBulkMail');
    $('.id').text($('input:checkbox:checked:first').val());
    $('.modal-title').text('Delete Mail');
    $('.deleteContent').show();
    $('#myModal').modal('show');
});

$('.modal-footer').on('click', '.deleteBulkMail', function(e){
    // Stop browser from default behaviour
    e.preventDefault();

    var searchIDs = $("input:checkbox:checked").map(function(){
        return $(this).val();
    }).get();

    $.ajax({
        type: 'POST',
        url: base_url + '/messages/' + $('.id').text(),
        data: {
            '_method': $('input[name=_method]').val(),
            'id': searchIDs
        },
        success: function(){
            $(location).attr("href", base_url + "/messages");
        }
    });
});






/*-------------------------------------------
  10. Partner CRUD
--------------------------------------------- */


// -- ajax Form Add Partner--
$(document).on('click','.addPartner', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $('#create').modal('show');
    $('.form-horizontal').show();
    $('.modal-title').text('Add Partner');
});
$("#partner-form").submit(function(event) {
    event.preventDefault();
    $.ajax({
        type: 'POST',
        url: 'partners',
        data: new FormData( this ),
        cache: false,
        contentType: false,
        processData: false,
        success: function(data){
            if ((data.errors)) {
                $('.error').removeClass('hidden');
                if (typeof data.errors.companyUrl === 'undefined') {
                    $('.companyUrl').addClass('hidden');
                }
                $('.companyUrl').text(data.errors.companyUrl);
                if (typeof data.errors.brandLogo === 'undefined') {
                    $('.phone1').addClass('hidden');
                }
                $('.brandLogo').text(data.errors.brandLogo);
            } else {
                $('.error').addClass('hidden');
                $('#example1').append("<tr id='partner" + data.id + "'>"+
                    "<td>" + data.companyUrl + "</td>"+
                    "<td><img src='storage/images/brands/" + data.brandLogo + "'></td>"+
                    "<td><a class='edit-partner btn btn-warning btn-sm' data-id='" + data.id + "' data-companyUrl='" + data.companyUrl + "' data-brandLogo='" + data.brandLogo + "'><span class='fa fa-edit'></span></a> <a class='delete-partner btn btn-danger btn-sm' data-id='" + data.id + "'><span class='fa fa-trash'></span></a></td>"+
                    "</tr>");
            }
        },
    });
    $('#partner-form input').val('');
});


// function Edit Partner
$(document).on('click', '.edit-partner', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $('.actionBtn').hide();
    $('.modal-title').text('Partner Edit');
    $('.deleteContent').hide();
    $('.form-horizontal').show();
    $('#fid').val($(this).data('id'));
    $('#ecompanyUrl').val($(this).data('companyurl'));
    $('#myModal').modal('show');
});

$('#updatePartner').submit(function(event) {
    event.preventDefault();
    var formData = new FormData(this);
    formData.append('_method', 'PUT');
    $.ajax({
        type: 'POST',
        url: 'partners/' + $('#fid').val(),
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function(data) {
            $('#partner' + data.id).replaceWith(" "+
                "<tr id='partner" + data.id + "'>"+
                "<td>" + data.companyUrl + "</td>"+
                "<td><img src='storage/images/brands/" + data.brandLogo + "'></td>"+
                "<td><a class='edit-partner btn btn-warning btn-sm' data-id='" + data.id + "' data-companyUrl='" + data.companyUrl + "' data-brandLogo='" + data.brandLogo + "'><span class='fa fa-edit'></span></a> <a class='delete-partner btn btn-danger btn-sm' data-id='" + data.id + "'><span class='fa fa-trash'></span></a></td>"+
                "</tr>");
        }
    });
});


// form Delete function
$(document).on('click', '.delete-partner', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $('.actionBtn').show();
    $('#footer_action_button').text(" Delete");
    $('#footer_action_button').removeClass('glyphicon-check');
    $('#footer_action_button').addClass('glyphicon-trash');
    $('.actionBtn').removeClass('btn-success');
    $('.actionBtn').addClass('btn-danger');
    $('.actionBtn').addClass('deletePartner');
    $('.modal-title').text('Delete Partner');
    $('.id').text($(this).data('id'));
    $('.deleteContent').show();
    $('.form-horizontal').hide();
    $('#myModal').modal('show');
});

$('.modal-footer').on('click', '.deletePartner', function(e){
    // Stop browser from default behaviour
    e.preventDefault();

    $.ajax({
        type: 'POST',
        url: 'partners/'+$('.id').text(),
        data: {
            '_token': $('input[name=_token]').val(),
            '_method': $('input[name=_method]').val(),
            'id': $('.id').text()
        },
        success: function(data){
            $('#partner' + $('.id').text()).remove();
        }
    });
});






/*-------------------------------------------
  11. Country CRUD
--------------------------------------------- */


// -- ajax Form Add Country--
$(document).on('click','.addCountry', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $('#create').modal('show');
    $('.form-horizontal').show();
    $('.modal-title').text('Add Country');
});
$("#addCountry").submit(function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $.ajax({
        type: 'POST',
        url: 'countries',
        data: new FormData(this),
        cache: false,
        contentType: false,
        processData: false,
        success: function(data){
            if ((data.errors)) {
                $('.error').removeClass('hidden');
                if (typeof data.errors.name === 'undefined') {
                    $('.name').addClass('hidden');
                }
                $('.name').text(data.errors.name);
                if (typeof data.errors.flag === 'undefined') {
                    $('.flag').addClass('hidden');
                }
                $('.flag').text(data.errors.flag);
            } else {
                $('.error').addClass('hidden');
                $('#example1').prepend("<tr id='country" + data.id + "'>"+
                    "<td>" + data.name + "</td>"+
                    "<td>" + "<img src='storage/images/country/flag/" + data.flag + "' height='100px' width='100px'>" + "</td>"+
                    "<td><a class='edit-country btn btn-warning btn-sm' data-id='" + data.id + "' data-country='" + data.name + "'><span class='fa fa-edit'></span></a> <a class='delete-country btn btn-danger btn-sm' data-id='" + data.id + "'><span class='fa fa-trash'></span></a></td>"+
                    "</tr>");
                $('#addCountry').trigger('reset');
            }
        },
    });
});


// function Edit Country
$(document).on('click', '.edit-country', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $('.modal-title').text('Country Edit');
    $('#fid').val($(this).data('id'));
    $('#name').val($(this).data('country'));
    $('#update').modal('show');
});

$('#editCountry').on('submit', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $.ajax({
        type: 'POST',
        url: 'countries/' + $('#fid').val(),
        data: new FormData(this),
        cache: false,
        contentType: false,
        processData: false,
        success: function(data) {
            if ((data.errors)) {
                $('.error').removeClass('hidden');
                if (typeof data.errors.name === 'undefined') {
                    $('.ename').addClass('hidden');
                }
                $('.ename').text(data.errors.name);
                if (typeof data.errors.flag === 'undefined') {
                    $('.eflag').addClass('hidden');
                }
                $('.eflag').text(data.errors.flag);
            } else {
                $('.error').addClass('hidden');
                $('#country' + data.id).replaceWith("<tr id='country" + data.id + "'>"+
                    "<td>" + data.name + "</td>"+
                    "<td>" + "<img src='storage/images/country/flag/" + data.flag + "' height='100px' width='100px'>" + "</td>"+
                    "<td><a class='edit-country btn btn-warning btn-sm' data-id='" + data.id + "' data-country='" + data.name + "'><span class='fa fa-edit'></span></a> <a class='delete-country btn btn-danger btn-sm' data-id='" + data.id + "'><span class='fa fa-trash'></span></a></td>"+
                    "</tr>");
            }
        }
    });
});


// form Delete function
$(document).on('click', '.delete-country', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $('#footer_action_button').text(" Delete");
    $('#footer_action_button').addClass('glyphicon-trash');
    $('.actionBtn').addClass('btn-danger');
    $('.actionBtn').addClass('deleteCountry');
    $('.modal-title').text('Delete Country');
    $('.id').text($(this).data('id'));
    $('#myModal').modal('show');
});

$('.modal-footer').on('click', '.deleteCountry', function(e){
    // Stop browser from default behaviour
    e.preventDefault();

    $.ajax({
        type: 'POST',
        url: 'countries/'+$('.id').text(),
        data: {
            '_method': 'DELETE',
            'id': $('.id').text()
        },
        success: function(){
            $('#country' + $('.id').text()).remove();
        }
    });
});






/*-------------------------------------------
  12. Brand CRUD
--------------------------------------------- */


// -- ajax Form Add Brand--
$(document).on('click','.addBrand', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $('#create').modal('show');
    $('.form-horizontal').show();
    $('.modal-title').text('Add Brand');
});
$("#addBrand").submit(function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $.ajax({
        type: 'POST',
        url: 'brands',
        data: new FormData(this),
        cache: false,
        contentType: false,
        processData: false,
        success: function(data){
            if ((data.errors)) {
                $('.error').removeClass('hidden');
                if (typeof data.errors.brandName === 'undefined') {
                    $('.brandName').addClass('hidden');
                }
                $('.brandName').text(data.errors.brandName);
                if (typeof data.errors.brandLogo === 'undefined') {
                    $('.brandLogo').addClass('hidden');
                }
                $('.brandLogo').text(data.errors.brandLogo);
            } else {
                $('.error').addClass('hidden');
                $('#example1').append("<tr id='brand" + data.id + "'>"+
                    "<td>" + data.brandName + "</td>"+
                    "<td><img src='storage/images/brands/" + data.brandLogo + "' height='100px' width='100px'></td>"+
                    "<td><a class='edit-brand btn btn-warning btn-sm' data-id='" + data.id + "' data-brandName='" + data.brandName + "'><span class='fa fa-edit'></span></a> <a class='delete-brand btn btn-danger btn-sm' data-id='" + data.id + "'><span class='fa fa-trash'></span></a></td>"+
                    "</tr>");
                $('#addBrand').trigger('reset');
            }
        },
    });
});


// function Edit Brand
$(document).on('click', '.edit-brand', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $('#footer_action_button').text(" Update Brand");
    $('#footer_action_button').addClass('glyphicon-check');
    $('#footer_action_button').removeClass('glyphicon-trash');
    $('.actionBtn').addClass('btn-success');
    $('.actionBtn').removeClass('btn-danger');
    $('.actionBtn').removeClass('deleteBrand');
    $('.actionBtn').addClass('editBrand');
    $('.modal-title').text('Brand Edit');
    $('.deleteContent').hide();
    $('.form-horizontal').show();
    $('#fid').val($(this).data('id'));
    $('#brandName').val($(this).data('brandname'));
    $('#myModal').modal('show');
});

$('#updateBrand').on('submit', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $.ajax({
        type: 'POST',
        url: 'brands/' + $('#fid').val(),
        data: new FormData(this),
        cache: false,
        contentType: false,
        processData: false,
        success: function(data) {
            if ((data.errors)) {
                $('.error').removeClass('hidden');
                if (typeof data.errors.brandName === 'undefined') {
                    $('.ebrandName').addClass('hidden');
                }
                $('.ebrandName').text(data.errors.brandName);
                if (typeof data.errors.brandLogo === 'undefined') {
                    $('.ebrandLogo').addClass('hidden');
                }
                $('.ebrandLogo').text(data.errors.brandLogo);
            } else {
                $('.error').addClass('hidden');
                $('#brand' + data.id).replaceWith(" "+
                    "<tr id='brand" + data.id + "'>"+
                    "<td>" + data.brandName + "</td>"+
                    "<td><img src='storage/images/brands/" + data.brandLogo + "' height='100px' width='100px'></td>"+
                    "<td><a class='edit-brand btn btn-warning btn-sm' data-id='" + data.id + "' data-brandName='" + data.brandName + "'><span class='fa fa-edit'></span></a> <a class='delete-brand btn btn-danger btn-sm' data-id='" + data.id + "'><span class='fa fa-trash'></span></a></td>"+
                    "</tr>");
            }
        }
    });
});


// form Delete function
$(document).on('click', '.delete-brand', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $('#footer_action_button').text(" Delete");
    $('#footer_action_button').removeClass('glyphicon-check');
    $('#footer_action_button').addClass('glyphicon-trash');
    $('.actionBtn').removeClass('btn-success');
    $('.actionBtn').addClass('btn-danger');
    $('.actionBtn').addClass('deleteBrand');
    $('.modal-title').text('Delete Brand');
    $('.id').text($(this).data('id'));
    $('.deleteContent').show();
    $('.form-horizontal').hide();
    $('#delete').modal('show');
});

$('.modal-footer').on('click', '.deleteBrand', function(e){
    // Stop browser from default behaviour
    e.preventDefault();

    $.ajax({
        type: 'POST',
        url: 'brands/'+$('.id').text(),
        data: {
            '_token': $('input[name=_token]').val(),
            '_method': 'DELETE',
            'id': $('.id').text()
        },
        success: function(data){
            $('#brand' + $('.id').text()).remove();
        }
    });
});






/*-------------------------------------------
  13. Image CRUD
--------------------------------------------- */


// form Delete function
$(document).on('click', '.delete-image', function(e) {
    // Stop browser form default behaviour
    e.preventDefault();

    $('#footer_action_button').text(" Delete");
    $('#footer_action_button').removeClass('glyphicon-check');
    $('#footer_action_button').addClass('glyphicon-trash');
    $('.actionBtn').removeClass('btn-success');
    $('.actionBtn').addClass('btn-danger');
    $('.actionBtn').addClass('deleteImage');
    $('.modal-title').text('Delete Image');
    $('.id').text($(this).data('id'));
    $('.deleteContent').show();
    $('#myModal').modal('show');
});

$('.modal-footer').on('click', '.deleteImage', function(e){
    // Stop browser from default behaviour
    e.preventDefault();

    // Send ajax request
    $.ajax({
        type: 'POST',
        url: 'images/'+$('.id').text(),
        data: {
            '_method': 'DELETE',
            'id': $('.id').text()
        },
        success: function(){
            // Remove from HTML DOM
            $('#edit_image' + $('.id').text()).remove();

            // Show success message
            $('#message').modal('show');
            $('.modal-title').text('Success!');
            $('.alert').text('Image deleted successfully!');

            // Auto hide message after 3 seconds
            setTimeout(function() {
                $('#message').modal('hide');
            }, 3000);
        }
    });
});






/*-------------------------------------------
  14. Client CRUD
--------------------------------------------- */

// form Delete function
$(document).on('click', '.delete-client', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $('#footer_action_button').text(" Delete");
    $('.actionBtn').addClass('btn-danger');
    $('.actionBtn').addClass('deleteClient');
    $('.modal-title').text('Delete Client');
    $('.id').text($(this).data('id'));
    $('.deleteContent').show();
    $('#myModal').modal('show');
});

$('.modal-footer').on('click', '.deleteClient', function(e){
    // Stop browser from default behaviour
    e.preventDefault();

    $.ajax({
        type: 'POST',
        url: 'clients/'+$('.id').text(),
        data: {
            '_method': $('input[name=_method]').val(),
            'id': $('.id').text()
        },
        success: function(){
            $('#client' + $('.id').text()).remove();
        }
    });
});





/*-------------------------------------------
  15. Coupon CRUD
--------------------------------------------- */


// -- ajax Form Add Coupon--
$(document).on('click','.addCoupon', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $('#create').modal('show');
    $('.form-horizontal').show();
    $('.modal-title').text('Add Coupon');
});
$("#addCoupon").click(function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    // Get the form
    var  form = $('#discount-form');

    // Serialize the form data.
    var formData = $(form).serialize();

    // Submit the form using AJAX.
    $.ajax({
        type: 'POST',
        url: $(form).attr('action'),
        data: formData,
        success: function(data){
            if ((data.errors)) {
                $('.error').removeClass('hidden');
                if (typeof data.errors.coupon_code === 'undefined') {
                    $('.coupon_code').addClass('hidden');
                }
                $('.coupon_code').text(data.errors.coupon_code);
                if (typeof data.errors.discount_value === 'undefined') {
                    $('.discount_value').addClass('hidden');
                }
                $('.discount_value').text(data.errors.discount_value);
                if (typeof data.errors.valid_from === 'undefined') {
                    $('.valid_from').addClass('hidden');
                }
                $('.valid_from').text(data.errors.valid_from);
                if (typeof data.errors.valid_until === 'undefined') {
                    $('.valid_until').addClass('hidden');
                }
                $('.valid_until').text(data.errors.valid_until);
            } else {
                $('.error').addClass('hidden');
                $('#example1').append("<tr id='discount" + data.id + "'>"+
                    "<td>" + data.coupon_code + "</td>"+
                    "<td>" + $('#discount_unit >option:selected').text() + "</td>"+
                    "<td>" + data.discount_value + "</td>"+
                    "<td>" + data.product_id + "</td>"+
                    "<td>" + data.limit_per_coupon + "</td>"+
                    "<td>" + data.valid_until + "</td>"+
                    "<td><a class='show-discount btn btn-info btn-sm' data-id='" + data.id + "' data-product_id='" + data.product_id + "' data-exclude_product_id='" + data.exclude_product_id + "' data-category_id='" + data.category_id + "' data-exclude_category_id='" + data.exclude_category_id + "' data-limit_per_coupon='" + data.limit_per_coupon + "' data-limit_per_client='" + data.limit_per_client + "' data-discount_value='" + data.discount_value + "' data-discount_unit='" + data.discount_unit + "' data-valid_from='" + data.valid_from + "' data-valid_until='" + data.valid_until + "' data-coupon_code='" + data.coupon_code + "' data-minimum_order_value='" + data.minimum_order_value + "' data-maximum_order_value='" + data.maximum_order_value + "' data-is_free_shipping_active='" + data.limit_per_client + "' data-discount_value='" + data.discount_value + "' data-discount_unit='" + data.is_free_shipping_active + "' data-maximum_discount_amount='" + data.maximum_discount_amount + "' data-is_redeem_allowed='" + data.is_redeem_allowed + "'><span class='fa fa-eye'></span></a> <a class='edit-discount btn btn-warning btn-sm' data-id='" + data.id + "' data-product_id='" + data.product_id + "' data-exclude_product_id='" + data.exclude_product_id + "' data-category_id='" + data.category_id + "' data-exclude_category_id='" + data.exclude_category_id + "' data-limit_per_coupon='" + data.limit_per_coupon + "' data-limit_per_client='" + data.limit_per_client + "' data-discount_value='" + data.discount_value + "' data-discount_unit='" + data.discount_unit + "' data-valid_from='" + data.valid_from + "' data-valid_until='" + data.valid_until + "' data-coupon_code='" + data.coupon_code + "' data-minimum_order_value='" + data.minimum_order_value + "' data-maximum_order_value='" + data.maximum_order_value + "' data-is_free_shipping_active='" + data.limit_per_client + "' data-discount_value='" + data.discount_value + "' data-discount_unit='" + data.is_free_shipping_active + "' data-maximum_discount_amount='" + data.maximum_discount_amount + "' data-is_redeem_allowed='" + data.is_redeem_allowed + "'><span class='fa fa-edit'></span></a> <a class='delete-discount btn btn-danger btn-sm' data-id='" + data.id + "'><span class='fa fa-trash'></span></a></td>"+
                    "</tr>");
                $(form).trigger("reset");
            }
        }
    });
});


// Show function
$(document).on('click', '.show-discount', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    // Set redeem allowed text value
    if ($(this).data('is_redeem_allowed') == 0)
        var is_redeem_allowed = 'Yes';
    else
        var is_redeem_allowed = 'No';

    // Set discount_unit text value
    if ($(this).data('discount_unit') == 0)
        var discount_unit = 'Percentage discount';
    else  if ($(this).data('discount_unit') == 1)
        var discount_unit = 'Fixed cart discount';
    else
        var discount_unit = 'Fixed product discount';

    // Set is_free_shipping_activetext value
    if ($(this).data('is_free_shipping_active') == 0)
        var is_free_shipping_active = 'Yes';
    else
        var is_free_shipping_active = 'No';

    // Show modal & set values
    $('#show').modal('show');
    $('#cp_code').text($(this).data('coupon_code'));
    $('#is_ra').text(is_redeem_allowed);
    $('#ds_unit').text(discount_unit);
    $('#ds_value').text($(this).data('discount_value'));
    $('#vl_form').text($(this).data('valid_from'));
    $('#vl_untill').text($(this).data('valid_until'));
    $('#mn_or_val').text($(this).data('minimum_order_value'));
    $('#mx_or_val').text($(this).data('maximum_order_value'));
    $('#mx_ds_am').text($(this).data('maximum_discount_amount'));
    $('#is_f_s_a').text(is_free_shipping_active);
    $('#pr_id').text($(this).data('product_id'));
    $('#ex_pr_id').text($(this).data('exclude_product_id'));
    $('#ct_id').text($(this).data('category_id'));
    $('#ex_ct_id').text($(this).data('exclude_category_id'));
    $('#lm_per_cp').text($(this).data('limit_per_coupon'));
    $('#lm_per_user').text($(this).data('limit_per_client'));
    $('.modal-title').text('Show Coupon');
});


// function Edit Coupon
$(document).on('click', '.edit-discount', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $('#footer_action_button').text(" Update Discount");
    $('#footer_action_button').addClass('glyphicon-check');
    $('#footer_action_button').removeClass('glyphicon-trash');
    $('.actionBtn').addClass('btn-success');
    $('.actionBtn').removeClass('btn-danger');
    $('.actionBtn').removeClass('deleteDiscount');
    $('.actionBtn').addClass('editDiscount');
    $('.modal-title').text('Coupon Edit');
    $('.deleteContent').hide();
    $('.form-horizontal').show();

    // Assign values
    $('#fid').val($(this).data('id'));
    $('#ecoupon_code').val($(this).data('coupon_code'));
    $('#ediscount_value').val($(this).data('discount_value'));
    $('#eminimum_order_value').val($(this).data('minimum_order_value'));
    $('#emaximum_order_value').val($(this).data('maximum_order_value'));
    $('#emaximum_discount_amount').val($(this).data('maximum_discount_amount'));
    $('#elimit_per_coupon').val($(this).data('limit_per_coupon'));
    $('#elimit_per_client').val($(this).data('limit_per_client'));

    // Set valid_from date time
    var valid_from = $('#evalid_from');
    valid_from.datepicker('setDate', new Date($(this).data('valid_from')));

    // Set valid_until date time
    var valid_until = $('#evalid_until');
    valid_until.datepicker('setDate', new Date($(this).data('valid_until')));

    // Get the value
    var is_redeem_allowed = $(this).data('is_redeem_allowed');

    // Loop over each select option
    $("#eis_redeem_allowed > option").each(function(){
        // Check for the matching field
        if ($(this).val() == is_redeem_allowed){
            // Select the matched option
            $(this).prop("selected", true);
        }
    });

    // Get the value
    var discount_unit = $(this).data('discount_unit');

    // Loop over each select option
    $("#ediscount_value > option").each(function(){
        // Check for the matching field
        if ($(this).val() == discount_unit){
            // Select the matched option
            $(this).prop("selected", true);
        }
    });

    // Get the value
    var is_free_shipping_active = $(this).data('is_free_shipping_active');

    // Loop over each select option
    $("#eis_free_shipping_active > option").each(function(){
        // Check for the matching field
        if ($(this).val() == is_free_shipping_active){
            // Select the matched option
            $(this).prop("selected", true);
        }
    });

    // Get the value
    var product_id = $(this).data('product_id');

    // Loop over each select option
    $("#eproduct_id > option").each(function(){
        // Check for the matching field
        if ($(this).val() == product_id){
            // Select the matched option
            $(this).prop("selected", true);
        }
    });

    // Get the value
    var exclude_product_id = $(this).data('exclude_product_id');

    // Loop over each select option
    $("#eexclude_product_id > option").each(function(){
        // Check for the matching field
        if ($(this).val() == exclude_product_id){
            // Select the matched option
            $(this).prop("selected", true);
        }
    });

    // Get the value
    var category_id = $(this).data('category_id');

    // Loop over each select option
    $("#ecategory_id > option").each(function(){
        // Check for the matching field
        if ($(this).val() == category_id){
            // Select the matched option
            $(this).prop("selected", true);
        }
    });

    // Get the value
    var exclude_category_id = $(this).data('exclude_category_id');

    // Loop over each select option
    $("#eexclude_category_id > option").each(function(){
        // Check for the matching field
        if ($(this).val() == exclude_category_id){
            // Select the matched option
            $(this).prop("selected", true);
        }
    });

    $('#myModal').modal('show');
});

$('.modal-footer').on('click', '.editDiscount', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    // Get the form
    var  form = $('#discountEdit-form');

    // Serialize the form data.
    var formData = $(form).serialize();

    // Submit the form using AJAX.
    $.ajax({
        type: 'POST',
        url: $(form).attr('action') + '/' + $('#fid').val(),
        data: formData,
        success: function(data) {
            $('#discount' + data.id).replaceWith(" "+
                "<tr id='discount" + data.id + "'>"+
                "<td>" + data.coupon_code + "</td>"+
                "<td>" + $('#discount_unit >option:selected').text() + "</td>"+
                "<td>" + data.discount_value + "</td>"+
                "<td>" + data.product_id + "</td>"+
                "<td>" + data.limit_per_coupon + "</td>"+
                "<td>" + data.valid_until + "</td>"+
                "<td><a class='show-discount btn btn-info btn-sm' data-id='" + data.id + "' data-product_id='" + data.product_id + "' data-exclude_product_id='" + data.exclude_product_id + "' data-category_id='" + data.category_id + "' data-exclude_category_id='" + data.exclude_category_id + "' data-limit_per_coupon='" + data.limit_per_coupon + "' data-limit_per_client='" + data.limit_per_client + "' data-discount_value='" + data.discount_value + "' data-discount_unit='" + data.discount_unit + "' data-valid_from='" + data.valid_from + "' data-valid_until='" + data.valid_until + "' data-coupon_code='" + data.coupon_code + "' data-minimum_order_value='" + data.minimum_order_value + "' data-maximum_order_value='" + data.maximum_order_value + "' data-is_free_shipping_active='" + data.limit_per_client + "' data-discount_value='" + data.discount_value + "' data-discount_unit='" + data.is_free_shipping_active + "' data-maximum_discount_amount='" + data.maximum_discount_amount + "' data-is_redeem_allowed='" + data.is_redeem_allowed + "'><span class='fa fa-eye'></span></a> <a class='edit-discount btn btn-warning btn-sm' data-id='" + data.id + "' data-product_id='" + data.product_id + "' data-exclude_product_id='" + data.exclude_product_id + "' data-category_id='" + data.category_id + "' data-exclude_category_id='" + data.exclude_category_id + "' data-limit_per_coupon='" + data.limit_per_coupon + "' data-limit_per_client='" + data.limit_per_client + "' data-discount_value='" + data.discount_value + "' data-discount_unit='" + data.discount_unit + "' data-valid_from='" + data.valid_from + "' data-valid_until='" + data.valid_until + "' data-coupon_code='" + data.coupon_code + "' data-minimum_order_value='" + data.minimum_order_value + "' data-maximum_order_value='" + data.maximum_order_value + "' data-is_free_shipping_active='" + data.limit_per_client + "' data-discount_value='" + data.discount_value + "' data-discount_unit='" + data.is_free_shipping_active + "' data-maximum_discount_amount='" + data.maximum_discount_amount + "' data-is_redeem_allowed='" + data.is_redeem_allowed + "'><span class='fa fa-edit'></span></a> <a class='delete-discount btn btn-danger btn-sm' data-id='" + data.id + "'><span class='fa fa-trash'></span></a></td>"+
                "</tr>");
        }
    });
});


// form Delete function
$(document).on('click', '.delete-discount', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $('#footer_action_button').text(" Delete");
    $('#footer_action_button').removeClass('glyphicon-check');
    $('#footer_action_button').addClass('glyphicon-trash');
    $('.actionBtn').removeClass('btn-success');
    $('.actionBtn').addClass('btn-danger');
    $('.actionBtn').addClass('deleteDiscount');
    $('.modal-title').text('Delete Discount');
    $('.id').text($(this).data('id'));
    $('.deleteContent').show();
    $('.form-horizontal').hide();
    $('#myModal').modal('show');
});

$('.modal-footer').on('click', '.deleteDiscount', function(e){
    // Stop browser from default behaviour
    e.preventDefault();

    $.ajax({
        type: 'POST',
        url: 'discounts/'+$('.id').text(),
        data: {
            '_method': $('input[name=_method1]').val(),
            'id': $('.id').text()
        },
        success: function(data){
            $('#discount' + $('.id').text()).remove();
        }
    });
});





/*-------------------------------------------
  16. Membership Type CRUD
--------------------------------------------- */


// -- ajax Form Add Membership--
$(document).on('click','.addMembership', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $('#create').modal('show');
    $('.form-horizontal').show();
    $('.modal-title').text('Add Membership');
});
$("#addMembership").click(function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    // Get the form
    var  form = $('#membershipAdd-form');

    // Serialize the form data.
    var formData = $(form).serialize();

    // Submit the form using AJAX.
    $.ajax({
        type: 'POST',
        url: $(form).attr('action'),
        data: formData,
        success: function(data){
            if ((data.errors)) {
                $('.error').removeClass('hidden');
                if (typeof data.errors.discount_value === 'undefined') {
                    $('.discount_value').addClass('hidden');
                }
                $('.discount_value').text(data.errors.discount_value);
                if (typeof data.errors.valid_until === 'undefined') {
                    $('.valid_until').addClass('hidden');
                }
                $('.valid_until').text(data.errors.valid_until);
            } else {
                // membership_type
                if (data.membership_type == 0){
                    var  membership_type = 'Prime';
                }else if(data.membership_type == 1){
                    var  membership_type = 'Silver';
                }else if(data.membership_type == 2){
                    var  membership_type = 'Gold';
                }else if(data.membership_type == 3){
                    var  membership_type = 'Diamond';
                }else{
                    var  membership_type = 'Platinum';
                }
                // discount_unit
                if (data.discount_unit == 0){
                    var  discount_unit = 'Percentage discount';
                }else if(data.discount_unit == 1){
                    var  discount_unit = 'Fixed cart discount';
                }else{
                    var  discount_unit = 'Fixed product discount';
                }
                // discount_unit
                if (data.is_free_shipping_active == 0){
                    var  is_free_shipping_active = 'Yes';
                }else{
                    var  is_free_shipping_active = 'No';
                }
                $('.error').addClass('hidden');
                $('#example1').append("<tr id='membership" + data.id + "'>"+
                    "<td>" + membership_type + "</td>"+
                    "<td>" + discount_unit + "</td>"+
                    "<td>" + data.discount_value + "</td>"+
                    "<td>" + data.valid_until + "</td>"+
                    "<td>" + is_free_shipping_active + "</td>"+
                    "<td><a class='edit-membership btn btn-warning btn-sm' data-id='" + data.id + "' data-membership_type='" + data.membership_type + "' data-discount_unit='" + data.discount_unit + "' data-discount_value='" + data.discount_value + "'  data-is_free_shipping_active='" + data.is_free_shipping_active + "' data-valid_until='" + data.valid_until + "'><span class='fa fa-edit'></span></a> <a class='delete-membership btn btn-danger btn-sm' data-id='" + data.id + "'><span class='fa fa-trash'></span></a></td>"+
                    "</tr>");
            }
        }
    });
    $(form).trigger("reset");
});


// function Edit Membership
$(document).on('click', '.edit-membership', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $('#footer_action_button').text(" Update Membership");
    $('#footer_action_button').addClass('glyphicon-check');
    $('#footer_action_button').removeClass('glyphicon-trash');
    $('.actionBtn').addClass('btn-success');
    $('.actionBtn').removeClass('btn-danger');
    $('.actionBtn').removeClass('deleteMembership');
    $('.actionBtn').addClass('editMembership');
    $('.modal-title').text('Membership Edit');
    $('.deleteContent').hide();
    $('.form-horizontal').show();

    // Set valid_until date time
    var valid_until = $('#evalid_until');
    valid_until.datepicker('setDate', new Date($(this).data('valid_until')));

    // Get the value
    var membership_type = $(this).data('membership_type');

    // Loop over each select option
    $("#emembership_type > option").each(function(){
        // Check for the matching field
        if ($(this).val() == membership_type){
            // Select the matched option
            $(this).prop("selected", true);
        }
    });

    // Get the value
    var discount_unit = $(this).data('discount_unit');

    // Loop over each select option
    $("#ediscount_unit > option").each(function(){
        // Check for the matching field
        if ($(this).val() == discount_unit){
            // Select the matched option
            $(this).prop("selected", true);
        }
    });

    // Get the value
    var is_free_shipping_active = $(this).data('is_free_shipping_active');

    // Loop over each select option
    $("#eis_free_shipping_active > option").each(function(){
        // Check for the matching field
        if ($(this).val() == is_free_shipping_active){
            // Select the matched option
            $(this).prop("selected", true);
        }
    });

    $('#ediscount_value').val($(this).data('discount_value'));
    $('#fid').val($(this).data('id'));
    $('#myModal').modal('show');
});

$('.modal-footer').on('click', '.editMembership', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    // Get the form
    var  form = $('#membershipEdit-form');

    // Serialize the form data.
    var formData = $(form).serialize();

    // Submit the form using AJAX.
    $.ajax({
        type: 'POST',
        url: $(form).attr('action') + '/' + $('#fid').val() ,
        data: formData,
        success: function(data){
            if ((data.errors)) {
                $('.error').removeClass('hidden');
                if (typeof data.errors.discount_value === 'undefined') {
                    $('.discount_value').addClass('hidden');
                }
                $('.discount_value').text(data.errors.discount_value);
                if (typeof data.errors.valid_until === 'undefined') {
                    $('.valid_until').addClass('hidden');
                }
                $('.valid_until').text(data.errors.valid_until);
            } else {
                // membership_type
                if (data.membership_type == 0) {
                    var membership_type = 'Prime';
                } else if (data.membership_type == 1) {
                    var membership_type = 'Silver';
                } else if (data.membership_type == 2) {
                    var membership_type = 'Gold';
                } else if (data.membership_type == 3) {
                    var membership_type = 'Diamond';
                } else {
                    var membership_type = 'Platinum';
                }
                // discount_unit
                if (data.discount_unit == 0) {
                    var discount_unit = 'Percentage discount';
                } else if (data.discount_unit == 1) {
                    var discount_unit = 'Fixed cart discount';
                } else {
                    var discount_unit = 'Fixed product discount';
                }
                // discount_unit
                if (data.is_free_shipping_active == 0) {
                    var is_free_shipping_active = 'Yes';
                } else {
                    var is_free_shipping_active = 'No';
                }
                $('#membership' + data.id).replaceWith(" " +
                    "<tr id='membership" + data.id + "'>" +
                    "<td>" + membership_type + "</td>" +
                    "<td>" + discount_unit + "</td>" +
                    "<td>" + data.discount_value + "</td>" +
                    "<td>" + data.valid_until + "</td>" +
                    "<td>" + is_free_shipping_active + "</td>" +
                    "<td><a class='edit-membership btn btn-warning btn-sm' data-id='" + data.id + "' data-membership_type='" + data.membership_type + "' data-discount_unit='" + data.discount_unit + "' data-discount_value='" + data.discount_value + "'  data-is_free_shipping_active='" + data.is_free_shipping_active + "' data-valid_until='" + data.valid_until + "'><span class='fa fa-edit'></span></a> <a class='delete-membership btn btn-danger btn-sm' data-id='" + data.id + "'><span class='fa fa-trash'></span></a></td>" +
                    "</tr>");
            }
        }
    });
});


// form Delete function
$(document).on('click', '.delete-membership', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $('#footer_action_button').text(" Delete");
    $('#footer_action_button').removeClass('glyphicon-check');
    $('#footer_action_button').addClass('glyphicon-trash');
    $('.actionBtn').removeClass('btn-success');
    $('.actionBtn').addClass('btn-danger');
    $('.actionBtn').addClass('deleteMembership');
    $('.modal-title').text('Delete Membership');
    $('.id').text($(this).data('id'));
    $('.deleteContent').show();
    $('.form-horizontal').hide();
    $('#myModal').modal('show');
});

$('.modal-footer').on('click', '.deleteMembership', function(e){
    // Stop browser from default behaviour
    e.preventDefault();

    $.ajax({
        type: 'POST',
        url: 'membership_types/'+$('.id').text(),
        data: {
            '_method': $('input[name=_method1]').val(),
            'id': $('.id').text()
        },
        success: function(data){
            $('#membership' + $('.id').text()).remove();
        }
    });
});






/*-------------------------------------------
  17. Slider CRUD
--------------------------------------------- */


// -- ajax Form Add Slider--
$(document).on('click','.addSlider', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $('#create').modal('show');
    $('.form-horizontal').show();
    $('.modal-title').text('Add Slider');
});
$("#slider_add-form").submit(function(event) {
    event.preventDefault();
    $.ajax({
        type: 'POST',
        url: $(this).attr('action'),
        data: new FormData( this ),
        cache: false,
        contentType: false,
        processData: false,
        success: function(data){
            if ((data.errors)) {
                $('.error').removeClass('hidden');
                if (typeof data.errors.image === 'undefined') {
                    $('.image').addClass('hidden');
                }
                $('.image').text(data.errors.image);
            } else {
                $('.error').addClass('hidden');
                $('#example1').append("<tr id='slider" + data.id + "'>"+
                    "<td><img src='storage/images/slider/" + data.image + "' height='100px' width='100px'></td>"+
                    "<td>" + data.slider_link + "</td>"+
                    "<td><a class='edit-slider btn btn-warning btn-sm' data-id='" + data.id + "' data-image='" + data.image + "' data-slider_link='" + data.slider_link + "'><span class='fa fa-edit'></span></a> <a class='delete-slider btn btn-danger btn-sm' data-id='" + data.id + "'><span class='fa fa-trash'></span></a></td>"+
                    "</tr>");
            }
        }
    });
    $('#slider_add-form input').val('');
});


// function Edit Slider
$(document).on('click', '.edit-slider', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $('.actionBtn').hide();
    $('.modal-title').text('Slider Edit');
    $('.deleteContent').hide();
    $('.form-horizontal').show();
    $('#fid').val($(this).data('id'));
    $('#slider_link').val($(this).data('slider_link'));
    $('#myModal').modal('show');
});

$('#slider_update-form').submit(function(event) {
    event.preventDefault();
    var formData = new FormData(this);
    formData.append('_method', 'PUT');
    $.ajax({
        type: 'POST',
        url: $(this).attr('action') + '/' + $('#fid').val(),
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function(data) {
            if ((data.errors)) {
                $('.error').removeClass('hidden');
                if (typeof data.errors.image === 'undefined') {
                    $('.image').addClass('hidden');
                }
                $('.image').text(data.errors.image);
            } else {
                $('.error').addClass('hidden');
                $('#slider' + data.id).replaceWith("<tr id='slider" + data.id + "'>"+
                    "<td><img src='storage/images/slider/" + data.image + "' height='100px' width='100px'></td>"+
                    "<td>" + data.slider_link + "</td>"+
                    "<td><a class='edit-slider btn btn-warning btn-sm' data-id='" + data.id + "' data-image='" + data.image + "' data-slider_link='" + data.slider_link + "'><span class='fa fa-edit'></span></a> <a class='delete-slider btn btn-danger btn-sm' data-id='" + data.id + "'><span class='fa fa-trash'></span></a></td>"+
                    "</tr>");
            }
        }
    });
});


// form Delete function
$(document).on('click', '.delete-slider', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $('.actionBtn').show();
    $('#footer_action_button').text(" Delete");
    $('#footer_action_button').removeClass('glyphicon-check');
    $('#footer_action_button').addClass('glyphicon-trash');
    $('.actionBtn').removeClass('btn-success');
    $('.actionBtn').addClass('btn-danger');
    $('.actionBtn').addClass('deleteSlider');
    $('.modal-title').text('Delete Slider');
    $('.id').text($(this).data('id'));
    $('.deleteContent').show();
    $('.form-horizontal').hide();
    $('#myModal').modal('show');
});

$('.modal-footer').on('click', '.deleteSlider', function(e){
    // Stop browser from default behaviour
    e.preventDefault();

    $.ajax({
        type: 'POST',
        url: 'sliders/'+$('.id').text(),
        data: {
            '_method': $('input[name=_method]').val(),
            'id': $('.id').text()
        },
        success: function(data){
            $('#slider' + $('.id').text()).remove();
        }
    });
});






/*-------------------------------------------
  18. Mail CRUD
--------------------------------------------- */

//Handle send_mail form submit.
function sendMail(e) {
    // update CKEDITOR element
    for (instance in CKEDITOR.instances) {
        CKEDITOR.instances[instance].updateElement();
    }

    // Stop the browser from submitting the form.
    e.preventDefault();

    // Get the form
    var  form = $('#sendMail');

    // Serialize formData
    var  FormData = $(form).serialize();

    // Submit the form using AJAX.
    $.ajax({
        type: 'post',
        url: $(form).attr('action'),
        data: FormData,
        success: function(data){
            $('.error').addClass('hidden');
            if ((data.errors)) {
                $('.success').addClass('hidden');
                if (typeof data.errors.email !== 'undefined') {
                    $('.email').removeClass('hidden');
                    $('.email').text(data.errors.email);
                };
                if (typeof data.errors.subject !== 'undefined') {
                    $('.subject').removeClass('hidden');
                    $('.subject').text(data.errors.subject);
                };
                if (typeof data.errors.mailbody !== 'undefined') {
                    $('.mailbody').removeClass('hidden');
                    $('.mailbody').text(data.errors.mailbody);
                };
            } else {
                $('.success').removeClass('hidden').append('E-mail sent successfully.');
                $(form).trigger('reset');
                CKEDITOR.instances.editor1.setData( '' );
            }
        }
    });
}

// Handle draft form submit.
$(document).on('click', '#addDraft', function(e) {
    // update CKEDITOR element
    for (instance in CKEDITOR.instances) {
        CKEDITOR.instances[instance].updateElement();
    }

    // Stop the browser from submitting the form.
    e.preventDefault();

    // Get the form
    var  form = $('#sendMail');

    // Serialize formData
    var  FormData = $(form).serialize();

    // Submit the form using AJAX.
    $.ajax({
        type: 'post',
        url: base_url + '/drafts',
        data: FormData,
        success: function(data){
            $('.error').addClass('hidden');
            if ((data.errors)) {
                $('.success').addClass('hidden');
                alert(data.errors);
            } else {
                $('.success').removeClass('hidden').append('E-mail saved as draft successfully.');
                $(form).trigger('reset');
                CKEDITOR.instances.editor1.setData( '' );
            }
        }
    });
});

// Update draft.
$(document).on('click', '#updateDraft', function(e) {
    // update CKEDITOR element
    for (instance in CKEDITOR.instances) {
        CKEDITOR.instances[instance].updateElement();
    }

    // Stop the browser from submitting the form.
    e.preventDefault();

    // Get the form
    var  form = $('#sendMail');

    // Serialize formData
    var  FormData = $(form).serializeArray();
    FormData.push({ name: "_method", value: "PUT" });

    // Submit the form using AJAX.
    $.ajax({
        type: 'post',
        url: $(this).data('url'),
        data: FormData,
        success: function(data){
            $('.error').addClass('hidden');
            if ((data.errors)) {
                $('.success').addClass('hidden');
                alert(data.errors);
            } else {
                $('.success').removeClass('hidden').append('Draft updated successfully.');
            }
        }
    });
});

// sent form Delete function
$(document).on('click', '.delete-sentMail', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $('.actionBtn').show();
    $('#footer_action_button').text(" Delete");
    $('#footer_action_button').addClass('glyphicon-trash');
    $('.actionBtn').addClass('btn-danger');
    $('.actionBtn').addClass('deleteSentMail');
    $('.modal-title').text('Delete sentMail');
    $('.id').text($(this).data('id'));
    $('.deleteContent').show();
    $('#myModal').modal('show');
});

$('.modal-footer').on('click', '.deleteSentMail', function(e){
    // Stop browser from default behaviour
    e.preventDefault();

    $.ajax({
        type: 'POST',
        url: $(this).data('url'),
        data: {
            '_method': $('input[name=_method]').val(),
            'id': $('.id').text()
        },
        success: function(){
            $(location).attr("href", base_url + "/sents");
        }
    });
});

// Bulk sent form Delete function
$(document).on('click', '.delete-BulkSentMail', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $('.actionBtn').show();
    $('#footer_action_button').text(" Delete");
    $('#footer_action_button').addClass('glyphicon-trash');
    $('.actionBtn').addClass('btn-danger');
    $('.actionBtn').addClass('deleteBulkSentMail');
    $('.modal-title').text('Delete sentMail');
    $('.deleteContent').show();
    $('#myModal').modal('show');
});

$('.modal-footer').on('click', '.deleteBulkSentMail', function(e){
    // Stop browser from default behaviour
    e.preventDefault();

    var searchIDs = $("input:checkbox:checked").map(function(){
        return $(this).val();
    }).get();

    $.ajax({
        type: 'POST',
        url: $(this).data('url'),
        data: {
            '_method': $('input[name=_method]').val(),
            'id': searchIDs
        },
        success: function(){
            $(location).attr("href", base_url + "/sents");
        }
    });
});

// Bulk draft form Delete function
$(document).on('click', '.delete-bulkDrafts', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $('.actionBtn').show();
    $('#footer_action_button').text(" Delete");
    $('#footer_action_button').addClass('glyphicon-trash');
    $('.actionBtn').addClass('btn-danger');
    $('.actionBtn').addClass('deleteBulkDraftMail');
    $('.modal-title').text('Delete sentMail');
    $('.id').text($('input:checkbox:checked:first').val());
    $('.deleteContent').show();
    $('#myModal').modal('show');
});

$('.modal-footer').on('click', '.deleteBulkDraftMail', function(e){
    // Stop browser from default behaviour
    e.preventDefault();

    var searchIDs = $("input:checkbox:checked").map(function(){
        return $(this).val();
    }).get();

    $.ajax({
        type: 'POST',
        url: base_url + '/drafts/'  + $('.id').text(),
        data: {
            '_method': $('input[name=_method]').val(),
            'id': searchIDs
        },
        success: function(){
            $(location).attr("href", base_url + "/drafts");
        }
    });
});

// Toggle checkbox
$('.checkbox-toggle').click(function () {
    if($('input:checkbox').prop("checked")) {
        $('input:checkbox').prop('checked', false);
        $('.action').hide();
    }
    else {
        $('input:checkbox').prop('checked', true);
        $('.action').show();
    }
})

jQuery('.mailbox-messages input[type=checkbox]').on('change', function () {
    var len = jQuery('.mailbox-messages input[type=checkbox]:checked').length;
    if (len > 0) {
        $('.action').show();
    } else if (len === 0) {
        $('.action').hide();
    }
}).trigger('change');






/*-------------------------------------------
  19. Order CRUD
--------------------------------------------- */


// Show order
$(document).on('click', '.show-order', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $('#companyInfo').html($(this).data('company'));
    $('#billing').html($(this).data('billing'));
    $('#shipping').html($(this).data('shipping'));
    $('#ship').html($(this).data('ship'));
    $('#orderDetails').html($(this).data('orderdetails'));
    $('#payment').html($(this).data('paymentmethod'));
    $('#subtotal').html($(this).data('subtotal'));
    $('#tax').html($(this).data('tax'));
    $('#total').html($(this).data('total'));
    if ($(this).data('discount') != 0) {
        $('#discount').text('৳' + $(this).data('discount'));
        $('#discount_row').show();
    }else {
        $('#discount_row').hide();
    }
    $('#show').modal('show');
});


// function Edit Order
$(document).on('click', '.edit-order', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $('#footer_action_button').text(" Update Order");
    $('#footer_action_button').addClass('glyphicon-check');
    $('#footer_action_button').removeClass('glyphicon-trash');
    $('.actionBtn').addClass('btn-success');
    $('.actionBtn').removeClass('btn-danger');
    $('.actionBtn').removeClass('deleteOrder');
    $('.actionBtn').addClass('editOrder');
    $('.modal-title').text('Order Edit');
    $('.deleteContent').hide();
    $('.form-horizontal').show();
    $('#fid').val($(this).data('id'));
    var  status = $(this).data('status');
    $("#status > option").each(function(){
        if ($(this).val() == status){
            $(this).prop("selected", true);
        }
    });
    $('#myModal').modal('show');
});


// function Update Order

$('.modal-footer').on('click', '.editOrder', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    // Get the form.
    var form = $('#order-form');

    // Serialize the form data.
    var formData = $(form).serialize();

    // Submit the form using AJAX.
    $.ajax({
        type: 'POST',
        url: $(form).attr('action') + '/' + $('#fid').val(),
        data: formData,
        success: function(data) {
            if(data.status  == 0){
                var status = 'On hold';
            }
            else if(data.status  == 1){
                var status = 'Processing';
            }
            else if(data.status  == 2){
                var status = 'Pending payment';
            }
            else if(data.status == 3){
                var status = 'Completed';
            }
            else if(data.status  == 4){
                var status = 'Cancelled';
            }
            else if(data.status  == 5){
                var status = 'Refunded';
            }
            else{
                var status = 'Failed';
            }
            $('#sts'+data.id).text(status);
            $('.edit-order').replaceWith('<a href="#" class="edit-order btn btn-warning btn-sm" data-id="'+data.id+'" data-status="'+data.status+'"><i class="fa fa-edit"></i></a>');
        }
    });
});


// form Delete function
$(document).on('click', '.delete-order', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $('.actionBtn').show();
    $('#footer_action_button').text(" Delete");
    $('#footer_action_button').removeClass('glyphicon-check');
    $('#footer_action_button').addClass('glyphicon-trash');
    $('.actionBtn').removeClass('btn-success');
    $('.actionBtn').addClass('btn-danger');
    $('.actionBtn').addClass('deleteOrder');
    $('.modal-title').text('Delete order');
    $('.id').text($(this).data('id'));
    $('.deleteContent').show();
    $('.form-horizontal').hide();
    $('#myModal').modal('show');
});

$('.modal-footer').on('click', '.deleteOrder', function(e){
    // Stop browser from default behaviour
    e.preventDefault();

    $.ajax({
        type: 'POST',
        url: 'orders/'+$('.id').text(),
        data: {
            '_method': $('input[name=_method1]').val(),
            'id': $('.id').text()
        },
        success: function(data){
            $('#order' + $('.id').text()).remove();
        }
    });
});






/*-------------------------------------------
  20. Banner CRUD
--------------------------------------------- */


// -- ajax Form Add Banner--
$(document).on('click','.addBanner', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $('#create').modal('show');
    $('.form-horizontal').show();
    $('.modal-title').text('Add Banner');
});
$("#banner_add-form").submit(function(event) {
    event.preventDefault();
    $.ajax({
        type: 'POST',
        url: $(this).attr('action'),
        data: new FormData( this ),
        cache: false,
        contentType: false,
        processData: false,
        success: function(data){
            $('#example1').append("<tr id='banner" + data.id + "'>"+
                "<td><img src='storage/images/banner/" + data.banner_one + "' height='100px' width='100px'></td>"+
                "<td><img src='storage/images/banner/" + data.banner_two + "' height='100px' width='100px'></td>"+
                "<td><a href=\"#\" class=\"show-banner btn btn-info btn-sm\" data-id='" + data.id + "' data-banner_one='" + data.banner_one + "' data-banner_two='" + data.banner_two + "' data-banner_one_link='" + data.banner_one_link + "' data-banner_two_link='" + data.banner_two_link + "' data-banner_deal_page='" + data.banner_deal_page + "' data-banner_link_deal_page='" + data.banner_link_deal_page + "' data-banner_offer_page='" + data.banner_offer_page + "' data-banner_link_offer_page='" + data.banner_link_offer_page + "' data-banner_link_brand_page='" + data.banner_link_brand_page + "' data-banner_brand_page='" + data.banner_brand_page + "' data-banner_brand_single_page='" + data.banner_brand_single_page + "' data-banner_link_brand_single_page='" + data.banner_link_brand_single_page + "' data-banner_category_page='" + data.banner_category_page + "' data-banner_link_category_page='" + data.banner_link_category_page + "' data-banner_industry_page='" + data.banner_industry_page + "' data-banner_link_industry_page='" + data.banner_link_industry_page + "' data-banner_industry_single_page='" + data.banner_industry_single_page + "' data-banner_link_industry_single_page='" + data.banner_link_industry_single_page + "' data-banner_product_page='" + data.banner_product_page + "' data-banner_link_product_page='" + data.banner_link_product_page + "' data-banner_searched_product_page='" + data.banner_searched_product_page + "' data-banner_link_searched_product_page='" + data.banner_link_searched_product_page + "'>\n" +
                "<i class=\"fa fa-eye\"></i>\n" +
                "</a><a class='edit-banner btn btn-warning btn-sm' data-id='" + data.id + "' data-banner_one_link='" + data.banner_one_link + "' data-banner_two_link='" + data.banner_two_link + "' data-banner_link_deal_page='" + data.banner_link_deal_page + "' data-banner_link_offer_page='" + data.banner_link_offer_page + "' data-banner_link_brand_page='" + data.banner_link_brand_page + "' data-banner_link_brand_single_page='" + data.banner_link_brand_single_page + "' data-banner_link_category_page='" + data.banner_link_category_page + "' data-banner_link_industry_page='" + data.banner_link_industry_page + "' data-banner_link_industry_single_page='" + data.banner_link_industry_single_page + "' data-banner_link_product_page='" + data.banner_link_product_page + "' data-banner_link_searched_product_page='" + data.banner_link_searched_product_page + "'><span class='fa fa-edit'></span></a> <a class='delete-banner btn btn-danger btn-sm' data-id='" + data.id + "'><span class='fa fa-trash'></span></a></td>"+
                "</tr>");
        }
    });
    $('#banner_add-form input').val('');
});


// function Edit Banner
$(document).on('click', '.edit-banner', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $('.actionBtn').hide();
    $('.modal-title').text('Banner Edit');
    $('.deleteContent').hide();
    $('.form-horizontal').show();
    $('#fid').val($(this).data('id'));
    $('#banner_one_link').val($(this).data('banner_one_link'));
    $('#banner_two_link').val($(this).data('banner_two_link'));
    $('#banner_link_deal_page').val($(this).data('banner_link_deal_page'));
    $('#banner_link_offer_page').val($(this).data('banner_link_offer_page'));
    $('#banner_link_brand_page').val($(this).data('banner_link_brand_page'));
    $('#banner_link_brand_single_page').val($(this).data('banner_link_brand_single_page'));
    $('#banner_link_category_page').val($(this).data('banner_link_category_page'));
    $('#banner_link_industry_page').val($(this).data('banner_link_industry_page'));
    $('#banner_link_industry_single_page').val($(this).data('banner_link_industry_single_page'));
    $('#banner_link_product_page').val($(this).data('banner_link_product_page'));
    $('#banner_link_searched_product_page').val($(this).data('banner_link_searched_product_page'));
    $('#myModal').modal('show');
});

$('#banner_update-form').submit(function(event) {
    event.preventDefault();
    var formData = new FormData(this);
    formData.append('_method', 'PUT');
    $.ajax({
        type: 'POST',
        url: $(this).attr('action') + '/' + $('#fid').val(),
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function(data) {
            $('#banner' + data.id).replaceWith("<tr id='banner" + data.id + "'>"+
                "<td><img src='storage/images/banner/" + data.banner_one + "' height='100px' width='100px'></td>"+
                "<td><img src='storage/images/banner/" + data.banner_two + "' height='100px' width='100px'></td>"+
                "<td><a href=\"#\" class=\"show-banner btn btn-info btn-sm\" data-id='" + data.id + "' data-banner_one='" + data.banner_one + "' data-banner_two='" + data.banner_two + "' data-banner_one_link='" + data.banner_one_link + "' data-banner_two_link='" + data.banner_two_link + "' data-banner_deal_page='" + data.banner_deal_page + "' data-banner_link_deal_page='" + data.banner_link_deal_page + "' data-banner_offer_page='" + data.banner_offer_page + "' data-banner_link_offer_page='" + data.banner_link_offer_page + "' data-banner_link_brand_page='" + data.banner_link_brand_page + "' data-banner_brand_page='" + data.banner_brand_page + "' data-banner_brand_single_page='" + data.banner_brand_single_page + "' data-banner_link_brand_single_page='" + data.banner_link_brand_single_page + "' data-banner_category_page='" + data.banner_category_page + "' data-banner_link_category_page='" + data.banner_link_category_page + "' data-banner_industry_page='" + data.banner_industry_page + "' data-banner_link_industry_page='" + data.banner_link_industry_page + "' data-banner_industry_single_page='" + data.banner_industry_single_page + "' data-banner_link_industry_single_page='" + data.banner_link_industry_single_page + "' data-banner_product_page='" + data.banner_product_page + "' data-banner_link_product_page='" + data.banner_link_product_page + "' data-banner_searched_product_page='" + data.banner_searched_product_page + "' data-banner_link_searched_product_page='" + data.banner_link_searched_product_page + "'>\n" +
                "<i class=\"fa fa-eye\"></i>\n" +
                "</a><a class='edit-banner btn btn-warning btn-sm' data-id='" + data.id + "' data-banner_one_link='" + data.banner_one_link + "' data-banner_two_link='" + data.banner_two_link + "' data-banner_link_deal_page='" + data.banner_link_deal_page + "' data-banner_link_offer_page='" + data.banner_link_offer_page + "' data-banner_link_brand_page='" + data.banner_link_brand_page + "' data-banner_link_brand_single_page='" + data.banner_link_brand_single_page + "' data-banner_link_category_page='" + data.banner_link_category_page + "' data-banner_link_industry_page='" + data.banner_link_industry_page + "' data-banner_link_industry_single_page='" + data.banner_link_industry_single_page + "' data-banner_link_product_page='" + data.banner_link_product_page + "' data-banner_link_searched_product_page='" + data.banner_link_searched_product_page + "'><span class='fa fa-edit'></span></a> <a class='delete-banner btn btn-danger btn-sm' data-id='" + data.id + "'><span class='fa fa-trash'></span></a></td>"+
                "</tr>");
        }
    });
});


// form Delete function
$(document).on('click', '.delete-banner', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $('.actionBtn').show();
    $('#footer_action_button').text(" Delete");
    $('#footer_action_button').removeClass('glyphicon-check');
    $('#footer_action_button').addClass('glyphicon-trash');
    $('.actionBtn').removeClass('btn-success');
    $('.actionBtn').addClass('btn-danger');
    $('.actionBtn').addClass('deleteBanner');
    $('.modal-title').text('Delete Banner');
    $('.id').text($(this).data('id'));
    $('.deleteContent').show();
    $('.form-horizontal').hide();
    $('#myModal').modal('show');
});

$('.modal-footer').on('click', '.deleteBanner', function(e){
    // Stop browser from default behaviour
    e.preventDefault();

    $.ajax({
        type: 'POST',
        url: 'banners/'+$('.id').text(),
        data: {
            '_method': $('input[name=_method]').val(),
            'id': $('.id').text()
        },
        success: function(data){
            $('#banner' + $('.id').text()).remove();
        }
    });
});

// Show function
$(document).on('click', '.show-banner', function(e) {
    e.preventDefault();
    $('#banner_one').attr('src', 'storage/images/banner/' + $(this).data('banner_one'));
    $('#show_banner_one_link').val($(this).data('banner_one_link'));
    $('#banner_two').attr('src', 'storage/images/banner/' + $(this).data('banner_two'));
    $('#show_banner_two_link').val($(this).data('banner_two_link'));
    $('#banner_deal_page').attr('src', 'storage/images/banner/' + $(this).data('banner_deal_page'));
    $('#show_banner_link_deal_page').val($(this).data('banner_link_deal_page'));
    $('#banner_offer_page').attr('src', 'storage/images/banner/' + $(this).data('banner_offer_page'));
    $('#show_banner_link_offer_page').val($(this).data('banner_link_offer_page'));
    $('#banner_brand_page').attr('src', 'storage/images/banner/' + $(this).data('banner_brand_page'));
    $('#show_banner_link_brand_page').val($(this).data('banner_link_brand_page'));
    $('#banner_brand_single_page').attr('src', 'storage/images/banner/' + $(this).data('banner_brand_single_page'));
    $('#show_banner_link_brand_single_page').val($(this).data('banner_link_brand_single_page'));
    $('#banner_category_page').attr('src', 'storage/images/banner/' + $(this).data('banner_category_page'));
    $('#show_banner_link_category_page').val($(this).data('banner_link_category_page'));
    $('#banner_industry_page').attr('src', 'storage/images/banner/' + $(this).data('banner_industry_page'));
    $('#show_banner_link_industry_page').val($(this).data('banner_link_industry_page'));
    $('#banner_industry_single_page').attr('src', 'storage/images/banner/' + $(this).data('banner_industry_single_page'));
    $('#show_banner_link_industry_single_page').val($(this).data('banner_link_industry_single_page'));
    $('#banner_product_page').attr('src', 'storage/images/banner/' + $(this).data('banner_product_page'));
    $('#show_banner_link_product_page').val($(this).data('banner_link_product_page'));
    $('#banner_searched_product_page').attr('src', 'storage/images/banner/' + $(this).data('banner_searched_product_page'));
    $('#show_banner_link_searched_product_page').val($(this).data('banner_link_searched_product_page'));
    $('.modal-title').text('Show banner');
    $('#show').modal('show');
});






/*-------------------------------------------
21. Role CRUD
--------------------------------------------- */


// -- ajax Form Add Role--
$(document).on('click','.addRole', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $('#create').modal('show');
    $('.form-horizontal').show();
    $('.modal-title').text('Add Role');
});
$("#role-add-form").submit(function(e) {
    // Stop browser from submitting the form
    e.preventDefault();

    // Send ajax request
    $.ajax({
        type: 'POST',
        url: $(this).attr('action'),
        data: new FormData( this ),
        cache: false,
        contentType: false,
        processData: false,
        success: function(data){
            if ((data.errors)) {
                $('.error').removeClass('hidden');
                if (typeof data.errors.role_title === 'undefined') {
                    $('.role_title').addClass('hidden');
                }
                $('.role_title').text(data.errors.role_title);
            } else {
                $('.error').addClass('hidden');
                $('#example1').prepend("<tr id='role" + data.id + "'>"+
                    "<td>" + data.role_title + "</td>"+
                    "<td><a class='edit-role btn btn-warning btn-sm' data-id='" + data.id + "' data-role_title='" + data.role_title + "'><span class='fa fa-edit'></span></a> <a class='delete-role btn btn-danger btn-sm' data-id='" + data.id + "'><span class='fa fa-trash'></span></a></td>"+
                    "</tr>");
            }
        },
    });
    $('#role-add-form').trigger('reset');
});


// function Edit Role
$(document).on('click', '.edit-role', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $('#footer_action_button').text(" Update Role");
    $('#footer_action_button').addClass('glyphicon-check');
    $('#footer_action_button').removeClass('glyphicon-trash');
    $('.actionBtn').addClass('btn-success');
    $('.actionBtn').removeClass('btn-danger');
    $('.actionBtn').removeClass('deleteRole');
    $('.actionBtn').addClass('updateRole');
    $('.modal-title').text('Role Edit');
    $('.deleteContent').hide();
    $('.form-horizontal').show();
    $('#fid').val($(this).data('id'));
    $('#role_title').val($(this).data('role_title'));
    $('#myModal').modal('show');
});

// function update Role
$('.modal-footer').on('click', '.updateRole', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $.ajax({
        type: 'POST',
        url: 'roles/' + $('#fid').val(),
        data: $('#role-edit-form').serialize(),
        success: function(data) {
            $('#role' + data.id).replaceWith("<tr id='role" + data.id + "'>"+
                "<td>" + data.role_title + "</td>"+
                "<td><a class='edit-role btn btn-warning btn-sm' data-id='" + data.id + "' data-role_title='" + data.role_title + "'><span class='fa fa-edit'></span></a> <a class='delete-role btn btn-danger btn-sm' data-id='" + data.id + "'><span class='fa fa-trash'></span></a></td>"+
                "</tr>");
        }
    });
    $('#role-edit-form').trigger('reset');
});


// form Delete function
$(document).on('click', '.delete-role', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $('#footer_action_button').text(" Delete");
    $('#footer_action_button').removeClass('glyphicon-check');
    $('#footer_action_button').addClass('glyphicon-trash');
    $('.actionBtn').removeClass('btn-success');
    $('.actionBtn').addClass('btn-danger');
    $('.actionBtn').addClass('deleteRole');
    $('.modal-title').text('Delete Role');
    $('.id').text($(this).data('id'));
    $('.deleteContent').show();
    $('.form-horizontal').hide();
    $('#myModal').modal('show');
});

$('.modal-footer').on('click', '.deleteRole', function(e){
    // Stop browser from default behaviour
    e.preventDefault();

    $.ajax({
        type: 'POST',
        url: 'roles/'+$('.id').text(),
        data: {
            '_method': 'DELETE',
            'id': $('.id').text()
        },
        success: function(){
            $('#role' + $('.id').text()).remove();
        }
    });
});






/*-------------------------------------------
  22. Blog CRUD
--------------------------------------------- */


// -- ajax Form Add Blog--
$(document).on('click','.addBlog', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $('#create').modal('show');
    $('.form-horizontal').show();
    $('.modal-title').text('Add Blog');
});

$("#addBlog").submit(function(event) {
    // Stop browser from submitting the form
    event.preventDefault();

    // update CKEDITOR element
    for (instance in CKEDITOR.instances) {
        CKEDITOR.instances[instance].updateElement();
    }

    // send ajax request
    $.ajax({
        type: 'POST',
        url: $(this).attr('action'),
        data: new FormData( this ),
        cache: false,
        contentType: false,
        processData: false,
        success: function(data){
            if ((data.errors)) {
                $('.error').removeClass('hidden');
                if (typeof data.errors.blogTitle === 'undefined') {
                    $('.blogTitle').addClass('hidden');
                }
                $('.blogTitle').text(data.errors.blogTitle);
                if (typeof data.errors.category_id === 'undefined') {
                    $('.category_id').addClass('hidden');
                }
                $('.category_id').text(data.errors.category_id);
                if (typeof data.errors.blogImage === 'undefined') {
                    $('.blogImage').addClass('hidden');
                }
                $('.blogImage').text(data.errors.blogImage);
                if (typeof data.errors.description === 'undefined') {
                    $('.description').addClass('hidden');
                }
                $('.description').text(data.errors.description);
            } else {
                $('#example1').prepend("<tr id='blog" + data.id + "'>"+
                    "<td>" + data.blogTitle + "</td>"+
                    "<td>" + $('#category_id >option:selected').text() + "</td>"+
                    "<td><img src='storage/images/blog/" + data.blogImage + "' height='100px' width='100px'></td>"+
                    "<td>" + data.description + "</td>"+
                    "<td><a class='edit-blog btn btn-warning btn-sm' data-id='" + data.id + "'><span class='fa fa-edit'></span></a> <a class='delete-blog btn btn-danger btn-sm' data-id='" + data.id + "'><span class='fa fa-trash'></span></a></td>"+
                    "</tr>"
                );
                $('#addBlog').trigger('reset');
                CKEDITOR.instances.editor1.setData( '' );
            }
        }
    });
});


// function Edit Blog
$(document).on('click', '.edit-blog', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $('.actionBtn').hide();
    $('.modal-title').text('Banner Edit');
    $('.deleteContent').hide();
    $('.form-horizontal').show();

    $.ajax({
        type: 'GET',
        url: 'blogs/' + $(this).data('id') + '/edit',
        data: {
            'id': $(this).data('id')
        },
        success: function(data){
            $('#fid').val(data.id);
            $('#blogTitle').val(data.blogTitle);
            // Loop over each select option
            $("#ecategory_id > option").each(function(){
                // Check for the matching category
                if ($(this).val() == data.category_id){
                    // Select the matched option
                    $(this).prop("selected", true);
                }
            });
            CKEDITOR.instances.editor.setData( data.description );
            $('#myModal').modal('show');
        }
    });
});

$('#updateBlog').submit(function(event) {
    // Stop browser from submitting the form
    event.preventDefault();

    // update CKEDITOR element
    for (instance in CKEDITOR.instances) {
        CKEDITOR.instances[instance].updateElement();
    }

    var formData = new FormData(this);
    formData.append('_method', 'PUT');
    $.ajax({
        type: 'POST',
        url: $(this).attr('action') + '/' + $('#fid').val(),
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function(data) {
            if ((data.errors)) {
                $('.error').removeClass('hidden');
                if (typeof data.errors.blogTitle === 'undefined') {
                    $('.eblogTitle').addClass('hidden');
                }
                $('.eblogTitle').text(data.errors.blogTitle);
                if (typeof data.errors.category_id === 'undefined') {
                    $('.ecategory_id').addClass('hidden');
                }
                $('.ecategory_id').text(data.errors.category_id);
                if (typeof data.errors.blogImage === 'undefined') {
                    $('.eblogImage').addClass('hidden');
                }
                $('.eblogImage').text(data.errors.blogImage);
                if (typeof data.errors.description === 'undefined') {
                    $('.edescription').addClass('hidden');
                }
                $('.edescription').text(data.errors.description);
            } else {
                $('#blog' + data.id).replaceWith("<tr id='blog" + data.id + "'>"+
                    "<td>" + data.blogTitle + "</td>"+
                    "<td>" + $('#ecategory_id >option:selected').text() + "</td>"+
                    "<td><img src='storage/images/blog/" + data.blogImage + "' height='100px' width='100px'></td>"+
                    "<td>" + data.description + "</td>"+
                    "<td><a class='edit-blog btn btn-warning btn-sm' data-id='" + data.id + "'><span class='fa fa-edit'></span></a> <a class='delete-blog btn btn-danger btn-sm' data-id='" + data.id + "'><span class='fa fa-trash'></span></a></td>"+
                    "</tr>"
                );
            }
        }
    });
});


// form Delete function
$(document).on('click', '.delete-blog', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $('.actionBtn').show();
    $('#footer_action_button').text(" Delete");
    $('#footer_action_button').removeClass('glyphicon-check');
    $('#footer_action_button').addClass('glyphicon-trash');
    $('.actionBtn').removeClass('btn-success');
    $('.actionBtn').addClass('btn-danger');
    $('.actionBtn').addClass('deleteBlog');
    $('.modal-title').text('Delete Blog');
    $('.id').text($(this).data('id'));
    $('.deleteContent').show();
    $('.form-horizontal').hide();
    $('#delete').modal('show');
});

$('.modal-footer').on('click', '.deleteBlog', function(e){
    // Stop browser from default behaviour
    e.preventDefault();

    $.ajax({
        type: 'POST',
        url: 'blogs/'+$('.id').text(),
        data: {
            '_method': 'DELETE',
            'id': $('.id').text()
        },
        success: function(){
            $('#blog' + $('.id').text()).remove();
        }
    });
});






/*-------------------------------------------
  23. Auction CRUD
--------------------------------------------- */


// -- ajax Form Add Auction--
$(document).on('click','.addAuction', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $('#create').modal('show');
    $('.form-horizontal').show();
    $('.modal-title').text('Add Auction');
});

$("#addAuction").submit(function(event) {
    // Stop browser from submitting the form
    event.preventDefault();

    // send ajax request
    $.ajax({
        type: 'POST',
        url: $(this).attr('action'),
        data: new FormData( this ),
        cache: false,
        contentType: false,
        processData: false,
        success: function(data){
            if ((data.errors)) {
                $('.error').removeClass('hidden');
                if (typeof data.errors.date === 'undefined') {
                    $('.date').addClass('hidden');
                }
                $('.date').text(data.errors.date);
                if (typeof data.errors.valid_until === 'undefined') {
                    $('.valid_until').addClass('hidden');
                }
                $('.valid_until').text(data.errors.valid_until);
                if (typeof data.errors.product_id === 'undefined') {
                    $('.product_id').addClass('hidden');
                }
                $('.product_id').text(data.errors.product_id);
            } else {
                $('#example1').prepend("<tr id='auction" + data.id + "'>"+
                    "<td>" + data.date + "</td>"+
                    "<td>" + data.valid_until + "</td>"+
                    "<td>" + $('#product_id >option:selected').text() + "</td>"+
                    "<td><a class='edit-auction btn btn-warning btn-sm' data-id='" + data.id + "'><span class='fa fa-edit'></span></a> <a class='delete-auction btn btn-danger btn-sm' data-id='" + data.id + "'><span class='fa fa-trash'></span></a></td>"+
                    "</tr>"
                );
                $('#addAuction').trigger('reset');
            }
        }
    });
});


// function Edit Auction
$(document).on('click', '.edit-auction', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $('.actionBtn').hide();
    $('.modal-title').text('Auction Edit');
    $('.deleteContent').hide();
    $('.form-horizontal').show();

    $.ajax({
        type: 'GET',
        url: 'auctions/' + $(this).data('id') + '/edit',
        data: {
            'id': $(this).data('id')
        },
        success: function(data){
            $('#fid').val(data.id);

            // Set valid_from date time
            var valid_from = $('#edate');
            valid_from.datepicker('setDate', new Date(data.date));

            // Set valid_until date time
            var valid_until = $('#evalid_until');
            valid_until.datepicker('setDate', new Date(data.valid_until));

            // Loop over each select option
            $("#eproduct_id > option").each(function(){
                // Check for the matching category
                if ($(this).val() == data.product_id){
                    // Select the matched option
                    $(this).prop("selected", true);
                }
            });
            $('#myModal').modal('show');
        }
    });
});

$('#updateAuction').submit(function(event) {
    // Stop browser from submitting the form
    event.preventDefault();

    var formData = new FormData(this);
    formData.append('_method', 'PUT');
    $.ajax({
        type: 'POST',
        url: $(this).attr('action') + '/' + $('#fid').val(),
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function(data) {
            if ((data.errors)) {
                $('.error').removeClass('hidden');
                if (typeof data.errors.date === 'undefined') {
                    $('.edate').addClass('hidden');
                }
                $('.edate').text(data.errors.date);
                if (typeof data.errors.valid_until === 'undefined') {
                    $('.evalid_until').addClass('hidden');
                }
                $('.evalid_until').text(data.errors.valid_until);
                if (typeof data.errors.product_id === 'undefined') {
                    $('.eproduct_id').addClass('hidden');
                }
                $('.eproduct_id').text(data.errors.product_id);
            } else {
                $('#auction' + data.id).replaceWith("<tr id='auction" + data.id + "'>"+
                    "<td>" + data.date + "</td>"+
                    "<td>" + data.valid_until + "</td>"+
                    "<td>" + $('#product_id >option:selected').text() + "</td>"+
                    "<td><a class='edit-auction btn btn-warning btn-sm' data-id='" + data.id + "'><span class='fa fa-edit'></span></a> <a class='delete-auction btn btn-danger btn-sm' data-id='" + data.id + "'><span class='fa fa-trash'></span></a></td>"+
                    "</tr>"
                );
                $('#addAuction').trigger('reset');
            }
        }
    });
});


// form Delete function
$(document).on('click', '.delete-auction', function(e) {
    // Stop browser from default behaviour
    e.preventDefault();

    $('.actionBtn').show();
    $('#footer_action_button').text(" Delete");
    $('#footer_action_button').removeClass('glyphicon-check');
    $('#footer_action_button').addClass('glyphicon-trash');
    $('.actionBtn').removeClass('btn-success');
    $('.actionBtn').addClass('btn-danger');
    $('.actionBtn').addClass('deleteAuction');
    $('.modal-title').text('Delete Auction');
    $('.id').text($(this).data('id'));
    $('.deleteContent').show();
    $('.form-horizontal').hide();
    $('#delete').modal('show');
});

$('.modal-footer').on('click', '.deleteAuction', function(e){
    // Stop browser from default behaviour
    e.preventDefault();

    $.ajax({
        type: 'POST',
        url: 'auctions/'+$('.id').text(),
        data: {
            '_method': 'DELETE',
            'id': $('.id').text()
        },
        success: function(){
            $('#auction' + $('.id').text()).remove();
        }
    });
});