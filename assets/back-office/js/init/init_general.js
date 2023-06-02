// Set Base URL
var base_url = $('#base_url').val();
$(document).ready(function() {
    $('.datatable').dataTable();
    $(".numOnly").keypress(function(event) {
        return /\d/.test(String.fromCharCode(event.keyCode));
    });
});

var logout = ()=>{
    swal({
        title: "Logout?",
        text: "Do you want to logout?",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Logout!",
        closeOnConfirm: false,
        confirmButtonColor: "#f05050",
        showLoaderOnConfirm: true
    },
    ()=>{
        window.location.href = base_url+ "auth/user_logout";
    });
}

