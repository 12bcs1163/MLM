<?php include("header.php"); ?>

    <div class="slim-mainpanel">
      <div class="container">
        <div class="slim-pageheader">
          <ol class="breadcrumb slim-breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
          </ol>
          <h6 class="slim-pagetitle">Leads</h6>
        </div><!-- slim-pageheader -->

    
    <!-- ++++++++++++++ TREE ++++++++++++++++++++ -->
    <div class="section-wrapper">
        <div class="table-responsive">
            
            <?php include("tree_only.php"); ?>
            
            
             </div>
</div>
      </div><!-- container -->
    </div><!-- slim-mainpanel -->

<?php include("footer.php"); ?>