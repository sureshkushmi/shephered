<form method="post" action="{{route('bookings.store')}}">
@csrf
<div class="container-fluid booking mt-5 pb-5">
        <div class="container pb-5">
            <div class="bg-light shadow" style="padding: 30px;">
		@if($errors->any())
			<div class="alert alert-danger">
                        	<ul class="mb-0">
					@foreach($errors->all() as $error)
						<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
		@endif
		@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
                <div class="row align-items-center" style="min-height: 60px;">
                    <div class="col-md-10">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="mb-3 mb-md-0">
                                    <select name="destination" class="custom-select px-4" style="height: 47px;" required>
    					<option value="" disabled selected>Select Destination</option>
    					<option value="1">Destination 1</option>
    					<option value="2">Destination 2</option>
    					<option value="3">Destination 3</option>
				    </select>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3 mb-md-0">
                                    <div class="date" id="date1" data-target-input="nearest">
                                        <input type="text" name="depart_date" class="form-control p-4 datetimepicker-input" placeholder="Depart Date" data-target="#date1" data-toggle="datetimepicker"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3 mb-md-0">
                                    <div class="date" id="date2" data-target-input="nearest">
                                        <input type="text" name="return_date" class="form-control p-4 datetimepicker-input" placeholder="Return Date" data-target="#date2" data-toggle="datetimepicker"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3 mb-md-0">
                                    <select name="duration" class="custom-select px-4" style="height: 47px;" required>
    					<option value="" disabled selected>Select Duration</option>
    					<option value="1">1 day</option>
                                        <option value="2">2 day</option>
                                        <option value="3">3 day</option>
					<option value="1week">1 week</option>
                                        <option value="2week">2 week</option>
					<option value="1month">1 month</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-primary btn-block" type="submit" style="height: 47px; margin-top: -2px;">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>