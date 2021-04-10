<?php $__env->startSection('content'); ?>

<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
     <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Tulis Pesan</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                            <li class="breadcrumb-item"><a href="/admin/email">E-Mail</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tulis Pesan</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- URL Referral -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- column -->
            <div class="col-lg-12">
                <!-- card -->
                <div class="card shadow">
                    <h5 class="card-title border-bottom">Tulis Pesan</h5>
                    <div class="card-body">
                        <?php if(Session::get('message') != null): ?>
                            <div class="alert alert-success alert-dismissible mb-4 fade show" Blog="alert">
                                <?php echo e(Session::get('message')); ?>

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>
                        <form id="form" method="post" action="/admin/email/store" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Subjek <span class="text-danger">*</span></label>
                                    <input type="text" name="subjek" class="form-control <?php echo e($errors->has('subjek') ? 'is-invalid' : ''); ?>" value="<?php echo e(old('subjek')); ?>" placeholder="Masukkan Subjek">
                                    <?php if($errors->has('subjek')): ?>
                                    <small class="text-danger"><?php echo e(ucfirst($errors->first('subjek'))); ?></small>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Penerima <span class="text-danger">*</span></label>
									<br>
									<button type="button" id="btn-search" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModalCenter">Cari Penerima</button>
                                    <input type="hidden" name="ids" id="id-penerima" class="form-control">
                                    <textarea id="email-penerima" name="emails" class="form-control" rows="2" readonly></textarea>
								</div>
                                <div class="form-group col-md-12">
                                    <label>Konten <span class="text-danger">*</span></label>
                                    <textarea name="konten" id="konten" class="d-none"></textarea>
                                    <div id="editor"></div> 
                                    <?php if($errors->has('konten')): ?>
                                    <small class="text-danger"><?php echo e(ucfirst($errors->first('konten'))); ?></small>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="border-top">
                        <button id="btn-submit" type="submit" class="btn btn-success">Kirim</button>
                    </div>
                </div>
                <!-- card -->
            </div>
            <!-- column -->
        </div>
        <!-- ============================================================== -->
        <!-- Recent comment and chats -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <?php echo $__env->make('template/admin/_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->

<!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Pilih Penerima</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="col-12 pt-3" style="background-color: #e5e5e5;">
				<div class="">
					<div class="form-group col-md-12">
						<div class="form-check form-check-inline">
							<input class="form-check-input checkbox-batch" name="batch" type="checkbox" id="checkbox-1" value="1">
							<label class="form-check-label" for="checkbox-1">1-100</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input checkbox-batch" name="batch" type="checkbox" id="checkbox-2" value="2">
							<label class="form-check-label" for="checkbox-2">101-200</label>
						</div>
					</div>
				</div>
			</div>
			<!--
			<div class="col-12 pt-3" style="background-color: #e5e5e5;">
				<form id="form-search" method="post" action="/admin/email/search">
					<?php echo e(csrf_field()); ?>

					<div class="row">
						<div class="form-group col-md-12">
							<input type="text" name="search" id="search" class="form-control" placeholder="Cari Email disini...">
						</div>
					</div>
				</form>
			</div>
			-->
			<div class="modal-body">
				<table class="table mb-0" id="table-receivers">
					<?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr class="tr-checkbox" data-id="<?php echo e($member->id_user); ?>" data-email="<?php echo e($member->email); ?>">
						<td>
							<input name="receivers[]" class="input-receivers d-none" type="checkbox" data-id="<?php echo e($member->id_user); ?>" data-email="<?php echo e($member->email); ?>" value="<?php echo e($member->id_user); ?>">
							<span class="text-primary"><?php echo e($member->email); ?></span><br><span class="text-success"><?php echo e($member->nama_user); ?></span>
						</td>
						<td width="30" align="center" class="td-check align-middle">
							<i class="fa fa-check text-primary d-none"></i>
						</td>
					</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</table>
			</div>
			<div class="modal-footer">
				<input type="hidden" id="temp-id">
				<span><strong id="count-checked">0</strong> email terpilih.</span>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" id="btn-choose">Pilih</button>
			</div>
		</div>
	</div>
</div>
<!-- End Modal -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js-extra'); ?>

<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script type="text/javascript">	
	// "Cari Penerima" Click
	$(document).on("click", "#btn-search", function(e){
		e.preventDefault();
		var ids = $("#id-penerima").val();
		var arrayId = ids.length > 0 ? ids.split(",") : [];
		arrayId.forEach(function(item){
			$(".input-receivers[data-id="+item+"]").attr("checked", "checked");
			actionChecked($(".input-receivers[data-id="+item+"]"), true);
		});
		countChecked(arrayId);
	});
	
	// Checkbox Batch
	$(document).on("change", ".checkbox-batch", function(){
		var count = $(".checkbox-batch:checked").length;
		if(count > 1){
			alert("Hanya bisa memilih 1 batch!");
			console.log(this);
			$(this).removeAttr("checked");
		}
		else{
			var value = $(this).val();
			var check = $(this).prop("checked");
			if(value == 1){
				var checkeds = $(".input-receivers").slice(0,100);
				checkeds.each(function(key,elem){
					check == true ? $(elem).attr("checked","checked") : $(elem).removeAttr("checked");
					check == true ? actionChecked($(elem), true) : actionChecked($(elem), false);
				});
			}
			else if(value == 2){
				var checkeds = $(".input-receivers").slice(100,200);
				checkeds.each(function(key,elem){
					check == true ? $(elem).attr("checked","checked") : $(elem).removeAttr("checked");
					check == true ? actionChecked($(elem), true) : actionChecked($(elem), false);
				});
			}
			countChecked($(".input-receivers:checked"));
		}
	});
	
	// Table Receivers Click
	$(document).on("click", ".tr-checkbox", function(e){
		e.preventDefault();
		var id = $(this).data("id");
		var email = $(this).data("email");
		var max = 100;
		if($(".input-receivers[data-id="+id+"]").prop("checked")){
			$(".input-receivers[data-id="+id+"]").removeAttr("checked");
			actionChecked($(".input-receivers[data-id="+id+"]"), false);
			//removeFromStorage(id, email);
			countChecked($(".input-receivers:checked"));
		}
		else{
			$(".input-receivers[data-id="+id+"]").attr("checked","checked");
			actionChecked($(".input-receivers[data-id="+id+"]"), true);
			//saveToStorage(id, email);
			var count = countChecked($(".input-receivers:checked"));
			if(count > max){
				alert("Maksimal email yang bisa dipilih adalah "+max);
				$(".input-receivers[data-id="+id+"]").removeAttr("checked");
				actionChecked($(".input-receivers[data-id="+id+"]"), false);
				//removeFromStorage(id, email);
				countChecked($(".input-receivers:checked"));
			}
		}
	});
	
	// "Pilih" Click
	$(document).on("click", "#btn-choose", function(e){
		e.preventDefault();
		var arrayId = [];
		var arrayEmail = [];
		$(".input-receivers:checked").each(function(){
			arrayId.push($(this).val());
			arrayEmail.push($(this).data("email"));
		});
		var joinId = arrayId.length > 0 ? arrayId.join(",") : '';
		$("#id-penerima").val(joinId);
		var joinEmail = arrayEmail.length > 0 ? arrayEmail.join(", ") : '';
		$("#email-penerima").text(joinEmail);
		$(".modal").modal("hide");
	});

    // Close Modal
    $('.modal').on('hidden.bs.modal', function(e){
		$(".checkbox-batch:checked").removeAttr("checked");
		$(".input-receivers:checked").each(function(){
			$(this).removeAttr("checked");
			actionChecked($(this), false);
		});
		//$("#search").val(null);
    });
	
	function actionChecked(elem, is_checked){
		if(is_checked == true){
			$(elem).parents(".tr-checkbox").addClass("tr-active");
			$(elem).parents(".tr-checkbox").find(".td-check .fa").removeClass("d-none");
		}
		else{
			$(elem).parents(".tr-checkbox").removeClass("tr-active");
			$(elem).parents(".tr-checkbox").find(".td-check .fa").addClass("d-none");
		}
	}
	
	function countChecked(array){
		var checked = array.length;
		$("#count-checked").text(checked);
		checked <= 0 ? $("#btn-choose").attr("disabled","disabled") : $("#btn-choose").removeAttr("disabled");
		return checked;
	}
	
	function saveToStorage(id, email){
		if($.inArray(id, tempId) < 0) tempId.push(id);
		if($.inArray(email, storageEmail) < 0) storageEmail.push(email);
	}
	
	function removeFromStorage(id, email){
		tempId.forEach(function(item,key){
			if(item == id) tempId.splice(key,1);
		});
		storageEmail.forEach(function(item,key){
			if(item == email) storageEmail.splice(key,1);
		});
	}
	
	/*
	// Search Email
	$(document).on("keyup", "#search", function(){
		var search = $.trim($(this).val());
		if(search != ''){
			$.ajax({
				type: "post",
				url: "/admin/email/search",
				data: {_token: "<?php echo e(csrf_token()); ?>", search: search},
				success: function(response){
					var result = JSON.parse(response);
					var html = '';
					$(result).each(function(key,user){
						html += '<tr class="tr-checkbox" data-id="'+user.id_user+'" data-email="'+user.email+'">';
						if($.inArray(user.id_user.toString(), storageTempId) >= 0)
							html += '<td width="30" align="center" style="vertical-align: middle;"><input name="receivers[]" class="input-receivers" type="checkbox" data-id="'+user.id_user+'" data-email="'+user.email+'" value="'+user.id_user+'" checked></td>';
						else
							html += '<td width="30" align="center" style="vertical-align: middle;"><input name="receivers[]" class="input-receivers" type="checkbox" data-id="'+user.id_user+'" data-email="'+user.email+'" value="'+user.id_user+'"></td>';
						html += '<td><span class="text-primary">'+user.email+'</span><br><span class="text-success">'+user.nama_user+'</span></td>';
						html += '</tr>';
					});
					$("#table-receivers tbody").html(html);
				}
			});
		}
	});
	*/
	
    // Quill Editor
    var toolbarOptions = [
        [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
        ['bold', 'italic', 'underline', 'strike', 'link', 'image'],
        [{ 'script': 'sub'}, { 'script': 'super' }],
        [{ 'align': [] }],
        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
        [{ 'color': [] }, { 'background': [] }],
        ['clean']     
    ];

    var quill = new Quill('#editor', {
        modules: {
            toolbar: toolbarOptions
        },
        placeholder: 'Tulis sesuatu...',
        theme: 'snow',
        imageResize: {
            displayStyles: {
                backgroundColor: 'black',
                border: 'none',
                color: 'white'
            },
            modules: [ 'Resize', 'DisplaySize', 'Toolbar' ]
        }
    });

    // Button Submit
    $(document).on("click", "#btn-submit", function(e){
        var myEditor = document.querySelector('#editor');
        var html = myEditor.children[0].innerHTML;
        $("#konten").text(html);
        $("#form").submit();
    });
</script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css-extra'); ?>

<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<style type="text/css">
    .border-top, .border-bottom {padding: 1.25rem;}
    .form-control {border-color: #caccce;}
    #editor {height: 300px;}
	.modal-content {max-height: 500px; overflow-y: hidden;}
	.modal-body {overflow-y: auto;}
	#table-receivers tr td {padding: .5rem!important;}
	#table-receivers tr:hover {background-color: #eeeeee!important;}
	.tr-checkbox {cursor: pointer;}
	.tr-active {background-color: #e5e5e5!important;}
	
	/* Quill */
	.ql-editor h1, .ql-editor h2, .ql-editor h3, .ql-editor h4, .ql-editor h5, .ql-editor h6 {margin-bottom: 1rem!important;}
	.ql-editor p {margin-bottom: 1rem!important;}
</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/admin/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/psikologanda.com/laravel-akademi/resources/views/mail/admin/create.blade.php ENDPATH**/ ?>