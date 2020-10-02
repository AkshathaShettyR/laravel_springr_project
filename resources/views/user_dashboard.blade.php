<!doctype html>
<html class="fixed">
<head>

    <!-- Basic -->
    <meta charset="UTF-8">

    <title>Dashboard</title>
    <meta name="keywords" content="" />
    <meta name="description" content="">
    <meta name="author" content="okler.net">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- Web Fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="/assets/vendor/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="/assets/vendor/animate/animate.css">

    <link rel="stylesheet" href="/assets/vendor/font-awesome/css/font-awesome.css" />
    <link rel="stylesheet" href="/assets/vendor/magnific-popup/magnific-popup.css" />
    <link rel="stylesheet" href="/assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css" />

    <!-- Specific Page Vendor CSS -->
    <link rel="stylesheet" href="/assets/vendor/select2/css/select2.css" />
    <link rel="stylesheet" href="/assets/vendor/select2-bootstrap-theme/select2-bootstrap.min.css" />
    <link rel="stylesheet" href="/assets/vendor/datatables/media/css/dataTables.bootstrap4.css" />
    <link rel="stylesheet" href="/assets/vendor/jquery-ui/jquery-ui.css" />
    <link rel="stylesheet" href="/assets/vendor/jquery-ui/jquery-ui.theme.css" />
    <link rel="stylesheet" href="/assets/vendor/select2/css/select2.css" />
    <link rel="stylesheet" href="/assets/vendor/select2-bootstrap-theme/select2-bootstrap.min.css" />
    <link rel="stylesheet" href="/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css" />
    <link rel="stylesheet" href="/assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css" />
    <link rel="stylesheet" href="/assets/vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.css" />
    <link rel="stylesheet" href="/assets/vendor/bootstrap-timepicker/css/bootstrap-timepicker.css" />
    <link rel="stylesheet" href="/assets/vendor/dropzone/basic.css" />
    <link rel="stylesheet" href="/assets/vendor/dropzone/dropzone.css" />
    <link rel="stylesheet" href="/assets/vendor/bootstrap-markdown/css/bootstrap-markdown.min.css" />
    <link rel="stylesheet" href="/assets/vendor/summernote/summernote-bs4.css" />
    <link rel="stylesheet" href="/assets/vendor/codemirror/lib/codemirror.css" />
    <link rel="stylesheet" href="/assets/vendor/codemirror/theme/monokai.css" />
    <link rel="stylesheet" href="/assets/vendor/pnotify/pnotify.custom.css" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="/assets/css/theme.css" />

    <!-- Skin CSS -->
    <link rel="stylesheet" href="/assets/css/skins/default.css" />

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="/assets/css/custom.css">

    <!-- Head Libs -->
    <script src="/assets/vendor/modernizr/modernizr.js"></script>



</head>
<body>
<section class="body">

    <!-- start: header -->
    <header class="header">
        <div class="logo-container">
            <a href="#" class="logo">
                <img src="/assets/img/original.jpg" width="40" height="auto" alt="Dashboard" />
            </a>
            <div class="d-md-none toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
                <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
            </div>
        </div>

        <!-- start: search & user box -->
        <div class="header-right">
            <span class="separator"></span>


            <div id="userbox" class="userbox">
                <a href="#" data-toggle="dropdown">
                    <figure class="profile-picture">
                        <img src="/assets/img/original.jpg" alt="Joseph Doe" class="rounded-circle" data-lock-picture="img/!logged-user.jpg" />
                    </figure>
                    <div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@okler.com">

{{--                        <span class="name">{{$username}}</span>--}}
{{--                        <span class="role">{{$role}}</span>--}}


                    </div>

                    <i class="fa custom-caret"></i>
                </a>

                <div class="dropdown-menu">
                    <ul class="list-unstyled mb-2">
                        <li class="divider"></li>

                        <li>
                            <a role="menuitem" tabindex="-1" href="logout"><i class="fa fa-power-off"></i> Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- end: search & user box -->
    </header>
    <!-- end: header -->

    <div class="inner-wrapper">
        <section role="main" class="container">


                @if(session()->has('error'))
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{ session()->get('error') }}
                    </div>
                @endif
                {{--if msg if success_message--}}
                @if(session()->has('success'))
                    <div class="alert alert-primary">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{ session()->get('success') }}
                    </div>
            @endif
            <!-- start: page -->
            <div class="row">
                <div class="col-lg-12">
                    <!-- Modal add Form -->
                    <div id="modalForm" class="modal-block modal-block-primary mfp-hide">
                        <form method="post" action="/add" enctype="multipart/form-data">
@csrf
                            <section class="card">
                                <div class="modal-content">
                                    <div class="card-body">
                                        <header class="center">
                                            <h2 class="card-title">Add User Record</h2>
                                        </header>
                                        <div class="form-group row"></div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 control-label text-lg-right pt-2" for="email">Email</label>
                                            <div class="col-lg-6">
                                            <input type="text" class="form-control" id="email" name="email" required>
                                        </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 control-label text-lg-right pt-2"for="full_name">Full Name</label>
                                            <div class="col-lg-6">
                                            <input type="text" class="form-control" id="full_name" name="full_name" required>
                                        </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 control-label text-lg-right pt-2">Date Of Joining</label>
                                            <div class="col-lg-6">
                                                <div class="input-group">
											<span class="input-group-addon">
												<i class="fa fa-calendar"></i>
											</span>
                                                    <input type="date" name="DOJ" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 control-label text-lg-right pt-2">Date Of leaving</label>
                                            <div class="col-lg-6">
                                                <div class="input-group">
											<span class="input-group-addon">
												<i class="fa fa-calendar"></i>
											</span>
                                                    <input type="date" name="DOL" class="form-control" required>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 control-label text-lg-right pt-2">Date Of Joining</label>
                                            <div  class="checkbox">
                                                <label><input type="checkbox" name="work" value="1">   Still Working</label>
                                                <label><input type="checkbox" name="work" value="2">   Not Working</label>
                                            </div>

                                            </div>


                                        <div class="form-group row">
                                            <label class="col-lg-3 control-label text-lg-right pt-2">Upload Image</label>
                                            <div class="col-lg-6">
                                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                                    <div class="input-append">

                                                    <span class="btn btn-default btn-file">
                                                            <span class="fileupload-exists"></span>
                                                            <span class="fileupload-new"></span>
                                                            <input type="file" id="image" name="image" required/>
                                                    </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row"></div>
                                        <footer class="card-footer">
                                            <div class="row">
                                                <div class="col-md-12 text-right">
                                                    <button type="submit" class="btn btn-primary ">submit</button>
                                                    <button class="btn btn-default modal-dismiss">Cancel</button>
                                                </div>
                                            </div>
                                        </footer>


                                    </div>
                                </div>
                            </section>
                        </form>
                    </div>

                    <!-- Modal edit Form -->
                    <div id="modalForm2" class="modal-block modal-block-primary mfp-hide">
                        <form method="post" action="/edit" enctype="multipart/form-data">
                            @csrf
                            <section class="card">
                                <div class="modal-content">
                                    <div class="card-body">
                                        <header class="center">
                                            <h2 class="card-title">Edit User Record</h2>
                                        </header>
{{--                                        @foreach( $fetch_data as $details)--}}
                                        <div class="form-group row"></div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 control-label text-lg-right pt-2" for="email">Email</label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="email" name="email" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 control-label text-lg-right pt-2"for="full_name">Full Name</label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="full_name" name="full_name" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 control-label text-lg-right pt-2">Date Of Joining</label>
                                            <div class="col-lg-6">
                                                <div class="input-group">
											<span class="input-group-addon">
												<i class="fa fa-calendar"></i>
											</span>
                                                    <input type="date" id="DOJ" name="DOJ" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 control-label text-lg-right pt-2">Date Of leaving</label>
                                            <div class="col-lg-6">
                                                <div class="input-group">
											<span class="input-group-addon">
												<i class="fa fa-calendar"></i>
											</span>
                                                    <input type="date" name="DOL" id="DOL" class="form-control" required>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 control-label text-lg-right pt-2">
                                                </label>
                                            <div  class="checkbox">
                                                <label>
                                                    <input type="checkbox" id="checkbox" name="work" value="1">
                                                    Still Working</label>
{{--                                                <label><input type="checkbox" name="work" value="2">   Not Working</label>--}}
                                            </div>

                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 control-label text-lg-right pt-2">Upload Image</label>
                                            <div class="col-lg-6">
                                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                                    <div class="input-append">

                                                    <span class="btn btn-default btn-file">
                                                            <span class="fileupload-exists"></span>
                                                            <span class="fileupload-new"></span>
                                                            <input type="file" id="image" name="image" onblur="fetch_date();" required/>
                                                    </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <input type="hidden" class="form-control" id="edit_id"
                                                   name="edit_id" value="" required>
                                        </div>
{{--                                        @endforeach--}}
                                        <footer class="card-footer">
                                            <div class="row">
                                                <div class="col-md-12 text-right">
                                                    <button type="submit" class="btn btn-primary ">submit</button>
                                                    <button class="btn btn-default modal-dismiss">Cancel</button>
                                                </div>
                                            </div>
                                        </footer>


                                    </div>
                                </div>
                            </section>
                        </form >
                    </div>

                    <form method="post" action="/dashboard" >
                        <section class="card">
                            @if($errors->any())
                                <div class="alert alert-success" >
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <strong class="strong">{{$errors->first()}}</strong>
                                </div>
                            @endif
                            <header class="card-header row mx-0 align-items-center justify-content-between">
                                <h2 class="card-title">Dashboard</h2>
                                <a class="modal-with-form btn btn-primary px-4 py-2" href="#modalForm">Add</a>
                            </header>
                            <div class="card-body">

                                <table class="table table-bordered table-striped mb-0" id="datatable-editable">

                                    <thead>
                                    <tr>

                                        <th>Avatar</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Experience</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach( $fetch_data as $details)
                                        <tr data-item-id="1">

                                            <td><img src="/assets/img/original.jpg" class="rounded-circle" alt="Cinque Terre" width="80" height="80">
                                            </td>
                                            <td>{{$details->full_name}}</td>
                                            <td>{{$details->email}}</td>
                                            <td>{{$details->exp}}</td>
                                            <td class="actions">
                                                @php

                                                    $id=encrypt($details->id);
                                                @endphp
                                                <a class="modal-with-form"
                                                   href="#modalForm2"
                                                   onclick="get_id(this.id);"
                                                   id="{{$details->id}}">
                                                    <i class="fa fa-pencil"></i>
                                                </a>

                                                <a href="delete/{{$id}}" class="on-default remove-row"
                                                   onClick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach


                                    </tbody>
                                </table>


                            </div>
                        </section>
                    </form>
                </div>
            </div>


            <!-- end: page -->
        </section>


    </div>

</section>

<script>
function get_id(id) {

// alert(id);
    $.ajax({
        type: "get",
        url: "/get_id",
        data: {
            id: id,
        },
        cache: false,
        datatype: 'json',
        success: function (response) {
            response = $.parseJSON(response);
               console.log(response);
//                    alert(response);

            if (response['status'] == 200)
            {

                result1 = response['result'];
                console.log(result1);
                // $DOJ= format(yyyy-MM-dd);
                // var str = result1.date_of_joining;
                // var date = Date.parse(str);
                // // var DOJ= Date('Y-m-d H:i:s', toString('MM-dd-yyyy')(result1.date_of_joining))
                // var DOJ=date.toString('YYYY-mm-dd')
// $DOJ= moment(result1.date_of_joining).format('Y-m-d');
//                 $DOJ=Carbon::parse(result1.date_of_joining)->format('Y-m-d');
//                 var birthDate = new Date(parseInt(src));
                document.getElementById('email').value=result1.email;
                document.getElementById('full_name').value=result1.full_name;
                document.getElementById('edit_id').value=result1.id;
                // document.getElementById('DOL').value=result1.DOJ;
                // document.getElementById('image').value=result1.image;

                // var p_nm = ('<label><input type="checkbox" id="checkbox" name="work" value="1" checked>   Still Working</label>');
                // $("#checkbox").prepend(p_nm);

            }
        }
    });
}

function fetch_date() {

    var expl= document.getElementById('DOL').value;
    var expw= document.getElementById('checkbox').value;

    if (expl!=null && expw!=null) {
        document.getElementById("submit").disabled = false;
        alert("Please Enter Date of Leaving OR Mention Working Status")
    }
    // else{
    //     alert("Comfirm Password Is Not Matching");
    //     document.getElementById("submit").disabled = true;
    // }

}
</script>
<!-- Vendor -->
<script src="/assets/vendor/jquery/jquery.js"></script>
<script src="/assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
<script src="/assets/vendor/popper/umd/popper.min.js"></script>
<script src="/assets/vendor/bootstrap/js/bootstrap.js"></script>
<script src="/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="/assets/vendor/common/common.js"></script>
<script src="/assets/vendor/nanoscroller/nanoscroller.js"></script>
<script src="/assets/vendor/magnific-popup/jquery.magnific-popup.js"></script>
<script src="/assets/vendor/jquery-placeholder/jquery-placeholder.js"></script>

<!-- Specific Page Vendor -->
<script src="/assets/vendor/select2/js/select2.js"></script>
<script src="/assets/vendor/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="/assets/vendor/datatables/media/js/dataTables.bootstrap4.min.js"></script>
<script src="/assets/vendor/jquery-ui/jquery-ui.js"></script>
<script src="/assets/vendor/jqueryui-touch-punch/jqueryui-touch-punch.js"></script>
<script src="/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
<script src="/assets/vendor/jquery-maskedinput/jquery.maskedinput.js"></script>
<script src="/assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
<script src="/assets/vendor/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script src="/assets/vendor/bootstrap-timepicker/bootstrap-timepicker.js"></script>
<script src="/assets/vendor/fuelux/js/spinner.js"></script>
<script src="/assets/vendor/dropzone/dropzone.js"></script>
<script src="/assets/vendor/bootstrap-markdown/js/markdown.js"></script>
<script src="/assets/vendor/bootstrap-markdown/js/to-markdown.js"></script>
<script src="/assets/vendor/bootstrap-markdown/js/bootstrap-markdown.js"></script>
<script src="/assets/vendor/codemirror/lib/codemirror.js"></script>
<script src="/assets/vendor/codemirror/addon/selection/active-line.js"></script>
<script src="/assets/vendor/codemirror/addon/edit/matchbrackets.js"></script>
<script src="/assets/vendor/codemirror/mode/javascript/javascript.js"></script>
<script src="/assets/vendor/codemirror/mode/xml/xml.js"></script>
<script src="/assets/vendor/codemirror/mode/htmlmixed/htmlmixed.js"></script>
<script src="/assets/vendor/codemirror/mode/css/css.js"></script>
<script src="/assets/vendor/summernote/summernote-bs4.js"></script>
<script src="/assets/vendor/bootstrap-maxlength/bootstrap-maxlength.js"></script>
<script src="/assets/vendor/ios7-switch/ios7-switch.js"></script>
<script src="/assets/vendor/pnotify/pnotify.custom.js"></script>

<!-- Theme Base, Components and Settings -->
<script src="/assets/js/theme.js"></script>

<!-- Theme Custom -->
<script src="/assets/js/custom.js"></script>

<!-- Theme Initialization Files -->
<script src="/assets/js/theme.init.js"></script>

<!-- Examples -->
{{--<script src="/assets/js/examples/examples.datatables.editable11.js"></script>--}}
<script src="/assets/js/examples/examples.advanced.form.js"></script>
<script src="/assets/js/examples/examples.modals.js"></script>
</body>
</html>
