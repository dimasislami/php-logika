<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 ?>
 
<div class="box">
    <div class="box-body">
      <div class="col-xs-12">
           <button class="btn btn-primary" onclick="add_item()"><i class="fa fa-plus"></i> Tambah</button>
           <button class="btn btn-default" onclick="reload_table()"><i class="fa fa-refresh"></i> Reload</button>
            </div>
            <div class="box-body">
             <br />
                <br />
                  <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th style="text-align:center">No </th>
                                <th style="text-align:center">Name</th>
                                <th style="text-align:center">Jumlah</th>
                                <th style="text-align:center">Satuan</th>
                                <th style="text-align:center;width:100px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
          </div><!-- /.box-body -->
    </div>
</div>

<script type="text/javascript">

    var save_method; //for save method string
    var table;
    var base_url = '<?php echo base_url(); ?>';

    $(document).ready(function () {

        //datatables
       table = $('#table').DataTable({
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('item/list_item') ?>",
                "type": "POST"
            },
            //Set column definition initialisation properties.
            "columnDefs": [
                {
                    "targets": [-1], //last column
                    "orderable": false, //set not orderable
                },
            ],
        });

        //set input/textarea/select event when change value, remove class error and remove text help block 
        $("input").change(function () {
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });
		
		var id_sheet = '1UVGhQYNH7QUN26hFYOUzkuQRbvzAmuDUfZ9G56x5bIo';
		var key      = 'AIzaSyCHP9DKwVlkeb8I2hDmwS1gHWqESiF-Noc';
		

		
    });
	

    function add_item()
    {

        // $('[name="id_barang"]').val(kode);
        save_method = 'add';
        $('#form')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
        $('#modal_form').modal('show'); // show bootstrap modal
        $('.modal-title').text('Tambah Barang'); // Set Title to Bootstrap modal title
    }

     function edit_item(id)
    {
        save_method = 'update';
        $('#form')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string


        //Ajax Load data from ajax
        $.ajax({
            url: "<?php echo site_url('item/detail_item') ?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function (data)
            {


                $('[name="id_barang"]').val(data.id_barang);
                $('[name="nm_barang"]').val(data.nm_barang);
                $('[name="jumlah"]').val(data.jumlah);
                $('[name="satuan"]').val(data.satuan);
                $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit Barang'); // Set title to Bootstrap modal title

            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error');
            }
        });
    }
    function reload_table()
    {
        table.ajax.reload(null, false); //reload datatable ajax 
    }

    function save_item()
    {
        $('#btnSave').text('Simpan...'); //change button text
        $('#btnSave').attr('disabled', true); //set button disable 
        var url;

        if (save_method == 'add') {
            url = "<?php echo site_url('item/add_item') ?>";
        } else {
            url = "<?php echo site_url('item/update_item') ?>";
        }

        // ajax adding data to database

        var formData = new FormData($('#form')[0]);
        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "JSON",
            success: function (data)
            {

                if (data.status) //if success close modal and reload ajax table
                {
                    $('#modal_form').modal('hide');
                    reload_table();
                } else
                {
                    for (var i = 0; i < data.inputerror.length; i++)
                    {
                        $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                        $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]); //select span help-block class set text error string
                    }
                }
                $('#btnSave').text('Simpan'); //change button text
                $('#btnSave').attr('disabled', false); //set button enable 


            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error');
                $('#btnSave').text('Simpan'); //change button text
                $('#btnSave').attr('disabled', false); //set button enable 

            }
        });
    }

    function delete_item(id)
    {
        if (confirm('Are you sure delete this data?'))
        {
            // ajax delete data to database
            $.ajax({
                url: "<?php echo site_url('item/delete_item') ?>/" + id,
                type: "POST",
                dataType: "JSON",
                success: function (data)
                {
                    //if success reload ajax table
                    $('#modal_form').modal('hide');
                    reload_table();
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error');
                }
            });

        }
    }


    function validasi_angka(evt) {
          var charCode = (evt.which) ? evt.which : event.keyCode
           if (charCode > 31 && (charCode < 48 || charCode > 57))

            return false;
          return true;
        }
            

</script>

<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Form</h3>
            </div>
            <div class="modal-body form">
                <form method="post" action="#" id="form" class="form-horizontal">
                    <div class="form-body">
                        <input name="id_barang" class="form-control" type="hidden">
                        <div class="form-group">
                            <label class="control-label col-md-3">Nama Barang</label>
                            <div class="col-md-9">
                                <input name="nm_barang" class="form-control" required="" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3"> Satuan</label>
                            <div class="col-md-9">
                                <select name="satuan" class="form-control" style="width:100%">
                                    <option value="">--Pilih Satuan--</option>
                                    <option value="Pcs">Pcs</option>
                                    <option value="Pack">Pack</option>
                                    <option value="liter">liter</option>
                                    <option value="Kg">Kg</option>
                                    <option value="Rim">Rim</option>
                                </select>
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="control-label col-md-3">Jumlah</label>
                            <div class="col-md-9">
                                <input name="jumlah" class="form-control" onkeypress="return validasi_angka(event)" required="" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save_item()" class="btn btn-primary">Simpan</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->