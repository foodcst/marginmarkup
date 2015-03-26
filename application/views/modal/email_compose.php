<div class="modal fade modal-compose-mail" id="compose" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="TRUE">  
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-compose-mail-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="TRUE">&times;</button>
                <p class="modal-title">Compose Message</p>
            </div>
            <form action="" role="form" class="form-horizontal" method="post" accept-charset="utf-8">            
<input type="hidden" name="token" value="1426224622" />
            <div class="modal-body">
                                <div class="form-group">
                   <input type="text" name="from" value="From:  &lt;&gt;" placeholder="From" class="form-control" required="required" disabled />                </div>
                <div class="form-group">
                   <input type="text" name="to" value="" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$" title="you@domain.com" placeholder="To" type="email" class="form-control" required="required" />                </div>
                <div class="form-group">
                   <input type="text" name="subject" value="" placeholder="Subject" class="form-control" required="required" />                </div>
                <div class="form-group modal-compose-mail-body">
                   <textarea name="message" placeholder="Your Message" class="form-control textarea-wysihtml5" rows="10" maxlength="250" required="required"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary pull-left"><i class="fa fa-envelope-o"></i> Send</button>
                <button type="submit" name="save" value="save" class="btn btn-default"><i class="fa fa-save"></i> Save as draft</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
            </form>        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<?php $this->load->view('plugin_scripts/bootstrap-wysihtml5');?>