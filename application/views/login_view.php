<div id="page-wrapper" class="col-md-6" style="background-color: #eee;">

    <div class="container-fluid">
        <form class="form-signin" method="post" action="authentication/validate" id="my_form">
          <h2 class="form-signin-heading">Please sign in</h2>
          <div class="form-group">
            <!-- <label for="inputEmail3" class="col-sm-2 control-label">Email</label> -->
              <label for="inputEmail" class="sr-only">Email address</label>
              <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email" required autofocus>
            <!-- <label for="inputPassword3" class="col-sm-2 control-label">Password</label>-->
              <label for="inputEmail" class="sr-only">Password</label>
              <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password" requied>
              <div class="checkbox">
                <label>
                  <input type="checkbox"> Remember me
                </label>
              </div>
              <button type="button" id="btn_login" class="btn btn-lg btn-primary btn-block">Sign in</button>
          </div>
        </form>
</div>
            <!-- /.container-fluid -->
</div>
        <!-- /#page-wrapper -->

<!-- 
<div id="page-wrapper" class="col-md-6">

    <div class="container-fluid">
        <form class="form-horizontal login_form" method="post" action="authentication/validate" id="my_form">
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
              <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <div class="checkbox">
                <label>
                  <input type="checkbox"> Remember me
                </label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="button" id="btn_login" class="btn btn-default">Sign in</button>
            </div>
          </div>
        </form>
</div>
</div>
-->