        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Line Up
                            <small>Subheading</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <div class="col-lg-6">
                        <h2>{today}</h2>
                        <div class="table-responsive">
                            {line_list}
                            <table class="table table-hover table-striped" id="{game_match}">
                                <thead>
                                    <tr>
                                        <th>Team</th>
                                        <th>Standings</th>
                                        <th>Win</th>
                                        <th>Lose</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{game_lineup1}</td>
                                        <td>{standings1}</td>
                                        <td>{win1}</td>
                                        <td>{lose1}</td>
                                        <td><a href='team/edit/{id1}'>EDIT</a></td>
                                        <td><a href='team/delete/{id1}'>DELETE</a></td>
                                    </tr>
                                    <tr>
                                        <td>{game_lineup2}</td>
                                        <td>{standings2}</td>
                                        <td>{win2}</td>
                                        <td>{lose2}</td>
                                        <td><a href='team/edit/{id2}'>EDIT</a></td>
                                        <td><a href='team/delete/{id2}'>DELETE</a></td>
                                    </tr>  
                                </tbody>
                            </table>
                            {/line_list}
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->