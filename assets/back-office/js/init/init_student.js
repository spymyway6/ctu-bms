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

function editCollection(id){
    $('#addNewCollectionModal').modal('show');
    $('#addNewCollectionForm').addClass('d-none');
    $('.loader').removeClass('d-none');

    $.ajax({
        type: "POST",
        url: base_url+'student/get_the_collection',
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

function borrowBook(id, bookName, requestStatus){
    swal({
        title: `${requestStatus} ${bookName}?`,
        text: `Are you sure you want to ${requestStatus} this book?`,
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, please!",
        closeOnConfirm: false,
        confirmButtonColor: "#e11641",
        showLoaderOnConfirm: true
    },()=>{
        $.ajax({
            type: "POST",
            url: base_url+'student/borrow_book',
            data: {
                id: id,
                request_type: requestStatus
            },
            success: (resp) => {
                var res = JSON.parse(resp);
                console.log(res);
                if(res.status == true){
                    window.location.href = base_url+ "student/pending_requests";
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

/* Students Functions */
function saveProfileSettings(e){
    $('#saveProfileForm').parsley().validate();
    if ($('#saveProfileForm').parsley().isValid()) {
        $('.saveBtn').html('<i class="fa fa-spin fa-spinner"></i> Saving');
        var form = document.getElementById("saveProfileForm");
        var formData = new FormData(form);
        $.ajax({
            type: "POST",
            url: base_url+'student/save_profile_settings',
            data: formData,
            contentType: false,
            processData: false,
            success: (resp) => {
                var res = JSON.parse(resp);
                console.log(res);
                if(res.status == true){
                    swal("Saved!", "Student saved successfully", "success");
                    $('#addNewStudentModal').modal('hide');
                    $('.saveBtn').html('<i class="fa fa-user-plus"></i> Save');
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