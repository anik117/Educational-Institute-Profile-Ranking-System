@if(session('flash_message'))
    <div class="alert" id="alert">
    	<h4>{{session('flash_message')}}</h4>
    </div>
@endif