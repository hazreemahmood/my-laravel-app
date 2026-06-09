@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6>Image Gallery</h6>
                        <button class="btn btn-primary btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#uploadModal">
                            <i class="fas fa-upload me-1"></i> Upload Image
                        </button>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    @if(count($images) > 0)
                        <div class="row g-3 p-4" id="image-grid">
                            @foreach($images as $image)
                                <div class="col-lg-3 col-md-4 col-sm-6 image-item" data-filename="{{ $image['name'] }}">
                                    <div class="card shadow-sm position-relative">
                                        <img src="{{ $image['url'] }}" 
                                             class="card-img-top" 
                                             alt="{{ $image['name'] }}"
                                             style="height: 200px; object-fit: cover; cursor: pointer;"
                                             onclick="previewImage('{{ $image['url'] }}', '{{ $image['name'] }}')">
                                        <div class="card-body p-2">
                                            <p class="card-text text-truncate mb-1 small">{{ $image['name'] }}</p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <small class="text-muted">{{ round($image['size'] / 1024, 1) }} KB</small>
                                                <button class="btn btn-outline-danger btn-sm delete-image" 
                                                        data-filename="{{ $image['name'] }}"
                                                        title="Delete image">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-5">
                            <i class="fas fa-images fa-4x text-muted mb-3"></i>
                            <h5 class="text-muted">No images yet</h5>
                            <p class="text-muted mb-0">Click the "Upload Image" button to get started.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Upload Modal -->
<div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="uploadModalLabel">Upload Image</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="uploadForm" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="imageInput" class="form-label">Choose an image</label>
                        <input class="form-control" type="file" id="imageInput" name="image" accept="image/*" required>
                        <div class="form-text">Allowed: jpeg, png, jpg, gif, svg, webp. Max size: 10MB</div>
                    </div>
                    <div class="progress mb-3 d-none" id="uploadProgress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 0%"></div>
                    </div>
                    <div id="uploadMessage" class="d-none"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" id="uploadBtn">
                        <i class="fas fa-upload me-1"></i> Upload
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Preview Modal -->
<div class="modal fade" id="previewModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="previewModalLabel">Image Preview</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img src="" id="previewImage" class="img-fluid" alt="Preview">
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    // Auto-open upload modal if ?upload=1
    @if($openUpload)
        document.addEventListener('DOMContentLoaded', function() {
            var uploadModal = new bootstrap.Modal(document.getElementById('uploadModal'));
            uploadModal.show();
        });
    @endif

    // Upload form submission
    document.getElementById('uploadForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const formData = new FormData(this);
        const uploadBtn = document.getElementById('uploadBtn');
        const progress = document.getElementById('uploadProgress');
        const progressBar = progress.querySelector('.progress-bar');
        const message = document.getElementById('uploadMessage');
        
        uploadBtn.disabled = true;
        uploadBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i> Uploading...';
        progress.classList.remove('d-none');
        message.classList.add('d-none');
        
        const xhr = new XMLHttpRequest();
        
        xhr.upload.addEventListener('progress', function(e) {
            if (e.lengthComputable) {
                const percent = Math.round((e.loaded / e.total) * 100);
                progressBar.style.width = percent + '%';
                progressBar.textContent = percent + '%';
            }
        });
        
        xhr.addEventListener('load', function() {
            uploadBtn.disabled = false;
            uploadBtn.innerHTML = '<i class="fas fa-upload me-1"></i> Upload';
            
            if (xhr.status === 200) {
                const response = JSON.parse(xhr.responseText);
                if (response.success) {
                    progressBar.classList.remove('bg-danger');
                    progressBar.classList.add('bg-success');
                    message.className = 'alert alert-success';
                    message.textContent = response.message;
                    message.classList.remove('d-none');
                    
                    // Reload page after short delay
                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                }
            } else {
                progressBar.classList.add('bg-danger');
                message.className = 'alert alert-danger';
                message.textContent = 'Upload failed. Please try again.';
                message.classList.remove('d-none');
            }
        });
        
        xhr.addEventListener('error', function() {
            uploadBtn.disabled = false;
            uploadBtn.innerHTML = '<i class="fas fa-upload me-1"></i> Upload';
            progressBar.classList.add('bg-danger');
            message.className = 'alert alert-danger';
            message.textContent = 'Upload failed. Please check your connection.';
            message.classList.remove('d-none');
        });
        
        xhr.open('POST', '{{ route("images.store") }}');
        xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('input[name="_token"]').value);
        xhr.send(formData);
    });
    
    // Delete image
    document.querySelectorAll('.delete-image').forEach(function(btn) {
        btn.addEventListener('click', function() {
            if (!confirm('Are you sure you want to delete this image?')) return;
            
            const filename = this.dataset.filename;
            const formData = new FormData();
            formData.append('filename', filename);
            formData.append('_token', document.querySelector('input[name="_token"]').value);
            
            fetch('{{ route("images.destroy") }}', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const item = document.querySelector(`.image-item[data-filename="${filename}"]`);
                    if (item) item.remove();
                } else {
                    alert('Failed to delete image.');
                }
            });
        });
    });
    
    // Preview image
    function previewImage(url, name) {
        document.getElementById('previewImage').src = url;
        document.getElementById('previewModalLabel').textContent = name;
        const modal = new bootstrap.Modal(document.getElementById('previewModal'));
        modal.show();
    }
    
    // Reset modal on close
    document.getElementById('uploadModal').addEventListener('hidden.bs.modal', function() {
        document.getElementById('uploadForm').reset();
        document.getElementById('uploadProgress').classList.add('d-none');
        document.getElementById('uploadMessage').classList.add('d-none');
        document.getElementById('uploadBtn').disabled = false;
        document.getElementById('uploadBtn').innerHTML = '<i class="fas fa-upload me-1"></i> Upload';
    });
</script>
@endpush