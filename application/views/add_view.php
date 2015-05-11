        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Add new
                            <small>Subheading</small>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
                <div class="col-lg-6">
                       <form class="form-horizontal login_form" method="post" action="team/validate/{gameline_id}" id="my_form">
                          <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Date&Time</label>
                            <div class="col-sm-10">
                              <input type="datetime-local" value="{game_date}" class="form-control" id="inputEmail" name="game_date">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Match</label>
                            <div class="col-sm-10">
                              <select name="game_match" class="form-control">
                                    <option>{game_match}</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Team</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="inputEmail" name="game_lineup" value="{game_lineup}">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Standings</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="inputEmail" name="standings" value="{standings}">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Win</label>
                            <div class="col-sm-10">
                              <input type="number" class="form-control" id="inputEmail" name="win" min="1" max="99" value="{win}">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Lose</label>
                            <div class="col-sm-10">
                              <input type="number" class="form-control" id="inputEmail" name="lose" min="1" max="99" value="{lose}">
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                              <button type="button" id="btn_save" class="btn btn-default">Save</button>
                            </div>
                          </div>
                        </form>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->