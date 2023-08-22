<script src="{{ url('public') }}/assets/js/core/jquery.3.2.1.min.js"></script>
<script src="{{ url('public') }}/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
{{-- <script src="{{ url('public') }}/assets/js/demo.js"></script> --}}

@foreach (['success', 'danger', 'warning', 'info'] as $status)
    @if (session($status))
    <div  class="alert alert-{{ $status }} alert-dismissible fade show" role="alert">
        @if ($status == 'success')
            <i class="mdi mdi-check-all me-2"></i>
            @else
            <i class="mdi mdi-alert-circle-outline me-2"></i>
        @endif
        
        {{ session($status) }}
    </div>
    <script>
        setTimeout(() => {
            $('.alert').hide().slow();
        }, 2000);
    </script>
    @endif
@endforeach