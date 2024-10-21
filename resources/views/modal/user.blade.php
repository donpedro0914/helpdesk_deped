<div id="addUser" class="modal fade">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-success text-white">
				<h4 class="modal-title">Add New User</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
			</div>
			<div class="modal-body">
				<form action="{{ route('admin.user.store') }}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="form-row">
						<div class="col-md-6">
							<div class="form-group col-md-12 col-xs-12">
								<h5>Basic Information</h5>
								<hr>
							</div>
							<div class="form-group col-md-12 col-xs-12">
								<label>Full Name</label>
								<input type="text" class="form-control" name="name" required />
							</div>
							<div class="form-group col-md-12 col-xs-12">
								<label>E-mail Address</label>
								<input type="email" class="form-control" name="email" required />
							</div>
							<div class="form-group col-md-12 col-xs-12">
								<label>Phone</label>
								<input type="text" class="form-control" name="phone"/>
							</div>
							<div class="form-group col-md-12 col-xs-12">
								<label>Address</label>
								<input type="text" class="form-control" name="address" />
							</div>
						</div>
						<div class="col-md-6">
							<label>Image</label>
                            <input type="file" id="storeLogo" name="avatar">
                            <div class="storeLogoPreview_container">
                                <img id="storeLogoPreview" />
                            </div>
						</div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12 col-xs-12">
                            <h5>Job Information</h5>
                            <hr>
                        </div>
						<div class="form-group col-md-12 col-xs-12">
							<label>Position</label>
							<select name="position" class="form-control" id="employeePosition">
                                <option value="">-- Select Postion --</option>
								@foreach(App\Position::all() as $pos)
									@if($pos->name == 'Raw File Staff')
										@continue
									@endif
								<option value="{{ $pos->name }}">{{ $pos->name }}</option>
								@endforeach
                            </select>
						</div>
						<div class="form-group col-md-12 col-xs-12" style="display:none;" id="installer_name">
							<label>Installer Name</label>
							<input type="text" class="form-control" id="installer_name_fld"/>
						</div>
						<div class="form-group col-md-12 col-xs-12" style="display:none;" id="installer_operative">
							<label>Installer Admins</label>
							<select name="installer_operatives[]" id="installer_operatives" class="form-control" multiple="multiple">
								@forelse($installer_operatives as $io)
									<option value="{{ $io->id }}">{{ $io->name }}</option>
								@empty
								@endforelse
							</select>
						</div>
						<div class="form-group col-md-12 col-xs-12" style="display:none;" id="installer_operative_io">
							<label>Installer Operatives</label>
							<select name="installer_operatives_io[]" id="installer_operatives_io" class="form-control" multiple="multiple">
								@forelse($installer_operatives_io as $ioi)
									<option value="{{ $ioi->id }}">{{ $ioi->name }}</option>
								@empty
								@endforelse
							</select>
						</div>

						<div class="form-group col-md-12 col-xs-12" style="display:none;" id="installer_surveyor_io">
							<label>Surveyors</label>
							<select name="installer_surveyor_io[]" id="installer_surveyor_io" class="form-control" multiple="multiple">
								@forelse($installer_surveyor_io as $ioi)
									<option value="{{ $ioi->id }}">{{ $ioi->name }}</option>
								@empty
								@endforelse
							</select>
						</div>
						
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12 col-xs-12">
                            <h5>Account Information</h5>
                            <hr>
                        </div>
						<div class="form-group col-md-6 col-xs-12">
							<label>Username</label> <span class="usernamecheck"></span>
							<input type="text" id="username" class="form-control" name="username" required/>
						</div>
						<div class="form-group col-md-6 col-xs-12">
							<label>Password</label>
							<input type="password" class="form-control" name="password" required/>
						</div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12 col-xs-12">
                            <div class="clearfix text-right mt-3">
                                <button type="submit" id="addUserBtn" class="btn btn-success">
                                    Add User
                                </button>
                            </div>
                        </div>
                    </div>
				</form>
			</div>
		</div>
	</div>
</div>