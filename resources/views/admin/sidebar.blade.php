<div class="col-md-3">
	<div class="panel panel-default panel-flush">
	    <div class="panel-heading">
	    	<h4>Sidebar</h4>
	  	</div>
	    <div class="panel-body">
        <ul class="nav" role="tablist">
            <li role="presentation">
            	<a href="{{ url('/dashboard')}}"> Dashboard</a>
            </li>

            <li role="presentation">
            	<a href="{{ url('/admin/role')}}"> Role</a>
            </li>

            <li role="presentation">
            	<a href="{{ url('/admin/permission')}}"> Permission</a>
            </li>

            <li role="presentation">
                <a href="{{ url('/admin/user')}}"> User</a>
            </li>
        </ul>
	    </div>
	</div>
</div>
