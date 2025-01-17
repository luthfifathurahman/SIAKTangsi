<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="all,follow">
        <meta name="description" content="<?=getData('web_description');?>">
        <meta name="author" content="">
		<link rel="apple-touch-icon" href="<?=url(getData('logo'));?>">
		<link rel="shortcut icon" href="<?=url(getData('logo'));?>">
        <!-- Bootstrap -->
        <link href="<?=url('asset/bower_components/bootstrap/dist/css/bootstrap.min.css');?>" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="<?=url('asset/bower_components/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet">
        <!-- NProgress -->
        <link href="<?=url('asset/bower_components/nprogress/nprogress.css');?>" rel="stylesheet">
        <!-- bootstrap-wysiwyg -->
        <link href="<?=url('asset/bower_components/google-code-prettify/bin/prettify.min.css');?>" rel="stylesheet">
        <!-- jQuery custom content scroller -->
        <link href="<?=url('asset/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css');?>" rel="stylesheet"/>
        <!-- bootstrap-datetimepicker -->
        <link href="<?=url('asset/bower_components/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css');?>" rel="stylesheet">
        <!-- Datatables -->
        <link href="<?=url('asset/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css');?>" rel="stylesheet">
        <link href="<?=url('asset/bower_components/datatables.net-buttons-bs/css/buttons.bootstrap.min.css');?>" rel="stylesheet">
        <link href="<?=url('asset/bower_components/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css');?>" rel="stylesheet">
        <link href="<?=url('asset/bower_components/datatables.net-responsive-bs/css/responsive.bootstrap.min.css');?>" rel="stylesheet">
        <link href="<?=url('asset/bower_components/datatables.net-scroller-bs/css/scroller.bootstrap.min.css');?>" rel="stylesheet">
		<!-- colorbox -->
		<link href="<?=url('asset/bower_components/colorbox/colorbox.css');?>" rel="stylesheet">
        <!-- blueimp -->
        <link href="<?=url('asset/bower_components/blueimp/jquery.fileupload-ui.css');?>" rel="stylesheet">
        <!-- Custom Theme Style -->
        <link href="<?=url('build/css/custom.min.css');?>" rel="stylesheet">
        <link href="<?=url('css/style.back.css');?>" rel="stylesheet">

        <!-- jQuery -->
        <script src="<?=url('asset/bower_components/jquery/dist/jquery.min.js');?>"></script>
        <!-- Bootstrap -->
        <script src="<?=url('asset/bower_components/bootstrap/dist/js/bootstrap.min.js');?>"></script>
        <!-- FastClick -->
        <script src="<?=url('asset/bower_components/fastclick/lib/fastclick.js');?>"></script>
        <!-- NProgress -->
        <script src="<?=url('asset/bower_components/nprogress/nprogress.js');?>"></script>
        <!-- jQuery custom content scroller -->
        <script src="<?=url('asset/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js');?>"></script>
        <!-- Datatables -->
        <script src="<?=url('asset/bower_components/datatables.net/js/jquery.dataTables.min.js');?>"></script>
        <script src="<?=url('asset/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js');?>"></script>
        <script src="<?=url('asset/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js');?>"></script>
        <script src="<?=url('asset/bower_components/datatables.net-buttons-bs/js/buttons.bootstrap.min.js');?>"></script>
        <script src="<?=url('asset/bower_components/datatables.net-buttons/js/buttons.flash.min.js');?>"></script>
        <script src="<?=url('asset/bower_components/datatables.net-buttons/js/buttons.html5.min.js');?>"></script>
        <script src="<?=url('asset/bower_components/datatables.net-buttons/js/buttons.print.min.js');?>"></script>
        <script src="<?=url('asset/bower_components/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js');?>"></script>
        <script src="<?=url('asset/bower_components/datatables.net-keytable/js/dataTables.keyTable.min.js');?>"></script>
        <script src="<?=url('asset/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js');?>"></script>
        <script src="<?=url('asset/bower_components/datatables.net-responsive-bs/js/responsive.bootstrap.js');?>"></script>
        <script src="<?=url('asset/bower_components/datatables.net-scroller/js/dataTables.scroller.min.js');?>"></script>
        <!-- blueimp -->
        <script src="<?=url('asset/bower_components/blueimp/js/vendor/jquery.ui.widget.js');?>"></script>
        <script src="<?=url('asset/bower_components/blueimp/js/tmpl.min.js');?>"></script>
        <script src="<?=url('asset/bower_components/blueimp/js/load-image.min.js');?>"></script>
        <script src="<?=url('asset/bower_components/blueimp/js/canvas-to-blob.min.js');?>"></script>
        <script src="<?=url('asset/bower_components/blueimp/js/jquery.iframe-transport.js');?>"></script>
        <script src="<?=url('asset/bower_components/blueimp/js/jquery.fileupload.js');?>"></script>
        <script src="<?=url('asset/bower_components/blueimp/js/jquery.fileupload-fp.js');?>"></script>
        <script src="<?=url('asset/bower_components/blueimp/js/jquery.fileupload-ui.js');?>"></script>        
    </head>

    <body class="nav-md">
        <div style="width:96%;margin:auto;" id="content-popup">
            <br/>
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                            <div class="" role="tabpanel">
                                <ul class="nav nav-tabs bar_tabs" role="tablist">				
                                    <li role="presentation">
                                        <a href="#tab-insert" data-toggle="tab" class="nav-link active" role="tab" data-toggle="tab" aria-controls="tab-insert" id="insert">
                                            <span>Insert from Media Library</span>
                                        </a>
                                    </li>
                                    <li class="" role="presentation">
                                        <a href="#tab-upload" data-toggle="tab" class="nav-link" role="tab" data-toggle="tab" aria-controls="tab-upload" id="upload">
                                            <span>Upload from Local Disk</span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content" style="overflow-y : auto; overflow-x:hidden;">
                                    <div class="tab-pane active" id="tab-insert" role="tabpanel">
                                        <table class="table table-striped table-bordered datatable-media-library" width="100%" id="table-media_<?=$id_count;?>">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Image</th>
                                                    <th>Name</th>
                                                    <th>Type</th>
                                                    <th>Size</th>
                                                </tr>
                                            </thead>   
                                        </table>
                                        <script>
                                            $('.datatable-media-library').dataTable({
                                                processing: true,
                                                serverSide: true,
                                                "order": [[ 1, "desc" ]],
                                                ajax: "<?=url('backend/media-library/datatable');?>",
                                                columns: [
                                                    {data: 'id', name: 'id'},
                                                    {data:  'url', render: function ( data, type, row ) {
                                                        url = "<?=url('/')?>";
                                                        var lastPart = data.split("/").pop();
                                                        return "<img data-url='"+url+'/'+data+"' width='40px' src='"+url+'/upload/img/thumbnails/'+lastPart+"' class='img-responsive'>";
                                                    }, orderable: false, searchable: false},				
                                                    {data: 'name', name: 'name'},
                                                    {data: 'type', name: 'type'},
                                                    {data: 'size', name: 'size'},
                                                ],
                                                responsive: true
                                            });
                                        </script>	
                                    </div>
                                    <div class="tab-pane" id="tab-upload" role="tabpanel">
                                        <div class="dataTables_wrapper_popup" role="grid">
                                            <div id="file-upload">
                                                {{ Form::open(['url' => 'backend/media-library/upload', 'method' => 'POST', 'id' => 'fileupload', 'class' => 'form-horizontal form-label-left', 'files' => true]) }}
                                                <div class="fileupload-buttonbar">
                                                        <!-- The fileinput-button span is used to style the file input field as button -->
                                                        <div class="btn btn-success fileinput-button">
                                                            <i class="glyphicon glyphicon-plus"></i>
                                                            <span>Add files...</span>
                                                            <input type="file" name="files[]" multiple>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary start">
                                                            <i class="glyphicon glyphicon-upload"></i>
                                                            <span>Start upload</span>
                                                        </button>
                                                        <button type="reset" class="btn btn-warning cancel">
                                                            <i class="glyphicon glyphicon-ban-circle"></i>
                                                            <span>Cancel upload</span>
                                                        </button>
                                                        Max file size : 1Mb
                                                        <!-- The global file processing state -->
                                                        <span class="fileupload-process"></span>
                                                </div>
                                                <div class="table-content" style="overflow:auto">
                                                    <!-- The table listing the files available for upload/download -->
                                                    <table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>
                                                </div>
                                                {{ Form::close() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </section>
            <!-- The template to display files available for upload -->
            <script id="template-upload" type="text/x-tmpl">
            {% for (var i=0, file; file=o.files[i]; i++) { %}
                <tr class="template-upload">
                    <td class="preview"><span class=""></span></td>
                    <td class="name"><span>{%=file.name%}</span></td>
                    <td class="size"><span>{%=o.formatFileSize(file.size)%}</span></td>
                    {% if (file.error) { %}
                        <td class="error" colspan="2"><span class="label label-important">{%=locale.fileupload.error%}</span> {%=locale.fileupload.errors[file.error] || file.error%}</td>
                    {% } else if (o.files.valid && !i) { %}
                        <td>
                            <div class="progress progress-success progress-striped active"><div class="progress-bar progress-bar-success bar" style="width:0%;"></div></div>
                        </td>
                        <td class="start">{% if (!o.options.autoUpload) { %}
                            <button class="btn btn-primary start">
                                <i class="glyphicon glyphicon-upload"></i>
                                <span>{%=locale.fileupload.start%}</span>
                            </button>
                        {% } %}</td>
                    {% } else { %}
                        <td colspan="2"></td>
                    {% } %}
                    <td class="cancel">{% if (!i) { %}
                        <button class="btn btn-warning cancel">
                            <i class="glyphicon glyphicon-ban-circle"></i>
                            <span>{%=locale.fileupload.cancel%}</span>
                        </button>
                    {% } %}</td>
                </tr>
            {% } %}
            </script>
                

            <!-- The template to display files available for download -->
            <script id="template-download" type="text/x-tmpl">
            {% for (var i=0, file; file=o.files[i]; i++) { %}
                <tr class="template-download">
                    {% if (file.error) { %}
                        <td></td>
                        <td class="name"><span>{%=file.name%}</span></td>
                        <td class="size"><span>{%=o.formatFileSize(file.size)%}</span></td>
                        <td class="error" colspan="2"><span class="label label-important">{%=locale.fileupload.error%}</span> {%=locale.fileupload.errors[file.error] || file.error%}</td>
                    {% } else { %}
                        <td class="preview">{% if (file.thumbnail_url) { %}
                            <a href="#" title="{%=file.name%}" rel="gallery" download="{%=file.name%}"><img src="{%=file.thumbnail_url%}"></a>
                        {% } %}</td>
                        <td class="name">
                            <a href="#" title="{%=file.name%}" rel="{%=file.thumbnail_url&&'gallery'%}" download="{%=file.name%}">{%=file.name%}</a>
                        </td>
                        <td class="size"><span>{%=o.formatFileSize(file.size)%}</span></td>
                        <td colspan="3"></td>
                    {% } %}        
                </tr>
            {% } %}
            </script>

            <!-- The localization script -->
            <script src="<?=url('asset/bower_components/blueimp/js/locale.js');?>"></script>
            <!-- The main application script -->
            <script src="<?=url('asset/bower_components/blueimp/js/main.js');?>"></script>
            <!-- panggil ckeditor.js -->
            <script type="text/javascript" src="<?=url('asset/bower_components/ckeditor/ckeditor.js');?>"></script>
            <!-- panggil adapter jquery ckeditor -->
            <script type="text/javascript" src="<?=url('asset/bower_components/ckeditor/adapters/jquery.js');?>"></script>
            <script>
                $( document ).ready(function() {
                    $('#table-media_<?php echo $id_count; ?> tbody').on('click', 'tr', function(e){
                        e.preventDefault();
                        var alt = $(this).find('td').next().next().html();
                        window.opener.CKEDITOR.tools.callFunction(<?php echo $_GET["CKEditorFuncNum"]; ?>, $(this).find('td').next().find('img').attr('data-url'),function() {
                                                                // Get the reference to a dialog window.
                                                                var element, dialog = this.getDialog();
                                                                // Check if this is the Image dialog window.
                                                                if (dialog.getName() == 'image') {
                                                                    // Get the reference to a text field that holds the "alt" attribute.
                                                                    element = dialog.getContentElement( 'info', 'txtAlt' );
                                                                    // Assign the new value.
                                                                    if ( element )
                                                                    element.setValue(alt);
                                                                }}
                        );
                        window.close();
                    });	
                    $('div#content-popup').on("click", 'a#insert', function(e){
                        $('.datatable-media-library').DataTable().fnDestroy();
                        $('.datatable-media-library tbody').empty();
                        $('.datatable-media-library').DataTable({
                            processing: true,
                            serverSide: true,
                            "order": [[ 0, "desc" ]],
                            ajax: "<?=url('backend/media-library/datatable');?>",
                            columns: [
                                {data: 'id', name: 'id'},
                                {data:  'url', render: function ( data, type, row ) {
                                    url = "<?=url('/')?>";
                                    var lastPart = data.split("/").pop();
                                    return "<img data-url='"+url+'/'+data+"' width='40px' src='"+url+'/upload/img/thumbnails/'+lastPart+"' class='img-responsive'>";
                                }, orderable: false, searchable: false},				
                                {data: 'name', name: 'name'},
                                {data: 'type', name: 'type'},
                                {data: 'size', name: 'size'},
                            ],
                            responsive: true
                        });
                    });
                });
            </script>
        </div>
    </body>
</html>    