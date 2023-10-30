@extends('user.layouts.app')
@section('content')
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Upload Question File</h1>
            </div>
         </div>
      </div>
      <!-- /.container-fluid -->
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="card card-primary">
         <div class="card-header">
            <h3 class="card-title">Question Details</h3>
         </div>
         <div class="card-body">
            <div class="row">
               <div class="col-12 col-md-12 col-lg-6 order-2 order-md-2">
                  <div class="row">
                     <div class="col-12">
                        <div class="card card-primary">
                           <div class="card-header">
                              <h3 class="card-title">Refrences</h3>
                           </div>
                           <div class="card-body">
                            <div>
                              <i class="far fa-fw fa-file-pdf"></i><a href="{{asset('dist/ref').'/q'.$evidances->number.'.pdf'}}"> Q{{$evidances->number}}_refrence</a>
                            </div>
                           </div>
                        </div>
                        <div class="card card-primary">
                           <div class="card-header">
                              <h3 class="card-title">Comments</h3>
                           </div>
                           <div class="card-body">
                              @foreach ($evidances->comments as $comment )
                              <div class="post">
                                 <p class="username">
                                    <a href="#">{{$comment->user}}</a>
                                 </p>
                                 <p class="description">{{$comment->created_at}}</p>
                                 <span class="d-flex justify-content-between">
                                    <p>{{$comment->comment}}</p>
                                    @if ($comment->user==auth()->user()->name)
                                    <form method="post" action="{{Route('deleteComment',['id'=>$evidances->id,'commentid'=>$comment->id])}}">
                                       @csrf
                                       <button type="submit" class="btn btn-danger"><i class="fas fa-solid fa-trash"></i></button>
                                    </form>
                                    @endif
                                 </span>
                                 <p>
                                    <a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i>{{$comment->upload}}</a>
                                 </p>
                              </div>
                              @endforeach
                              <div class="text-center">
                                 <button type="submit" id="comment-button" class="btn btn-primary">Add Comment</button>
                              </div>
                              <!-- 
                                 *
                                 *
                                 *
                                 -->
                              <div id="comment-modal" class="modal">
                                 <div class="modal-content">
                                    <form method="post" action="{{Route('comment_store',$evidances->id)}}">
                                       @csrf
                                       <div class="d-flex flex-column text-center">
                                          <span class="close mb-3">&times;</span>
                                          <label for="comment-field">Type your comment:</label>
                                          <textarea name="comment" id="comment-field" class="m-3" rows="4"></textarea>
                                          <select name="upload" class="m-3">
                                             @foreach ($evidances->uploads as $upload )
                                             <option value="{{$upload->path}}">{{$upload->path}}</option>
                                             @endforeach
                                          </select>
                                          <button type="submit" id="submit-comment" class="btn btn-primary m-4">Add Comment</button>
                                       </div>
                                    </form>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- -->
               <div class="col-12 col-md-12 col-lg-6 order-1 order-md-1">
                  <h2 class="text-primary">Question {{$evidances->number}}</h2>
                  <p class="text-muted">{{$evidances->question}}</p>
                  <br>
                  <div class="text-muted">
                     <h5>Topic
                        <b class="d-block">{{$evidances->topic}}</b>
                      </h5>
                  </div>
                  <h4 class="mt-5 text-muted">Files</h4>
                  <ul class="list-unstyled">
                     @if ($evidances->uploads->count()!=0)
                     @foreach ($evidances->uploads as $upload )
                     <li>
                        <span class="d-flex justify-content-between">
                           <div><i class="far fa-fw fa-file-word"></i><a href="{{asset('files').'/'.$upload->path}}">{{$upload->path}}</a></div>
                           <div>
                              <form method="post" action="{{Route('deleteFile',['id'=>$evidances->id,'fileid'=>$upload->id])}}">
                                 @csrf
                                 <button type="submit" class="btn btn-danger"><i class="fas fa-solid fa-trash"></i></button>
                              </form>
                              <!-- *
                                 *
                                 *
                                 * DA LO ANA H3MEL ABL MA YMS7 Y2OLH ARE U SURE ? BS LAZEM 3SHAN ASH8LHA M7TAG FRONTEND B SCRIPT SH8AL 3ALA LOOP.
                                 *
                                 *
                                 -->
                              <!-- <div class="text-center">
                                 <button type="submit" id="delete_file-button" class="btn btn-danger"><i class="fas fa-solid fa-trash"></i></button>
                                 </div>
                                 
                                 <div id="delete_file-modal" class="modal">
                                 <div class="modal-content">
                                   <form method="post" action="{{Route('deleteFile',['id'=>$evidances->id,'fileid'=>$upload->id])}}">
                                   @csrf
                                   <div class="d-flex flex-column text-center">
                                     <label for="delete_file-field">are you sure u want to delete the file permantly ?</label>
                                     <div>
                                       <button id="submit-delete_file2" class="btn btn-primary m-4">Cancel</button>
                                       <button type="submit" id="submit-delete_file" class="btn btn-danger m-4">Delete</button>
                                     </div>
                                   </div>
                                   </form>
                                 </div>
                                 </div> -->
                              <!-- *
                                 *  
                                 *
                                 *
                                 -->
                           </div>
                        </span>
                     </li>
                     <hr class="divider">
                     @endforeach
                     @else
                     <li>
                        <p class="mt-5 text-muted text-center"> There is No Files!</a>
                     </li>
                     @endif
                  </ul>
                  <div class="text-center">
                     <h5 class="mt-5 text-muted">Maximum file size is 6MB ONLY!</h5>
                  </div>
                  <div class="text-center mt-5 mb-3">
                     <form method="post" action="{{Route('upload_store',$evidances->id)}}" enctype="multipart/form-data">
                        @csrf <!-- da lazem a7toh gwa ay form (mn 8erha error 419)-->
                        <div class="form-group row">
                           <div class="col-sm-1-12">
                              <div id="drop-area">
                                 <p>Drag and drop files here to upload, or click to select files.</p>
                                 <input type="file" name="file" id="file-input" multiple>
                              </div>
                           </div>
                        </div>
                        @if ($errors->any())
                        <div class="text-center">
                           @foreach ($errors->all() as $error)
                           <p class="text-red list-none">{{$error}}</p>
                           @endforeach
                        </div>
                        @endif 
                        <div class="form-group row">
                           <div class="col-sm-10">
                              <button type="submit" class="btn btn-primary">Upload Files</button>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>
<style>
   .modal {
   display: none;
   position: fixed;
   z-index: 1;
   left: 0;
   top: 0;
   width: 100%;
   height: 100%;
   overflow: auto;
   background-color: rgba(0, 0, 0, 0.4);
   }
   .modal-content {
   background-color: #fefefe;
   margin: 15% auto;
   padding: 20px;
   border: 1px solid #888;
   width: 50%; /* set the width to 50% */
   max-height: 50%; /* set the max-height to 50% */
   overflow-y: auto; /* enable vertical scrolling for content */
   }
   .close {
   color: #aaa;
   float: right;
   font-size: 28px;
   font-weight: bold;
   }
   .close:hover,
   .close:focus {
   color: black;
   text-decoration: none;
   cursor: pointer;
   }
   #drop-area {
   border: 2px dashed #ccc;
   border-radius: 10px;
   padding: 20px;
   text-align: center;
   font-size: 1.2em;
   margin: 20px;
   }
</style>
<script>
   // Get the button and the modal
   var button = document.getElementById("comment-button");
   var modal = document.getElementById("comment-modal");
   
   // Get the close button
   var closeButton = document.getElementsByClassName("close")[0];
   
   // When the user clicks the button, show the modal
   button.onclick = function() {
     modal.style.display = "block";
   }
   
   // When the user clicks on the close button, hide the modal
   closeButton.onclick = function() {
     modal.style.display = "none";
   }
   
   // When the user clicks anywhere outside of the modal, hide it
   window.onclick = function(event) {
     if (event.target == modal) {
       modal.style.display = "none";
     }
   }
</script>
<script>
   // Get the drop area and file input
   var dropArea = document.getElementById("drop-area");
   var fileInput = document.getElementById("file-input");
   
   // Prevent default drag behaviors
   ["dragenter", "dragover", "dragleave", "drop"].forEach(eventName => {
     dropArea.addEventListener(eventName, preventDefaults, false);
     document.body.addEventListener(eventName, preventDefaults, false);
   });
   
   // Highlight drop area when item is dragged over it
   ["dragenter", "dragover"].forEach(eventName => {
     dropArea.addEventListener(eventName, highlight, false);
   });
   
   ["dragleave", "drop"].forEach(eventName => {
     dropArea.addEventListener(eventName, unhighlight, false);
   });
   
   // Handle dropped files
   dropArea.addEventListener("drop", handleDrop, false);
   
   function preventDefaults(e) {
     e.preventDefault();
     e.stopPropagation();
   }
   
   function highlight() {
     dropArea.classList.add("highlight");
   }
   
   function unhighlight() {
     dropArea.classList.remove("highlight");
   }
   
   function handleDrop(e) {
     var files = e.dataTransfer.files;
     fileInput.files = files;
     handleFiles(files);
   }
   
   function handleFiles(files) {
     // Handle the uploaded files here
     console.log(files);
   }
</script>
@endsection