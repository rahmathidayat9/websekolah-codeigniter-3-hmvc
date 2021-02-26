    <script src="<?= base_url() ?>theme/clever/js/jquery/jquery.min.js"></script>
    <!-- ##### Catagory Area Start ##### -->
    <div class="">
    <div class="clever-catagory blog-details bg-img d-flex align-items-center justify-content-center p-3 height-400" style="background-image: url(<?= base_url('asset/img/blog/').$blog_detail['blog_img']; ?>);">
        <div class="blog-details-headline">
            <h3><?= $blog_detail['blog_title'] ?></h3>
            <div class="meta d-flex align-items-center justify-content-center">
                <a href="#"><?= $blog_detail['blog_author'] ?></a>
                <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                <a href="<?= base_url('blog/kategori/').$blog_kategori['nama_kategori'] ?>"><?= $blog_kategori['nama_kategori']; ?></a>
            </div>
        </div>
    </div>
    </div>
    <!-- ##### Catagory Area End ##### -->

    <!-- ##### Blog Details Content ##### -->
    <div class="blog-details-content section-padding-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <!-- Blog Details Text -->
                    <div class="blog-details-text">
                        <p><?= $blog_detail['blog_isi'] ?></p>
                        <!-- Tags -->
                        <!-- <div class="post-tags">
                            <ul>
                                <li><a href="#">Manual</a></li>
                                <li><a href="#">Liberty</a></li>
                                <li><a href="#">Interpritation</a></li>
                            </ul>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>

        <div class="related-posts section-padding-100-0">
            <div class="container-fluid">
                <div class="row">
                    <!-- Single Blog Area -->
                    <?php foreach ($related_blog as $blog): ?>
                    <?php 
                    $kategori = $this->db->get_where("tbl_kategori_blog",["id_kategori_blog" => $blog["blog_kategori_id"]])->row_array();
                    ?>
                        <div class="col-12 col-lg-6">
                        <div class="single-blog-area mb-100">
                            <img src="<?= base_url('asset/img/blog/').$blog['blog_thumb'] ?>" alt="">
                            <!-- Blog Content -->
                            <div class="blog-content">
                                <a href="<?= base_url('blog/').$blog['blog_slug'] ?>" class="blog-headline">
                                    <h4><?= $blog['blog_title'] ?></h4>
                                </a>
                                <div class="meta d-flex align-items-center">
                                    <a href="#"><?= $blog['blog_author'] ?></a>
                                    <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                                    <a href="<?= base_url('blog/kategori/').$kategori['nama_kategori'] ?>"><?= $kategori['nama_kategori'] ?></a>
                                </div>
                                <p><?= substr($blog['blog_isi'], 0,100)."..." ?></p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row justify-content-center">

                

                <!-- Post A Comment -->
                <div class="col-12 col-lg-6">
                    <div class="post-a-comments mb-70">
                        <h4>Post a Comment</h4>

                        <form id="formComment" action="<?= base_url('home/Blog/detail/').$blog_detail['blog_slug'] ?>" method="post">
                            <div class="row">
                                <div class="col-12">
                                    <input type="hidden" name="blog_id"  value="<?= $blog_detail['id_blog']; ?>">
                                    <div class="form-group">
                                        <input type="text" required="" name="komentar_nama" class="form-control" id="text" placeholder="Nama">
                                        <?= form_error('komentar_nama','<small class="text-danger">','</small>'); ?>
                                    </div>
                                </div>
                                <div class="col-12">

                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea name="komentar_isi" required="" class="form-control" id="message" cols="30" rows="10" placeholder="Komentar anda"></textarea>
                                        <?= form_error('komentar_isi','<small class="text-danger">','</small>'); ?>
                                    </div>
                                </div>
                                <?= get_csrf(); ?>
                                <div class="col-12">
                                    <button class="btn clever-btn w-100" type="submit">Post A Comment</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <!-- Comments -->
                <div class="col-12 col-lg-6">
                    <div class="comments-area">

                        <h4><?= $total_comments; ?> Komentar</h4>

                        <ol class="comments-list">
                            <!-- Comment Area -->
                            <!-- Warna background avatar -->
                            <?php 
                            $avatar_color = ["#96c0eb","#819ad4","#995bbe","#ce6fac","#a77864","#f9e6f0"
                            ,"#f9f0e6","#c6e2ff","#ecc9ff","#b3f9c6","#faf0a5"];
                            ?>
                                <?php foreach ($comments as $comment): ?>
                                <?php shuffle($avatar_color); ?>
                            <li class="single_comment_area"> 
                                <!-- Single Comment -->        
                                <div class="single-comment-wrap mb-30">
                                    <div class="d-flex justify-content-between mb-30">
                                        <!-- Comment Admin -->
                                             <div class="comment-admin d-flex">
                                            <div class="thumb">
                                                <div class="rounded-circle" style="width: 50px; height: 50px; line-height: 50px; text-align: center; font-weight: bold; font-size: 35px; background-color:<?= reset($avatar_color) ?>"><?= substr($comment['komentar_nama'], 0,1); ?></div>
                                            </div>
                                            <div class="text">
                                                <h6><?= $comment['komentar_nama'] ?></h6>
                                                <!-- <span></span> -->
                                            </div>
                                        </div>  
                                        <!-- Reply -->
                                        <div class="reply">
                                            <a href="#" data-nama="<?= $comment['komentar_nama'] ?>" id="<?= $comment['id_komentar'] ?>" class="balas">Balas</a>
                                        </div>
                                    </div>
                                    <p><?= $comment['komentar_isi'] ?></p>

                                    <!-- ############### Balasan /Replys   ############### -->
                                    <?php 
                                        $get_replys = $this->db->get_where("tbl_balasan",["komentar_id" => $comment['id_komentar']]);
                                        $total_replys = $get_replys->num_rows();
                                    if ($total_replys>0) : ?>    
                                    
                                    <div class="reply float-right">
                                        <a href="#" data-nama="<?= $comment['komentar_nama'] ?>" id="<?= $comment['id_komentar'] ?>" class="lihat-balasan">Semua Balasan (<?= $total_replys; ?>)</a>
                                    </div>
                                    <?php endif; ?>
                                </div>

                                <?php $replys = $this->db->order_by('created_at','DESC')->get_where("tbl_balasan",["komentar_id" => $comment['id_komentar']],1)->result_array(); ?>
                                
                                <?php foreach ($replys as $reply): ?>
                                <?php shuffle($avatar_color); ?>
                                <ol class="children">
                                    <li class="single_comment_area">    
                                        <!-- Single Comment -->     
                                             <div class="single-comment-wrap">
                                                <div class="d-flex justify-content-between mb-30"> 
                                                <!-- Comment Admin -->
                                                <div class="comment-admin d-flex">
                                                    <div class="thumb">
                                                        <div class="rounded-circle" style="width: 50px; height: 50px; line-height: 50px; text-align: center; font-weight: bold; font-size: 35px; background-color: <?= reset($avatar_color) ?>"><?= substr($reply['balasan_nama'], 0,1); ?></div>
                                                    </div>
                                                    <div class="text">
                                                        <h6><?=$reply['balasan_nama'] ?></h6>
                                                        <span>balasan terbaru komentar <?= $comment['komentar_nama'] ?></span>
                                                    </div>
                                                </div> 
                                                <!-- Reply -->
                                                 <div class="reply">
                                                    <!-- <a href="#">Reply</a> -->
                                                </div>
                                             </div>
                                            <p><?= $reply['balasan_isi'] ?></p>
                                        </div>
                                    </li>
                                </ol>
                                <?php endforeach; ?>
                            </li>
                            <?php endforeach; ?>
                        </ol>
                    </div>
                </div>
                <!-- <div class="col-12">
                    <div class="load-more text-center mt-50">
                        <a href="#" class="btn clever-btn btn-2">Load More</a>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <!-- ##### Blog Details Content ##### -->

<!-- ############### Modal ################ -->

<!-- Modal Balas Komentar -->
<div class="modal fade" id="modal-balas-komentar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title text-light modal-balas-komentar-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url('home/Blog/reply_comment') ?>">
      <div class="modal-body">
        <div class="form-group">
            <input class="form-control" type="hidden" value="<?= $blog_detail['blog_slug'] ?>" name="blog_slug"></input>
        </div>
        <div class="form-group">
            <input class="form-control" type="hidden" name="komentar_id"></input>
        </div>
        <div class="form-group">
            <input required="" type="text" class="form-control" name="balasan_nama" placeholder="Nama Kamu"></input>
            <small class="text-muted">Maksimal 15 karakter</small>
        </div>
        <div class="form-group">
            <textarea required="" class="form-control" name="balasan_isi" placeholder="Balasan Komentar"></textarea>
            <small class="text-muted">Minimal 4 Karakter</small>
        </div>
        <?= get_csrf() ?>
      </div>
      <div class="modal-footer bg-primary">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batalkan</button>
        <button type="submit" class="btn btn-secondary">Kirim balasan</button>
        </form>
      </div>
    </div>
  </div>
</div>


    <!-- Modal Semua Balasan Komentar -->
<div class="modal fade" id="semua-balasan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title text-light balasan-title" id="exampleModalLongTitle"></h5>
        <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body list-semua-balasan">

      </div>
      <div class="modal-footer bg-primary">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">

    $(".balas").click(function() {
        let nama = $(this).data("nama")
        let id_komentar = $(this).attr("id")
        $(".modal-balas-komentar-title").html("Balas komentar "+nama)
        $("#modal-balas-komentar").modal("show")
        $("[name=komentar_id]").val(id_komentar)
    });

    function reset_list_balasan(){
        $(".list-semua-balasan").html("")
    }
    //lihat semua balasan dan tampilkan di modal box
    $(".lihat-balasan").click(function() {
        let id_komentar = $(this).attr("id")
        let nama = $(this).data("nama")
        $.ajax({
            url: "<?= base_url('home/Blog/show_comment_reply/') ?>"+id_komentar,
            type: "GET",
            dataType:"JSON",
            success:function(response){
                reset_list_balasan()
                $("#semua-balasan").modal("show")
                $(".balasan-title").html('Balasan Komentar '+nama)
                $.each(response,function(key,value){
                    $('.list-semua-balasan').append(`<li style="list-style: none;" class="single_comment_area mb-30">
                        <div class="single-comment-wrap">
                            <div class="d-flex justify-content-between">
                                <div class="comment-admin d-flex">
                                    <div class="text">
                                        <h6>`+value.balasan_nama+`</h6>
                                    </div>
                                </div>
                            </div>
                            <p>`+value.balasan_isi+`</p>
                        </div>
                        </li>
                        <hr>
                        `)
                })
            },
            error:function(){
                console.log('gagal mengambil balasan komentar')
            },
        })
    });
</script>