<?php
?>

<main>
        <form id="form">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="first_name_form">First Name</label>
                        <input type="text" class="form-control" id="first_name_form" placeholder="First Name">
                        <p class="help-block">Example block-level help text here.</p>
                    </div>
                    <div class="form-group">
                        <label for="last_name_form">Last Name</label>
                        <input type="text" class="form-control" id="last_name_form" placeholder="Last Name">
                        <p class="help-block">Example block-level help text here.</p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="sso_id_form">SSO ID</label>
                        <input type="text" class="form-control" id="sso_id_form" placeholder="SSO ID">
                        <p class="help-block">Example block-level help text here.</p>
                    </div>
                    <div class="form-group">
                        <label for="password_form">Password</label>
                        <input type="text" class="form-control" id="password_form" placeholder="Password">
                        <p class="help-block">Example block-level help text here.</p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="email_form">E-mail</label>
                        <input type="text" class="form-control" id="email_form" placeholder="E-mail">
                        <p class="help-block">Example block-level help text here.</p>
                    </div>
                    <div class="form-group">
                        <label for="roles_form">Roles</label>
                        <select id="roles_form" class="form-control">
                            <option>Admin</option>
                            <option>User</option>
                            <option>admin</option>
                            <option>user</option>
                            <option>user</option>
                        </select>
                        <p class="help-block">Example block-level help text here.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <button type="button" class="btn btn_update"  data-toggle="modal" data-target="#myModal">Update</button>
                    <span> or </span>
                    <button type="button" class="btn btn_cancel" onclick='location.href="index.html"'>Cancel</button>
                    <!--
                    <button type="reset" class="btn btn_create">Create</button>
                    <span> or </span>
                    <button type="button" class="btn btn_cancel">Cancel</button>
                    -->
                </div>

            </div>
        </form>

        <!--MODAL WINDOW-->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="cross" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Your message is safed
                </div>
            </div>
        </div>

    </main>
