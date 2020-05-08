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

                    <input type="hidden" name="rowId" id="rowId">
                    <p class="name"></p>
                    <p class="description"></p>
                    <div class="form-group">
                        <label for='ps4 fault description'>Additional Description (Optional)</label><br>
                        <textarea class="additionalDescription form-control" rows='4' name="additionalDescription" placeholder="If your problem wasn't in the list above, you can write it here. Or additional problems to what you already selected."></textarea>
                    </div>

                    <div class="form-group">
                        <label for='ps4 pad mark'>Mark (Optional)</label>
                        <textarea class="marker form-control" name="mark" rows='4' required placeholder="If you are fixing more than one pad or console, please identify each with a mark and tell me here."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary updateButton">Save</button>
                </div>
            </form>
          </div>
    </div>
</div>
