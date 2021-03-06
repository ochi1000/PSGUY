{{-- Delete Modal --}}
<div class="modal fade deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="deleteForm">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete PS4 fixing request</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="rowId" id="rowId">
                    <p class="name"></p>
                    <p class="description"></p>
                    <p class="additionalDescription"></p>
                    <p class="marker"></p>
                </div>
                <div class="modal-footer">
                    <p>Are you sure, you want to make this <span class="text-damger">MOVE</span>?</p>
                    <button class="btn btn-danger deleteButton">Delete</button>
                </div>
            </form>
          </div>
    </div>
</div>
