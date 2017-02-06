<!--=== Content Part ===-->
<div class="modal fade" id="demo_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" hidden>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel4">Try us out now!</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <h4>Contact Information</h4>
                        <p><label for="name">Name</label></p>
                        <p><input class="form-control" type="text" name="name" /></p>
                        <p><label for="name">Phone</label></p>
                        <p><input class="form-control" type="text" name="phone" /></p>
                        <p><label for="name">Email</label></p>
                        <p><input class="form-control" type="text" name="email" /></p>
                    </div>
                    <div class="col-md-6">
                        <h4>Customization</h4>
                        <p><label for="name">Methods</label></p>
                        <div class="col-md-4">
                        <p>Voice<input class="form-control" type="checkbox" name="voice" /></p>
                        </div>
                        <div class="col-md-4">
                        <p>SMS<input class="form-control" type="checkbox" name="sms"/></p>
                        </div>
                        <div class="col-md-4">
                        <p>Email<input class="form-control" type="checkbox" name="email" /></p>
                        </div>
                        <div>
                            <p><label for="type">Types</label></p>
                            <select name="type" class="form-control" >
                                <option value="0" default>Appointment</option>
                                <option value="1">Birthday</option>
                                <option value="2">Marketing</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    {!! Recaptcha::render() !!}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-u btn-u-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn-u btn-u-primary">Go!</button>
            </div>
        </div>
    </div>
</div>
