$(document).ready(function() {
    $('.image-popup').magnificPopup({
        type: 'image',
        closeOnContentClick: true,
        mainClass: 'mfp-fade',
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0,1] // Will preload 0 - before current, and 1 after the current image
        }
    });
});

function addNewCollection(){
    $('#addNewCollectionModal').modal('show');
    $('#addNewCollectionForm')[0].reset();
    $('.saveBtn').html('<i class="fa fa-save"></i> Save');
    var default_img = base_url + 'assets/uploads/default.png';
    $('#img-profile').attr('src', default_img);
}

function addNewStudent(){
    $('#addNewStudentModal').modal('show');
    $('#addNewStudentForm')[0].reset();
    $('.saveBtn').html('<i class="fa fa-save"></i> Save');
    var default_img = base_url + 'assets/uploads/default.png';
    $('#img-profile').attr('src', default_img);
    $('#password').attr('required', 'required');
}

function addNewTeacher(){
    $('#addNewTeacherModal').modal('show');
    $('#addNewTeacherForm')[0].reset();
    $('.saveBtn').html('<i class="fa fa-save"></i> Save');
    var default_img = base_url + 'assets/uploads/default.png';
    $('#img-profile').attr('src', default_img);
    $('#password').attr('required', 'required');
}

function addNewUser(){
    $('#addNewUserModal').modal('show');
    $('#addNewUserForm')[0].reset();
    $('.saveBtn').html('<i class="fa fa-save"></i> Save');
    var default_img = base_url + 'assets/uploads/default.png';
    $('#img-profile').attr('src', default_img);
    $('#password').attr('required', 'required');
}

function saveCollection(e){
    $('#addNewCollectionForm').parsley().validate();
    if ($('#addNewCollectionForm').parsley().isValid()) {
        $('.saveBtn').html('<i class="fa fa-spin fa-spinner"></i> Saving');
        var form = document.getElementById("addNewCollectionForm");
        var formData = new FormData(form);
        $.ajax({
            type: "POST",
            url: base_url+'admin/save_the_collection',
            data: formData,
            contentType: false,
            processData: false,
            success: (resp) => {
                var res = JSON.parse(resp);
                console.log(res);
                if(res.status == true){
                    swal("Saved!", "Collection saved successfully", "success");
                    $('#addNewCollectionModal').modal('hide');
                    $('.saveBtn').html('<i class="fa fa-save"></i> Save');
                    setTimeout(()=>{
                        location.reload();
                    }, 1000)
                }else{
                    swal("Ooops!", "A problem occured. Please try again..", "error");
                }
            },
            error: (res) => {
                swal("Ooops!", "A problem occured. Please try again..", "error");
                console.log(res);
            },
        });
    }
}

function editCollection(id){
    $('#addNewCollectionModal').modal('show');
    $('#addNewCollectionForm').addClass('d-none');
    $('.loader').removeClass('d-none');

    $.ajax({
        type: "POST",
        url: base_url+'admin/get_the_collection',
        data: {
            id: id
        },
        success: (resp) => {
            var res = JSON.parse(resp);
            console.log(res);
            if(res.status == true){
                var default_img = base_url + 'assets/uploads/default.png';
                $('#author').val(res.data.author);
                $('#accession_no').val(res.data.accession_no);
                $('#book_name').val(res.data.book_name);
                $('#author').val(res.data.author);
                $('#category').val(res.data.category);
                $('#copyright_date').val(res.data.copyright_date);
                $('#edition').val(res.data.edition);
                $('#book_id').val(res.data.id);
                $('#location').val(res.data.location);
                $('#other_author').val(res.data.other_author);
                $('#publish_date').val(res.data.publish_date);
                $('#quantity').val(res.data.quantity);
                $('#available').val(res.data.available);
                $('#unavailable').val(res.data.unavailable);
                $('#status').val(res.data.status);

                if(res.data.book_image){
                    $('#img-profile').attr('src', base_url + 'assets/uploads/books/'+res.data.book_image);
                }else{
                    $('#img-profile').attr('src', default_img);
                }

                $('#addNewCollectionForm').removeClass('d-none');
                $('.loader').addClass('d-none');
            }else{
                swal("Ooops!", "A problem occured. Please try again..", "error");
            }
        },
        error: (res) => {
            swal("Ooops!", "A problem occured. Please try again..", "error");
            console.log(res);
        },
    });
}

$("#input-img").change(function() {
    readURL(this);
});

var readURL = (input)=> {
    var fileInput = document.getElementById('input-img');
    var filePath = fileInput.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    if(!allowedExtensions.exec(filePath)){
        swal("Upload Failed", "Please select a valid image with .jpeg/.jpg/.png/.gif extensions.","error");
        fileInput.value = '';
        return false;
    } else{
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#img-profile').attr('src', e.target.result);
                $('#img-profile').hide();
                $('#img-profile').fadeIn(650);
                $('#img_data').val(e.target.result)
            }
            reader.readAsDataURL(input.files[0]);
        }
    }   
}

function setRequestStaus(issue_id, request_status, request_type){
    swal({
        title: `${request_status} request?`,
        text: `Are you sure you want to ${request_status} this request?`,
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, please!",
        closeOnConfirm: false,
        confirmButtonColor: "#e11641",
        showLoaderOnConfirm: true
    },()=>{
        $.ajax({
            type: "POST",
            url: base_url+'admin/set_request_status',
            data: {
                issue_id: issue_id,
                request_status: request_status,
                request_type: request_type
            },
            success: (resp) => {
                var res = JSON.parse(resp);
                if(res.status == true){
                    setTimeout(()=>{
                        location.reload();
                    }, 1000);
                    swal("Success!", "Reloading page...", "success");
                }else{
                    swal("Ooops!", "A problem occured. Please try again..", "error");
                }
            },
            error: (res) => {
                swal("Ooops!", "A problem occured. Please try again..", "error");
                console.log(res);
            },
        });
    });
}

function returnCollection(issue_id, book_id){
    swal({
        title: `Is the book returned?`,
        text: `Make sure that the book they are returning is correct.`,
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, It is returned!",
        closeOnConfirm: false,
        confirmButtonColor: "#e11641",
        showLoaderOnConfirm: true
    },()=>{
        $.ajax({
            type: "POST",
            url: base_url+'admin/set_collection_to_return',
            data: {
                issue_id: issue_id,
                book_id: book_id,
            },
            success: (resp) => {
                var res = JSON.parse(resp);
                if(res.status == true){
                    setTimeout(()=>{
                        location.reload();
                    }, 1000);
                    swal("Success!", "Reloading page...", "success");
                }else{
                    swal("Ooops!", "A problem occured. Please try again..", "error");
                }
            },
            error: (res) => {
                swal("Ooops!", "A problem occured. Please try again..", "error");
                console.log(res);
            },
        });
    });
}

function markAsBorrowed(issue_id, book_id){
    swal({
        title: `Mark as Borrowed?`,
        text: `Mark this book as borrowed.`,
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, mark as borrowed!",
        closeOnConfirm: false,
        confirmButtonColor: "#e11641",
        showLoaderOnConfirm: true
    },()=>{
        $.ajax({
            type: "POST",
            url: base_url+'admin/mark_as_borrowed',
            data: {
                issue_id: issue_id,
                book_id: book_id
            },
            success: (resp) => {
                var res = JSON.parse(resp);
                if(res.status == true){
                    setTimeout(()=>{
                        location.reload();
                    }, 1000);
                    swal("Success!", "Reloading page...", "success");
                }else{
                    swal("Ooops!", "A problem occured. Please try again..", "error");
                }
            },
            error: (res) => {
                swal("Ooops!", "A problem occured. Please try again..", "error");
                console.log(res);
            },
        });
    });
}

/* Students Functions */
function saveStudent(e){
    $('#addNewStudentForm').parsley().validate();
    if ($('#addNewStudentForm').parsley().isValid()) {
        $('.saveBtn').html('<i class="fa fa-spin fa-spinner"></i> Saving');
        var form = document.getElementById("addNewStudentForm");
        var formData = new FormData(form);
        $.ajax({
            type: "POST",
            url: base_url+'admin/save_the_student',
            data: formData,
            contentType: false,
            processData: false,
            success: (resp) => {
                var res = JSON.parse(resp);
                console.log(res);
                if(res.status == true){
                    swal("Saved!", "Student saved successfully", "success");
                    $('#addNewStudentModal').modal('hide');
                    $('.saveBtn').html('<i class="fa fa-save"></i> Save');
                    setTimeout(()=>{
                        location.reload();
                    }, 1000)
                }else{
                    swal("Ooops!", "A problem occured. Please try again..", "error");
                }
            },
            error: (res) => {
                swal("Ooops!", "A problem occured. Please try again..", "error");
                console.log(res);
            },
        });
    }
}

function editStudent(id){
    $('#addNewStudentModal').modal('show');
    $('#addNewStudentForm').addClass('d-none');
    $('.loader').removeClass('d-none');

    $.ajax({
        type: "POST",
        url: base_url+'admin/get_the_student',
        data: {
            id: id
        },
        success: (resp) => {
            var res = JSON.parse(resp);
            console.log(res);
            if(res.status == true){
                var default_img = base_url + 'assets/uploads/default.png';
                $('#firstname').val(res.data.firstname);
                $('#lastname').val(res.data.lastname);
                $('#username').val(res.data.username);
                $('#email').val(res.data.email);
                $('#password').removeAttr('required');
                $('#contact').val(res.data.contact);
                $('#user_id').val(res.data.id);
                $('#status').val(res.data.status);
                $('#department').val(res.data.department);
                $('#address').val(res.data.address);

                if(res.data.pic){
                    $('#img-profile').attr('src', base_url + 'assets/uploads/users/'+res.data.pic);
                }else{
                    $('#img-profile').attr('src', default_img);
                }

                $('#addNewStudentForm').removeClass('d-none');
                $('.loader').addClass('d-none');
            }else{
                swal("Ooops!", "A problem occured. Please try again..", "error");
            }
        },
        error: (res) => {
            swal("Ooops!", "A problem occured. Please try again..", "error");
            console.log(res);
        },
    });
}

/* Users Functions */
function saveUser(e){
    $('#addNewUserForm').parsley().validate();
    if ($('#addNewUserForm').parsley().isValid()) {
        $('.saveBtn').html('<i class="fa fa-spin fa-spinner"></i> Saving');
        var form = document.getElementById("addNewUserForm");
        var formData = new FormData(form);
        $.ajax({
            type: "POST",
            url: base_url+'admin/save_the_user',
            data: formData,
            contentType: false,
            processData: false,
            success: (resp) => {
                var res = JSON.parse(resp);
                console.log(res);
                if(res.status == true){
                    swal("Saved!", "User saved successfully", "success");
                    $('#addNewUserModal').modal('hide');
                    $('.saveBtn').html('<i class="fa fa-save"></i> Save');
                    setTimeout(()=>{
                        location.reload();
                    }, 1000)
                }else{
                    swal("Ooops!", "A problem occured. Please try again..", "error");
                }
            },
            error: (res) => {
                swal("Ooops!", "A problem occured. Please try again..", "error");
                console.log(res);
            },
        });
    }
}

function editUser(id){
    $('#addNewUserModal').modal('show');
    $('#addNewUserForm').addClass('d-none');
    $('.loader').removeClass('d-none');

    $.ajax({
        type: "POST",
        url: base_url+'admin/get_the_user',
        data: {
            id: id
        },
        success: (resp) => {
            var res = JSON.parse(resp);
            console.log(res);
            if(res.status == true){
                var default_img = base_url + 'assets/uploads/default.png';
                $('#firstname').val(res.data.firstname);
                $('#lastname').val(res.data.lastname);
                $('#username').val(res.data.username);
                $('#email').val(res.data.email);
                $('#password').removeAttr('required');
                $('#contact').val(res.data.contact);
                $('#user_id').val(res.data.id);
                $('#status').val(res.data.status);
                $('#department').val(res.data.department);
                $('#address').val(res.data.address); 

                if(res.data.pic){
                    $('#img-profile').attr('src', base_url + 'assets/uploads/users/'+res.data.pic);
                }else{
                    $('#img-profile').attr('src', default_img);
                }

                $('#addNewUserForm').removeClass('d-none');
                $('.loader').addClass('d-none');
            }else{
                swal("Ooops!", "A problem occured. Please try again..", "error");
            }
        },
        error: (res) => {
            swal("Ooops!", "A problem occured. Please try again..", "error");
            console.log(res);
        },
    });
}

/* Teachers Functions */
function saveTeacher(e){
    $('#addNewTeacherForm').parsley().validate();
    if ($('#addNewTeacherForm').parsley().isValid()) {
        $('.saveBtn').html('<i class="fa fa-spin fa-spinner"></i> Saving');
        var form = document.getElementById("addNewTeacherForm");
        var formData = new FormData(form);
        $.ajax({
            type: "POST",
            url: base_url+'admin/save_the_teacher',
            data: formData,
            contentType: false,
            processData: false,
            success: (resp) => {
                var res = JSON.parse(resp);
                console.log(res);
                if(res.status == true){
                    swal("Saved!", "Teacher saved successfully", "success");
                    $('#addNewTeacherModal').modal('hide');
                    $('.saveBtn').html('<i class="fa fa-save"></i> Save');
                    setTimeout(()=>{
                        location.reload();
                    }, 1000)
                }else{
                    swal("Ooops!", "A problem occured. Please try again..", "error");
                }
            },
            error: (res) => {
                swal("Ooops!", "A problem occured. Please try again..", "error");
                console.log(res);
            },
        });
    }
}

function editTeacher(id){
    $('#addNewTeacherModal').modal('show');
    $('#addNewTeacherForm').addClass('d-none');
    $('.loader').removeClass('d-none');

    $.ajax({
        type: "POST",
        url: base_url+'admin/get_the_teacher',
        data: {
            id: id
        },
        success: (resp) => {
            var res = JSON.parse(resp);
            console.log(res);
            if(res.status == true){
                var default_img = base_url + 'assets/uploads/default.png';
                $('#firstname').val(res.data.firstname);
                $('#lastname').val(res.data.lastname);
                $('#username').val(res.data.username);
                $('#email').val(res.data.email);
                $('#password').removeAttr('required');
                $('#contact').val(res.data.contact);
                $('#user_id').val(res.data.id);
                $('#status').val(res.data.status);
                $('#department').val(res.data.department);
                $('#address').val(res.data.address); 

                if(res.data.pic){
                    $('#img-profile').attr('src', base_url + 'assets/uploads/users/'+res.data.pic);
                }else{
                    $('#img-profile').attr('src', default_img);
                }

                $('#addNewTeacherForm').removeClass('d-none');
                $('.loader').addClass('d-none');
            }else{
                swal("Ooops!", "A problem occured. Please try again..", "error");
            }
        },
        error: (res) => {
            swal("Ooops!", "A problem occured. Please try again..", "error");
            console.log(res);
        },
    });
}

/* Students Functions */
function saveProfileSettings(e){
    $('#saveProfileForm').parsley().validate();
    if ($('#saveProfileForm').parsley().isValid()) {
        $('.saveBtn').html('<i class="fa fa-spin fa-spinner"></i> Saving');
        var form = document.getElementById("saveProfileForm");
        var formData = new FormData(form);
        $.ajax({
            type: "POST",
            url: base_url+'admin/save_profile_settings',
            data: formData,
            contentType: false,
            processData: false,
            success: (resp) => {
                var res = JSON.parse(resp);
                console.log(res);
                if(res.status == true){
                    swal("Saved!", "Profile saved successfully", "success");
                    $('.saveBtn').html('<i class="fa fa-save"></i> Save');
                    setTimeout(()=>{
                        location.reload();
                    }, 1000)
                }else{
                    swal("Ooops!", "A problem occured. Please try again..", "error");
                }
            },
            error: (res) => {
                swal("Ooops!", "A problem occured. Please try again..", "error");
                console.log(res);
            },
        });
    }
}

/* Pages Functions */
function savePageSettings(e){
    $('#savePageSettingsForm').parsley().validate();
    if ($('#savePageSettingsForm').parsley().isValid()) {
        $('.saveBtn').html('<i class="fa fa-spin fa-spinner"></i> Saving');
        var data = $('#savePageSettingsForm').serializeArray();
        var page_content = $("#post_description").Editor("getText");
        data.push({name: 'page_content', value: page_content});
        $.ajax({
            type: "POST",
            url: base_url+'admin/save_page_settings',
            data: data,
            success: (resp) => {
                var res = JSON.parse(resp);
                console.log(res);
                if(res.status == true){
                    swal("Saved!", "Page saved successfully", "success");
                    $('.saveBtn').html('<i class="fa fa-save"></i> Save');
                    setTimeout(()=>{
                        location.reload();
                    }, 1000)
                }else{
                    swal("Ooops!", "A problem occured. Please try again..", "error");
                }
            },
            error: (res) => {
                swal("Ooops!", "A problem occured. Please try again..", "error");
                console.log(res);
            },
        });
    }
}

function selectCategory(e){
    if($(e).val() == 'All'){
        window.location.href = base_url + 'admin/collections';
    }else{
        window.location.href = base_url + 'admin/collections?category='+$(e).val();
    }
}

/* Categories */
function addNewCategory(){
    $('#addNewCategoryModal').modal('show');
    $('#addNewCategoryForm')[0].reset();
    $('#category_name').focus();
    $('.saveBtn').html('<i class="fa fa-save"></i> Save');
}

/* Save Category */
function saveCategory(e){
    $('#addNewCategoryForm').parsley().validate();
    if ($('#addNewCategoryForm').parsley().isValid()) {
        $('.saveBtn').html('<i class="fa fa-spin fa-spinner"></i> Saving');
        var form = document.getElementById("addNewCategoryForm");
        var formData = new FormData(form);
        $.ajax({
            type: "POST",
            url: base_url+'admin/save_the_category',
            data: formData,
            contentType: false,
            processData: false,
            success: (resp) => {
                var res = JSON.parse(resp);
                console.log(res);
                if(res.status == true){
                    swal("Saved!", "Category saved successfully", "success");
                    $('#addNewCategoryModal').modal('hide');
                    setTimeout(()=>{
                        location.reload();
                    }, 1000)
                }else{
                    swal("Ooops!", "A problem occured. Please try again..", "error");
                }
            },
            error: (res) => {
                swal("Ooops!", "A problem occured. Please try again..", "error");
                console.log(res);
            },
        });
    }
}

function editCategory(category_id){
    $('#addNewCategoryModal').modal('show');
    $('#addNewCategoryForm').addClass('d-none');
    $('.loader').removeClass('d-none');

    $.ajax({
        type: "POST",
        url: base_url+'admin/get_the_category',
        data: {
            category_id: category_id
        },
        success: (resp) => {
            var res = JSON.parse(resp);
            console.log(res);
            if(res.status == true){
                $('#category_name').val(res.data.category_name);
                $('#category_status').val(res.data.category_status);
                $('#category_id').val(res.data.category_id);
                $('#addNewCategoryForm').removeClass('d-none');
                $('.loader').addClass('d-none');
            }else{
                swal("Ooops!", "A problem occured. Please try again..", "error");
            }
        },
        error: (res) => {
            swal("Ooops!", "A problem occured. Please try again..", "error");
            console.log(res);
        },
    });
}