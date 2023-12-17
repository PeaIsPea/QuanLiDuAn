<div class="tab-pane text-white bg-navbar-dark fade" id="password" role="tabpanel">
    <div class="card bg-navbar-dark info">
        <div class="card-body">
            <h5 class="card-title">Đổi mật khẩu</h5>
            @if (Auth::user()->social !== 'None')
            {{-- If the user is from social login, then password change not permitted --}}
                <p class="h2">Không khả dụng</p>
            @else
                <form method="post" action="{{ route('changePassword') }}">
                    @csrf
                    {{-- Required for the PUT method --}}
                    @method('put')
                    <div class="form-group">
                        <label for="old_password">Mật khẩu hiện tại</label>
                        <input type="password" class="form-control" id="inputPasswordCurrent"
                            placeholder="Nhập mật khẩu hiện tại" name="old_password" />
                        @if (Session::has('old_password_mismatch'))
                            <div class="invalid-feedback d-block" role="alert">
                                <strong>{{ Session::get('old_password_mismatch') }}</strong>
                            </div>
                        @endif
                        @error('old_password')
                            <div class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group pt-2">
                        <label for="new_password">Mật khẩu mới</label>
                        <input type="password" class="form-control" id="inputPasswordNew"
                            placeholder="Nhập mật khẩu mới" name="new_password" />
                        @error('new_password')
                            <div class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group pt-2">
                        <label for="password_confirmation">Nhập lại mật khẩu mới</label>
                        <input type="password" class="form-control" id="inputPasswordNew2"
                            placeholder="Nhập mật khẩu mới" name="new_password_confirmation" />
                        {{-- Convention, <name>_confirmation --}}
                        @error('new_password_confirmation')
                            <div class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group pt-3">
                        <button type="submit" class="btn btn-primary">
                            Lưu thay đổi
                        </button>
                    </div>
                </form>
            @endif
        </div>
    </div>
</div>
