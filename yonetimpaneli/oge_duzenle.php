<?php ob_start();
require_once("top.php"); require_once("yetkiKontrol.php");?>

<!-- BEGIN BODY -->
<body class="page-header-fixed page-sidebar-closed-hide-logo page-sidebar-closed-hide-logo">
<!-- BEGIN HEADER -->
<?php require_once("header.php");?>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- BEGIN SIDEBAR -->
    <?php require_once("sidebar.php");
    $gelenid = $_GET["id"];
    $row = $db->get_row("SELECT * from file_controllers WHERE id = {$gelenid} ");
    $file_id=$row->file_id;

    $row2 = $db->get_row("SELECT liste_oge,databaseadi from yetki_sayfalar WHERE id = {$file_id} ");
    $colums = $db->get_results("SHOW COLUMNS FROM {$row2->databaseadi}");
    ?>
    <!-- END SIDEBAR -->

    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="tabbable">
        <!-- BEGIN PAGE CONTENT-->
        <div class="row">
        <div class="col-md-12">
        <form class="form-horizontal form-row-seperated" id="islemDuzenle" action="" method="post" enctype="multipart/form-data">
        <div class="portlet light">
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-list font-green-sharp"></i>
                <span class="caption-subject font-green-sharp bold uppercase">Öğe Yönetimi </span>
                <span class="caption-helper">Öğe Düzenleme</span>
            </div>

            <div class="actions btn-set">
                <button type="button" name="back" class="btn btn-default btn-circle" onclick="javascript:history.back();" ><i class="fa fa-angle-left"></i> Geri</button>
                <button class="btn green-haze btn-circle" onclick="islemDuzenle('ogeController','Duzenle','<?=$gelenid?>','sayfa_ogeleri.php?id=<?=$file_id?>');  return false"><i class="fa fa-check"></i> Kaydet</button>
            </div>
        </div>
        <div class="portlet-body form">
            <?php echo $msg;?>
            <div class="form-body">
              <?php
              if($row->form_type=="text_input")
              {?>

                <div class="form-group">
                    <label class="col-md-2 control-label">Input Name: <span class="required">* </span></label>
                    <div class="col-md-10">
                        <select class="form-control kategoriler" name="form_name" >
                          <?php foreach ($colums as $value) {?>
                            <option value="<?=$value->Field?>" <?php if ($value->Field == $row->form_name) { echo "selected";}?>><?=$value->Field?></option>
                          <?php }?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">Başlık Giriniz: <span class="required">* </span></label>
                    <div class="col-md-10">
                        <input type="text" class="form-control"name="label_name" placeholder="Öğe Başlık Adı" value="<?=$row->label_name?>">
                    </div>
                </div>

                  <div class="form-group">
                      <label class="col-md-2 control-label">Placeholder Adı: <span class="required">* </span></label>
                      <div class="col-md-10">
                          <input type="text" class="form-control"name="Placeholder" placeholder="Placeholder Adı" value="<?=$row->Placeholder?>">
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="control-label col-md-2">Zorunluluk:</label>
                      <div class="col-md-10">
                          <div class="btn-group btn-toggle" data-toggle="buttons">
                           <label class="btn btn-default btn-primary active">
                             <input type="radio" name="zorunluluk" value="required" checked> Zorunlu
                           </label>
                           <label class="btn btn-default">
                             <input type="radio" name="zorunluluk" value=""> Zorunlu Değil
                           </label>
                         </div>
                      </div>
                  </div>

            <?php  }
            elseif($row->form_type=="gorsel_input")
            {?>
              <div class="form-group">
                  <label class="col-md-2 control-label">Input Name Giriniz: <span class="required">* </span></label>
                  <div class="col-md-10">
                      <input type="text" class="form-control"name="form_name" placeholder="form name" value="<?=$row->form_name?>">
                  </div>
              </div>

              <div class="form-group">
                  <label class="col-md-2 control-label">Başlık Giriniz: <span class="required">* </span></label>
                  <div class="col-md-10">
                      <input type="text" class="form-control"name="label_name" placeholder="Öğe Label Adı" value="<?=$row->label_name?>">
                  </div>
              </div>




              <div class="form-group">
                  <label class="col-md-2 control-label">Width Giriniz: <span class="required">* </span></label>
                  <div class="col-md-10">
                      <input type="text" class="form-control"name="width" placeholder="width" value="<?=$row->width?>">
                  </div>
              </div>

              <div class="form-group">
                  <label class="col-md-2 control-label">Height Giriniz: <span class="required">* </span></label>
                  <div class="col-md-10">
                      <input type="text" class="form-control"name="height" placeholder="height" value="<?=$row->height?>">
                  </div>
              </div>

              <div class="form-group">
                  <label class="control-label col-md-2">Zorunluluk:</label>
                  <div class="col-md-10">
                      <div class="btn-group btn-toggle" data-toggle="buttons">
                       <label class="btn btn-default btn-primary active">
                         <input type="radio" name="zorunluluk" value="required" checked> Zorunlu
                       </label>
                       <label class="btn btn-default">
                         <input type="radio" name="zorunluluk" value=""> Zorunlu Değil
                       </label>
                     </div>
                  </div>
              </div>
            <?php }

            elseif($row->form_type=="spinner_input")
            {?>

              <div class="form-group">
                  <label class="col-md-2 control-label">Input Name: <span class="required">* </span></label>
                  <div class="col-md-10">
                      <select class="form-control kategoriler" name="form_name" >
                        <?php foreach ($colums as $value) {?>
                          <option value="<?=$value->Field?>" <?php if ($value->Field == $row->form_name) { echo "selected";}?>><?=$value->Field?></option>
                        <?php }?>
                      </select>
                  </div>
              </div>

              <div class="form-group">
                  <label class="col-md-2 control-label">Başlık Giriniz: <span class="required">* </span></label>
                  <div class="col-md-10">
                      <input type="text" class="form-control"name="label_name" placeholder="Öğe Label Adı" value="<?=$row->label_name?>">
                  </div>
              </div>



              <div class="form-group">
                  <label class="control-label col-md-2">Zorunluluk:</label>
                  <div class="col-md-10">
                      <div class="btn-group btn-toggle" data-toggle="buttons">
                       <label class="btn btn-default btn-primary active">
                         <input type="radio" name="zorunluluk" value="required" checked> Zorunlu
                       </label>
                       <label class="btn btn-default">
                         <input type="radio" name="zorunluluk" value=""> Zorunlu Değil
                       </label>
                     </div>
                  </div>
              </div>
            <?php }
            elseif($row->form_type=="hashtag_input")
            { ?>

              <div class="form-group">
                  <label class="col-md-2 control-label">Input Name: <span class="required">* </span></label>
                  <div class="col-md-10">
                      <select class="form-control kategoriler" name="form_name" >
                        <?php foreach ($colums as $value) {?>
                          <option value="<?=$value->Field?>" <?php if ($value->Field == $row->form_name) { echo "selected";}?>><?=$value->Field?></option>
                        <?php }?>
                      </select>
                  </div>
              </div>

              <div class="form-group">
                  <label class="col-md-2 control-label">Başlık Giriniz: <span class="required">* </span></label>
                  <div class="col-md-10">
                      <input type="text" class="form-control"name="label_name" placeholder="Öğe Label Adı" value="<?=$row->label_name?>">
                  </div>
              </div>


              <div class="form-group">
                  <label class="control-label col-md-2">Zorunluluk:</label>
                  <div class="col-md-10">
                      <div class="btn-group btn-toggle" data-toggle="buttons">
                       <label class="btn btn-default btn-primary active">
                         <input type="radio" name="zorunluluk" value="required" checked> Zorunlu
                       </label>
                       <label class="btn btn-default">
                         <input type="radio" name="zorunluluk" value=""> Zorunlu Değil
                       </label>
                     </div>
                  </div>
              </div>
            <?php }

            elseif($row->form_type=="datetime_input")
            { ?>
              <div class="form-group">
                  <label class="col-md-2 control-label">Input Name: <span class="required">* </span></label>
                  <div class="col-md-10">
                      <select class="form-control kategoriler" name="form_name" >
                        <?php foreach ($colums as $value) {?>
                          <option value="<?=$value->Field?>" <?php if ($value->Field == $row->form_name) { echo "selected";}?>><?=$value->Field?></option>
                        <?php }?>
                      </select>
                  </div>
              </div>


              <div class="form-group">
                  <label class="col-md-2 control-label">Başlık Giriniz: <span class="required">* </span></label>
                  <div class="col-md-10">
                      <input type="text" class="form-control"name="label_name" placeholder="Öğe Label Adı" value="<?=$row->label_name?>">
                  </div>
              </div>


              <div class="form-group">
                  <label class="col-md-2 control-label">Placeholder Adı: <span class="required">* </span></label>
                  <div class="col-md-10">
                      <input type="text" class="form-control"name="Placeholder" placeholder="Placeholder Adı" value="<?=$row->Placeholder?>">
                  </div>
              </div>

              <div class="form-group">
                  <label class="control-label col-md-2">Zorunluluk:</label>
                  <div class="col-md-10">
                      <div class="btn-group btn-toggle" data-toggle="buttons">
                       <label class="btn btn-default btn-primary active">
                         <input type="radio" name="zorunluluk" value="required" checked> Zorunlu
                       </label>
                       <label class="btn btn-default">
                         <input type="radio" name="zorunluluk" value=""> Zorunlu Değil
                       </label>
                     </div>
                  </div>
              </div>
          <?php }
          elseif($row->form_type=="dropdown")
          { ?>

            <div class="form-group">
                <label class="col-md-2 control-label">Input Name: <span class="required">* </span></label>
                <div class="col-md-10">
                    <select class="form-control kategoriler" name="form_name" >
                      <?php foreach ($colums as $value) {?>
                        <option value="<?=$value->Field?>" <?php if ($value->Field == $row->form_name) { echo "selected";}?>><?=$value->Field?></option>
                      <?php }?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label">Başlık: <span class="required">* </span></label>
                <div class="col-md-10">
                    <input type="text" class="form-control"name="label_name" placeholder="Label Adı" value="<?=$row->label_name?>">
                </div>
            </div>

            <div class="form-group">
              <?php $sql=$db->get_col("SHOW TABLES",0);
                    ?>
                <label class="col-md-2 control-label">DataBase Name:<span class="required">* </span></label>
                <div class="col-md-10">
                    <select class="form-control bs-select" id="vargetir" name="Database_name" data-show-subtext="true">
                      <?php foreach ($sql as $key => $tables): ?>
                        <option value=<?=$tables?> <?php if($tables == $row->Database_name){echo "selected";}?>><?=$tables?></option>
                       <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div id="sutunresponse">
              <div class="form-group">
                <?php
                //$row = $db->get_row("SELECT databaseadi from yetki_sayfalar WHERE id = {$gelenid} ");
                $colums = $db->get_results("SHOW COLUMNS FROM {$row->Database_name} ");
                      ?>
                  <label class="col-md-2 control-label">Dropdown Value:<span class="required">* </span></label>
                  <div class="col-md-10">
                      <select class="form-control bs-select" name="Database_var_name" data-show-subtext="true">
                        <?php foreach ($colums as $value) {?>
                          <option value="<?=$value->Field?>" <?php if($value->Field == $row->Database_var_name){ echo "selected"; }?>><?=$value->Field?></option>
                        <?php }?>
                      </select>
                  </div>
              </div>
            </div>


            <div class="form-group">
                <label class="control-label col-md-2">Zorunluluk:</label>
                <div class="col-md-10">
                    <div class="btn-group btn-toggle" data-toggle="buttons">
                     <label class="btn btn-default btn-primary active">
                       <input type="radio" name="zorunluluk" value="required" checked> Zorunlu
                     </label>
                     <label class="btn btn-default">
                       <input type="radio" name="zorunluluk" value=""> Zorunlu Değil
                     </label>
                   </div>
                </div>
            </div>
        <?php }

          elseif($row->form_type=="radio")
          { ?>
            <div class="form-group">
                <label class="col-md-2 control-label">Input Name: <span class="required">* </span></label>
                <div class="col-md-10">
                    <select class="form-control kategoriler" name="form_name" >
                      <?php foreach ($colums as $value) {?>
                        <option value="<?=$value->Field?>" <?php if ($value->Field == $row->form_name) { echo "selected";}?>><?=$value->Field?></option>
                      <?php }?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label">Başlık nedir:<span class="required">* </span></label>
                <div class="col-md-10">
                    <input type="text" class="form-control"name="label_name" placeholder="label  Adı" value="<?=$row->label_name?>">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label">Radio Value 1:<span class="required">* </span></label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="value1" placeholder="Radio Value 1" value="<?=$row->value1?>">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label">Radio Value 2:<span class="required">* </span></label>
                <div class="col-md-10">
                    <input type="text" class="form-control"name="value2" placeholder="Radio Value 2" value="<?=$row->value2?>">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label">Radio Başlık 1:<span class="required">* </span></label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="label1" placeholder="Radio Başlık 1" value="<?=$row->label1?>">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label">Radio Başlık 2:<span class="required">* </span></label>
                <div class="col-md-10">
                    <input type="text" class="form-control"name="label2" placeholder="Radio Başlık 2" value="<?=$row->label2?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2">Zorunluluk:</label>
                <div class="col-md-10">
                    <div class="btn-group btn-toggle" data-toggle="buttons">
                     <label class="btn btn-default btn-primary active">
                       <input type="radio" name="zorunluluk" value="required" checked> Zorunlu
                     </label>
                     <label class="btn btn-default">
                       <input type="radio" name="zorunluluk" value=""> Zorunlu Değil
                     </label>
                   </div>
                </div>
            </div>
            <?php }
            elseif($row->form_type=="textarea")
            { ?>
              <div class="form-group">
                  <label class="col-md-2 control-label">Input Name: <span class="required">* </span></label>
                  <div class="col-md-10">
                      <select class="form-control kategoriler" name="form_name" >
                        <?php foreach ($colums as $value) {?>
                          <option value="<?=$value->Field?>" <?php if ($value->Field == $row->form_name) { echo "selected";}?>><?=$value->Field?></option>
                        <?php }?>
                      </select>
                  </div>
              </div>

              <div class="form-group">
                  <label class="col-md-2 control-label">Başlık Giriniz: <span class="required">* </span></label>
                  <div class="col-md-10">
                      <input type="text" class="form-control"name="label_name" placeholder="Öğe Label Adı" value="<?=$row->label_name?>">
                  </div>
              </div>

              <div class="form-group">
                  <label class="control-label col-md-2">Zorunluluk:</label>
                  <div class="col-md-10">
                      <div class="btn-group btn-toggle" data-toggle="buttons">
                       <label class="btn btn-default btn-primary active">
                         <input type="radio" name="zorunluluk" value="required" checked> Zorunlu
                       </label>
                       <label class="btn btn-default">
                         <input type="radio" name="zorunluluk" value=""> Zorunlu Değil
                       </label>
                     </div>
                  </div>
              </div>
            <?php } ?>
            <div class="form-actions right">
                <button type="button" name="back" class="btn btn-default btn-circle" onclick="javascript:history.back();" >
                    <i class="fa fa-angle-left"></i> Geri
                </button>
                <button class="btn green-haze btn-circle" onclick="islemDuzenle('ogeController','Duzenle','<?=$gelenid?>','sayfa_ogeleri.php?id=<?=$file_id?>');  return false"><i class="fa fa-check" ></i> Kaydet</button>
            </div>
        </div>
        </div>
        </form>
        </div>
        </div>
        <!-- END PAGE CONTENT-->
                </div>
        </div>
    </div>
    <!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
</div>
<?php require_once("bottom.php");?>
<!-- BEGIN PAGE LEVEL PLUGINS -->
<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-summernote/summernote.css">
<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/jquery-tags-input/jquery.tagsinput.css"/>

<script type="text/javascript" src="assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="assets/global/plugins/bootstrap-touchspin/bootstrap.touchspin.js" type="text/javascript"></script>
<script type="text/javascript" src="assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js"></script>
<script src="assets/global/plugins/bootstrap-summernote/summernote.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-select/bootstrap-select.min.css"/>

<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css"/>
<script type="text/javascript" src="assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
<script type="text/javascript" src="assets/global/plugins/fuelux/js/spinner.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
<script type="text/javascript" src="assets/global/plugins/bootstrap-select/bootstrap-select.min.js"></script>

<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css"/>
<script type="text/javascript" src="assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script>
<script type="text/javascript" src="assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script src="assets/global/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery-tags-input/jquery.tagsinput.min.js" type="text/javascript"></script>

<script type="text/javascript" src="assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/bootstrap-datetimepicker/js/locales/bootstrap-datetimepicker.tr.js"></script>
<!-- image Crop -->
<link  href="assets/global/plugins/imagecrop/cropper.css" rel="stylesheet">
<script src="assets/global/plugins/imagecrop/cropper.js" type="text/javascript"></script>
<link  href="assets/global/plugins/imagecrop/ayar.css" rel="stylesheet">
<script src="assets/global/plugins/imagecrop/ayar.js" type="text/javascript"></script>
<!-- image Crop -->

<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="assets/global/scripts/datatable.js"></script>

<script>
    jQuery(document).ready(function() {
        Metronic.init(); // init metronic core components

        $('#order').spinner({value:0, min: 0, max: 100});
        $('#title').friendurl({id: 'seo', divider: '-', transliterate: true});
        //kategoriler için
        $('.kategoriler').select2({
            placeholder: "Bir Seçim Yapınız.",
            allowClear: true
        });

        $('.bs-select').selectpicker({
            iconBase: 'fa',
            tickIcon: 'fa-check'
        });

        $('.videolar').select2({
            placeholder: "Bir Seçim Yapınız.",
            allowClear: true
        });

        $('.galeriler').select2({
            placeholder: "Bir Seçim Yapınız.",
            allowClear: true
        });

        $('.kaynak').select2({
            placeholder: "Bir Seçim Yapınız.",
            allowClear: true
        });


      $('.btn-toggle').click(function() {
        $(this).find('.btn').toggleClass('active');
        if ($(this).find('.btn-primary').size()>0) {
        	$(this).find('.btn').toggleClass('btn-primary');
        }
      });

      $(".form_meridian_datetime").datetimepicker({
            isRTL: Metronic.isRTL(),
            format: "yyyy-mm-dd hh:ii",
            autoclose: true,
            pickerPosition: (Metronic.isRTL() ? "bottom-right" : "bottom-left"),
            todayBtn: true,
            language: 'tr'
        });

        $('#alt_body').maxlength({
            limitReachedClass: "label label-danger",
            alwaysShow: true,
            placement: Metronic.isRTL() ? 'top-right' : 'top-left'
        });

        $('#title').maxlength({
            limitReachedClass: "label label-danger",
            alwaysShow: true,
            placement: Metronic.isRTL() ? 'top-right' : 'top-left'
        });

        $('#hashtag').tagsInput({
            width: 'auto',
            'defaultText':'Etiket Ekle',
            'placeholderColor' : '#666666'
        });

        function sutunGetir(tablename){
          $.post( "islemler/ogeController.php?q=Sutungetir", { tbname: tablename })
            .done(function( data ) {
              $("#sutunresponse").html(data);
          });
        }

        $("#vargetir").change(function() { //tür dropdown değiştiğinde tetiklenir.
          var tbname = $( this ).val();
          sutunGetir(tbname);
        });

            $( document ).ajaxStart(function() {
              $( "#loading" ).show();
            });

    });
</script>
<!-- END PAGE LEVEL SCRIPTS -->
</body>
<!-- END BODY -->
</html>
