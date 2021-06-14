
      <div class="row">
      	<div class="col-md-8">
      		<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Video</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <form action="p_tambah_video" method="POST" enctype="multipart/form-data">
                <div class="box-body">
                  <div class="form-group">
            				<label>Judul Video</label>
            				<input type="text" class="form-control" name="judul">
                    <input type="hidden" name="penulis" value="Administrator">
            				<div></div>
            			</div>
                  <div class="form-group">
            				<label>Tanggal Pelaksanaan</label>
            				<input type="date" class="form-control" name="tgl_pelaksanaan">
            				<div></div>
            			</div>
            			<div class="form-group">
            				<label>Url Video</label>
            				<input type="text" class="form-control" name="url">
            				<div></div>
            			</div>
                <!-- /.box-body -->

                <div class="box-footer">
                  <input type="submit" name="simpan" class="btn btn-primary btn-flat" value="Simpan">
                  <input type="reset" class="btn btn-danger btn-flat" value="Batal">
                </div>
              </form>
            </div>
        	</div>
        </div>      <!-- /.row -->
      </div>
