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