<div class="col-md-12 footer">
	<div class="col-md-4 col-md-offset-4" style="padding:10px;text-align:center;">
		Powered By Bootstrap &copy 2017 R TEAM
	</div>
</div>
	<div class="modal fade" id="feedback" role="dialog" style="margin-top:150px;">
	    <div class="modal-dialog">
	    
	      <!-- Modal content-->
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h4 class="modal-title">Feedback</h4>
	        </div>
	        <div class="modal-body">
	          <form action="user/feedbackstore" method="POST">
	          {{ csrf_field() }}
	          	<textarea name="feedback" class="form-control" placeholder="Type Feedback Here"></textarea>
	        </div>
	        <div class="modal-footer" align="center">
	          <input type="submit" name="send" class="btn btn-primary" value="SEND">
	          </form>
	        </div>
	      </div>
	      
	    </div>
  	</div>