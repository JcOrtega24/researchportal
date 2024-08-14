<?php
  include "inc/header.php";

?>
<!-- #Research-->
<section id="intro" class="clearfix">
  <div class="container">
    <h3 style="color:#fff;">&nbsp;<b> Resource Materials Management </b></h3>    
  </div>
</section>
            
<br>

<?php
  if (isset($_GET['del'])) {
    $del = preg_replace("/[^a-zA-Z0-9]/", "", $_GET["del"]);  
    $del  = (int)($del);

    $result = delete_resource($connect,$del);
    if ($result =="1") {
      message("Resource Material deleted successfully!","1");
    }
  }

  if (isset($_GET['edit'])) {
    $result = preg_replace("/[^a-zA-Z0-9]/", "", $_GET["edit"]);  
    $result  = (int)($result);

    if ($result =="1") {
      message("Resource Material updated successfully!","1");
    }
  }

  if (isset($_GET['add'])) {
    $result = preg_replace("/[^a-zA-Z0-9]/", "", $_GET["add"]);  
    $result  = (int)($result);

    if ($result =="1") {
      message("Resource Material created successfully!","1");
    }
  }

  // UPLOAD DATA FROM FORM
  if ($_SERVER['REQUEST_METHOD'] =="POST") {
      // UPLOAD FILE
      if(isset($_FILES['files'])){
        $errors= array();
        $file_name_array = explode('.',$_FILES['files']['name']);
        $file_size =$_FILES['files']['size'];
        $file_tmp =$_FILES['files']['tmp_name'];
        $file_type=$_FILES['files']['type'];
        $file_ext=strtolower(end($file_name_array));
        
        $extensions= array("pdf","txt","docx");
        
        if(in_array($file_ext,$extensions)=== false){
           $errors[]="extension not allowed, please choose a PDF or DOCX file.";
        }
        
        if($file_size > 9097152){
           $errors[]='File size must be less than 9 MB';
        }
        
        if(empty($errors)==true){
          // location
           move_uploaded_file($file_tmp,"../../search/uploads/".$_FILES['files']['name']);
          //  include ""
           $Pdf_file = "uploads/".$_FILES['files']['name']."";
        }else{
           print_r($errors);
        }
      }

      // Get Create Research Result
      if (isset($_POST['create'])) {
        /*if (is_null($_POST["co-authors"])) {
           $c_author = "";
        } 
        else {*/
          foreach($_POST['co-authors'] as $c_author) 
          {
            $c_author = implode(', ',$_POST['co-authors']);
          }
        //}      

        foreach($_POST['tagging'] as $tags) 
        {
          $tags = implode(', ',$_POST['tagging']);
        }

        $result = create_resource($connect,$_POST['title'],$_POST['abstract'],$_POST['author'],$_POST['mtype'],$c_author,$_POST['rtype'],$_POST['rstatus'],$_POST['fstudy'],$_POST['dpub'], $_SESSION['id'], $_POST['created'], $tags, $Pdf_file);
        if ($result == 1) {
          message("Resource Material created successfully!",1);
        } 
        else {
          message("Could not create Research!",0);
        }
      }
  }
?>

<div class="container">
  <!-- Create task button -->
  <!--button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#adding-research"><i class="fa fa-plus"></i></button-->

  <a href="api/creatematerials.php">
    <button type="button" class="btn btn-outline-primary btn-sm">
      <i  class="fa fa-plus"></i>
    </button>
  </a>

  <!-- Refresh Button -->
  <a href="./materials.php">
    <button type="button" class="btn btn-outline-primary btn-sm">
      <i class="fa fa-refresh" aria-hidden="true"></i>
    </button>
  </a>

  <br>
  <br>

  <style>
    .bootstrap-select > .dropdown-toggle.bs-placeholder, .bootstrap-select > .dropdown-toggle.bs-placeholder:hover, .bootstrap-select > .dropdown-toggle.bs-placeholder:focus, .bootstrap-select > .dropdown-toggle.bs-placeholder:active{
      background-color: #fff;
      display: inline-block;
      width: 100%;
      height: calc(1.5em + 0.75rem + 2px);
      padding: 0.375rem 1.75rem 0.375rem 0.75rem;
      font-weight: 400;
      line-height: 1.5;
      vertical-align: middle;
      border: 1px solid #ced4da;
      border-radius: 0.25rem;
      -webkit-box-shadow: none;
    }
    .filter-option > .filter-option-inner{
      size: 3rem;
    }
    .btn-new {margin:0;height:40px;border: solid 1px #ccc;-webkit-box-shadow: none;} 
    .btn-new:hover{-webkit-box-shadow: none;}
  </style>

  <!--Research Table-->
  <div class="table-responsive-lg">
    <table id="research" class="table table-hover">
      <thead>
        <tr>
          <th scope="col" class="d-none">Default Sort Fixer</th>
          <th scope="col">Title</th>
          <th scope="col">Author</th>
          <th scope="col">Resouce Type</th>
          <th scope="col">Date Published</th>
          <th scope="col">Created By</th>
          <th scope="col">Date Created</th>
          <th scope="col" align="center">Option</th>
        </tr>
      </thead>
      <tbody>
      <?php     
        //get author id inside research
        $result = get_resource($connect);
        if ($result->num_rows>0) {
        while ($data = mysqli_fetch_array($result)) {
      ?>
        <tr>
          <td scope="row" class="d-none"></td>
          <td><?php echo $data['title']?></td>
          <td>
            <?php
              $authorResult = get_author($connect);
              if ($authorResult -> num_rows > 0) 
              {
                while ($authors = mysqli_fetch_array($authorResult)) 
                {
                  if($data['author'] == $authors['id'])
                  {
                    echo $authors['name'];
                  }
                }
              }
            ?>
          </td>
          <td><?php echo $data['resource_type']?></td>
          <td><?php echo $data['date_publish']?></td>
          <td>
            <?php
              $accountResult = get_account($connect);
              if ($accountResult -> num_rows > 0) 
              {
                while ($account = mysqli_fetch_array($accountResult)) 
                {
                  if($data['creator'] == $account['id'])
                  {
                    echo $account['name'];
                  }
                }
              }
            ?>
          </td>  
          <td><?php echo $data['created']?></td>

          <!-- Action Column -->
          <td>
            <div class="dropdown"  style="float:left">
              <button class="btn btn-light btn-sm" type="button" id="option" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-ellipsis-h"></i>
              </button>
              <div class="dropdown-menu" aria-labelledby="option">
                <a class="dropdown-item" href="./api/action.php?edit=<?php echo $data['id']?>">Edit</a>
                <?php if ($_SESSION['role']=="Administrator") {?><a class="dropdown-item" href="#<?php echo $data['id'];?>" data-toggle="modal" data-target="#delete-<?php echo $data['id'];?>">Delete</a><?php } ?>
              </div>
            </div>
          </td>
        </tr>
      <!-- Delete Popup -->
      <div style="margin-top: 200px;width: 30%;margin-left: 35%;margin-right: 35%;" class="modal fade" id="delete-<?php echo $data['id'];?>" tabindex="-1" role="dialog" aria-labelledby="deleteLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="deleteLabel">Delete Material</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Are you sure you want to delete?
            </div>
            <div class="modal-footer">
              <a href="?del=<?php echo $data['id'];?>"><button class="btn btn-success" type="button">Save</button></a>
              <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
          </div>
        </div>
      </div>
      <?php
          }
        }
      ?>
    </tbody> <!-- search is in tbody -->
    </table>
    <!-- <div class="col-md-12 text-center"> -->
    <ul class="pagination pagination-lg pager" id="myPager"></ul>
  </div>
</div>

<script src="../resource/assets/datatables.min.js"></script>
<script src="../research/script/main.js"></script>

<script>
  $(document).ready(function () {
    $('#myBox').on('show.bs.modal', function (event) {
      $(this).data('bs.modal')._config.backdrop = 'static';               
      $(this).data('bs.modal'). _config.keyboard = false;
    });
  });
</script>

<script>
//   $(document).ready(function () {
//     $('#myTable').pageMe({
//       pagerSelector:'#myPager',
//       showPrevNext:true,
//       hidePageNumbers:false,
//       perPage:4});
// });
  $(function() {
    $('#research').DataTable();
    $(function() {
      var table = $('#example').DataTable({
        "columnDefs": [{
          "visible": false,
          "targets": 2
        }],
        "ordering": false,
        "displayLength": 25,
        "drawCallback": function(settings) {
          var api = this.api();
          var rows = api.rows({
            page: 'current'
          }).nodes();
          var last = null;
          api.column(2, {
            page: 'current'
          }).data().each(function(group, i) {
            if (last !== group) {
              $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
              last = group;
            }
          });
         }
      });

      // Order by the grouping
      $('#example tbody').on('click', 'tr.group', function() {
        var currentOrder = table.order()[0];
        if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
          able.order([2, 'desc']).draw();
        } else {
          table.order([2, 'asc']).draw();
        }
      });
    });
  });
  $('#example23').DataTable({
    dom: 'Bfrtip',
    buttons: [
    'copy', 'csv', 'excel', 'pdf', 'print'
    ]
  });
  $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary mr-1');

  (function() {
    'use strict';
    window.addEventListener('load', function() {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
  })();

  //Timer for message
  $('.alert').delay(3000).fadeOut('slow',function() { $(this).remove(); });
</script>