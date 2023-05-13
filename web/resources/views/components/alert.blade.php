<div class="modal fade" id="alertModal" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog alert-modal modal-lg">
    <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title" style="color: #e75b1e;">{{ $alert_title }}</h4>
        </div>            
        <!-- Modal Body -->
        <div class="modal-body">
            
            <p>
                {{ $alert_body }}
            </p>

            <div class="modal-footer" id="modal_footer">
                <button type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">Đóng</span>
                </button>
            </div>
            
        </div>
    </div>
</div>