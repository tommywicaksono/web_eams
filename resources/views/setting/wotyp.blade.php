@extends('layout.newlayout')
@section('content-header')
      <div class="container-fluid">
        <div class="row">          
          <div class="col-sm-4">
            <h1 class="m-0 text-dark">Failure Type Maintenance</h1>
          </div>    
        </div><!-- /.row -->
        <div class="col-md-12">
          <hr>
        </div>
        <div class="row">                 
          <div class="col-sm-2">    
            <button class="btn btn-block btn-primary" data-toggle="modal" data-target="#createModal">Failure Type Create</button>
          </div><!-- /.col -->  
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
@endsection
@section('content')

<!--FORM Search Disini -->
<div class="container-fluid mb-2">
<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
<li class="nav-item has-treeview bg-black">
<a href="#" class="nav-link mb-0 p-0"> 
<p>
  <label class="col-md-2 col-form-label text-md-left" style="color:white;">{{ __('Click here to search') }}</label>
  <i class="right fas fa-angle-left"></i>
</p>
</a>
<ul class="nav nav-treeview">
<li class="nav-item">
<form action="/wotyp" method="GET"/>
<div class="col-12 form-group row">
    <div class="col-12 form-group row">
        <label for="s_code" class="col-md-2 col-sm-2 col-form-label text-md-right">Failure Type Code</label>
        <div class="col-md-4 mb-2 input-group">
            <input id="s_code" type="text" class="form-control" name="s_code"
            value="" autofocus autocomplete="off"/>
        </div>
        <label for="s_desc" class="col-md-2 col-sm-2 col-form-label text-md-right">Failure type Description</label>
        <div class="col-md-4 mb-2 input-group">
            <input id="s_desc" type="text" class="form-control" name="s_desc"
            value="" autofocus autocomplete="off"/>
        </div>
        <label for="btnsearch" class="col-md-2 col-sm-2 col-form-label text-md-left">{{ __('') }}</label>
        <div class="col-md-2 mb-2 input-group">
            <button class="btn btn-block btn-primary" id="btnsearch"/>Search</button>
        </div>
        <div class="col-md-2 col-sm-12 mb-2 input-group">
            <button class="btn btn-block btn-primary" style="width: 40px !important" id='btnrefresh' /><i class="fas fa-sync-alt"></i></button>
        </div>
        <input type="hidden" id="tmpcode"/>
        <input type="hidden" id="tmpdesc"/>
    </div>
</div>
</form>
</li>
</ul>
</li>
</ul>
</div>

<!-- Bagian Searching -->
<div class="col-md-12"><hr></div>

<div class="table-responsive col-12">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th width="30%">Failure Type Code</th>
                <th width="60%">Description</th>
                <th width="10%">Action</th>  
            </tr>
        </thead>
        <tbody>
            @foreach($data as $show)
         <tr>
            <td>{{$show->wotyp_code}}</td>
            <td>{{$show->wotyp_desc}}</td>
            <td>
            <a href="" class="editModal" 
               data-desc= "{{$show->wotyp_desc}}" data-toggle='modal' data-code ="{{$show->wotyp_code}}" data-target="#editModal"><i class="fas fa-edit"></i></button>
            <a href="" class="deleteModal" 
               data-desc= "{{$show->wotyp_desc}}" data-toggle='modal' data-code ="{{$show->wotyp_code}}"
               data-toggle='modal' data-target="#deleteModal"><i class="fas fa-trash-alt"></i></button>               			
   
         </td>
         </tr>
         @endforeach
        </tbody>
    </table>
    <input type="hidden" name="hidden_page" id="hidden_page" value="1"/>
    <input type="hidden" name="hidden_column_name" id="hidden_column_name" value="wotyp_code"/>
    <input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="asc" />
</div>

<!-- Modal Create -->
<div class="modal fade" id="createModal" role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLabel">Failure Type Create</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" method="post" action="/createwotyp">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="t_code" class="col-md-4 col-form-label text-md-right">Code 
                            <span id="alert1" style="color: red; font-weight: 200;">*</span> </label>
                        <div class="col-md-6">
                            <input id="t_code" type="text" class="form-control" name="t_code" autocomplete="off" autofocus maxlength="10" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="t_desc" class="col-md-4 col-form-label text-md-right">Description 
                            <span id="alert1" style="color: red; font-weight: 200;">*</span> </label>
                        <div class="col-md-6">
                            <input id="t_desc" type="text" class="form-control" name="t_desc" autocomplete="off" autofocus maxlength="50" required/>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info bt-action" id="btnclose" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success bt-action" id="btncreate">Save</button> 
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="editModal" role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title text-center" id="exampleModalLabel">Failure Type Modify</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <form class="form-horizontal" method="post" action="/editwotyp">
            {{ csrf_field() }}
            <div class="modal-body">
                <div class="form-group row">
                    <label for="te_code" class="col-md-4 col-form-label text-md-right">Code</label>
                    <div class="col-md-6">
                        <input id="te_code" type="text" class="form-control" name="te_code" autocomplete="off" autofocus readonly/>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="te_desc" class="col-md-4 col-form-label text-md-right">Description 
                        <span id="alert1" style="color: red; font-weight: 200;">*</span> </label>
                    <div class="col-md-6">
                        <input id="te_desc" type="text" class="form-control" name="te_desc" autocomplete="off" autofocus maxlength="50" required/>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info bt-action" id="e_btnclose" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success bt-action" id="btnedit">Save</button>
            </div>
        </form>
    </div>
    </div>
</div>

<!-- Modal Delete -->
<div class="modal fade" id="deleteModal" role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title text-center" id="exampleModalLabel">Failure Type Delete</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form class="form-horizontal" method="post" action="/deletewotyp">
                {{ csrf_field() }}
                <div class="modal-body">
                    <input type="hidden" id="d_code" name="d_code">
                    WO Type  <b><span id="td_code"></span> -- <span id="td_desc"></span></b> ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info bt-action" id="e_btnclose" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success bt-action" id="btndelete">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')

    <script>
        function resetSearch() {
            $('#s_code').val('');
            $('#s_desc').val('');
        }

        $(document).on('click', '#btnrefresh', function() {
            resetSearch();
        });    

        $(document).on('click','.editModal',function(){ // Click to only happen on announce links
           //alert('tst');
           var code = $(this).data('code');
           var desc = $(this).data('desc');

           document.getElementById('te_code').value = code;
           document.getElementById('te_desc').value = desc;
        });

       $(document).on('click', '.deleteModal', function(e){
            $('#deleteModal').modal('show');
            var code = $(this).data('code');
            var desc = $(this).data('desc');

            document.getElementById('d_code').value      = code;
            document.getElementById('td_code').innerHTML = code;
            document.getElementById('td_desc').innerHTML = desc;
       });

       
    </script>
@endsection