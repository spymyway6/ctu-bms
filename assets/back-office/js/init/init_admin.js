function addNewCollection(){
    $('#addNewCollectionModal').modal('show');
    $('#addNewCollectionForm')[0].reset();
    $('.saveBtn').html('<i class="fa fa-user-plus"></i> Save');
    var default_img = base_url + 'assets/uploads/default.png';
    $('#img-profile').attr('src', default_img);
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
                    $('.saveBtn').html('<i class="fa fa-user-plus"></i> Save');
                    setTimeout(()=>{
                        location.reload();
                    }, 2000)
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


function setRequestStaus(id, book_id, status, statusName, availableQTY, unavailableQTY, request_type){
    swal({
        title: `${statusName} request?`,
        text: `Are you sure you want to ${statusName} this request?`,
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
                issue_id: id,
                book_id: book_id,
                status: status,
                availableQTY: availableQTY,
                unavailableQTY: unavailableQTY,
                request_type: request_type,
            },
            success: (resp) => {
                var res = JSON.parse(resp);
                if(res.status == true){
                    setTimeout(()=>{
                        location.reload();
                    }, 2000);
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


function returnCollection(issue_id, book_id, availableQTY, unavailableQTY){
    swal({
        title: `Is the book returned?`,
        text: `Make sure that the book they are returning is correct.`,
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, mark as return!",
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
                availableQTY: availableQTY,
                unavailableQTY: unavailableQTY,
            },
            success: (resp) => {
                var res = JSON.parse(resp);
                if(res.status == true){
                    setTimeout(()=>{
                        location.reload();
                    }, 2000);
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

function markAsBorrowed(issue_id, book_id, availableQTY, unavailableQTY){
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
                book_id: book_id,
                availableQTY: availableQTY,
                unavailableQTY: unavailableQTY,
            },
            success: (resp) => {
                var res = JSON.parse(resp);
                if(res.status == true){
                    setTimeout(()=>{
                        location.reload();
                    }, 2000);
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