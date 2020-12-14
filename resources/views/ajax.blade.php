<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"rel = "stylesheet">

    <style>
        section{
            padding:80px;
        }
        form{
            padding:20px;
        }
        /* input{
            margin-bottom: 10px;
        } */
    </style>
    
</head>
<body>

<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5">
                    <div class="form-group">
                        <label for="name"><h6>Search Player By Name </h6></label>
                        <input type="text" id="search" placeholder="Search here.." class="form-control">
                        
                    </div>
                <br>
                <h4>ADD Player</h4>    
                <form>
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" id="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="name">Age:</label>
                            <input type="number" id="age" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="name">Date Of Birth:</label>
                            <input type="date" id="birth" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="name">ICC Ranking Of Test:</label>
                            <input type="text" id="test" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="name">ICC Ranking Of ODI:</label>
                            <input type="text" id="odi" class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <label for="name">ICC Ranking Of T20:</label>
                            <input type="text" id="t20" class="form-control">
                        </div>
                    <a class="btn btn-info mx-auto text-center" id="show" >Save</a>
                </form>
            </div>

            <div class="col-md-7 data">
                <h4>Player List</h4>
                <br>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">Name</th>
                                <th class="text-center">Age</th>
                                <th class="text-center">Date Of Birth</th>
                                <th class="text-center">Test Ranking</th>
                                <th class="text-center">ODI Ranking</th>
                                
                                <th class="text-center">T20 Ranking</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody class="emdata" id="sortable">
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>



<div class="modal fade" id="editMember" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="exampleModalLongTitle">Edit Player</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="{{url('/update-player')}}" method="post">
      @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="ename" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="name">Age:</label>
            <input type="number" id="eage" name="age" class="form-control">
        </div>
        <div class="form-group">
            <label for="name">Date Of Birth:</label>
            <input type="date" id="ebirth" name="birth" class="form-control">
        </div>
        <div class="form-group">
            <label for="name">ICC Ranking Of ODI:</label>
            <input type="text" id="eodi" name="rankingOfODI" class="form-control">
        </div>
        <div class="form-group">
            <label for="name">ICC Ranking Of Test:</label>
            <input type="text" id="etest" name="rankingOfTest" class="form-control">
        </div>
        <div class="form-group">
            <label for="name">ICC Ranking Of T20:</label>
            <input type="text" id="et20" name="rankingOfT20" class="form-control">
        </div>
        <input type="hidden" id="ehidden" name="hdn">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button id="change" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>


<!-- Modal -->
<!-- <div class="modal fade" id="editMember" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> -->

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"></script>
<script src="https://cdn.tutorialjinni.com/toastr.js/2.1.4/toastr.min.js"></script>

<script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script>
    toastr.options = {
        "closeButton": true,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        function getMember() {
           
            $.ajax({
                         type:'get',
                         url:"{{ url('/getEmployee') }}",
                         data:{
                             },
                         success:function(data){
                             console.log(data);
                            $('.emdata').empty();

                                for(var i=0; i<data.length;i++){
                                    var tr = '<tr id="ed"><td class="text-center">'+data[i]["name"]+'</td><td class="text-center">'+data[i]["age"]+'</td><td class="text-center">'+data[i]["birth"]+'</td><td class="text-center">'+data[i]["rankingOfTest"]+'</td><td class="text-center">'+data[i]["rankingOfODI"]+'</td><td class="text-center">'+data[i]["rankingOfT20"]+'</td><td><div id="action" class="button-group"><a data-id="'+data[i]['id']+'" id="delete" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a><a data-id="'+data[i]['id']+'" id="edit"data-toggle="modal" data-target="#editMember" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a></div></td></tr>';
                                $('.emdata').append(tr);

                            }
                         }   
            }); 
        };
        getMember();
        $("#search").keyup(function(){
            var item = $(this).val();
            console.log(item)
            $.ajax({
                         type:'get',
                         url:"{{ url('/search') }}",
                         data:{
                             item:item
                             },
                         success:function(data){
                             console.log(data);
                            $('.emdata').empty();

                                for(var i=0; i<data.length;i++){
                                var tr = '<tr id="ed"><td class="text-center">'+data[i]["name"]+'</td><td class="text-center">'+data[i]["age"]+'</td><td class="text-center">'+data[i]["birth"]+'</td><td class="text-center">'+data[i]["rankingOfTest"]+'</td><td class="text-center">'+data[i]["rankingOfODI"]+'</td><td class="text-center">'+data[i]["rankingOfT20"]+'</td><td><div id="action" class="button-group"><a data-id="'+data[i]['id']+'" id="delete" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a><a data-id="'+data[i]['id']+'" id="edit" data-toggle="modal" data-target="#editMember" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a></div></td></tr>';

                                $('.emdata').append(tr);

                            }
                         }   
            }); 
        });
      
        
        
        $('#show').click(function(){
            var name = $('#name').val();
            var age = $('#age').val();
            var birth = $('#birth').val();
            var odi = $('#odi').val();
            var test = $('#test').val();
            var t20 = $('#t20').val();
            // swal({
            //     title: "wrong job!",
            //     text: "You clicked the button!",
            //     icon: "error",
            //     });
            $.ajax({
                         type:'get',
                         url:"{{ url('/save-member') }}",
                         data:{
                            name:name,
                            age:age,
                            birth:birth,
                            odi:odi,
                            test:test,
                            t20:t20,
                            },
                         success:function(data){
                            toastr.success('Save successfully');
                            getMember();
                            $('#name').val('');
                            $('#age').val('');
                            $('#profession').val('');
                         }   
                }); 
            
        });

        $(document).on('click','#delete',function(){
            var id = $(this).data('id');
            $.ajax({
                         type:'get',
                         url:"{{ url('/delete-member') }}",
                         data:{
                            id:id
                            },
                         success:function(data){
                            toastr.success('Delete successfully');
                            getMember();
                           
                         }   
                }); 
           
       });
       
       

       $('#change').click(function(){
            var name = $('#ename').val();
            var age = $('#eage').val();
            var profession = $('#eprofession').val();
            var id = $('#hidden').val();
        
            if( name != null && age != null && profession != null){
            $.ajax({
                         type:'get',
                         url:"{{ url('/update-member') }}",
                         data:{
                            id:id,
                            name:name,
                            age:age,
                            profession:profession
                            },
                         success:function(data){
                            toastr.success('Updated successfully');
                            $('#editModal').modal('toggle');
                            getMember();
                           
                         }   
                }); 
            }else{
                swal({
                title: "wrong",
                text: "Please fill all the blanks !",
                icon: "warning",
                });
            }
            
        });

       $(document).on('click','#edit',function(){
            var id = $(this).data('id');
         
            $.ajax({
                         type:'get',
                         url:"{{ url('/edit-player') }}",
                         data:{
                            id:id
                            },
                         success:function(data){
                            $('#ename').val(data['name']);
                            $('#eage').val(data['age']);
                            $('#ebirth').val(data['birth']);
                            $('#eodi').val(data['rankingOfODI']);
                            $('#etest').val(data['rankingOfTest']);
                            $('#et20').val(data['rankingOfT20']);
                            $('#ehidden').val(id);
                            
                         }   
                }); 
            
       });

       $("#sortable").sortable({
           distance: 30
       });
        
    });

   

    
</script>
</body>
</html>