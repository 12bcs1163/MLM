<?php include'head.php' ?>
                
                <!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Used Pin</h2>
                </div>
                <!-- END PAGE TITLE -->                
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                    
                    
                    <div class="row">
                        <div class="col-md-12">
                            
                            <!-- START DATATABLE EXPORT -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Used Pin </h3>
                                    <div class="btn-group pull-right">
                                        <button class="btn btn-danger dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i> Export Data</button>
                                        <ul class="dropdown-menu">
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'json',escape:'false'});"><img src='img/icons/json.png' width="24"/> JSON</a></li>
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'json',escape:'false',ignoreColumn:'[2,3]'});"><img src='img/icons/json.png' width="24"/> JSON (ignoreColumn)</a></li>
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'json',escape:'true'});"><img src='img/icons/json.png' width="24"/> JSON (with Escape)</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'xml',escape:'false'});"><img src='img/icons/xml.png' width="24"/> XML</a></li>
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'sql'});"><img src='img/icons/sql.png' width="24"/> SQL</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'csv',escape:'false'});"><img src='img/icons/csv.png' width="24"/> CSV</a></li>
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'txt',escape:'false'});"><img src='img/icons/txt.png' width="24"/> TXT</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'excel',escape:'false'});"><img src='img/icons/xls.png' width="24"/> XLS</a></li>
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'doc',escape:'false'});"><img src='img/icons/word.png' width="24"/> Word</a></li>
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'powerpoint',escape:'false'});"><img src='img/icons/ppt.png' width="24"/> PowerPoint</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'png',escape:'false'});"><img src='img/icons/png.png' width="24"/> PNG</a></li>
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'pdf',escape:'false'});"><img src='img/icons/pdf.png' width="24"/> PDF</a></li>
                                        </ul>
                                    </div>                                    
                                    
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table id="customers2" class="table datatable">
                                            <thead>
                                                <tr>
                                                    <th>E-pin</th>
                                                    <th>Date</th>
                                                    <th>Product Id</th>
                                                    <th>Used Id</th>
                                                    <th>Used Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>123456</td>
                                                    <td>2011/04/25</td>
                                                    <td>123456</td>
                                                    <td>513</td>
                                                    <td>2011/04/25</td>
                                                </tr>
                                                <tr>
                                                    <td>123456</td>
                                                    <td>2011/04/25</td>
                                                    <td>123456</td>
                                                    <td>513</td>
                                                    <td>2011/04/25</td>
                                                </tr>
                                                <tr>
                                                    <td>123456</td>
                                                    <td>2011/04/25</td>
                                                    <td>123456</td>
                                                    <td>513</td>
                                                    <td>2011/04/25</td>
                                                </tr>
                                                <tr>
                                                    <td>123456</td>
                                                    <td>2011/04/25</td>
                                                    <td>123456</td>
                                                    <td>513</td>
                                                    <td>2011/04/25</td>
                                                </tr>
                                                <tr>
                                                    <td>123456</td>
                                                    <td>2011/04/25</td>
                                                    <td>123456</td>
                                                    <td>513</td>
                                                    <td>2011/04/25</td>
                                                </tr>
                                                <tr>
                                                    <td>123456</td>
                                                    <td>2011/04/25</td>
                                                    <td>123456</td>
                                                    <td>513</td>
                                                    <td>2011/04/25</td>
                                                </tr>
                                                <tr>
                                                    <td>123456</td>
                                                    <td>2011/04/25</td>
                                                    <td>123456</td>
                                                    <td>513</td>
                                                    <td>2011/04/25</td>
                                                </tr>
                                                <tr>
                                                    <td>123456</td>
                                                    <td>2011/04/25</td>
                                                    <td>123456</td>
                                                    <td>513</td>
                                                    <td>2011/04/25</td>
                                                </tr>
                                                <tr>
                                                    <td>123456</td>
                                                    <td>2011/04/25</td>
                                                    <td>123456</td>
                                                    <td>513</td>
                                                    <td>2011/04/25</td>
                                                </tr>
                                                <tr>
                                                    <td>123456</td>
                                                    <td>2011/04/25</td>
                                                    <td>123456</td>
                                                    <td>513</td>
                                                    <td>2011/04/25</td>
                                                </tr>
                                                <tr>
                                                    <td>123456</td>
                                                    <td>2011/04/25</td>
                                                    <td>123456</td>
                                                    <td>513</td>
                                                    <td>2011/04/25</td>
                                                </tr>
                                                <tr>
                                                    <td>123456</td>
                                                    <td>2011/04/25</td>
                                                    <td>123456</td>
                                                    <td>513</td>
                                                    <td>2011/04/25</td>
                                                </tr>
                                               
                                            </tbody>
                                        </table>                                    
                                    </div>
                                </div>
                            </div>
                            <!-- END DATATABLE EXPORT -->                            
                            
                            <!-- START DEFAULT TABLE EXPORT -->
                           
                            <!-- END DEFAULT TABLE EXPORT -->

                        </div>
                    </div>

                </div>         
                <!-- END PAGE CONTENT WRAPPER -->
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->    

        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-remove-row">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-times"></span> Remove <strong>Data</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to remove this row?</p>                    
                        <p>Press Yes if you sure.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <button class="btn btn-success btn-lg mb-control-yes">Yes</button>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->        
        
        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to log out?</p>                    
                        <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="pages-login.html" class="btn btn-success btn-lg">Yes</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->

        <!-- START PRELOADS -->
        <audio id="audio-alert" src="audio/alert.mp3" preload="auto"></audio>
        <audio id="audio-fail" src="audio/fail.mp3" preload="auto"></audio>
        <!-- END PRELOADS -->                      
<?php include'footer.php' ?>