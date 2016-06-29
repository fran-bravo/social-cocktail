<section class="content">

    <div class="row">
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="box box-danger">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture">

                    <h3 class="profile-username text-center">{{$user->name}} {{$user->lastName}}</h3>

                    <p class="text-muted text-center">Pensar</p>

                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Cócteles</b> <a class="pull-right">Prog</a>
                        </li>
                        <li class="list-group-item">
                            <b>Seguidores</b> <a class="pull-right">Prog</a>
                        </li>
                        <li class="list-group-item">
                            <b>Seguidos</b> <a class="pull-right">Prog</a>
                        </li>
                        <li class="list-group-item">
                            <b>Propína</b> <a class="pull-right">Prog</a>
                        </li>
                    </ul>

                    <a href="#" class="btn btn-danger btn-block"><b>Seguir (Prog)</b></a>
                    <a href="#" class="btn btn-danger btn-block"><b>Mensaje (Prog)</b></a>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

            <!-- About Me Box -->
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">About Me</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

                    <p class="text-muted">
                        B.S. in Computer Science from the University of Tennessee at Knoxville
                    </p>

                    <hr>

                    <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

                    <p class="text-muted">Malibu, California</p>

                    <hr>

                    <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

                    <p>
                        <span class="label label-danger">UI Design</span>
                        <span class="label label-success">Coding</span>
                        <span class="label label-info">Javascript</span>
                        <span class="label label-warning">PHP</span>
                        <span class="label label-primary">Node.js</span>
                    </p>

                    <hr>

                    <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#activity" data-toggle="tab">Actividad</a></li>
                    <li><a href="#timeline" data-toggle="tab">Cócteles</a></li>
                </ul>
                <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="timeline">
                    </div>
                    <!-- /.tab-pane -->

                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
