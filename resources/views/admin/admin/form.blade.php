
<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label">Nama Admin <span class="text-danger">*</span></label>
        <input type="text" name="nama"
               class="form-control @error('nama') is-invalid @enderror"
               value="{{ old('nama', $admin->nama ?? '') }}"
               placeholder="Masukkan nama admin" required>
        @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Email <span class="text-danger">*</span></label>
        <input type="email" name="email"
               class="form-control @error('email') is-invalid @enderror"
               value="{{ old('email', $admin->email ?? '') }}"
               placeholder="Masukkan email admin" required>
        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">
            Password
            @if(isset($admin))
                <small class="text-muted">(Kosongkan jika tidak diganti)</small>
            @else
                <span class="text-danger">*</span>
            @endif
        </label>
        <input type="password" name="password"
               class="form-control @error('password') is-invalid @enderror"
               placeholder="Masukkan password"
               {{ isset($admin) ? '' : 'required' }}>
        @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">
            Konfirmasi Password
            @if(!isset($admin))
                <span class="text-danger">*</span>
            @endif
        </label>
        <input type="password" name="password_confirmation"
               class="form-control"
               placeholder="Ulangi password"
               {{ isset($admin) ? '' : 'required' }}>
    </div>

    <div class="col-md-6">
        <label class="form-label">Nomor HP</label>
        <input type="text" name="no_hp"
               class="form-control"
               value="{{ old('no_hp', $admin->no_hp ?? '') }}"
               placeholder="Masukkan nomor HP">
    </div>

    <div class="col-12">
        <label class="form-label">Alamat</label>
        <textarea name="alamat" rows="3" class="form-control"
                  placeholder="Masukkan alamat">{{ old('alamat', $admin->alamat ?? '') }}</textarea>
    </div>

    <div class="col-12">
        <div class="alert alert-success mb-0">
            <i class="bi bi-shield-check me-2"></i>
            Akun admin akan langsung aktif setelah disimpan.
        </div>
    </div>
</div>
