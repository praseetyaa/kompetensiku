<?php $__env->startSection('title', $blog->blog_title.' - Artikel | '); ?>

<?php $__env->startSection('content'); ?>

<section class="hero-wrap hero-wrap-2" style="background-image: url('<?php echo e($blog->blog_gambar != '' ? asset('assets/images/blog/'.$blog->blog_gambar) : asset('assets/images/default/artikel.jpg')); ?>');" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-end">
      <div class="col-md-12 ftco-animate my-auto">
        <p class="breadcrumbs mb-2">
          <span class="mr-0"><a href="/<?php echo e(Session::get('ref') != null ? '?ref='.Session::get('ref') : ''); ?>">Home <i class="ion-ios-arrow-forward"></i></a></span>
          <span class="mr-0"><a href="/artikel<?php echo e(Session::get('ref') != null ? '?ref='.Session::get('ref') : ''); ?>">Artikel <i class="ion-ios-arrow-forward"></i></a></span>
          <span><?php echo e($blog->blog_title); ?> <i class="ion-ios-arrow-forward"></i></span>
        </p>
        <h1 class="mb-0 bread"><?php echo e($blog->blog_title); ?></h1>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section ftco-degree-bg bg-white">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 ftco-animate">
        <p>
          <img src="<?php echo e($blog->blog_gambar != '' ? asset('assets/images/blog/'.$blog->blog_gambar) : asset('assets/images/default/artikel.jpg')); ?>" alt="" class="img-fluid">
        </p>
        <h2 class="mb-3"><?php echo e($blog->blog_title); ?></h2>
        <p class="text-uppercase"><i class="fa fa-calendar"></i> <?php echo e(generate_date($blog->blog_at)); ?> pukul <?php echo e(date('H:i', strtotime($blog->blog_at))); ?></p>
				<div class="ql-snow"><div class="ql-editor p-0"><?php echo html_entity_decode($blog->konten); ?></div></div>
        <div class="tag-widget post-tag-container mb-5 mt-5">
          <div class="tagcloud">
            <?php $__currentLoopData = $blog_tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="/tag/<?php echo e($data->slug); ?>" class="tag-cloud-link"><?php echo e($data->tag); ?></a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </div>
        
        <div class="about-author d-flex p-4" style="background-color: #eeeeee">
          <div class="bio mr-5">
            <img src="<?php echo e($blog->foto != '' ? asset('assets/images/users/'.$blog->foto) : asset('assets/images/users/default.jpg')); ?>" alt="Image placeholder" class="img-fluid mb-4">
          </div>
          <div class="desc">
            <h3><?php echo e($blog->nama_user); ?></h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
          </div>
        </div>

        <div class="pt-5 mt-5">
          <h3 class="mb-5 comment-title"><?php echo e(count_comments($blog->id_blog)); ?> Komentar</h3>
          <ul class="comment-list">

            <?php if(!Auth::guest()): ?>
            <li class="comment">
              <div class="vcard bio">
                <img src="<?php echo e(Auth::user()->foto != '' ? asset('assets/images/users/'.Auth::user()->foto) : asset('assets/images/users/default.jpg')); ?>" alt="Image placeholder">
              </div>
              <div class="comment-body">
                <form method="post" action="/komentar">
                  <?php echo e(csrf_field()); ?>

                  <input type="hidden" name="id_artikel" value="<?php echo e($blog->id_blog); ?>">
                  <input type="hidden" name="komentar_parent" value="0">
                  <div class="form-group">
                    <textarea name="komentar" rows="3" class="form-control" placeholder="Tulis komentar..." required></textarea>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-success btn-comment">Komentar</button>
                  </div>
                </form>
              </div>
            </li>
            <?php else: ?>
            <li class="comment">
              <div class="alert alert-warning text-center">
                Anda harus login terlebih dahulu untuk dapat berkomentar.
              </div>
            </li>
            <?php endif; ?>

            <?php $__currentLoopData = $blog_komentar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $komentar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="comment">
              <div class="vcard bio">
                <img src="<?php echo e($komentar->foto != '' ? asset('assets/images/users/'.$komentar->foto) : asset('assets/images/users/default.jpg')); ?>" alt="Image placeholder">
              </div>
              <div class="comment-body">
                <h3><?php echo e($komentar->nama_user); ?></h3>
                <div class="meta"><?php echo e(generate_date($komentar->komentar_at)); ?>, <?php echo e(date('H:i', strtotime($komentar->komentar_at))); ?></div>
                <p><?php echo nl2br($komentar->komentar); ?></p>

                <?php if(!Auth::guest()): ?>
                <p>
                  <a href="#" class="reply">Balas</a>
                  <?php if(Auth::user()->role == role_it() || Auth::user()->role == role_manajer() || Auth::user()->id_user == $komentar->id_user): ?>
                  <a href="#" data-id="<?php echo e($komentar->id_komentar); ?>" class="reply btn-delete">Hapus</a>
                  <?php endif; ?>
                </p>
                <?php endif; ?>

                <form class="form-comment" method="post" action="/komentar">
                  <?php echo e(csrf_field()); ?>

                  <input type="hidden" name="id_artikel" value="<?php echo e($blog->id_blog); ?>">
                  <input type="hidden" name="komentar_parent" value="<?php echo e($komentar->id_komentar); ?>">
                  <div class="form-group">
                    <textarea name="komentar" rows="3" class="form-control" placeholder="Tulis komentar..." required></textarea>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-success btn-comment">Komentar</button>
                    <button type="button" class="btn btn-warning btn-cancel">Batal</button>
                  </div>
                </form>
              </div>

              <?php if(count(generate_comment_children($komentar->id_artikel, $komentar->id_komentar)) > 0): ?>
              <ul class="children">
                <?php $__currentLoopData = generate_comment_children($komentar->id_artikel, $komentar->id_komentar); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $komentar_child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li class="comment">
                    <div class="vcard bio">
                      <img src="<?php echo e($komentar_child->foto != '' ? asset('assets/images/users/'.$komentar_child->foto) : asset('assets/images/users/default.jpg')); ?>" alt="Image placeholder">
                    </div>
                    <div class="comment-body">
                      <h3><?php echo e($komentar_child->nama_user); ?></h3>
                      <div class="meta"><?php echo e(generate_date($komentar_child->komentar_at)); ?>, <?php echo e(date('H:i', strtotime($komentar_child->komentar_at))); ?></div>
                      <p><?php echo nl2br($komentar_child->komentar); ?></p>

                      <?php if(!Auth::guest()): ?>
                      <p>
                        <a href="#" class="reply">Balas</a>
                        <?php if(Auth::user()->role == role_it() || Auth::user()->role == role_manajer() || Auth::user()->id_user == $komentar_child->id_user): ?>
                        <a href="#" data-id="<?php echo e($komentar_child->id_komentar); ?>" class="reply btn-delete">Hapus</a>
                        <?php endif; ?>
                      </p>
                      <?php endif; ?>

                      <form class="form-comment" method="post" action="/komentar">
                        <?php echo e(csrf_field()); ?>

                        <input type="hidden" name="id_artikel" value="<?php echo e($blog->id_blog); ?>">
                        <input type="hidden" name="komentar_parent" value="<?php echo e($komentar->id_komentar); ?>">
                        <div class="form-group">
                          <textarea name="komentar" rows="3" class="form-control" placeholder="Tulis komentar..." required></textarea>
                        </div>
                        <div class="form-group">
                          <button type="submit" class="btn btn-success btn-comment">Komentar</button>
                          <button type="button" class="btn btn-warning btn-cancel">Batal</button>
                        </div>
                      </form>
                    </div>
                  </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul>
              <?php endif; ?>

            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

          </ul>
          <!-- END comment-list -->

          <form id="form-delete-comment" method="post" action="/komentar/delete">
            <?php echo e(csrf_field()); ?>

            <input type="hidden" name="id_komentar">
          </form>
          
        </div>

      </div> <!-- .col-md-8 -->
      <div class="col-lg-4 sidebar pl-lg-5 ftco-animate">
        <div class="sidebar-box">
          <form action="/search" method="post" class="search-form">
            <?php echo e(csrf_field()); ?>

            <div class="form-group">
              <span class="fa fa-search"></span>
              <input type="text" name="keyword" class="form-control" placeholder="Ketik kata kunci dan tekan Enter" required>
            </div>
          </form>
        </div>
        <div class="sidebar-box ftco-animate">
          <div class="categories">
            <h3>Kategori</h3>
            <?php $__currentLoopData = $kategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><a href="/kategori/<?php echo e($data->slug); ?>"><?php echo e($data->kategori); ?> <span class="ion-ios-arrow-forward"></span></a></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </div>

        <div class="sidebar-box ftco-animate">
          <h3>Artikel Terbaru</h3>
          <?php $__currentLoopData = $recents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="block-21 mb-4 d-flex">
            <a class="blog-img mr-4" style="background-image: url('<?php echo e($recent->blog_gambar != '' ? asset('assets/images/blog/'.$recent->blog_gambar) : asset('assets/images/default/artikel.jpg')); ?>');"></a>
            <div class="text">
              <h3 class="heading"><a href="/artikel/<?php echo e($recent->blog_permalink); ?>"><?php echo e($recent->blog_title); ?></a></h3>
              <div class="meta">
                <div><a href="#"><span class="fa fa-calendar"></span> <?php echo e(date('d/m/Y', strtotime($recent->blog_at))); ?></a></div>
                <div><a href="#"><span class="fa fa-user"></span> <?php echo e($recent->nama_user); ?></a></div>
                <div><a href="#"><span class="fa fa-comment"></span> <?php echo e(count_comments($recent->id_blog)); ?></a></div>
              </div>
            </div>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div class="sidebar-box ftco-animate">
          <h3>Tag</h3>
          <div class="tagcloud">
            <?php $__currentLoopData = $tag; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="/tag/<?php echo e($data->slug); ?>" class="tag-cloud-link"><?php echo e($data->tag); ?></a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </div>
        
      </div>

    </div>
  </div>
</section> <!-- .section -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js-extra'); ?>

<script type="text/javascript">

  // Button Reply Komentar
  $(document).on("click", ".reply", function(e){
    e.preventDefault();
    $(this).parent().next().fadeIn(500);
  });

  // Button Delete Komentar
  $(document).on("click", ".btn-delete", function(e){
    e.preventDefault();
    var id = $(this).data("id");
    var ask = confirm("Anda yakin ingin menghapus komentar ini?");
    if(ask){
      $("#form-delete-comment input[name=id_komentar]").val(id);
      $("#form-delete-comment").submit();
    }
  });

  // Button Cancel Komentar
  $(document).on("click", ".btn-cancel", function(e){
    e.preventDefault();
    $(this).parents(".form-comment").fadeOut(500);
  });

</script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css-extra'); ?>

<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<style type="text/css">
  .breadcrumbs .mr-0:after {content: '/';}
  .comment-title {border-bottom: 2px solid rgba(0, 0, 0, 0.8);}
  .form-comment {display: none;}
  .btn-comment, .btn-cancel, .btn-delete {padding: 4px 10px; text-transform: uppercase; font-size: 11px; letter-spacing: .1em; font-weight: 400; border-radius: 4px;}
  .comment-list .children {padding-left: 80px!important;}
  /* Quill */
  .ql-editor h2, .ql-editor h3 {margin-bottom: 1rem!important; font-weight: 600!important;}
  .ql-editor p {margin-bottom: 1rem!important; line-height: 1.8!important;}
  .ql-editor ol {padding-left: 30px!important;}
  .ql-editor ol li {font-size: 14px!important; color: #74757f!important; padding-left: 5px!important;}
</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/guest/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lms\resources\views/artikel/guest/post.blade.php ENDPATH**/ ?>