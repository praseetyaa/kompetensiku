  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="#" onclick="event.preventDefault(); document.getElementById('form-logout').submit();">Logout</a>
          <form id="form-logout" class="d-none" method="post" action="/admin/logout"><?php echo e(csrf_field()); ?></form>
        </div>
      </div>
    </div>
  </div><?php /**PATH D:\XAMPP\htdocs\recruitment2\resources\views/template/admin/_logout-modal.blade.php ENDPATH**/ ?>