<!-- Edit Modal -->
<div class="modal fade editFixModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="editFixForm">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit PS4 fixing request</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                    <input type="text" name="rowId" id="rowId">
                    </div>
                    <div class="form-group">
                    <label for="message-text" class="col-form-label">Description</label>
                    <textarea name="description" class="form-control edit-description" ></textarea>
                    </div>
                    <div class="form-group">
                    <label for="message-text" class="col-form-label">Mark</label>
                    <textarea name="mark" class="form-control edit-marker" ></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success updateButton">Edit Request</button>
                </div>
            </form>
          </div>
    </div>
</div>
