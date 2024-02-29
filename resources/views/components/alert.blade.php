@vite(['resources/sass/app.scss', 'resources/js/app.js'])

@if (session()->has('success'))
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            Swal.fire('Pronto!', "{{ session('success') }}", 'success');
        })
    </script>
@endif

@if (session()->has('danger'))
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            Swal.fire('Error!', "{{ session('danger') }}", 'warning');
        })
    </script>
@endif

@if ($errors->any())
    @php
        $msg = '';
        foreach ($errors->all() as $error){
                $msg .= $error .'<br>';
        }
    @endphp
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            Swal.fire('Error!', "{!! $msg !!}", 'error');
        })
    </script>

@endif

