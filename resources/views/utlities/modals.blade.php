<!--// This is th modal for the delete button-->
<div class="modal fade" id="delete">
   <div class="modal-dialog">
      <div class="modal-content">
         <form class="modal-content" id="delete-form" method="post">
            @csrf
            @method('delete')
            <div class="modal-body">
               <h5>Are you sure?</h5>
               <p>Do you want to delete this data? <br>This action cannot be undone.</p>
            </div>
            <div class="modal-footer justify-content-between">
               <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
               <button type="button" class="btn btn-danger">Delete</button>
            </div>
         </form>
      </div>
   </div>
</div>

<!--// This is th modal for the restore button-->
<div class="modal fade" id="restore">
   <div class="modal-dialog">
      <div class="modal-content">
         <form class="modal-content" id="restore-form" method="post">
            @csrf
            @method('post')
            <div class="modal-body">
               <h5>Are you sure?</h5>
               <p>Do you want to restore this data? <br>This action cannot be undone.</p>
            </div>
            <div class="modal-footer justify-content-between">
               <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
               <button type="button" class="btn btn-warning">Restore</button>
            </div>
         </form>
      </div>
   </div>
</div>
@stack('models')