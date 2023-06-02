function initCropper(){
	var URL = window.URL || window.webkitURL;
	var $image = $('#cropper-example-image');
	var options = {
		aspectRatio: 16 / 10,
		preview: '.cropper-example-preview',
		crop: function (e) {
			$('.img-data-text').html(
				'<b>Image Crop Details:</b> <br>'+
				'<b>X: </b>'+Math.round(e.detail.x)+'px '+
				'<b>Y: </b>'+Math.round(e.detail.y)+'px <br>'+
				'<b>Width: </b>'+Math.round(e.detail.width)+'px<br>'+
				'<b>Height: </b>'+Math.round(e.detail.height)+'px<br>'+
				'<b>ScaleX: </b>'+e.detail.scaleX+'<br>'+
				'<b>ScaleY: </b>'+e.detail.scaleY+'<br>'+
				'<b>Rotate: </b>'+e.detail.rotate+' DEG'
			);
		}
	};
  
	var originalImageURL = $image.attr('src');
	var uploadedImageURL;
  
	// Cropper
	$image.cropper(options);
  
	// IE10 fix
	if (typeof document.documentMode === 'number' && document.documentMode < 11) {
		options = $.extend({}, options, {zoomOnWheel: false});
		setTimeout(function() {
			$image.cropper('destroy').cropper(options);
		}, 1000);
	}
  
	// Buttons
	if (!$.isFunction(document.createElement('canvas').getContext)) {
		$('button[data-method="getCroppedCanvas"]').prop('disabled', true);
	}
	if (typeof document.createElement('cropper').style.transition === 'undefined') {
		$('button[data-method="rotate"]').prop('disabled', true);
		$('button[data-method="scale"]').prop('disabled', true);
	}
  
	// Methods
	$('.cropper-example-buttons').on('click', '[data-method]', function () {
		var $this = $(this);
		var data = $this.data();
		var result;
	
		if ($this.prop('disabled') || $this.hasClass('disabled')) {
			return;
		}
	
		if ($image.data('cropper') && data.method) {
			data = $.extend({}, data); // Clone a new one
	
			if (data.method === 'rotate') {
				$image.cropper('clear');
			}
	
			result = $image.cropper(data.method, data.option, data.secondOption);
	
			if (data.method === 'rotate') {
				$image.cropper('crop');
			}
	
			switch (data.method) {
				case 'scaleX':
				case 'scaleY':
					$(this).data('option', -data.option);
				break;
				case 'getCroppedCanvas':
					if (result) {
						$('#imgValue').val(result.toDataURL('image/jpeg'));
						swal({
							title: "Save cropped image?",
							text: "If saved, the image will not be reverted to it's original size. Continue?",
							type: "warning",
							showCancelButton: true,
							showLoaderOnConfirm: true,
							confirmButtonText: "Yes, save it!",
							closeOnConfirm: false,
							confirmButtonColor: "#e11641"
						}, ()=>{
							$.ajax({
								url: base_url+'pictures/save_cropped_image',
								type: 'POST',
								data: $('#imageForm').serialize(),
								success: (res)=>{
									if(res==1){
										$("#showCropWindow").modal("hide");
										swal({
											title: "Success!",
											text: "Image was successfully cropped and saved.",
											type: "success",
											showConfirmButton: false,
										});
										setInterval(function() { location.reload(); }, 1500);
									}else{
										swal('Oops!', 'A problem occured. Please try to refresh your page.', 'error');
									}
								}
							});
						});
					}
				break;
				case 'destroy':
					if (uploadedImageURL) {
						URL.revokeObjectURL(uploadedImageURL);
						uploadedImageURL = '';
						$image.attr('src', originalImageURL);
					}
				break;
			}
		}
	});
  
	// Import image
	var $inputImage = $('#cropper-example-inputImage');
  
	if (URL) {
		$inputImage.change(function () {
			var files = this.files;
			var file;
	
			if (!$image.data('cropper')) {
				return;
			}
	
			if (files && files.length) {
				file = files[0];
		
				if (/^image\/\w+$/.test(file.type)) {
					if (uploadedImageURL) {
						URL.revokeObjectURL(uploadedImageURL);
					}
					uploadedImageURL = URL.createObjectURL(file);
					$image.cropper('destroy').attr('src', uploadedImageURL).cropper(options);
					$inputImage.val('');
				} else {
					window.alert('Please choose an image file.');
				}
			}
		});
	} else {
		$inputImage.prop('disabled', true).parent().addClass('disabled');
	}
}
