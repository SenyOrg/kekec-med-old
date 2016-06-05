{{--
    Bootstrap Modal
--}}
<div class="modal modal-danger" id="deleteModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Danger Modal</h4>
            </div>
            <div class="modal-body">
                <p>One fine body…</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline" id="deleteButtonOK">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

{{--
    General Form
    @desc Use this for sending PUT/POST/DELETE/PATCH requests over Hyperlinks
--}}
<form id="generalForm" style="display:none; visibility: hidden" method="post">
    <input type="hidden" name="_method" value="PUT" id="generalFormMethod">
    {{csrf_field()}}
</form>