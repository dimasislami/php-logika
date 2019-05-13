<div class="box">
    <div class="box-body">
        <div class="row">
            <div class="col-xs-12">
                <button onclick="add()" class="btn btn-primary">Add Data</button>
            </div>
            <div class="col-xs-12">
                <br>
                <table id="table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th style="text-align: center">No</th>
                            <th style="text-align: center;width: 250px">Image</th>
                            <th style="text-align: center">Product</th>
                            <th style="text-align: center">Retail Price</th>
                            <th style="text-align: center">Sold Price</th>
                            <th style="text-align: center">Discount</th>
                            <th style="text-align: center">Note</th>
                            <th style="text-align: center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
var table;

$(document).ready(function() {
    table = $("#table").DataTable({
        responsive: true,
        serverSide: true,
        processing: true,
        ajax: {
            url: "proses.php",
            method: "POST",
            data: {
                action: "loadData"
            }
        },
        pageLength: 10,
        lengthMenu: [
            [5, 7, 10, 20, 100],
            ['5 Rows', '7 Rows', '10 Rows', '20 Rows', '100 Rows']
        ],
        columnDefs: [{
            targets: [0, 1, 5, 6],
            orderable: false
        }],
        order: [],
        pagingType: "full_numbers",
    });
    $("#file_input").change(function() {
        var fileExtension = ['jpeg', 'jpg', 'png'];
        if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
            alert("Only formats are allowed : " + fileExtension.join(', '));
            $("#file_input").val('');
        }
    });
    $("#retail, #sold").bind("keyup change", function(e) {
        var retail = $('#retail').val();
        var sold = $('#sold').val();
        var diskon = (((retail - sold) / retail) * 100);
        $('#discount').val(diskon);
    })
});

function add() {
    $('#form')[0].reset();
    $('.form-group').removeClass('has-error');
    $('.help-block').empty();
    $('#modal_form').modal('show');
    $('#action-link').val("addData");
    $('.modal-title').text('Add new product');
}

function edit_data(id) {
    $('#form')[0].reset();
    $('.form-group').removeClass('has-error');
    $('.help-block').empty();
    $.ajax({
        url: "proses.php",
        type: "POST",
        dataType: "JSON",
        data: {
            action: "showDataById",
            id_product: id
        },
        success: function(data) {
            $('[name="id_product"]').val(id);
            $('[name="retail_price"]').val(data.retail_price);
            $('[name="sold_price"]').val(data.sold_price);
            $('[name="discount"]').val(data.discount);
            $('[name="img_disk"]').val(data.image);
            $('[name="note"]').val(data.note);
            $('[name="product"]').val(data.product);
            $('#modal_form').modal('show');
            $('#action-link').val("updateData");
            $('.modal-title').text('Edit product');
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error');
        }
    });
}

function reload_table() {
    table.ajax.reload(null, false);
}

function save_data() {
    var formData = new FormData($('#form')[0]);
    $.ajax({
        url: "proses.php",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data) {
            if (data.status) {
                alert(data.msg);
                $('#modal_form').modal('hide');
                reload_table();
            } else {
                alert(data.msg);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error');
        }
    });
}

function delete_data(id) {
    if (confirm('Are you sure delete this data?')) {
        $.ajax({
            url: "proses.php",
            type: "POST",
            dataType: "JSON",
            data: {
                action: "deleteData",
                id_product: id,
            },
            success: function(data) {
                if (data.status) {
                    alert(data.msg);
                    $('#modal_form').modal('hide');
                    reload_table();
                } else {
                    alert(data.msg);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error');
            }
        });
    }
}

</script>

<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title"></h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal" enctype="multipart/form-data">
                    <div class="form-body">
                        <input type="hidden" id="action-link" name="action" />
                        <input type="hidden" name="id_product" />
                        <input name="img_disk" type="hidden">
                        <div class="form-group">
                            <label class="control-label col-md-3">Product</label>
                            <div class="col-md-9">
                                <input name="product" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Retail Price</label>
                            <div class="col-md-9">
                                <input name="retail_price" class="form-control" type="number" id="retail">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Sold Price</label>
                            <div class="col-md-9">
                                <input name="sold_price" class="form-control" type="number" id="sold">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Discount</label>
                            <div class="col-md-9">
                                <input name="discount" class="form-control" type="text" readonly="" id="discount">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">File</label>
                            <div class="col-md-9">
                                <input name="image" class="form-control" type="file" id="file_input">
                                <span class="help-block"></span>
                                <h5 style="width:500px;color:red">* Image format must .png/.jpg/.jpeg</h5>
                            </div>
                            <input name="img_disk" type="hidden">
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Note</label>
                            <div class="col-md-9">
                                <textarea name="note" class="form-control"></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save_data()" class="btn btn-primary">Simpan</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>