<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 ?>
 <style>
.head-text{
  font-size: 25px;
  font-weight: 300;
  text-shadow: 0 1px 1px rgba(0,0,0,0.2);
}
 </style>

<div class="box">
    <div class="box-body">
            <div class="box-body">
                <div id="container">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Barcode</label>
                        <div class="col-sm-4">
                            <input type="search" id="search" autofocus="autofocus"  style="height: 35px;width: 322px;">
                        </div> 
                    </div>
                </div>
          </div><!-- /.box-body -->
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                <div class="box box-primary">
                    <div class="box-body box-profile" id="result" style="    text-align: -webkit-center;">
                    
                    </div>
                </div>
            </div>
            <div class="col-md-4">
            </div>
    </div>
</div>

<script>
var base_url = '<?php echo base_url(); ?>';
 $(document).ready(function(){
   $("#search").keyup(function(){
  if($("#search").val().length>3){
  $.ajax({
   type: "post",
   url: base_url+ "scan/cari",
   cache: false,    
   data:'search='+$("#search").val(),
   success: function(response){ 
    $('#search').val("");
    $('#result').html("");
    var obj = JSON.parse(response);
    if(obj.length>0){
     try{
      var items=[];  
      $.each(obj, function(i,val){ 
        var str = val.nm_barang;
        str     = str.toLowerCase().replace(/\b[a-z]/g, function(letter) {
            return letter.toUpperCase();
        });
        items.push("<div class='box-header with-border'><h1 class='title' style='font-weight:bold'>Information</h1></div>");
        items.push('<div class="box-body" style="font-size: 20px;"><strong><i class="fa fa-database margin-r-5"></i> '+val.nm_barang+'</strong><hr><strong><i class="fa fa-bookmark-o margin-r-5"></i> '+val.satuan+'</strong><hr><strong><i class="fa  fa-balance-scale margin-r-5"></i><span class="label label-danger"> '+val.jumlah+'</span></strong></div>');
      }); 

      $('#result').append.apply($('#result'), items);
     }catch(e) {  
      alert('Exception while request..');
     }  
    }else{
     $('#result').html($('</td>').text("No Data Found"));  
    }  
   },
   error: function(){      
    alert('Error while request..');
   }
  });
  }
  return false;
   });
 });
</script>