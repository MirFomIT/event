
<?php

?>
    <main>
    <form id="form">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <div class="form-group">
                    <label for="place_form">Place</label>
                    <input type="text" class="form-control" id="place_form" placeholder="Place">
                    <p class="help-block">Example block-level help text here.</p>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <div class="form-group">
                    <label for="address_form">Address</label>
                    <input type="text" class="form-control" id="address_form" placeholder="Address">
                    <p class="help-block">Example block-level help text here.</p>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <div class="form-group">
                    <label for="place_quantity_form">Places Quantity</label>
                    <input type="text" class="form-control" id="place_quantity_form">
                    <p class="help-block">Example block-level help text here.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <button type="button" class="btn btn_update" data-toggle="modal" data-target="#myModal">Update</button>
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
