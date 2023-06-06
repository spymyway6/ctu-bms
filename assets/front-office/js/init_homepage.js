var base_url = $('#base_url').val();

$(document).ready(function() {
    // $('#viewBooks').modal('show');
});

function viewCollectionDetails(book_id){
    $('#view-collection-details').html(`
        <div class="loading-content">
            <div class="loader"></div>
            <span>Loading data. Please wait...</span>
        </div>
    `);
    
    $('#viewBooks').modal('show');

    $.ajax({
        type: "POST",
        url: base_url+'home/get_collection_info',
        data: {
            book_id: book_id
        },
        success: (resp) => {
            var res = JSON.parse(resp);
            console.log(res);
            if(res.status == true){
                var default_img = base_url + 'assets/uploads/default.png';

                if(res.data.book_image){
                    default_img = base_url + 'assets/uploads/books/'+res.data.book_image
                }

                var _quantity = Number(res.data.quantity);
                var _unavailable = Number(res.data.unavailable);
                var available = _quantity - _unavailable;

                var availTxt = `<span class="badge badge-success">Available</span>`;
                if(!available){
                    availTxt = `<span class="badge badge-danger">Unavailable</span>`;
                }

                $('#view-collection-details').html(`
                    <div class="book-modal-img" style="background-image: url('${default_img}')"></div>
                    <div class="book-modal-content">
                        <h2>${res.data.book_name}</h2>
                        <p>The title of the book is "${res.data.book_name}" with it's author ${res.data.author}. The ${res.data.edition} book published on ${res.dates.publish_date}.</p>
                        <!-- More Info -->
                        <div class="more-info-wrapper">
                            <div class="mi-header"><span><i class="fa fa-book"></i> Book Information</span></div>
                            <div class="mi-content">
                                <ul>
                                    <li>
                                        <span class="mi-title"><i class="fa fa-bookmark-o"></i> Book Name</span>
                                        <span class="details">${res.data.book_name}</span>
                                    </li>
                                    <li>
                                        <span class="mi-title"><i class="fa fa-bookmark-o"></i> Author</span>
                                        <span class="details">${res.data.author}</span>
                                    </li>
                                    <li>
                                        <span class="mi-title"><i class="fa fa-bookmark-o"></i> Other Author</span>
                                        <span class="details">${(res.data.other_author) ? res.data.other_author : '-'}</span>
                                    </li>
                                    <li>
                                        <span class="mi-title"><i class="fa fa-bookmark-o"></i> Category</span>
                                        <span class="details">${res.data.category_name}</span>
                                    </li>
                                    <li>
                                        <span class="mi-title"><i class="fa fa-bookmark-o"></i> Edition</span>
                                        <span class="details">${res.data.edition}</span>
                                    </li>
                                </ul>
                                <ul>
                                    <li>
                                        <span class="mi-title"><i class="fa fa-bookmark-o"></i> Published Date</span>
                                        <span class="details">${res.dates.publish_date}</span>
                                    </li>
                                    <li>
                                        <span class="mi-title"><i class="fa fa-bookmark-o"></i> Location</span>
                                        <span class="details">${(res.data.location) ? res.data.location : '-'}</span>
                                    </li>
                                    <li>
                                        <span class="mi-title"><i class="fa fa-bookmark-o"></i> Copyright Date</span>
                                        <span class="details">${res.dates.copyright_date}</span>
                                    </li>
                                    <li>
                                        <span class="mi-title"><i class="fa fa-bookmark-o"></i> Date Created</span>
                                        <span class="details">${res.dates.created_at}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- More Availability -->
                        <div class="more-info-wrapper">
                            <div class="mi-header"><span><i class="fa fa-book"></i> Availability</span> ${availTxt}</div>
                            <div class="mi-content">
                                <div class="avail-lists">
                                    <div class="avail-item bg-success">
                                        <span class="icon-b"><i class="fa fa-check"></i></span>
                                        <div class="avail-qty">
                                            <h5>${available}</h5>
                                            <span>Available</span>
                                        </div>
                                    </div>
                                    <div class="avail-item bg-danger">
                                        <span class="icon-b"><i class="fa fa-ban"></i></span>
                                        <div class="avail-qty">
                                            <h5>${_unavailable}</h5>
                                            <span>Unavailable</span>
                                        </div>
                                    </div>
                                    <div class="avail-item bg-primary">
                                        <span class="icon-b"><i class="fa fa-bars"></i></span>
                                        <div class="avail-qty">
                                            <h5>${_quantity}</h5>
                                            <span>Total Quantity</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                `);
            }else{
                $('#view-collection-details').html(`
                    <div class="loading-content">
                        <span>An error occured. Please try again.</span>
                    </div>
                `);
            }
        },
        error: (res) => {
            $('#view-collection-details').html(`
                <div class="loading-content">
                    <span>An error occured. Please try again.</span>
                </div>
            `);
            console.log(res);
        },
    });
}

function viewPersonnelDetails(id){
    $('#personnelModal').modal('show');
    var getDetails = $('#personnel-id-'+id).val();
    var data = JSON.parse(getDetails);
    $('#view-personnel-details').html(`
        <div class="book-modal-img" style="background-image: url('${data.img}')"></div>
        <div class="book-modal-content">
            <h2>${data.name}</h2>
            <p>One of the CTU's library personnel in the department of ${data.department} who lives in ${data.address}</p>
            <!-- More Info -->
            <div class="more-info-wrapper">
                <div class="mi-header"><span><i class="fa fa-book"></i> Book Information</span></div>
                <div class="mi-content">
                    <ul style="width: 80%">
                        <li>
                            <span class="mi-title"><i class="fa fa-bookmark-o"></i> Personnel Name</span>
                            <span class="details">${data.name}</span>
                        </li>
                        <li>
                            <span class="mi-title"><i class="fa fa-bookmark-o"></i> Email</span>
                            <span class="details">${data.email}</span>
                        </li>
                        <li>
                            <span class="mi-title"><i class="fa fa-bookmark-o"></i> Address</span>
                            <span class="details">${data.address}</span>
                        </li>
                        <li>
                            <span class="mi-title"><i class="fa fa-bookmark-o"></i> Department</span>
                            <span class="details">${data.department}</span>
                        </li>
                        <li>
                            <span class="mi-title"><i class="fa fa-bookmark-o"></i> Edition</span>
                            <span class="details">${data.edition}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    `);
}