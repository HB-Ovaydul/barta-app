@if( $errors -> any())
<p class="alert alert-danger alert-dismissible"><i class="fa-solid fa-triangle-exclamation"></i> {{ $errors -> first() }} <button type="button" class="btn-close" data-bs-dismiss="alert"></button></p>
@endif

@if(Session::has('success'))
   <p class="alert alert-success alert-dismissible"><i class="fa-solid fa-check"></i>  {{ Session::get('success') }}<button type="button" class="btn-close" data-bs-dismiss="alert"></button></p>
@endif
@if(Session::has('warning'))
   <p class="alert alert-warning alert-dismissible">{{ Session::get('warning') }}<button type="button" class="btn-close" data-bs-dismiss="alert"></button></p>
@endif
@if(Session::has('danger'))
   <p class="alert alert-danger alert-dismissible">{{ Session::get('danger') }}<button type="button" class="btn-close" data-bs-dismiss="alert"></button></p>
@endif
@if(Session::has('info'))
   <p class="alert alert-info alert-dismissible">{{ Session::get('info') }}<button type="button" class="btn-close" data-bs-dismiss="alert"></button></p>
@endif




















{{-- const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 1000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  })

  Toast.fire({
    icon: 'success',
    title: 'Signed in successfully'
  }); --}}

  {{-- success: function (data) {
    toastr.options.closeButton = true;
    toastr.options.closeMethod = 'fadeOut';
    toastr.options.closeDuration = 100;
    toastr.success(data.message);
} --}}
