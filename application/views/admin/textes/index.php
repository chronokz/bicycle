<?php echo View::make('admin.inc.meta', get_defined_vars() )->render()?>
    <title><?php echo ADMIN_TITLE?></title>
  </head>
  <body>
    <?php echo View::make('admin.inc.header', get_defined_vars() )->render()?>
    <div class="container">

      <div class="row-fluid">

        <div class="span3"> <!-- Sidebar -->
          <div class="well">
            <?php echo View::make('admin.inc.sidebar', get_defined_vars() )->render()?>
          </div>
        </div> <!-- /Sidebar -->

        <div class="span9">
          <h1>Textes</h1>
          <p>You can create text for photocards here.</p>
          <?php echo Messages::get_html()?>
          <?php
            if($textes){
              echo '<table class="table table-striped table-bordered table-condensed">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Text</th>
                  <th>Actions</th>
                </tr>
              </thead><tbody>
              ';
              foreach($textes as $page){
                echo '<tr>
                  <td>'.$page->id.'</td>
                  <td>'.Str::limit($page->text, 50).'</td>
                  <td><a class="btn btn-primary" href="'.action('admin.textes@edit', array($page->id)).'">Edit</a> <a class="delete_toggler btn btn-danger" rel="'.$page->id.'">Delete</a></td>
                </tr>';
              }
              echo '</tbody></table>';
            }else{
          ?>
            <div class="well">No textes today. Why not create one using the button below.</div>
          <?php
            }
          ?>
          <a href="<?php echo action('admin.textes@create')?>" class="btn btn-primary right">New Text</a>
        </div>

      </div>

    </div> <!-- /container -->
    <div class="modal hide fade" id="delete_page">
      <div class="modal-header">
        <a class="close" data-dismiss="modal">×</a>
        <h3>Are You Sure?</h3>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete this page?</p>
      </div>
      <div class="modal-footer">
        <?php echo Form::open('admin/textes/delete', 'POST')?>
        <a data-toggle="modal" href="#delete_page" class="btn">Keep</a>
        <input type="hidden" name="id" id="postvalue" value="" />
        <input type="submit" class="btn btn-danger" value="Delete" />
        <?php echo Form::close()?>
      </div>
    </div>
    <?php echo View::make('admin.inc.scripts', get_defined_vars() )->render()?>
    <script>
      $('#delete_page').modal({
        show:false
      }); // Start the modal

      // Populate the field with the right data for the modal when clicked
      $('.delete_toggler').each(function(index,elem) {
          $(elem).click(function(){
            $('#postvalue').attr('value',$(elem).attr('rel'));
            $('#delete_page').modal('show');
          });
      });
    </script>
  </body>
</html>
